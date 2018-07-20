<?php

namespace Belt\Workflow\Http\Requests;

use Belt;
use Illuminate\Database\Eloquent\Builder;

class PaginateWorkRequests extends Belt\Core\Http\Requests\PaginateRequest
{
    public $perPage = 20;

    public $orderBy = 'work_requests.id';

    public $groupable = [
        'work_requests.workable_type',
        'work_requests.subtype',
    ];

    public $sortBy = 'asc';

    public $sortable = [
        'work_requests.id',
        'work_requests.created_at',
        'work_requests.updated_at',
    ];

    public $searchable = [
        'work_requests.id',
        'work_requests.workable_id',
        'work_requests.workable_type',
        'work_requests.subtype',
        'work_requests.place',
    ];

    /**
     * @param Builder $query
     * @return Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function modifyQuery(Builder $query)
    {
        if ($this->has('is_open')) {
            $query->where('work_requests.is_open', $this->get('is_open') ? true : false);
        }

        if ($this->get('subtype')) {
            $query->where('work_requests.subtype', $this->get('subtype'));
        }

        if ($this->get('workable_id')) {
            $query->where('work_requests.workable_id', $this->get('workable_id'));
        }

        if ($this->get('workable_type')) {
            $query->where('work_requests.workable_type', $this->get('workable_type'));
        }

        return $query;
    }

}