<?php

namespace App\Http\Controllers;

use App\Models\SOP;
use Illuminate\Http\Request;

class SOPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('SOP');
    }
}
