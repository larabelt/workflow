<?php

use Mockery as m;
use Belt\Workflow\Commands\PublishCommand;
use Belt\Core\Services\PublishService;

class PublishCommandTest extends \PHPUnit\Framework\TestCase
{

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Workflow\Commands\PublishCommand::handle
     */
    public function testHandle()
    {

        # service update
        $service = m::mock(PublishService::class);
        $service->shouldReceive('update')->andReturnNull();
        $cmd = m::mock(PublishCommand::class . '[argument, service]');
        $cmd->shouldReceive('argument')->andReturn('update');
        $cmd->shouldReceive('service')->andReturn($service);
        $cmd->handle();

        # publish
        $service = m::mock(PublishService::class);
        $cmd = m::mock(PublishCommand::class . '[argument, publish, service]');
        $cmd->shouldReceive('argument')->andReturn('publish');
        $cmd->shouldReceive('service')->andReturn($service);
        $cmd->shouldReceive('publish')->andReturnNull();
        $cmd->handle();
    }

    /**
     * @covers \Belt\Workflow\Commands\PublishCommand::publish
     */
    public function testPublish()
    {
        $service = m::mock(PublishService::class);
        $service->shouldReceive('publish')->andReturnNull();
        $service->created = ['one', 'two', 'three'];
        $service->modified = ['one', 'two', 'three'];
        $service->ignored = ['one', 'two', 'three'];

        $cmd = m::mock(PublishCommand::class . '[info, warn]');
        $cmd->shouldReceive('info')->times(8)->andReturnNull();
        $cmd->shouldReceive('warn')->times(4)->andReturnNull();
        $cmd->publish($service);
    }

    /**
     * @covers \Belt\Workflow\Commands\PublishCommand::service
     */
    public function testService()
    {
        $cmd = m::mock(PublishCommand::class . '[option]');
        $cmd->shouldReceive('option')->with('force')->andReturn(false);
        $cmd->shouldReceive('option')->with('include')->andReturn('test');
        $cmd->shouldReceive('option')->with('exclude')->andReturn('something-else');
        $cmd->shouldReceive('option')->with('config')->andReturn(false);

        $this->assertInstanceOf(PublishService::class, $cmd->service());
    }
}
