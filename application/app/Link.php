<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function linkPages() {

        return $this->hasMany('App\LinkPage');

    }
}
