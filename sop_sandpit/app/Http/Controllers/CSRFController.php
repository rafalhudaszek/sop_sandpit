<?php

namespace App\Http\Controllers;

use App\Models\CSRF;
use Illuminate\Http\Request;

class CSRFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('CSRF');
    }
}
