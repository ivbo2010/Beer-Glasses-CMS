<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Country extends Model implements Searchable
{
    protected $fillable = ['name'];

    /**
     * @return \Spatie\Searchable\SearchResult
     */
    public function getSearchResult(): SearchResult {
        $url = '/country/' . $this->id;
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
