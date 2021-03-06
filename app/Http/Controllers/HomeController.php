<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use App\Models\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems = Cache::tags(['systems'])->rememberForever('systems_all', function () {
            return System::all();
        });

        return view('home.index', [
            'title' => 'Strona główna',
            'systems' => $systems,
            'name' => config('app.name'),
        ]);
    }
}
