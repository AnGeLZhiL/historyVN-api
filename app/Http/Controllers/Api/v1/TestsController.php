<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Tests;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function getTests($id){

        $tests = Tests::where('id_test', $id)->get();

        return response()
            ->json($tests)
            ->setStatusCode(200, 'Tests list');
    }
}
