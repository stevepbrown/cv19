<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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


public function links(){

    return $this->hasMany('App\PageLink', 'page_id', $this->pageId);

}    

}
