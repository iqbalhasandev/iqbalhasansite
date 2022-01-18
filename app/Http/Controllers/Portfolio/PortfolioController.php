<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Portfolio\PortfolioSkill;
use App\Models\Portfolio\PortfolioClient;
use App\Models\Portfolio\PortfolioContact;
use App\Models\Portfolio\PortfolioGallery;
use App\Models\Portfolio\PortfolioService;
use App\Models\Portfolio\PortfolioEducation;
use App\Models\Portfolio\PortfolioExpertise;
use App\Models\Portfolio\PortfolioTestimonial;

class PortfolioController extends Controller
{
    public function __construct()
    {
        \config_set('theme.cdata', [
            'title' => 'Welcome to IQBAL HASAN\'s  Web Page',
            'description' => 'I am a student studying Diploma in Computer Engineering. I love working on various technologies in addition to my studies. I love coding and programming. I am currently working on web development for the last 3 years. And in addition to freelancing, I am contributing to various open source projects and packages.',

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
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));
        $gallery = new PortfolioGallery;
        return \view('portfolio.index', [
            'clients' => PortfolioClient::cacheData(),
            'services' => PortfolioService::cacheData(),
            'expertises' => PortfolioExpertise::cacheData(),
            'educations' => PortfolioEducation::cacheData(),
            'skills' => PortfolioSkill::cacheData(),
            'testimonials' => PortfolioTestimonial::cacheData(),
            'gallerys' => $gallery->allDataByGroups(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contactStore(Request $request)
    {

        $portfolioContact = new PortfolioContact;
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'type' => ['required']
        ]);
        if ($request->type == 'Project Proposal') {
            $request->validate([
                'delivery_time' => ['required', 'in:' . \implode(",", $portfolioContact->deliveryTimes()), 'max:255'],
                'development_time' => ['required', 'in:' . \implode(",", $portfolioContact->developmentTimes()), 'max:255'],
                'budget' => ['required', 'in:' . \implode(",", $portfolioContact->budgets()), 'max:255'],
                'project_description' => ['required'],
            ]);
        } elseif ($request->type == 'Pre-Sales') {
            $request->validate([
                'message' => ['required', 'string', 'max:255'],
                'product' => ['required', 'in:' . \implode(",", $portfolioContact->products()), 'max:255'],

            ]);
        } elseif ($request->type == 'Others') {
            $request->validate([
                'subject' => ['required', 'string', 'max:255'],
                'message' => ['required', 'string', 'max:255'],
            ]);
        }

        $data = $request->all();
        $data['file'] = \upload_file($request, 'file', 'portfolio-contact');

        $portfolioContact = $portfolioContact->create($data);
        $portfolioContact->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored Your Contact Data.');
        // return \redirect()->route(\config('theme.cdata.route-name-prefix') . '.index');
    }
}
