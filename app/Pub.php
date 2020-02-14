<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pub extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'image'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo( 'App\PubCategory' );
    }
}
