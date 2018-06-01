<?php

namespace Belt\Workflow\Observers;

use Belt;
use Belt\Workflow\WorkRequest;

class WorkRequestObserver
{
    /**
     * Listen to the WorkRequestObserver saving $item.
     *
     * @param  WorkRequest $item
     * @return void
     */
    public function saving(WorkRequest $item)
    {
        if (!$item->place && $workflow = $item->getWorkflow()) {
            $item->place = $workflow->initialPlace();
        }
    }
}