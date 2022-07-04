<?php

namespace App\Http\Controllers\BTEB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchIndividual(Request $request)
    {
        $request->validate([
            'roll' => 'required|numeric',
            'session' => 'required|in:4th,6th,8th',
        ]);
        switch ($request->session) {
            case '4th':
                $result = \App\Models\BTEB\FourthSemesterResult::where('roll', $request->roll)->first();
                break;
            case '6th':
                $result = \App\Models\BTEB\SixSemesterResult::where('roll', $request->roll)->first();
                break;
            case '8th':
                $result = \App\Models\BTEB\SixSemesterResult::where('roll', $request->roll)->first();
                break;
        }

        return \response($result, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchGroup(Request $request)
    {
        $request->validate([
            'roll_from' => 'required|numeric',
            'roll_to' => 'required|numeric',
            'session' => 'required|in:4th,6th,8th',
        ]);
        switch ($request->session) {
            case '4th':
                $result = \App\Models\BTEB\FourthSemesterResult::whereBetween('roll', [$request->roll_from, $request->roll_to])->get();
                break;
            case '6th':
                $result = \App\Models\BTEB\SixSemesterResult::whereBetween('roll', [$request->roll_from, $request->roll_to])->get();
                break;
            case '8th':
                $result = \App\Models\BTEB\SixSemesterResult::whereBetween('roll', [$request->roll_from, $request->roll_to])->get();
                break;
        }
        return \response($result, 200);
    }
}
