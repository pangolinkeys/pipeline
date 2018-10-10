<?php

namespace Pangolinkeys\Pipe;

use Pangolinkeys\Pipe\Contracts\ProvidesContextPipeline;
use Pangolinkeys\Pipe\Contracts\ProvidesPipeline;
use Pangolinkeys\Pipe\Exceptions\KeyNotExistsException;

trait Pipeline
{
    /**
     * Keyed array to store pipeline context.
     *
     * @var array
     */
    protected $contextStore = [];

    /**
     * Add a keyed value to the pipeline context.
     *
     * @param $key
     * @param $value
     * @return Pipeline
     */
    public function put($key, $value)
    {
        $this->contextStore[ $key ] = $value;

        return $this;
    }

    /**
     * Get a value stored in the pipeline context.
     *
     * @param $key
     * @return mixed
     * @throws KeyNotExistsException
     */
    public function get($key)
    {
        if (array_key_exists($key, $this->contextStore)) {
            return $this->contextStore[ $key ];
        } else {
            throw new KeyNotExistsException('The key specified does not exist in the pipeline context.');
        }
    }

    /**
     * Process through the pipeline.
     *
     * @param ProvidesPipeline ...$pipeline
     * @return mixed|null
     */
    protected function pipe(ProvidesPipeline ...$pipeline)
    {
        $result = null;
        foreach ($pipeline as $pipe) {
            if ($pipe instanceof ProvidesContextPipeline) {
                $result = $pipe->handle($result, $this);
            } elseif ($pipe instanceof ProvidesPipeline) {
                $result = $pipe->handle($result);
            }
        }

        return $result;
    }
}