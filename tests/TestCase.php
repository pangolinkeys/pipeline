<?php

namespace Pangolinkeys\Pipe\Tests;

use Pangolinkeys\Pipe\Tests\Example\Main;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    /**
     * @var Main
     */
    protected $example;

    public function setUp()
    {
        $this->example = new Main();
        parent::setUp();
    }
}