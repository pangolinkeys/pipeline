<?php

namespace Pangolinkeys\Pipe\Tests\Demonstrate;

use Pangolinkeys\Pipe\Pipeline;
use Pangolinkeys\Pipe\Tests\TestCase;

/**
 * Class ExampleTest
 *
 * @package Pangolinkeys\Pipe\Tests\Demonstrate
 */
class ExampleTest extends TestCase
{
    /**
     * @test
     */
    public function test_example_works()
    {
        $this->assertEquals(499994, $this->example->main(2));
    }

    /**
     * @test
     * @expectedException Pangolinkeys\Pipe\Exceptions\ClassNotInstanceOfProvidePipelineException
     */
    public function test_exception_thrown_when_class_not_implementing_provides_pipeline()
    {
        $this->example->doesntImplement(2);
    }

    /**
     * @test
     * @expectedException ArgumentCountError
     */
    public function test_manual_construction_is_thrown()
    {
        $this->example->requiresConstruction(2);
    }

    /**
     * @test
     * @expectedException Pangolinkeys\Pipe\Exceptions\IncorrectTypePassedToPipeException
     */
    public function test_exception_thrown_when_passed_wrong_type()
    {
        $this->example->incorrectType(2);
    }

    /**
     * @test
     */
    public function test_example_implements_trait()
    {
        $this->assertContains(Pipeline::class, class_uses($this->example));
    }

    /**
     * @test
     */
    public function test_context_store()
    {
        $value = 'askdhaskldhklasj';
        $this->assertEquals($value, $this->example->useStorage($value));
    }

    /**
     * @test
     * @expectedException Pangolinkeys\Pipe\Exceptions\KeyNotExistsException
     */
    public function test_exception_thrown_when_key_doesnt_exist()
    {
        $this->example->failStorage();
    }
}