<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lense extends Model {

    protected $fillable = ['title','image','price'];

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

    public function material_products(){
        return $this->belongsToMany('App\MaterialProduct','sunglassesLenses');
    }

}
