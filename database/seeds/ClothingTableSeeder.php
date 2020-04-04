<?php

use Illuminate\Database\Seeder;

class ClothingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('clothings')->delete();
      DB::table('clothings')->insert([
        'name'=>'Seragam Katun Linen',
        'material'=>'Katun Linen',
        'per_unit_price'=>'60000',
        'per_dozen_price'=>'648000',
          'per_score_price'=>'1080000',
        'description'=>'',
      ]);
      DB::table('clothings')->insert([
        'name'=>'Seragam TC',
        'material'=>'TC Dakron',
        'per_unit_price'=>'60000',
        'per_dozen_price'=>'648000',
        'per_score_price'=>'1080000',
        'description'=>'',
      ]);
      DB::table('clothings')->insert([
        'name'=>'Olah Raga Cotton 30s',
        'material'=>'Cotton Combed 30s',
        'per_unit_price'=>'75000',
        'per_dozen_price'=>'675000',
        'per_score_price'=>'1350000',
        'description'=>'',
      ]);
      DB::table('clothings')->insert([
        'name'=>'Olah Raga Cotton 20s',
        'material'=>'Cotton Combed 20s',
        'per_unit_price'=>'70000',
        'per_dozen_price'=>'630000',
        'per_score_price'=>'1260000',
        'description'=>'',
      ]);

      DB::table('clothings')->insert([
        'name'=>'Almamater',
        'material'=>'American Drill (AM1919)',
        'per_unit_price'=>'80000',
        'per_dozen_price'=>'720000',
        'per_score_price'=>'1440000',
        'description'=>'',
      ]);
    }
}
