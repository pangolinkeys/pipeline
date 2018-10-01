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
        $this->assertEquals(500000, $this->example->main(2));
    }

    /**
     * @test
     */
    public function test_example_implements_trait()
    {
        $this->assertContains(Pipeline::class, class_uses($this->example));
    }
}