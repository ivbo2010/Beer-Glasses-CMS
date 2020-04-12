<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pub extends Model implements Searchable
{

    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'image'
    ];
    protected $hidden = array('created_at', 'updated_at', 'deleted_at');
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo( 'App\PubCategory' );
    }

    public function getSearchResult(): SearchResult {
        $url = '/pub/' . $this->id;
        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
