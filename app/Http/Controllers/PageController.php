<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class PageController extends Controller
{
    public function home()
    {
        $services = Service::where('is_active', true)->take(6)->get();
        return view('home', compact('services'));
    }

    public function services()
    {
        $services = Service::where('is_active', true)->get();
        return view('services', compact('services'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}