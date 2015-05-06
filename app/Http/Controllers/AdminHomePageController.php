<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Slideshow;
use App\MaterialProduct;

class AdminHomePageController extends Controller {

	public function index()
	{
        // $page = Page::whereTitle('home')->first();
        // if(! $page){
        //     $page=null;
        // }
        // ,compact('page')

		return view('admin.home.index');


	}

    public function getSlideShowImages(){

        return Slideshow::all();
    }

    public function secondSlideShow(){

        return MaterialProduct::whereSlide_show(1)->get(['product_id','image_main_front']);
    }

    public function storeSlideShow(){
        if( $file = Request::file('fileMainSlideShow')){
            $name = $file->getClientOriginalName();
            Request::file('fileMainSlideShow')->move('images/main_slideshows', $name);
            $image = '/images/main_slideshows/' . $name;
            return Slideshow::create(['image' => $image]);

        }
    }
    public function updateSlideShow($id){
        if( $file = Request::file('fileMainSlideShowEdit')){
            if($slideshow = Slideshow::findOrFail($id)){
//                $filename =  public_path().$slideshow->image;
//                \File::delete($filename);

                $name = $file->getClientOriginalName();
                Request::file('fileMainSlideShowEdit')->move('images/main_slideshows', $name);
                $image = '/images/main_slideshows/' . $name;

                $slideshow->image = $image;
                $slideshow->save();
                return $slideshow;
            }

        }
    }

    public function deleteSlideShowImage($id){
        $slide_show = Slideshow::findOrFail($id);
        $slide_show->delete();
        $filename =  public_path().$slide_show->image;
        \File::delete($filename);
        return 'true';
    }

}
