<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\File;
use Laracasts\Flash\Flash;

class FilesController extends Controller
{
   protected function downloadFile($src){

    if(is_file($src)){

        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        $content_type = finfo_file($finfo, $src);

        finfo_close($finfo);

        $file_name = basename($src).PHP_EOL;

        $size = filesize($src);

        header("Content-Type: $content_type");

        header("Content-Disposition: attachment; filename=$file_name");

        header("Content-Transfer-Encoding: binary");

        header("Content-Length: $size");

        readfile($src);

        return true;

    } else{

        return false;

    }

}
    
    public function download($route){

    if(!$this->downloadFile(app_path()."\\Files\\".$route)){

        return redirect()->back();

    }

}
    public function files(){

   
        $categories = Category::all();
          
        $files = File::all();
        
        return view('files.downloads')->with('categories', $categories)->with('files', $files);
        

    }
    
     public function index(Request $request){

   
    
         
         
        $categories = Category::all();
          
     $files = File::search($request->name)->orderBy('id', 'DESC')->simplePaginate(5);
 
        return view('files.index')->with('categories', $categories)->with('files', $files);
        

    }
    
     public function create()
    {

        $categories = Category::all();
       
     return view('files.create')->with('categories', $categories);
        
    }
    
      public function store(Request $request)
    {

            
         if($request->file('file')){
            
                    $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $path = app_path().'\\files\\';    
        $file->move($path, $name);
             
        $file = new File($request->all());
     $file->file_url = $name;  
              $file->save();
             
              Flash::success("Archivo cargado");
        $categories = Category::all();
         return redirect()->route('admin.files.index')->with('categories', $categories);
             
        }
 
      
       
        
    
              
    
         Flash::warning("Debe agregar un archivo");
        return redirect()->back();
        
    }
    
      public function destroy($id)
    {
          $file = File::find($id);
         unlink(app_path()."\\files\\".$file->file_url);
        $file->delete();
        
        Flash::error('El archivo ' . $file->name. ' ha sido eliminado');
        $files = File::all();  
        return redirect()->route('admin.files.index')->with('files', $files);
         
    }
 

}
    


