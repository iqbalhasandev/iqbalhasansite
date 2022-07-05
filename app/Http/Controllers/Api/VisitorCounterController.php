<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\VisitorCounter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

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
    public function countUniqueVisitor()
    {
        $visitor = VisitorCounter::newVisitor();
        return \response($visitor->id, 201);
    }

    public function countAndSvg()
    {
        $visitor = VisitorCounter::newVisitor();
        // return \response($visitor->id, 201);

        $response = Response::make(View::make('visitor_counter.svg', ['count' => $visitor->id]), 200);
        $response->header('Content-Type', 'image/svg+xml');
        return $response;
    }
    public function countUniqueVisitorAndSvg()
    {
        $visitor = VisitorCounter::newVisitor();
        // return \response($visitor->id, 201);

        $response = Response::make(View::make('visitor_counter.svg', ['count' => $visitor->id]), 200);
        $response->header('Content-Type', 'image/svg+xml');
        return $response;
    }
}
