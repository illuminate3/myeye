<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {


    public function material_product(){
        return $this->belongsTo('App\MaterialProduct');
    }

    public function sunglassesLense(){
        return $this->belongsTo('App\Sunglass_Lense','sunglassesLense_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }



}
