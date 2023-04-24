<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //User
        User::create([
            'name'=>'UserOne',
            'image'=>'user.png',
            'nrc'=>'12/pabata(N)000000',
            'address'=>'Botahtaung 47 stress',
            'phone'=>'095025363',
            'email'=>'userone@gmail.com',
            'password'=>Hash::make('asdasdasd')

        ]);
        //Admin
        Admin::create([
            'name'=>'Admin',
            'image'=>'admin.png',
            'nrc'=>'12/pabata(N)000000',
            'address'=>'Botahtaung 47 stress',
            'phone'=>'095025363',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('asdasdasd')

        ]);
        //category
        $category= ['T shirt','Hat','Electronic','Mobile','EarPhone'];
        foreach($category as $c){
            Category::create([
                'slug'=>Str::slug($c),
                'name'=>$c,
                'mm_name'=>"မြန်မာ",
                'image'=>'category.jpg',
            ]);
        }
        //brand
        $brand= ['Samsung','Huawei','Apple'];
        foreach($brand as $b){
            Brand::create([
                'slug'=>Str::slug($b),
                'name'=>$b
            ]);
        }
        //color
        $color= ['red','green','blue','black'];
        foreach($color as $c){
            Color::create([
                'slug'=>Str::slug($c),
                'name'=>$c
            ]);
        }
        //Supplier
        Supplier::create([
            'name'=>'Mg Mg',
            'image'=>'mgmg.png'
        ]);
    }
}
