<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Category extends Model implements Searchable {
    protected $fillable = [ 'name', 'image' ];
    protected $hidden = array('created_at', 'updated_at', 'deleted_at');
    /**
     * @return \Spatie\Searchable\SearchResult
     */
    public function getSearchResult(): SearchResult {
        $url = '/category/' . $this->id;
        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    public function beers()
    {
        return $this->hasMany('App\Beer');
    }
}
