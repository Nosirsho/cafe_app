<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function place_category(): BelongsTo
    {
        return $this->belongsTo(PlaceCategory::class, 'place_categories_id', 'id');
    }

    public function place_state()
    {
        return $this->belongsTo(PlaceState::class, 'place_states_id', 'id');
    }
}
