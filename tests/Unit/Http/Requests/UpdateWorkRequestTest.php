<?php namespace Tests\Belt\Workflow\Unit\Http\Requests;

use Mockery as m;
use Belt\Core\Tests;
use Belt\Workflow\WorkRequest;
use Belt\Workflow\Http\Requests\UpdateWorkRequest;
use Belt\Workflow\Services\WorkflowService;
use Illuminate\Database\Eloquent\Builder;

class UpdateWorkRequestTest extends Tests\BeltTestCase
{

    use Tests\CommonMocks;

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Workflow\Http\Requests\UpdateWorkRequest::rules
     */
    public function test()
    {
        $workRequest = factory(WorkRequest::class)->make();

        $request = m::mock(UpdateWorkRequest::class . '[get,route]');
        $request->shouldReceive('get')->with('transition')->andReturn('foo');
        $request->shouldReceive('get')->with('place')->andReturn('foo');
        $request->shouldReceive('route')->with('workRequest')->andReturn($workRequest);

        # rules
        $this->assertNotEmpty($request->rules());
    }

}