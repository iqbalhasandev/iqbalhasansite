<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Portfolio\PortfolioGallery;

class PortfolioGalleryController extends Controller
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
            'title' => 'Portfolio Gallery table',
            'model' => 'PortfolioGallery',
            'route-name-prefix' => 'admin.portfolio.gallery',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Gallery Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.portfolio.gallery.create')
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
            'description' => 'Display a listing of Portfolio Gallery in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = PortfolioGallery::cacheData();

        return \view('pages.admin.portfolio.gallery.index', \compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        \config_set('theme.cdata', [
            'title' => 'Create New Portfolio Gallery',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Gallery Table',
                    'link' => \route('admin.portfolio.gallery.index')
                ],

                [
                    'name' => 'Create New Portfolio Gallery',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new Portfolio Gallery in a database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));



        return \view('pages.admin.portfolio.gallery.create_edit');
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
        $this->seo()->setTitle('Store New Portfolio Gallery');
        $this->seo()->setDescription('Store new Portfolio Gallery in a database.');

        $request->validate([
            'image' => ['required', 'image'],
            'group' => ['required', 'max:255', 'string']
        ]);

        $data = $request->all();
        $data['image'] = \upload_image($request, 'image', 'portfolio-gallery');

        $portfolioGallery = PortfolioGallery::create($data);

        $portfolioGallery->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored new portfolio gallery data.');
        return \redirect()->route('admin.portfolio.gallery.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio\PortfolioGallery  $portfolioGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioGallery $portfolioGallery)
    {
        \config_set('theme.cdata', [
            'title' => 'Edit Portfolio Gallery Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Gallery Table',
                    'link' => \route('admin.portfolio.gallery.index')
                ],

                [
                    'name' => 'Edit Portfolio Gallery Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route('admin.portfolio.gallery.edit', $portfolioGallery->id),
            'update' => route('admin.portfolio.gallery.update', $portfolioGallery->id),
            'description' => 'Edit existing portfolio gallery data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.portfolio.gallery.create_edit', ['item' => $portfolioGallery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio\PortfolioGallery  $portfolioGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioGallery $portfolioGallery)
    {
        $request->validate([
            // 'image' => ['required', 'image'],
            'group' => ['required', 'max:255', 'string']
        ]);
        $data = $request->all();
        $data['image'] = \upload_image($request, 'image', 'portfolio-gallery', $portfolioGallery->image);

        $portfolioGallery->update($data);

        $portfolioGallery->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated portfolio gallery data.');
        return \redirect()->route('admin.portfolio.gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio\PortfolioGallery  $portfolioGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioGallery $portfolioGallery)
    {
        Storage::delete($portfolioGallery->image);
        $portfolioGallery->delete();
        $portfolioGallery->forgetCache();
        // flash message
        Session::flash('success', 'Successfully deleted portfolio gallery data.');
        return \redirect()->route('admin.portfolio.gallery.index');
    }
}
