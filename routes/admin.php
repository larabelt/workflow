<?php

Route::group([
    'prefix' => 'admin',
    'middleware' => ['web', 'admin']
],
    function () {

        # admin/belt/workflow home
        Route::get('belt/workflow/{any?}', function () {
            return view('belt-workflow::base.admin.dashboard');
        })->where('any', '(.*)');

    }
);