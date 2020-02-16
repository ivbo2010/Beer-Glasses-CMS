<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $sdata = Setting::all();
        return view('setting', compact('sdata'));
    }

}
