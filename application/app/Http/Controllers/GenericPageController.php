<?php

namespace App\Http\Controllers;
use App\PageProps;
use App\Link;

use Illuminate\Http\Request;

class GenericPageController extends Controller
{


protected $links;
protected $keywords;


public function index(Request $request){


    $requestPath = (!$request->path?'/':$request->path);



    // DEBUGONLY(SPB): 
    $pageProps = PageProps::with('links','keywords')->where('slug',$requestPath)->first();
    

    $this->links = collect();
    
    foreach($pageProps->links as $link)  {

        
        $this->links->push(($this->buildLink($link)));

    }  


    $this->keywords= $pageProps->keywords;
    

    
    // DEBUGONLY(SPB): 
    dump($this->links);
    dump($this->keywords);

    die();

    return view($pageProps['name'])->with($pageProps);

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


        $str = "<link id=\"{$id}\" type=\"{$type}\" href=\"{$href}\" rel=\"{$rel}\" media=\"{$media}\"></link>";

      
        return $str;

    }
}
