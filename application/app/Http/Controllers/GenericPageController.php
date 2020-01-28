<?php

namespace App\Http\Controllers;
use App\PageProps;
use App\Link;
use Illuminate\Support\Collection;
use illuminate\Support\Str;
use illuminate\Support\Arr;


use Illuminate\Http\Request;

class GenericPageController extends Controller
{

protected $pageProps;
protected $links;



public function index(Request $request){

    $requestPath = (!$request->path?'/':$request->path);
    $pageProps = PageProps::with('links','keywords')->where('slug',$requestPath)->first();
        
 // TODO(SPB): Remove this
    // $links= collect(); 

    // foreach($pageProps->links as $link)  {

    //     $strLink = $this->buildLink($link);

    //     $links->push($strLink);
        
    // }  
    
    // $links = $links->toArray();
    // $links = Arr::flatten($links);
    
    
    
    $keywords= $this->buildKeywords($pageProps->keywords);
    $links =  $pageProps->links->toArray();


    
        
    $pageProps = $pageProps->select('name','meta_description', 'title')->first()->toArray();

      

    $this->pageProps = arr::collapse([$pageProps,['keywords'=>$keywords],['links'=>collect($links)]]);
      
    
        
    return view($this->pageProps['name'])->with(['pageProps'=>$this->pageProps]);



}


    /**
     *  function buildLink
     *
     * Returns a complete html link
     * 
     * @param Link $link
     * @return str
     */
        protected function buildLink(Link $link) {

   
        $id = $link['attr_id'];
        $type = $link['link_type'];
        $href = $link['href'];
        $rel = $link['rel'];
        $media = ($link['media'] !== 'null'? null: $link['media']);



        $str = "<link id=\"{$id}\" type=\"{$type}\" href=\"{$href}\" rel=\"{$rel}\" media=\"{$media}\">";
      

      
        return $str;

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
