<?php

namespace Belt\Workflow\Http\Controllers\Api;

use Belt\Workflow\WorkRequest;
use Belt\Workflow\Http\Requests;
use Belt\Core\Http\Controllers\Behaviors\Morphable;
use Belt\Core\Http\Controllers\ApiController;
use Belt\Workflow\Services\WorkflowServiceTrait;
use Illuminate\Http\Request;

/**
 * Class WorkRequestsController
 * @package Belt\Content\Http\Controllers\Api
 */
class WorkRequestsController extends ApiController
{
    use Morphable;
    use WorkflowServiceTrait;

    /**
     * @var WorkRequest
     */
    public $workRequests;

    /**
     * ApiController constructor.
     * @param WorkRequest $workRequest
     */
    public function __construct(WorkRequest $workRequest)
    {
        $this->workRequests = $workRequest;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize(['view', 'create', 'update', 'delete'], WorkRequest::class);

        $request = Requests\PaginateWorkRequests::extend($request);

        $paginator = $this->paginator($this->workRequests->query(), $request);

        return response()->json($paginator->toArray());
    }

    /**
     * @param Requests\StoreWorkRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Requests\StoreWorkRequest $request)
    {

        $this->authorize('create', WorkRequest::class);

        $input = $request->all();

        $this->morph($input['workable_type'], $input['workable_id']);

        $workRequest = $this->workRequests->create([
            'workable_id' => $input['workable_id'],
            'workable_type' => $input['workable_type'],
            'subtype' => $input['subtype'],
        ]);

        $this->set($workRequest, $input, [
            'is_open',
            'place',
            'payload',
        ]);

        $workRequest->save();

        return response()->json($workRequest, 201);
    }

    /**
     * @param WorkRequest $workRequest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(WorkRequest $workRequest)
    {
        $this->authorize(['view', 'create', 'update', 'delete'], $workRequest);

        return response()->json($workRequest);
    }

    /**
     * @param Requests\UpdateWorkRequest $request
     * @param WorkRequest $workRequest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Requests\UpdateWorkRequest $request, WorkRequest $workRequest)
    {
        $this->authorize('update', $workRequest);

        $input = $request->all();

        $this->set($workRequest, $input, [
            'is_open',
            'place',
            'payload',
        ]);

        $workRequest->save();

        if ($transition = $request->get('transition')) {
            $workRequest = $this->workflowService()->apply($workRequest, $transition);
        }

        if ($reset = $request->get('reset')) {
            $workRequest = $this->workflowService()->reset($workRequest);
        }

        $workRequest->save();

        return response()->json($workRequest);
    }

    /**
     * @param WorkRequest $workRequest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(WorkRequest $workRequest)
    {
        $this->authorize('delete', $workRequest);

        $workRequest->delete();

        return response()->json(null, 204);
    }
}
