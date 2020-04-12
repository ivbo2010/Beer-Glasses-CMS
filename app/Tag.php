<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Tag extends Model implements Searchable {
    protected $fillable = [ 'name' ];
    protected $hidden = array('created_at', 'updated_at', 'deleted_at');
    /**
     * @return \Spatie\Searchable\SearchResult
     */
    public function getSearchResult(): SearchResult {
        $url = '/tag/' . $this->id;

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    public function beers()
    {
        return $this->hasMany('App\Beer')->with('category','country','tag')->orderBy('name', 'desc');
    }
}
