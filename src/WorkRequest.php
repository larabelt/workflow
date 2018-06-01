<?php

namespace Belt\Workflow;

use Belt;
use Belt\Workflow\Workflows\BaseWorkFlow;
use Belt\Workflow\Workflows\WorkflowInterface;
use Belt\Workflow\Services\WorkflowService;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkRequest
 * @package Belt\Core
 */
class WorkRequest extends Model
{
    /**
     * @var string
     */
    protected $table = 'work_requests';

    /**
     * @var array
     */
    protected $fillable = ['workable_id', 'workable_type', 'workflow_key'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_open' => 'boolean',
        'payload' => 'json',
    ];

    protected $attributes = [
        'is_open' => true,
    ];

    /**
     * @var array
     */
    protected $appends = ['workflow'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function workable()
    {
        return $this->morphTo('workable');
    }

    /**
     * @return WorkflowInterface
     */
    public function getWorkflow()
    {
        $class = BaseWorkFlow::class;
        if ($key = $this->workflow_key) {
            $class = WorkflowService::get($key) ?: BaseWorkFlow::class;
        }

        return $this->workable ? new $class($this->workable) : new $class();
    }

    /**
     * @return array
     */
    public function getWorkflowAttribute()
    {
        return $this->getWorkflow()->toArray();
    }

}