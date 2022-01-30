<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    /**
     * Middleware
     *
     *
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['store', 'redirect']);
        $this->middleware(['permission:short_link_edit'])->only(['edit', 'update']);
        $this->middleware(['permission:short_link_delete'])->only(['destroy']);
        \config_set('theme.cdata', [
            'title' => 'Portfolio Client table',
            'model' => 'Portfolio Client',
            'route-name-prefix' => 'portfolio.client',
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
        // seo
        $this->seo()->setTitle('Short Link Table');
        $this->seo()->setDescription('Display a listing of short link in Database.');

        $shortLinks = ShortLink::cacheData();

        return \view('pages.admin.short-link.index', \compact('shortLinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->seo()->setTitle('Genarate New Short Link');
        $this->seo()->setDescription('Ganareate new short link in a database.');


        return \view('pages.admin.short-link.create_edit');
    }

    public function visitorCreate()
    {
        $this->seo()->setTitle('Genarate New Short Link');
        $this->seo()->setDescription('Ganareate new short link in a database.');


        return \view('pages.admin.short-link.create');
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
        $this->seo()->setTitle('Store New Short Link');
        $this->seo()->setDescription('Store new short in a database.');

        $request->validate([
            'link' => ['required', 'string', 'max:255', 'active_url']
        ]);
        $data['link'] = $request->link;
        $data['code'] = Str::random(6);

        if ($request->prefix) {
            $data['prefix'] = Str::slug($request->prefix);
            $data['code'] = $data['prefix'] . '-' . $data['code'];
        }
        $shortLink = ShortLink::create($data);
        $shortLink->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Genarate New Short Link.');
        return \redirect()->route('admin.short.link.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\ShortLink  $shortLink
     * @return \Illuminate\Http\Response
     */
    public function edit(ShortLink $shortLink)
    {
        // seo
        $this->seo()->setTitle('Edit Short Link');
        $this->seo()->setDescription('Edit existing short link.');

        return \view('pages.admin.short-link.create_edit', \compact('shortLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\ShortLink  $shortLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShortLink $shortLink)
    {

        // seo
        $this->seo()->setTitle('Short Link Update');
        $this->seo()->setDescription('Update existing short link.');

        $request->validate([
            'link' => ['required', 'string', 'max:255', 'active_url']
        ]);

        $shortLink->update([
            'link' => $request->link,
        ]);
        $shortLink->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated Short Link.');
        return \redirect()->route('admin.short.link.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\ShortLink  $shortLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShortLink $shortLink)
    {

        $shortLink->delete();
        $shortLink->forgetCache();
        // flash message
        Session::flash('success', 'Successfully deleted Short Link.');
        return \redirect()->route('admin.short.link.index');
    }

    /**
     * It is used to show the resource list.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect(ShortLink $shortLink)
    {
        $shortLink->visitor += 1;
        $shortLink->save();
        $shortLink->forgetCache();
        return redirect($shortLink->link);
    }
}
