<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PingBackController extends Controller
{
   public function __invoke(Request $request){

    // parse the query string

    // UPdate the database (IP, whois etc)

    return http_response_code(201);


   }
}
