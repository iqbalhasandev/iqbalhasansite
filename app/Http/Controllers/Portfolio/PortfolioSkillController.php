<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Portfolio\PortfolioSkill;

class PortfolioSkillController extends Controller
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
            'title' => 'Portfolio Skill table',
            'model' => 'PortfolioSkill',
            'route-name-prefix' => 'admin.portfolio.skill',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Skill Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.portfolio.skill.create')
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
            'description' => 'Display a listing of Portfolio Skill in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = PortfolioSkill::cacheData();

        return \view('pages.admin.portfolio.skill.index', \compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \config_set('theme.cdata', [
            'title' => 'Create New Portfolio Skill',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Skill Table',
                    'link' => \route('admin.portfolio.skill.index')
                ],

                [
                    'name' => 'Create New Portfolio Skill',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new portfolio skill in a database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));



        return \view('pages.admin.portfolio.skill.create_edit');
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
        $this->seo()->setTitle('Store New Portfolio Skill');
        $this->seo()->setDescription('Store new portfolio skill in a database.');

        $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:portfolio_skills,title'],
            'percentage' => ['required', 'integer', 'min:0', 'max:100']
        ]);
        // return $request->all();
        $portfolioSkill = PortfolioSkill::create($request->all());

        $portfolioSkill->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored new portfolio skill data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio\PortfolioSkill  $portfolioSkill
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioSkill $portfolioSkill)
    {
        \config_set('theme.cdata', [
            'title' => 'Edit Portfolio Skill Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Portfolio Skill Table',
                    'link' => \route('admin.role.index')
                ],

                [
                    'name' => 'Edit Portfolio Skill Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route('admin.portfolio.skill.edit', $portfolioSkill->id),
            'update' => route('admin.portfolio.skill.update', $portfolioSkill->id),
            'description' => 'Edit existing role data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.portfolio.skill.create_edit', ['item' => $portfolioSkill]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio\PortfolioSkill  $portfolioSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioSkill $portfolioSkill)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'percentage' => ['required', 'integer', 'min:0', 'max:100']
        ]);
        $portfolioSkill->update($request->all());

        $portfolioSkill->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated Portfolio Skill data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio\PortfolioSkill  $portfolioSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioSkill $portfolioSkill)
    {
        $portfolioSkill->delete();
        $portfolioSkill->forgetCache();
        // flash message
        Session::flash('success', 'Successfully deleted Portfolio Skill data.');
        return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }
}
