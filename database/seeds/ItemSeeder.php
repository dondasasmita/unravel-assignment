<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $item = new \App\Item([
         	'image' => 'https://images.macrumors.com/article-new/2020/03/Apple_new-macbook-air-wallpaper-screen_03182020_big.jpg.large_2x.jpg',
         	'name' => 'Macbook Air',
         	'description' => 'Laptop for students',
         	'price' => 999
         ]);

         $item->save();

         $item = new \App\Item([
         	'image' => 'https://images.macrumors.com/article-new/2020/03/Apple_new-macbook-air-wallpaper-screen_03182020_big.jpg.large_2x.jpg',
         	'name' => 'Macbook Pro',
         	'description' => 'Laptop for Professional',
         	'price' => 2499
         ]);

         $item->save();

         $item = new \App\Item([
         	'image' => 'https://images.macrumors.com/article-new/2020/03/Apple_new-macbook-air-wallpaper-screen_03182020_big.jpg.large_2x.jpg',
         	'name' => 'Macbook Pro 16',
         	'description' => 'Laptop for Professional',
         	'price' => 3699
         ]);

         $item->save();
    }
}
