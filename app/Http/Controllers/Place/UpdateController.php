<?php

namespace App\Http\Controllers\Place;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Place $place)
    {
        $data = request()->validate([
            'title' => 'string',
            'place_categories_id' => 'integer',
            'place_states_id' => 'integer'
        ]);
        $place->update($data);

        return redirect()->route('places.show', compact('place'));
    }
}
