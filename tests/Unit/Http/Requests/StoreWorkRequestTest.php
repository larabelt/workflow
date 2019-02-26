<?php namespace Tests\Belt\Workflow\Unit\Http\Requests;

use Tests\Belt\Core;
use Belt\Workflow\Http\Requests\StoreWorkRequest;

class StoreWorkRequestTest extends \Tests\Belt\Core\BeltTestCase
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