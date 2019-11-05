<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function __invoke()
    {
        return view('skills', 
        ['title' => 'Skills',
        'keywords'=>'IMPORTANT - PLEASE INSERT KEYWORDS',
        'description'=>'IMPORTANT - PLEASE INSERT A DECSRIPTION']);
    }
}
