<?php

namespace Pangolinkeys\Pipe;

use Pangolinkeys\Pipe\Contracts\ProvidesContextPipeline;
use Pangolinkeys\Pipe\Contracts\ProvidesPipeline;
use Pangolinkeys\Pipe\Exceptions\ClassNotInstanceOfProvidePipelineException;
use Pangolinkeys\Pipe\Exceptions\IncorrectTypePassedToPipeException;
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
     * @param ProvidesPipeline|string ...$pipeline
     *
     * @return mixed|null
     * @throws ClassNotInstanceOfProvidePipelineException
     * @throws IncorrectTypePassedToPipeException
     */
    protected function pipe(...$pipeline)
    {
        $result = null;
        foreach ($pipeline as $pipe) {
            if ($this->needsInstantiation($pipe)) {
                $pipe = new $pipe;
            }

            if (!is_string($pipe) && !is_object($pipe)) {
                throw new IncorrectTypePassedToPipeException();
            }

            if (! $pipe instanceof ProvidesPipeline) {
                $pipeName = is_object($pipe) ? get_class($pipe) : (string) $pipe;

                throw new ClassNotInstanceOfProvidePipelineException(
                    $pipeName . ' does not implement ProvidesPipeLine'
                );
            }

            if ($pipe instanceof ProvidesContextPipeline) {
                $result = $pipe->handle($result, $this);
            } elseif ($pipe instanceof ProvidesPipeline) {
                $result = $pipe->handle($result);
            }
        }

        return $result;
    }

    /**
     * Ascertains if the pipeline needs instantiating
     *
     * @param $pipeline
     *
     * @return bool
     */
    protected function needsInstantiation($pipeline): bool
    {
        return is_string($pipeline) && class_exists($pipeline);
    }
}