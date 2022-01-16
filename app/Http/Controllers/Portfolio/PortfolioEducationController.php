<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Portfolio\PortfolioEducation;

class PortfolioEducationController extends Controller
{
    /**
     * Middleware
     *
     *
     */
    public function __construct()
    {
        $this->middleware(['auth', 'permission:portfolio_management']);

        \config_set('theme.cdata', [
            'title' => 'Portfolio Education table',
            'model' => 'PortfolioEducation',
            'route-name-prefix' => 'portfolio.education',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Education Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.portfolio.education.create')
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
            'description' => 'Display a listing of portfolio education in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = PortfolioEducation::cacheData();

        return \view('pages.admin.portfolio.education.index', \compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        \config_set('theme.cdata', [
            'title' => 'Create New Portfolio Education',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Education Table',
                    'link' => \route('admin.portfolio.education.index')
                ],

                [
                    'name' => 'Create New Portfolio Education',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new portfolio education in a database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));



        return \view('pages.admin.portfolio.education.create_edit');
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
        $this->seo()->setTitle('Store New Portfolio Education');
        $this->seo()->setDescription('Store new Portfolio Education in a database.');

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'start' => ['required', 'string', 'max:255'],
            'end' => ['required', 'string', 'max:255'],
        ]);
        $portfolioEducation = PortfolioEducation::create($request->all());

        $portfolioEducation->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored new Portfolio Education data.');
        return \redirect()->route('admin.portfolio.education.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio\PortfolioEducation  $portfolioEducation
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioEducation $portfolioEducation)
    {
        //
        \config_set('theme.cdata', [
            'title' => 'Edit Portfolio Education Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Education Table',
                    'link' => \route('admin.portfolio.education.index')
                ],

                [
                    'name' => 'Edit Portfolio Education Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route('admin.portfolio.education.edit', $portfolioEducation->id),
            'update' => route('admin.portfolio.education.update', $portfolioEducation->id),
            'description' => 'Edit existing Portfolio Education data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.portfolio.education.create_edit', ['item' => $portfolioEducation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio\PortfolioEducation  $portfolioEducation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioEducation $portfolioEducation)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'start' => ['required', 'string', 'max:255'],
            'end' => ['required', 'string', 'max:255'],
        ]);
        // return $request->name;
        $portfolioEducation->update($request->all());

        $portfolioEducation->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated Portfolio Education data.');
        return \redirect()->route('admin.portfolio.education.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio\PortfolioEducation  $portfolioEducation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioEducation $portfolioEducation)
    {
        $portfolioEducation->delete();
        $portfolioEducation->forgetCache();
        // flash message
        Session::flash('success', 'Successfully deleted Portfolio Education data.');
        return \redirect()->route('admin.portfolio.education.index');
    }
}
