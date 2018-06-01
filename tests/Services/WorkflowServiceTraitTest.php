<?php

use Belt\Core\Testing;
use Belt\Workflow\Services\WorkflowService;
use Belt\Workflow\Services\WorkflowServiceTrait;

class WorkflowServiceTraitTest extends Testing\BeltTestCase
{
    /**
     * @covers \Belt\Workflow\Services\WorkflowServiceTrait::workflowService
     */
    public function test()
    {
        $stub = new WorkflowServiceTraitStub();
        $this->assertInstanceOf(WorkflowService::class, $stub->workflowService());
    }

}

class WorkflowServiceTraitStub
{
    use WorkflowServiceTrait;
}