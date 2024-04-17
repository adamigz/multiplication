<?php

namespace App\Http\Controllers;

use App\Http\Requests\MultiplicationRequest;
use App\Services\MultiplicationTableService;

class MultiplicationController extends Controller
{
    public function index(MultiplicationRequest $request) {
        $multiplicationTable = MultiplicationTableService::createTableForGivenSize($request->size);
        return response()->json($multiplicationTable);
    }
}
