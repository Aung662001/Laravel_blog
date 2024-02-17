<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
class Blogs{
    public $slug;
    public $title;
    public $intro;
    public $body;
    public $date;
    public function __construct($slug, $title, $intro,$body,$date){
        $this->slug = $slug;
        $this->title = $title;
        $this->intro = $intro;
        $this->body = $body;
        $this->date = $date;
    }
    public static function all(){
        return collect(File::files(resource_path('blogs')))->map(function($file){
            $obj = YamlFrontMatter::parseFile($file);
            return new Blogs($obj->slug, $obj->title, $obj->intro, $obj->body(),$obj->date);
        })->sortByDesc('date');
        // $files = File::files(resource_path('blogs'));
        // return array_map(function($file){
        //     $blog = YamlFrontMatter::parseFile($file);
        //     return new Blogs($blog->slug, $blog->title, $blog->intro, $blog->body());
        // },$files);
    }
    public static function find($slug){
    //     $path = resource_path("blogs/$slug.html");
    //     if(!file_exists($path)){
    //         return redirect("/blogs");
    //     }
    //     $file =File::files($path);
    //    return cache()->remember("posts.$slug",now()->minute(3),function() use ($file){
    //         $file = YamlFrontMatter::parseFile($file);
    //         return  new Blogs($file->slug, $file->title, $file->intro , $file->body());
    //     });
        $blogs = static::all();
        return $blogs->firstWhere('slug',$slug);
    }
    public static function findAndFail($slug){
        $blog = static::find($slug);
        if(!$blog){
           return new ModelNotFoundException();
        }
        return $blog;
    }
}