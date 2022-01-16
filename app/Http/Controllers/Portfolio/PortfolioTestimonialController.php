<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Portfolio\PortfolioTestimonial;
use Illuminate\Support\Facades\Storage;

class PortfolioTestimonialController extends Controller
{
    /**
     * Middleware
     *
     *
     */
    public function __construct()
    {
        $this->middleware(['auth', 'permission:user_permission_management']);

        \config_set('theme.cdata', [
            'title' => 'Portfolio Testimonial Table',
            'model' => 'PortfolioTestimonial',
            'route-name-prefix' => 'admin.portfolio.testimonial',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Testimonial Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.portfolio.testimonial.create')
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
            'description' => 'Display a listing of roles in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = PortfolioTestimonial::cacheData();

        return \view('pages.admin.portfolio.testimonial.index', \compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \config_set('theme.cdata', [
            'title' => 'Create New Role',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Testimonial Table',
                    'link' => \route('admin.portfolio.testimonial.index')
                ],

                [
                    'name' => 'Create New Testimonial',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new testimonial in a database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));



        return \view('pages.admin.portfolio.testimonial.create_edit');
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
        $this->seo()->setTitle('Store New Testimonial');
        $this->seo()->setDescription('Store new testimonial in a database.');

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'quote' => ['required', 'string'],
        ]);
        // return $request->all();
        $data = $request->all();
        $data['image'] = \upload_image($request, 'image', 'portfolio-testimonial');

        $portfolioTestimonial = PortfolioTestimonial::create($data);
        $portfolioTestimonial->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored new testimonial data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio\PortfolioTestimonial  $portfolioTestimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioTestimonial $portfolioTestimonial)
    {
        \config_set('theme.cdata', [
            'title' => 'Edit Testimonial Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Testimonial Table',
                    'link' => \route(\config('theme.cdata.route-name-prefix') . '.index')
                ],

                [
                    'name' => 'Edit Portfolio Testimonial Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route(\config('theme.cdata.route-name-prefix') . '.edit', $portfolioTestimonial->id),
            'update' => route(\config('theme.cdata.route-name-prefix') . '.update', $portfolioTestimonial->id),
            'description' => 'Edit existing role data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.portfolio.testimonial.create_edit', ['item' => $portfolioTestimonial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio\PortfolioTestimonial  $portfolioTestimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioTestimonial $portfolioTestimonial)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'quote' => ['required', 'string'],
        ]);
        $data = $request->all();
        $data['image'] = \upload_image($request, 'image', 'portfolio-testimonial', $portfolioTestimonial->image);

        $portfolioTestimonial->update($data);

        $portfolioTestimonial->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated Portfolio Testimonial Data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio\PortfolioTestimonial  $portfolioTestimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioTestimonial $portfolioTestimonial)
    {
        Storage::delete($portfolioTestimonial->image);

        $portfolioTestimonial->delete();
        $portfolioTestimonial->forgetCache();
        // flash message
        Session::flash('success', 'Successfully Deleted Portfolio Testimonial Data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }
}
