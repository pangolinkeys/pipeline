<?php

namespace Pangolinkeys\Pipe\Contracts;

interface ProvidesPipeline
{
    /**
     * Process the queue item.
     *
     * @param $value
     * @return mixed
     */
    function handle($value);
}