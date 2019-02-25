<?php

namespace Pangolinkeys\Pipe\Tests\Example;

use Pangolinkeys\Pipe\InitializePipeline;
use Pangolinkeys\Pipe\Pipeline;
use Pangolinkeys\Pipe\Tests\Example\Pipes\Construction;
use Pangolinkeys\Pipe\Tests\Example\Pipes\DivideByTwo;
use Pangolinkeys\Pipe\Tests\Example\Pipes\GetValueFromContext;
use Pangolinkeys\Pipe\Tests\Example\Pipes\RandomClass;
use Pangolinkeys\Pipe\Tests\Example\Pipes\SetValueInContext;
use Pangolinkeys\Pipe\Tests\Example\Pipes\SubtractBySix;
use Pangolinkeys\Pipe\Tests\Example\Pipes\TimesByOneThousand;

class Main
{
    use Pipeline;

    /**
     * Provide a demonstration of the pipeline.
     *
     * @param $value
     *
     * @return mixed|null
     * @throws \Pangolinkeys\Pipe\Exceptions\ClassNotInstanceOfProvidePipelineException
     * @throws \Pangolinkeys\Pipe\Exceptions\IncorrectTypePassedToPipeException
     */
    public function main($value)
    {
        return $this->pipe(
            new InitializePipeline($value),
            new DivideByTwo,
            new DivideByTwo,
            new TimesByOneThousand,
            new TimesByOneThousand,
            SubtractBySix::class,
        );
    }

    /**
     * @param $value
     *
     * @return mixed|null
     * @throws \Pangolinkeys\Pipe\Exceptions\ClassNotInstanceOfProvidePipelineException
     * @throws \Pangolinkeys\Pipe\Exceptions\IncorrectTypePassedToPipeException
     */
    public function doesntImplement($value)
    {
        return $this->pipe(
            new InitializePipeline($value),
            new RandomClass()
            );
    }

    /**
     * @param $value
     *
     * @return mixed|null
     * @throws \Pangolinkeys\Pipe\Exceptions\ClassNotInstanceOfProvidePipelineException
     * @throws \Pangolinkeys\Pipe\Exceptions\IncorrectTypePassedToPipeException
     */
    public function incorrectType($value)
    {
        return $this->pipe(
            new InitializePipeline($value),
            ['test']
        );
    }

    /**
     * @return mixed|null
     * @throws \Pangolinkeys\Pipe\Exceptions\ClassNotInstanceOfProvidePipelineException
     * @throws \Pangolinkeys\Pipe\Exceptions\IncorrectTypePassedToPipeException
     */
    public function requiresConstruction($value)
    {
        return $this->pipe(
            new InitializePipeline($value),
            Construction::class,
        );
    }


    /**
     * @param $value
     *
     * @return mixed|null
     * @throws \Pangolinkeys\Pipe\Exceptions\ClassNotInstanceOfProvidePipelineException
     * @throws \Pangolinkeys\Pipe\Exceptions\IncorrectTypePassedToPipeException
     */
    public function useStorage($value)
    {
        return $this->pipe(
            new InitializePipeline($value),
            new SetValueInContext,
            new GetValueFromContext
        );
    }

    public function failStorage()
    {
        return $this->pipe(
            new GetValueFromContext
        );
    }
}