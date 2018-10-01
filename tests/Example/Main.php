<?php

namespace Pangolinkeys\Pipe\Tests\Example;

use Pangolinkeys\Pipe\InitializePipeline;
use Pangolinkeys\Pipe\Pipeline;
use Pangolinkeys\Pipe\Tests\Example\Pipes\DivideByTwo;
use Pangolinkeys\Pipe\Tests\Example\Pipes\TimesByOneThousand;

class Main
{
    use Pipeline;

    /**
     * Provide a demonstration of the pipeline.
     *
     * @param $value
     * @return mixed|null
     */
    public function main($value)
    {
        return $this->pipe(
            new InitializePipeline($value),
            new DivideByTwo,
            new DivideByTwo,
            new TimesByOneThousand,
            new TimesByOneThousand
        );
    }
}