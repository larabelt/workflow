<?php namespace Tests\Belt\Workflow\Unit\Http\Requests;

use Mockery as m;
use Tests\Belt\Core;
use Belt\Workflow\Http\Requests\PaginateWorkRequests;
use Belt\Workflow\Services\WorkRequestService;
use Illuminate\Database\Eloquent\Builder;

class PaginateWorkRequestTest extends \Tests\Belt\Core\BeltTestCase
{

    use \Tests\Belt\Core\Base\CommonMocks;

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Workflow\Http\Requests\PaginateWorkRequests::modifyQuery
     */
    public function test()
    {
        # modifyQuery
        $qbMock = m::mock(Builder::class);
        $qbMock->shouldReceive('where')->once()->with('work_requests.is_open', true);
        $qbMock->shouldReceive('where')->once()->with('work_requests.subtype', 'foo');
        $qbMock->shouldReceive('where')->once()->with('work_requests.workable_id', 123);
        $qbMock->shouldReceive('where')->once()->with('work_requests.workable_type', 'foo');
        $paginateRequest = new PaginateWorkRequests([
            'is_open' => true,
            'subtype' => 'foo',
            'workable_id' => 123,
            'workable_type' => 'foo',
        ]);
        $paginateRequest->modifyQuery($qbMock);
    }

}