<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model {

    protected $fillable = ['title','image'];

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


    public function products(){
        return $this->belongsToMany('App\Product');
    }


}
