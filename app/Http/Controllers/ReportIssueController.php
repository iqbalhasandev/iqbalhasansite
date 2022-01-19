<?php

namespace App\Http\Controllers;

use App\Models\ReportIssue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ReportIssueController extends Controller
{
    /**
     * Middleware
     *
     *
     */
    public function __construct()
    {
        $this->middleware(['auth', 'permission:report_issue_management']);


        \config_set('theme.cdata', [
            'title' => 'Report Issue Table',
            'model' => 'ReportIssue',
            'route-name-prefix' => 'admin.report-issue',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Report issue Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.report-issue.create')
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
            'description' => 'Display a listing of report issue in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = ReportIssue::cacheData();

        return \view('pages.admin.report-issue.index', \compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \config_set('theme.cdata', [
            'title' => 'Create New Report Issue',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Report issue Table',
                    'link' => \route('admin.report-issue.index')
                ],

                [
                    'name' => 'Create New Report Issue',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new Report Issue in a database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));



        return \view('pages.admin.report-issue.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->seo()->setTitle('Store New Report Issue');
        $this->seo()->setDescription('Store new Report Issue in a database.');

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string'],
        ]);
        // return $request->all();
        $data = $request->all();
        $data['file'] = \upload_file($request, 'file', 'portfolio-report-issue');
        $reportIssue = ReportIssue::create($data);
        $reportIssue->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored new Report Issue data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PortfolioFaq  $portfolioFaq
     * @return \Illuminate\Http\Response
     */
    public function show(ReportIssue  $reportIssue)
    {
        \config_set('theme.cdata', [
            'title' => 'Edit Report Issue Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Report issue Table',
                    'link' => \route(\config('theme.cdata.route-name-prefix') . '.index')
                ],

                [
                    'name' => 'Edit Report issue Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route(\config('theme.cdata.route-name-prefix') . '.edit', $reportIssue->id),
            'update' => route(\config('theme.cdata.route-name-prefix') . '.update', $reportIssue->id),
            'description' => 'Edit existing Report issue data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.report-issue.show', ['item' => $reportIssue]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PortfolioFaq  $portfolioFaq
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportIssue  $reportIssue)
    {
        \config_set('theme.cdata', [
            'title' => 'Edit Report Issue Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Report issue Table',
                    'link' => \route(\config('theme.cdata.route-name-prefix') . '.index')
                ],

                [
                    'name' => 'Edit Report issue Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route(\config('theme.cdata.route-name-prefix') . '.edit', $reportIssue->id),
            'update' => route(\config('theme.cdata.route-name-prefix') . '.update', $reportIssue->id),
            'description' => 'Edit existing Report issue data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.report-issue.create_edit', ['item' => $reportIssue]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportIssue  $reportIssue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportIssue  $reportIssue)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string'],
        ]);
        // return $request->all();
        $data = $request->all();
        $data['file'] = \upload_file($request, 'file', 'portfolio-report-issue');

        $reportIssue->update($data);

        $reportIssue->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated Report Issue Data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportIssue  $reportIssue
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportIssue  $reportIssue)
    {
        Storage::delete($reportIssue->file);

        $reportIssue->delete();
        $reportIssue->forgetCache();
        // flash message
        Session::flash('success', 'Successfully Deleted Portfolio Report Issue Data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }
}
