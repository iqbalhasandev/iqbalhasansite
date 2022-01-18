<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Models\Portfolio\PortfolioContact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PortfolioContactController extends Controller
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
            'title' => 'Portfolio Contact Table',
            'model' => 'PortfolioContact',
            'route-name-prefix' => 'admin.portfolio.contact',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Contact Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.portfolio.contact.create')
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
            'description' => 'Display a listing of contacts in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = PortfolioContact::cacheData();

        return \view('pages.admin.portfolio.contact.index', \compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \config_set('theme.cdata', [
            'title' => 'Create New Contact',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Contact Table',
                    'link' => \route('admin.portfolio.contact.index')
                ],

                [
                    'name' => 'Create New Contact',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new Contact in a database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));



        return \view('pages.admin.portfolio.contact.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->seo()->setTitle('Store New Contact');
        $this->seo()->setDescription('Store new Contact in a database.');

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        // return $request->all();
        $data = $request->all();
        $data['file'] = \upload_file($request, 'file', 'portfolio-contact');
        $portfolioContact = PortfolioContact::create($data);
        $portfolioContact->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored new contact data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PortfolioContact  $portfolioContact
     * @return \Illuminate\Http\Response
     */
    public function show(PortfolioContact $portfolioContact)
    {
        \config_set('theme.cdata', [
            'title' => 'Edit Contact Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Contact Table',
                    'link' => \route(\config('theme.cdata.route-name-prefix') . '.index')
                ],

                [
                    'name' => 'Edit Portfolio Contact Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route(\config('theme.cdata.route-name-prefix') . '.edit', $portfolioContact->id),
            'update' => route(\config('theme.cdata.route-name-prefix') . '.update', $portfolioContact->id),
            'description' => 'Edit existing portfolio contact data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.portfolio.contact.show', ['item' => $portfolioContact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PortfolioContact  $portfolioContact
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioContact $portfolioContact)
    {
        \config_set('theme.cdata', [
            'title' => 'Edit Contact Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Contact Table',
                    'link' => \route(\config('theme.cdata.route-name-prefix') . '.index')
                ],

                [
                    'name' => 'Edit Portfolio Contact Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route(\config('theme.cdata.route-name-prefix') . '.edit', $portfolioContact->id),
            'update' => route(\config('theme.cdata.route-name-prefix') . '.update', $portfolioContact->id),
            'description' => 'Edit existing portfolio contact data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.portfolio.contact.create_edit', ['item' => $portfolioContact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PortfolioContact  $portfolioContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioContact $portfolioContact)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        // return $request->all();
        $data = $request->all();
        $data['file'] = \upload_file($request, 'file', 'portfolio-contact');

        $portfolioContact->update($data);

        $portfolioContact->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated Portfolio Contact Data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PortfolioContact  $portfolioContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioContact $portfolioContact)
    {
        Storage::delete($portfolioContact->file);

        $portfolioContact->delete();
        $portfolioContact->forgetCache();
        // flash message
        Session::flash('success', 'Successfully Deleted Portfolio Contact Data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }
}
