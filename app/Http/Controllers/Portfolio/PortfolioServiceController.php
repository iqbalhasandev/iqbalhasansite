<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Portfolio\PortfolioService;

class PortfolioServiceController extends Controller
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
            'title' => 'Portfolio Service table',
            'model' => 'PortfolioService',
            'route-name-prefix' => 'admin.portfolio.service',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Service Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.portfolio.service.create')
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
            'description' => 'Display a listing of Service in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = PortfolioService::cacheData();

        return \view('pages.admin.portfolio.service.index', \compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \config_set('theme.cdata', [
            'title' => 'Create New Portfolio Service',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Service Table',
                    'link' => \route('admin.portfolio.service.index')
                ],

                [
                    'name' => 'Create New Portfolio Service',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new Portfolio Service in a database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));



        return \view('pages.admin.portfolio.service.create_edit');
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
        $this->seo()->setTitle('Store New Portfolio Service');
        $this->seo()->setDescription('Store new Portfolio Service in a database.');

        $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:portfolio_services,title'],
            'description' => ['nullable'],
            'image' => ['required', 'image']
        ]);
        $data = $request->all();
        $data['image'] = \upload_image($request, 'image', 'portfolio-service');

        $portfolioService = PortfolioService::create($data);
        $portfolioService->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored new Portfolio Service data.');
        return \redirect()->route('admin.portfolio.service.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio\PortfolioService  $portfolioService
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioService $portfolioService)
    {
        \config_set('theme.cdata', [
            'title' => 'Edit Portfolio Service Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Service Table',
                    'link' => \route('admin.portfolio.service.index')
                ],

                [
                    'name' => 'Edit Portfolio Service Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route('admin.portfolio.service.edit', $portfolioService->id),
            'update' => route('admin.portfolio.service.update', $portfolioService->id),
            'description' => 'Edit existing portfolio service data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.portfolio.service.create_edit', ['item' => $portfolioService]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio\PortfolioService  $portfolioService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioService $portfolioService)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable'],
        ]);
        $data = $request->all();
        $data['image'] = \upload_image($request, 'image', 'portfolio-service', $portfolioService->image);

        $portfolioService->update($data);

        $portfolioService->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated portfolio service data.');
        return \redirect()->route('admin.portfolio.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio\PortfolioService  $portfolioService
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioService $portfolioService)
    {
        Storage::delete($portfolioService->image);
        $portfolioService->delete();
        $portfolioService->forgetCache();
        // flash message
        Session::flash('success', 'Successfully deleted portfolio service data.');
        return \redirect()->route('admin.portfolio.service.index');
    }
}
