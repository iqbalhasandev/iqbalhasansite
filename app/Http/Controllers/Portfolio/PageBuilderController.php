<?php

namespace App\Http\Controllers\Portfolio;

use App\Models\Portfolio\PageBuilder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PageBuilderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
        $this->middleware(['permission:portfolio_management'])->except('show');

        \config_set('theme.cdata', [
            'title' => 'Page Builder table',
            'model' => 'Page Builder',
            'route-name-prefix' => 'admin.portfolio.page-builder',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Page Builder Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.portfolio.page-builder.create')
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
            'description' => 'Display a listing of Page Builder Pages in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = PageBuilder::cacheData();
        return view('pages.admin.portfolio.page-builder.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \config_set('theme.cdata', [
            'title' => 'Create New Page',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Page Builder Table',
                    'link' => \route('admin.portfolio.page-builder.index')
                ],

                [
                    'name' => 'Create New Page',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new Page in a database.',

        ]);

        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        return view('pages.admin.portfolio.page-builder.create_edit');
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
            'title' => 'required|max:255',
            'status' => 'required',
            'meta_keywords' => 'max:255',
            'body' => 'required',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->slug);
        $validator  = Validator::make($data, [
            'slug' => 'required|max:255|unique:page_builders,slug',
        ]);

        if ($validator->fails()) {
            session()->flash('error', 'Slug Must Be Unique');
            return back();
        }
        $pageBuilder =  PageBuilder::create($data);
        $pageBuilder->forgetCache();

        session()->flash('success', 'Successfully Crate New page');
        return redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PageBuilder  $pageBuilder
     * @return \Illuminate\Http\Response
     */
    public function show(PageBuilder $pageBuilder)
    {

        if (!$pageBuilder->status) {
            return \abort(404);
        }
        // for seo
        $this->seo()->setTitle($pageBuilder->title);
        $this->seo()->setDescription($pageBuilder->title);


        return \view('pages.admin.portfolio.page-builder.single', ['item' => $pageBuilder]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PageBuilder  $pageBuilder
     * @return \Illuminate\Http\Response
     */
    public function edit(PageBuilder $pageBuilder)
    {

        \config_set('theme.cdata', [
            'title' => 'Edit Page Builder Page Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Page Builder Table',
                    'link' => \route('admin.portfolio.page-builder.index')
                ],

                [
                    'name' => 'Edit Page Builder Page Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route('admin.portfolio.page-builder.edit', $pageBuilder->slug),
            'update' => route('admin.portfolio.page-builder.update', $pageBuilder->slug),
            'description' => 'Edit existing Page Builder Page client data.'

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        return view('pages.admin.portfolio.page-builder.create_edit', ['item' => $pageBuilder]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PageBuilder  $pageBuilder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PageBuilder $pageBuilder)
    {
        $pageBuilder->update($request->all());
        $pageBuilder->forgetCache();

        session()->flash('success', 'Successfully Edit Page');
        return redirect()->route(config('theme.cdata.route-name-prefix') . '.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PageBuilder  $pageBuilder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageBuilder $pageBuilder)
    {
        $pageBuilder->delete();
        $pageBuilder->forgetCache();
        session()->flash('success', 'Successfully Delete Page');
        return redirect()->route(config('theme.cdata.route-name-prefix') . '.index');
    }
}
