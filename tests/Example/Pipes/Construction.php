<?php

namespace Pangolinkeys\Pipe\Tests\Example\Pipes;

use Pangolinkeys\Pipe\Contracts\ProvidesPipeline;

class Construction implements ProvidesPipeline
{
    /**
     * @var string
     */
    protected $required;

    public function __construct($required)
    {
        $this->required = $required;
    }

    /**
     * Process the queue item.
     *
     * @param $value
     * @return mixed
     */
    function handle($value)
    {
        return $value / 2;
    }
}
