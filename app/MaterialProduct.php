<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialProduct extends Model {

	protected $table = 'material_product';

    protected $fillable = ['material_id','product_id','image_item_front','image_item_side','image_main_front','image_main_side','price'];

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

    public function lenses(){
        return $this->belongsToMany('App\Lense','sunglassesLenses')->withPivot('image_main_front','image_main_side','active');
    }

}
