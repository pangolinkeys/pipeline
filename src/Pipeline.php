<?php

namespace Pangolinkeys\Pipe;

use Pangolinkeys\Pipe\Contracts\ProvidesPipeline;

trait Pipeline
{
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
            $result = $pipe->handle($result);
        }

        return $result;
    }
}