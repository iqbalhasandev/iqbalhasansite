<?php

namespace App\Http\Controllers\Admin\BTEB;

use Asika\Pdf2text;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\BTEB\BTEBResult;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
// use Meneses\LaravelMpdf\Facades\LaravelMpdf as pdf;

class BTEBResultController extends Controller
{

    /**
     * Middleware
     *
     *
     */
    public function __construct()
    {
        $this->middleware(['auth', 'permission:bteb_result_management'])->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

        \config_set('theme.cdata', [
            'title' => 'BTEB Result table',
            'model' => 'BTEB Result',
            'route-name-prefix' => 'admin.bteb-result',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'BTEB Result Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.bteb-result.create')
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \config_set('theme.cdata', [
            'description' => 'Display a listing of BTEB Result in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = BTEBResult::cacheDataQuery('sessionDesc', BTEBResult::orderByDesc('session')->get());

        return \view('pages.admin.bteb-result.index', \compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \config_set('theme.cdata', [
            'title' => 'Create New BTEB Result',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'BTEB Result Table',
                    'link' => \route('admin.bteb-result.index')
                ],

                [
                    'name' => 'Create New BTEB Result',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new BTEB Result in a database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));





        return \view('pages.admin.bteb-result.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // seo
        $this->seo()->setTitle('Store New BTEB Result');
        $this->seo()->setDescription('Store new BTEB Result in a database.');
        // validation
        $this->validationRule($request);
        // create
        $bTEBResult = BTEBResult::create($this->storeFile($request));

        $bTEBResult->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored new BTEB Result data.');
        return \redirect()->route('admin.bteb-result.index');
    }



    protected function validationRule(Request $request, $bTEBResult = null)
    {
        if ($bTEBResult) {
            $request->validate([
                'session' => ['required', 'string', 'max:255']
            ]);
        } else {
            $request->validate([
                'session' => ['required', 'string', 'max:255', 'unique:b_t_e_b_results,session']
            ]);
        }

        $semesters = ['fourth_semester', 'fifth_semester', 'sixth_semester', 'seventh_semester', 'eighth_semester'];
        foreach ($semesters as $semester) {
            if ($request->has($semester)) {
                $request->validate([
                    $semester => 'required|mimes:pdf,txt',
                ]);
            }
        }
    }

    protected function storeFile(Request $request, $bTEBResult = null)
    {
        $data = $request->all();
        $semesters = ['fourth_semester', 'fifth_semester', 'sixth_semester', 'seventh_semester', 'eighth_semester'];
        foreach ($semesters as $semester) {
            if ($request->has($semester)) {

                if ($request->$semester->getClientOriginalExtension() == 'txt') {
                    $data[$semester] = Storage::putFile('bteb-result', $request->$semester);
                } else {
                    $data[$semester] = $fileName = 'bteb-result/' . \rand(1000, 99999) . \rand(1000, 99999) . '.txt';
                    $pdf = new Pdf2text;
                    Storage::put($fileName, $pdf->decode($request->$semester));
                }
                if ($bTEBResult) Storage::delete($bTEBResult->$semester);
            }
        }
        return $data;
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BTEBResult  $bTEBResult
     * @return \Illuminate\Http\Response
     */
    public function edit(BTEBResult $bTEBResult)
    {
        \config_set('theme.cdata', [
            'title' => 'Edit BTEB Result Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'BTEB Result Table',
                    'link' => \route('admin.bteb-result.index')
                ],

                [
                    'name' => 'Edit BTEB Result Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route('admin.bteb-result.edit', $bTEBResult->id),
            'update' => route('admin.bteb-result.update', $bTEBResult->id),
            'description' => 'Edit existing BTEB Result data.'

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.bteb-result.create_edit', ['item' => $bTEBResult]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BTEBResult  $bTEBResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BTEBResult $bTEBResult)
    {
        // validation
        $this->validationRule($request, $bTEBResult);
        // update
        $bTEBResult->update($this->storeFile($request, $bTEBResult));

        $bTEBResult->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated BTEB Result Data.');
        return \redirect()->route('admin.bteb-result.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BTEBResult  $bTEBResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(BTEBResult $bTEBResult)
    {
        Storage::delete($bTEBResult->logo);
        $bTEBResult->delete();
        $bTEBResult->forgetCache();
        // flash message
        Session::flash('success', 'Successfully deleted BTEB Result data.');
        return \redirect()->route('admin.bteb-result.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        \config_set('theme.cdata', [
            'title' => 'BTEB Result Management System',
            'description' => 'Diploma Engineering Result Management System. With this result management system you can easily see the results of the previous semester along with the current semester results.Check Your result easily.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        if ($request->roll and $request->session()) {

            $request->validate([
                'session' => 'required',
                'roll' => 'required|integer',
            ]);
            $results = $this->resultQuery($request);
            if ($request->download) {
                $results = $this->resultQuery($request);
                $pdf = PDF::loadView('pages.admin.bteb-result.download', ['results' => $results]);
                // return $pdf->download('BTEB-RESULTSHET.pdf');
                return $pdf->stream('BTEB-RESULTSHET.pdf');
            }

            return \view('pages.admin.bteb-result.result', ['results' => $results, 'roll' => $request->roll, 'session' => $request->session]);
        }

        $collection = BTEBResult::cacheDataQuery('sessionDesc', BTEBResult::orderByDesc('session')->get());
        return \view('pages.admin.bteb-result.show', \compact('collection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resultCheck(Request $request)
    {
        \config_set('theme.cdata', [
            'title' => 'BTEB Result Management System',
            'description' => 'Diploma Engineering Result Management System. With this result management system you can easily see the results of the previous semester along with the current semester results.Check Your result easily.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $request->validate([
            'session' => 'required',
            'roll' => 'required|integer',
        ]);
        $results = $this->resultQuery($request);

        return \view('pages.admin.bteb-result.result', ['results' => $results, 'roll' => $request->roll, 'session' => $request->session]);
    }


    public function downloadResult(Request $request)
    {
        \config_set('theme.cdata', [
            'title' => 'BTEB Result Management System',
            'description' => 'Diploma Engineering Result Management System. With this result management system you can easily see the results of the previous semester along with the current semester results.Check Your result easily.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $request->validate([
            'session' => 'required',
            'roll' => 'required|integer',
        ]);
        $results = $this->resultQuery($request);


        $pdf = PDF::loadView('pages.admin.bteb-result.download', ['results' => $results]);
        // return $pdf->download('BTEB-RESULTSHET.pdf');
        return $pdf->stream('BTEB-RESULTSHET.pdf');
    }





    protected function resultQuery(Request $request)
    {
        $data = [];
        $bTEBResult = BTEBResult::where('session', $request->session)->first();
        $semesters = [];
        if ($bTEBResult) {
            $semesters['fourth_semester'] = $bTEBResult->fourth_semester ? file_get_contents($bTEBResult->url('4th')) : '';
            $semesters['fifth_semester']  =  $bTEBResult->fifth_semester ? file_get_contents($bTEBResult->url('5th')) : ' ';
            $semesters['sixth_semester']  =  $bTEBResult->sixth_semester ? file_get_contents($bTEBResult->url('6th')) : '';
            $semesters['seventh_semester']  =  $bTEBResult->seventh_semester ? file_get_contents($bTEBResult->url('7th')) : ' ';
            $semesters['eighth_semester']  =  $bTEBResult->eighth_semester ? file_get_contents($bTEBResult->url('8th')) : '';


            $pass_pattern = "/(?<=" . $request->roll . "\s\()\d\.\d+/s";
            $referred_pattern = "/(?<=" . $request->roll . "\s\{).+?(?=\})/s";


            foreach ($semesters as $semester => $resultShit) {
                $semesterResult = [];
                if (preg_match_all($pass_pattern, $resultShit, $result)) {
                    $semesterResult = [
                        'status' => true,
                        'message' => 'pass',
                        'roll' => $request->roll,
                        'session' => $request->session,
                        'point' => $result[0][0],
                        'grade' => $this->grade($result[0][0]),
                        'ref_subject' => null
                    ];
                } elseif (preg_match_all($referred_pattern, $resultShit, $result)) {

                    $semesterResult = [
                        'status' => true,
                        'message' => 'fail',
                        'roll' => $request->roll,
                        'session' => $request->session,
                        'point' => \null,
                        'grade' => 'F',
                        'ref_subject' => $result[0][0]
                    ];
                } else {
                    $semesterResult = [

                        'status' => false,
                        'message' => 'Not Found',
                        'roll' => $request->roll,
                        'session' => $request->session,
                        'point' => \null,
                        'grade' => \null,
                        'ref_subject' => \null
                    ];
                }


                $data[$semester] = $semesterResult;
                // \array_push($data, $semesterResult);
            }
        }
        return $data;
    }


    protected function grade($point)
    {
        $point = floatval($point);

        if ($point >= 4.00) {
            return 'A+';
        } elseif ($point >= 3.75) {
            return 'A';
        } elseif ($point >= 3.50) {
            return 'A-';
        } elseif ($point >= 3.25) {
            return 'B+';
        } elseif ($point >= 3.00) {
            return 'B';
        } elseif ($point >= 2.75) {
            return 'B-';
        } elseif ($point >= 2.50) {
            return 'C+';
        } elseif ($point >= 2.25) {
            return 'C';
        } elseif ($point >= 2.00) {
            return 'D';
        }
        return 'F';
    }
}
