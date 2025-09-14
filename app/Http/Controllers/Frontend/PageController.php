<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $data = ['title' => 'About Us'];

        return view('frontend.pages.about', $data);
    }
    public function services()
    {
        $data = ['title' => 'Services'];

        return view('frontend.pages.services', $data);
    }
    public function faq()
    {
        $data = ['title' => 'Frequently Asked Questions'];

        return view('frontend.pages.faq', $data);
    }
}
