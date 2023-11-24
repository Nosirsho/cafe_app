<?php

namespace App\Http\Controllers\Place;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($id)
    {
        $place = Place::find($id);

        return view('place/show', compact('place'));
    }
}
