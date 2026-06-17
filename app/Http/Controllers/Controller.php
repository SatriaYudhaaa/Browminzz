<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

use App\Models\Testimoni;

$testimoni = Testimoni::latest()->take(2)->get();

return view('home', compact('testimoni'));