<?php

namespace Pangolinkeys\Pipe;

use Pangolinkeys\Pipe\Contracts\ProvidesPipeline;

class InitializePipeline implements ProvidesPipeline
{
    protected $value;

    /**
     * InitializePipeline constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Process the queue item.
     *
     * @param $value
     * @return mixed
     */
    function handle($value)
    {
        if (is_null($value)) {
            return $this->value;
        } else {
            return $value;
        }
    }
}