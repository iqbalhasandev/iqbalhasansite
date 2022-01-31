<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Portfolio\PortfolioClient;
use Illuminate\Support\Facades\Storage;

class PortfolioClientController extends Controller
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
            'title' => 'Portfolio Client table',
            'model' => 'Portfolio Client',
            'route-name-prefix' => 'admin.portfolio.client',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Client Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.portfolio.client.create')
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
            'description' => 'Display a listing of Portfolio Client in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = PortfolioClient::cacheData();

        return \view('pages.admin.portfolio.client.index', \compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \config_set('theme.cdata', [
            'title' => 'Create New Portfolio Client',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Client Table',
                    'link' => \route('admin.portfolio.client.index')
                ],

                [
                    'name' => 'Create New Portfolio Client',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new portfolio client in a database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));



        return \view('pages.admin.portfolio.client.create_edit');
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
        $this->seo()->setTitle('Store New Portfolio Client');
        $this->seo()->setDescription('Store new portfolio client in a database.');

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:portfolio_clients,name']
        ]);
        $data = $request->all();
        $data['logo'] = \upload_image($request, 'logo', 'portfolio-client');


        // return $request->all();
        $portfolioClient = PortfolioClient::create($data);

        $portfolioClient->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored new portfolio client data.');
        return \redirect()->route('admin.portfolio.client.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio\PortfolioClient  $portfolioClient
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioClient $portfolioClient)
    {
        \config_set('theme.cdata', [
            'title' => 'Edit Portfolio Client Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Client Table',
                    'link' => \route('admin.portfolio.client.index')
                ],

                [
                    'name' => 'Edit Portfolio Client Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route('admin.portfolio.client.edit', $portfolioClient->id),
            'update' => route('admin.portfolio.client.update', $portfolioClient->id),
            'description' => 'Edit existing portfolio client data.'

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.portfolio.client.create_edit', ['item' => $portfolioClient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio\PortfolioClient  $portfolioClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioClient $portfolioClient)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        $data = $request->all();
        $data['logo'] = \upload_image($request, 'logo', 'portfolio-client', $portfolioClient->logo);
        // return $request->name;
        $portfolioClient->update($data);

        $portfolioClient->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated Portfolio Client Data.');
        return \redirect()->route('admin.portfolio.client.index');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio\PortfolioClient  $portfolioClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioClient $portfolioClient)
    {

        Storage::delete($portfolioClient->logo);
        $portfolioClient->delete();
        $portfolioClient->forgetCache();
        // flash message
        Session::flash('success', 'Successfully deleted portfolio client data.');
        return \redirect()->route('admin.portfolio.client.index');
    }
}
