<?php

namespace App\Http\Controllers\Place;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'title' => 'string',
            'place_categories_id' => 'integer',
            'place_states_id' => 'integer'
        ]);
        Place::create($data);

        return redirect()->route('places.index');
    }
}
