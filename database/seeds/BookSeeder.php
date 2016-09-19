<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BookSeeder extends Seeder {

	public function run()
    {
        DB::table('books')->delete();
        DB::table('books')->insert([
            'title' => 'Laravel: Up & Running',
            'description' => 'This practical book teaches Laravel piece by piece, starting from the ground up. It is not a reference book. You will work through creating usable, real-world tools and applications as a way to learn all of the pieces of the framework. The purpose of this book is to teach beginners the foundations necessary to quickly become proficient with Laravel.',
            'picture' => 'http://it-ebooks.info/images/ebooks/3/laravel_up__running_early_release.jpg',
            'category_id' => 1,
            'user_id' => 1,
            'published' => true
        ]);
    }
}