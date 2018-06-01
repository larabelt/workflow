<?php

namespace Belt\Workflow\Http\Controllers\Api;

use Belt\Workflow\WorkRequest;
use Belt\Workflow\Services\WorkflowService;
use Belt\Core\Http\Requests;
use Belt\Core\Http\Controllers\ApiController;
use Illuminate\Http\Request;

/**
 * Class WorkRequestsController
 * @package Belt\Content\Http\Controllers\Api
 */
class WorkflowsController extends ApiController
{

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize(['view', 'create', 'update', 'delete'], WorkRequest::class);

        $response = [];
        foreach (WorkflowService::get() as $key => $class) {
            $response[$key] = [
                'class' => $class,
                'name' => $class::NAME,
            ];
        }

        return response()->json($response);
    }

}