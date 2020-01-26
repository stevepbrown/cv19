<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class PageProps extends Model
{

    
    protected $title;
    protected $name;
    protected $keywords;
    protected $description;
    protected $favicon_id;
    protected $links;
    protected $pageId;
    protected $requestPath;



/**
 * function links
 *
 * The links that belong to the page 
 * 
 * @return relationship instance
 */

    public function links(){

    return $this->hasMany('App\PageLink', 'page_id', $this->page_id);

}


/**
 * function keywords
 *
 * The keywords that belong to the page 
 * 
 * @return relationship instance
 */
public function keywords()
{
    return $this->hasMany('App\PageKeyword');
}


public function setKeywordsAttribute($value)
{    
    $this->attributes['first_name'] = strtolower($value);
}

}
