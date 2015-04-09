<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {
    protected $tables = ['frames','material_product','products','materials','lenses'];
    protected $seeders = ['Frame','Material_Product','Product','Material','Lense'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->cleanTable();

        $this->action();
    }
    public function cleanTable(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach($this->tables as $table){
            DB::table($table)->truncate()
            ;
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function action(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($this->seeders as $seed) {
            $var = $seed.'Table'.'Seeder';
            $this->call($var);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }


}