<?php namespace Tests\Belt\Workflow\Unit\Services;

use Tests\Belt\Core;
use Belt\Workflow\Services\WorkflowService;
use Belt\Workflow\Services\WorkflowServiceTrait;

class WorkflowServiceTraitTest extends \Tests\Belt\Core\BeltTestCase
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