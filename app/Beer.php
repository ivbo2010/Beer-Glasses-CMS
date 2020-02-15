<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beer extends Model implements Searchable {

    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'qty',
        'category_id',
        'country_id',
        'tag_id',
        'image'
    ];

    protected $dates =['deleted_at'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo( 'App\Category' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country() {
        return $this->belongsTo( 'App\Country' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag() {
        return $this->belongsTo( 'App\Tag' );
    }

    /**
     * @return \Spatie\Searchable\SearchResult
     */
    public function getSearchResult(): SearchResult {
        $url = '/beer/' . $this->id;
        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
