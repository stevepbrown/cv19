<?php

namespace App\Http\Controllers;
use App\PageProps;

use Illuminate\Http\Request;

class GenericPageController extends Controller
{
public function index(Request $request){


    $requestPath = (!$request->path?'/':$request->path);


    $pageProps = PageProps::with('links','keywords')->where('slug',$requestPath)->first()->toArray();

    $vw = view($pageProps['name'])->with($pageProps);

    return view($pageProps['name'])->with($pageProps);

}
}
