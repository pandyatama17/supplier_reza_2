<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();
      DB::table('users')->insert([
        'name'=>'admin',
        'email'=>'admin@supplier.com',
        'password'=>bcrypt('admin'),
        'phone'=>'0812930192',
        'address'=>'Jl. Karanggan Rt03/05 Kec.Citeureup Kab.Bogor',
        'isadmin'=>1,
      ]);
      DB::table('users')->insert([
        'name'=>'nanda pandyatama',
        'email'=>'pandyatama@gmail.com',
        'password'=>bcrypt('nanda'),
        'phone'=>'192001',
        'address'=>'Jl. Pakin',
        'isadmin'=>0,
      ]);
    }
}
