<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PubCategory extends Model {
    protected $fillable = [
        'name',
        'image'
    ];

    public function test() {
        return $this->hasMany( 'App\Pub' ,'category_id');
    }
}
