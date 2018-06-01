<?php

use Belt\Workflow\Http\Controllers\Api;

Route::group([
    'prefix' => 'api/v1',
    'middleware' => ['api']
],
    function () {

        # workflows
        Route::get('workflows', Api\WorkflowsController::class . '@index');

        # work-requests
        Route::get('work-requests/{workRequest}', Api\WorkRequestsController::class . '@show');
        Route::put('work-requests/{workRequest}', Api\WorkRequestsController::class . '@update');
        Route::delete('work-requests/{workRequest}', Api\WorkRequestsController::class . '@destroy');
        Route::get('work-requests', Api\WorkRequestsController::class . '@index');
        Route::post('work-requests', Api\WorkRequestsController::class . '@store');
    }
);
