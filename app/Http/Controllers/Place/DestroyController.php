<?php

namespace App\Http\Controllers\Place;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Place $place)
    {
        $place->delete();
        return redirect()->route('places.index');
    }
}
