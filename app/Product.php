<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = ['title','frame_id','type','detail'];

    //

    static function activeAll($array){
        $cols = static :: whereIN('id',$array)->get();
        foreach($cols as $item){
            $item->active = ! $item->active;
            $item->save();
        }
        return 'true';
    }
    static function deleteAll($array){
        $cols = static :: whereIN('id',$array)->get();
        foreach($cols as $item){
            $item->delete();
        }
        return 'true';
    }

    public function frame(){
        return $this->belongsTo('App\Frame');
    }

    public function materials(){
        return $this->belongsToMany('App\Material')->withPivot('price', 'image_item_front','image_item_side','image_main_front','image_main_side','id','active');;
    }

}
