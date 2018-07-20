<?php

use Belt\Core\Testing\BeltTestCase;
use Belt\Workflow\WorkRequest;
use Belt\Workflow\Workflows\BaseWorkflow;
use Belt\Workflow\Services\WorkflowService;

class WorkRequestTest extends BeltTestCase
{
    /**
     * @covers \Belt\Workflow\WorkRequest::workable
     * @covers \Belt\Workflow\WorkRequest::getWorkflow
     * @covers \Belt\Workflow\WorkRequest::getWorkflowAttribute
     */
    public function test()
    {
        WorkflowService::push(WorkRequestWorkflowStub::class);

        $workRequest = factory(WorkRequest::class)->make([
            'subtype' => WorkRequestWorkflowStub::KEY,
        ]);

        # workable
        $this->assertInstanceOf(Illuminate\Database\Eloquent\Relations\MorphTo::class, $workRequest->workable());

        # workflow
        $this->assertInstanceOf(BaseWorkflow::class, $workRequest->getWorkflow());

        # getWorkflowAttribute
        $this->assertTrue(is_array($workRequest->workflow));
        $this->assertEquals(WorkRequestWorkflowStub::KEY, array_get($workRequest->workflow, 'key'));
    }

}

class WorkRequestWorkflowStub extends BaseWorkflow
{
    const NAME = 'WorkRequestWorkflowStub';

    const KEY = 'work-request-workflow-stub';

    protected static $events = [
        'teams.created',
    ];

    protected static $initialPlace = 'review';

    protected static $places = [
        'review',
        'rejected',
        'published'
    ];

    protected static $transitions = [
        'publish' => [
            'from' => 'review',
            'to' => 'published',
        ],
        'reject' => [
            'from' => 'review',
            'to' => 'rejected',
        ],
    ];

    protected static $closers = [
        'publish',
        'reject',
    ];

}