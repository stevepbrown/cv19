<?php
namespace App\Http\Controllers;
use App\PageProps as PageProps;
use Illuminate\Support\Collection;
use illuminate\Support\Arr;
use illuminate\Support\Str;
use Illuminate\Http\Request;

 class GenericPageController extends Controller
{

    protected $request;
    protected $requestPath;
    protected $props;
    protected $str;




    public function __construct(Request $request){

        $this->request = $request;
        $this->setRequestPath($this->request);
        $this->props = $this->getPageAttributes();
        

    }

    

    public function setRequestPath($request){

        $this->requestPath =  ($request->path() !== '/'?"/{$request->path()}":$request->path());

    }


    protected function getRequestPath(){

        return $this->requestPath;
    }


    protected function getProps(){

        return PageProps::with('links','keywords')->where('slug',$this->getRequestPath())->first();


    }

    protected function getKeywords(){

       
        if($this->getProps()->keywords->count() >=1){

            return $this->buildKeywords($this->getProps()->keywords);
 

        }

        return false;
    }

    protected function getLinks() {

        return $this->getProps()->links->toArray();
    } 


    protected function getPageAttributes(){

        $props = $this->getProps()->toArray();

       

        $attributes = array();
        $attributes = arr::add($attributes, 'name',$props['name']);
        $attributes = arr::add($attributes, 'title',$props['title']);
        $attributes = arr::add($attributes, 'description',$props['meta_description']);
        $attributes = arr::add($attributes, 'keywords',$this->getkeywords());
        $attributes = arr::add($attributes, 'links',$this->getLinks());
        $attributes = arr::add($attributes, 'slug',$props['slug']);
        $attributes = arr::add($attributes, 'hasForm',$props['hasForm']);

           
        return $attributes;

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

    public function index(){

                
        $vw = view($this->props['name'],$this->props);

               
        return $vw;
        
    }
   
  
   
}
