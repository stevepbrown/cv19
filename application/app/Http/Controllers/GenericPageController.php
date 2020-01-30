<?php

namespace App\Http\Controllers;
use App\PageProps;
use App\Link;
use Illuminate\Support\Collection;
use illuminate\Support\Arr;
use illuminate\Support\Str;


use Illuminate\Http\Request;

class GenericPageController extends Controller
{

protected $pageProps;
protected $links;




/**
 * function show 
 *
 * Parses the request string, fetches page properties
 * & related links, keywords etc.
 * 
 * Calls the appropriate view.
 * 
 * 
 * @param Request $request
 * @return view instance
 */
public function show(Request $request){

    

    $requestPath = ($request->path() !== '/'?"/{$request->path()}":$request->path());

    $pageProps = PageProps::with('links','keywords')->where('slug',$requestPath)->first();


    $keywords= $this->buildKeywords($pageProps->keywords);
    $links =  $pageProps->links->toArray();
    $name = $pageProps->name;
    $title = $pageProps->title;
    $description = $pageProps->meta_description;
    
    $this->pageProps = arr::add($this->pageProps, 'title',$title);
    $this->pageProps = arr::add($this->pageProps, 'description',$description);
    $this->pageProps = arr::add($this->pageProps, 'keywords',$keywords);
    $this->pageProps = arr::add($this->pageProps, 'links',$links);
   
   
    // decide whether to return simple view, or hand-off to a specialised controller
    switch ($this->pageProps['name']) {
        case 'cv':
            return route('profile', ['id' => 1]);
            break;
        
        default:
            return view($pageProps->name)->with($this->pageProps);
            break;
    }
    
   

}
    
    /**
     * function buildKeywords
     *
     * Creates a string of all the keyword values,
     * with a comma separator
     * 
     * @param [collection] $keywords
     * @return string
     */
    protected function buildKeywords(collection $keywords){
        
        

        foreach($keywords as $keyword){
            $str = Str::finish((!isset($str)?"":$str),"{$keyword->text},");
        }
        
        return Str::replaceLast(',','', $str);
    }
}
