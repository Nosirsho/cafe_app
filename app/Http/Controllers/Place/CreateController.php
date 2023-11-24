<?php

namespace App\Http\Controllers\Place;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\PlaceCategory;
use App\Models\PlaceState;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $place_categories = PlaceCategory::all();
        $place_states = PlaceState::all();
        return view('place/create', compact('place_categories', 'place_states'));
    }
}
