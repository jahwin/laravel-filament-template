<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

/**
 * Class WebsiteController
 * 
 * This controller handles the basic pages of the website.
 */
class WebsiteController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return Inertia::render('home/index');
    }
}
