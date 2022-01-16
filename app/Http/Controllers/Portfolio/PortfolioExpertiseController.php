<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Portfolio\PortfolioExpertise;

class PortfolioExpertiseController extends Controller
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
            'title' => 'Portfolio Expertise table',
            'model' => 'PortfolioExpertise',
            'route-name-prefix' => 'admin.portfolio.expertise',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Expertise Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.portfolio.expertise.create')
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
            'description' => 'Display a listing of Portfolio Expertises in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = PortfolioExpertise::cacheData();

        return \view('pages.admin.portfolio.expertise.index', \compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        \config_set('theme.cdata', [
            'title' => 'Create New Portfolio Expertise',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Expertise Table',
                    'link' => \route('admin.portfolio.expertise.index')
                ],

                [
                    'name' => 'Create New Portfolio Expertise',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new Portfolio Expertise in a database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));



        return \view('pages.admin.portfolio.expertise.create_edit');
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
        $this->seo()->setTitle('Store New Portfolio Expertise');
        $this->seo()->setDescription('Store new Portfolio Expertise in a database.');

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'start' => ['required', 'string', 'max:255'],
            'end' => ['required', 'string', 'max:255'],
        ]);
        // return $request->all();
        $portfolioExpertise = PortfolioExpertise::create($request->all());

        $portfolioExpertise->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored new portfolio expertise data.');
        return \redirect()->route('admin.portfolio.expertise.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio\PortfolioExpertise  $portfolioExpertise
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioExpertise $portfolioExpertise)
    {

        \config_set('theme.cdata', [
            'title' => 'Edit Portfolio Expertise Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Expertise Table',
                    'link' => \route('admin.portfolio.expertise.index')
                ],

                [
                    'name' => 'Edit Portfolio Expertise Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route('admin.portfolio.expertise.edit', $portfolioExpertise->id),
            'update' => route('admin.portfolio.expertise.update', $portfolioExpertise->id),
            'description' => 'Edit existing portfolio expertise data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.portfolio.expertise.create_edit', ['item' => $portfolioExpertise]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio\PortfolioExpertise  $portfolioExpertise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioExpertise $portfolioExpertise)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'start' => ['required', 'string', 'max:255'],
            'end' => ['required', 'string', 'max:255'],
        ]);
        // return $request->name;
        $portfolioExpertise->update($request->all());

        $portfolioExpertise->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated portfolio expertise data.');
        return \redirect()->route('admin.portfolio.expertise.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio\PortfolioExpertise  $portfolioExpertise
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioExpertise $portfolioExpertise)
    {
        $portfolioExpertise->delete();
        $portfolioExpertise->forgetCache();
        // flash message
        Session::flash('success', 'Successfully deleted portfolio expertise data.');
        return \redirect()->route('admin.portfolio.expertise.index');
    }
}
