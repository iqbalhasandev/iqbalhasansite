<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return \view('portfolio.index');
    }
}
