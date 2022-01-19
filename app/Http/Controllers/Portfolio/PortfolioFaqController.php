<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Portfolio\PortfolioFaq;
use Illuminate\Support\Facades\Session;

class PortfolioFaqController extends Controller
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
            'title' => 'Portfolio Faq Table',
            'model' => 'PortfolioFaq',
            'route-name-prefix' => 'admin.portfolio.faq',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Faq Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.portfolio.faq.create')
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
            'description' => 'Display a listing of Faqs in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = PortfolioFaq::cacheData();

        return \view('pages.admin.portfolio.faq.index', \compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \config_set('theme.cdata', [
            'title' => 'Create New Faq',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Faq Table',
                    'link' => \route('admin.portfolio.faq.index')
                ],

                [
                    'name' => 'Create New Faq',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new Faq in a database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));



        return \view('pages.admin.portfolio.faq.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
        ]);
        // return $request->all();
        $data = $request->all();
        $portfolioFaq = PortfolioFaq::create($data);
        $portfolioFaq->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored new Faq data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PortfolioFaq  $portfolioFaq
     * @return \Illuminate\Http\Response
     */
    public function show(PortfolioFaq $portfolioFaq)
    {
        \config_set('theme.cdata', [
            'title' => 'Edit Faq Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Faq Table',
                    'link' => \route(\config('theme.cdata.route-name-prefix') . '.index')
                ],

                [
                    'name' => 'Edit Portfolio Faq Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route(\config('theme.cdata.route-name-prefix') . '.edit', $portfolioFaq->id),
            'update' => route(\config('theme.cdata.route-name-prefix') . '.update', $portfolioFaq->id),
            'description' => 'Edit existing portfolio Faq data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.portfolio.faq.show', ['item' => $portfolioFaq]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PortfolioFaq  $portfolioFaq
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioFaq $portfolioFaq)
    {
        \config_set('theme.cdata', [
            'title' => 'Edit Faq Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Faq Table',
                    'link' => \route(\config('theme.cdata.route-name-prefix') . '.index')
                ],

                [
                    'name' => 'Edit Portfolio Faq Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route(\config('theme.cdata.route-name-prefix') . '.edit', $portfolioFaq->id),
            'update' => route(\config('theme.cdata.route-name-prefix') . '.update', $portfolioFaq->id),
            'description' => 'Edit existing portfolio Faq data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.portfolio.faq.create_edit', ['item' => $portfolioFaq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PortfolioFaq  $portfolioFaq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioFaq $portfolioFaq)
    {
        $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
        ]);
        // return $request->all();
        $data = $request->all();
        $data['file'] = \upload_file($request, 'file', 'portfolio-Faq');

        $portfolioFaq->update($data);

        $portfolioFaq->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated Portfolio Faq Data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PortfolioFaq  $portfolioFaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioFaq $portfolioFaq)
    {

        $portfolioFaq->delete();
        $portfolioFaq->forgetCache();
        // flash message
        Session::flash('success', 'Successfully Deleted Portfolio Faq Data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }
}
