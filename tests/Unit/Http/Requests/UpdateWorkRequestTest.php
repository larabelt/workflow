<?php namespace Tests\Belt\Workflow\Unit\Http\Requests;

use Mockery as m;
use Tests\Belt\Core;
use Belt\Workflow\WorkRequest;
use Belt\Workflow\Http\Requests\UpdateWorkRequest;
use Belt\Workflow\Services\WorkflowService;
use Illuminate\Database\Eloquent\Builder;

class UpdateWorkRequestTest extends \Tests\Belt\Core\BeltTestCase
{

    use \Tests\Belt\Core\Base\CommonMocks;

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