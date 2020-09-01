<?php

namespace Tests;

use Mockery as m;
use BotMan\BotMan\BotMan;
use React\EventLoop\Factory;
use PHPUnit\Framework\TestCase;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Slack\SlackRTMDriver;

class FactoryTest extends TestCase
{
    public function tearDown() : void
    {
        m::close();
    }

    /**
     * @test
     *@runInSeparateProcess
     */
    public function it_registers_factory_methods()
    {
        DriverManager::loadDriver(SlackRTMDriver::class);
        $bot = BotManFactory::createForRTM([], Factory::create());
        $this->assertInstanceOf(BotMan::class, $bot);
    }
}
