<?php

use Belt\Core\Testing;
use Belt\Workflow\Http\Requests\StoreWorkRequest;

class StoreWorkRequestTest extends Testing\BeltTestCase
{

    /**
     * @covers \Belt\Workflow\Http\Requests\StoreWorkRequest::rules
     */
    public function test()
    {
        $request = new StoreWorkRequest();
        $this->assertNotEmpty($request->rules());
    }

}