<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MaterialEyewearController extends Controller {

	public function materials(){
        return \App\Material::all();
    }

}
