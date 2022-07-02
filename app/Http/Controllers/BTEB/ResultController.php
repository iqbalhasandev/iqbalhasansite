<?php

namespace App\Http\Controllers\BTEB;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
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
}
