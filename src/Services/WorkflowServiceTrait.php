<?php

namespace Belt\Workflow\Services;

use Belt;

trait WorkflowServiceTrait
{
    /**
     * @var WorkflowService
     */
    public $workflowService;

    /**
     * @return WorkflowService
     */
    public function workflowService()
    {
        return $this->workflowService ?: new WorkflowService();
    }

}