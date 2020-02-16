<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name', 'email', 'phone', 'facebook', 'twitter', 'linkedin', 'vimeo', 'youtube',
        'about_us', 'address', 'site_logo', 'site_favicon'
    ];
}
