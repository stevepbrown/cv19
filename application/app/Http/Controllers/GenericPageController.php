<?php

namespace App\Http\Controllers;
use App\PageProps;

use Illuminate\Http\Request;

class GenericPageController extends Controller
{
public function index(Request $request){

    $pageProps = PageProps::where('$requestPath',$request->path)->with('keywords','active');

    return view($pageProps->name)->with($pageProps);

}
}
