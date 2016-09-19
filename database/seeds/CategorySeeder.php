<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategorySeeder extends Seeder {

	public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            'name' => 'Laravel'
        ]);
    }
}