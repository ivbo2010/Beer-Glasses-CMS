<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PubCategory extends Model {
    protected $fillable = [
        'name',
        'image'
    ];
    protected $hidden = array('created_at', 'updated_at', 'deleted_at');
    /*public function test() {
        return $this->hasMany( 'App\Pub' ,'category_id');
    }*/

    public function pub()
    {
        return $this->hasMany('App\Pub','category_id');
    }

}
