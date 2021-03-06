<?php

namespace Belt\Workflow\Http\Requests;

use Belt;
use Belt\Workflow\Services\WorkflowServiceTrait;

/**
 * Class StoreUser
 * @package Belt\Workflow\Http\Requests
 */
class StoreWorkRequest extends Belt\Core\Http\Requests\UserRequest
{
    use WorkflowServiceTrait;

    /**
     * @return array
     */
    public function rules()
    {
        $availableWorkflows = $this->workflowService()->get();

        return [
            'subtype' => [
                'required',
                'in:' . implode(',', array_keys($availableWorkflows))
            ],
            'workable_id' => 'required',
            'workable_type' => 'required',
        ];
    }

}