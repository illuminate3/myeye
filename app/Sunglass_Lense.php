<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sunglass_Lense extends Model {

	protected $table = 'sunglassesLenses';

    protected $fillable = ['material_product_id','lense_id','image_main_front','image_main_side'];

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

    public function lense(){
        return $this->belongsTo('App\Lense');
    }


}
