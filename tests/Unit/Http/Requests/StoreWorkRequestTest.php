<?php namespace Tests\Belt\Workflow\Unit\Http\Requests;

use Belt\Core\Tests;
use Belt\Workflow\Http\Requests\StoreWorkRequest;

class StoreWorkRequestTest extends Tests\BeltTestCase
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