<?php

namespace Belt\Workflow\Http\Requests;

use Belt;
use Belt\Workflow\Services\WorkflowServiceTrait;

/**
 * Class UpdateWorkRequest
 * @package Belt\Workflow\Http\Requests
 */
class UpdateWorkRequest extends Belt\Core\Http\Requests\FormRequest
{
    use WorkflowServiceTrait;

    /**
     * @return array
     */
    public function rules()
    {
        $rules = [];

        $workRequest = $this->route('workRequest');

        if ($this->get('transition')) {
            $availableTransitions = $this->workflowService()->availableTransitions($workRequest->getWorkflow(), $workRequest->place);
            $rules['transition'] = [
                'sometimes',
                'required',
                'in:' . implode(',', $availableTransitions)
            ];
        }

        if ($place = $this->get('place')) {
            $rules['place'] = [
                'sometimes',
                'required',
                'in:' . implode(',', $workRequest->getWorkflow()->places())
            ];
        }

        return $rules;
    }

}