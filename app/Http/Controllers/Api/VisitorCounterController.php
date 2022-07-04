<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\VisitorCounter;

class VisitorCounterController extends Controller
{

    public function index()
    {
        return response(VisitorCounter::visitors(), 200);
    }


    public function count()
    {
        $visitor = VisitorCounter::newVisitor();
        return \response($visitor->id, 201);
    }
}
