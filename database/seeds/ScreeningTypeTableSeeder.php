<?php

use Illuminate\Database\Seeder;

class ScreeningTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('screening_types')->delete();
      DB::table('screening_types')->insert([
        'name'=>'Bordir',
        'description'=>'bordir',
      ]);
      DB::table('screening_types')->insert([
        'name'=>'Sablon Rubber',
        'description'=>'sablon rubber yang memiliki tingkat lekatan yang baik pada bahan kaos, serta sifatnya yang elastis membuat sablon jenis iin sebagai salah satu jenis sablon terbaik, dan termasuk bahan tinta sablon yang termurah.',
      ]);
      DB::table('screening_types')->insert([
        'name'=>'Sablon Plastisol',
        'description'=>'Sablon jenis plastisol akan memberikan efek warna cerah serta memiliki beragam pilihan warna tinta sehingga bisa disesuaikan dengan warna dasar kaos, dan bahkan telah menjadi sablon yang digunakan sebagai standar internasional. ',
      ]);
      DB::table('screening_types')->insert([
        'name'=>'Sablon DTG Printing',
        'description'=>'DTG adalah Kependekan dari Direct to Garment adalah sebuah proses dimana gambar dicetak langsung kedalam kaos. Berbeda dengan jenis sablon sebelumnya yang bersifat manual dalam proses pengerjaannya, Sablon DTG membutuhkan mesin digital/printer dalam prosesnya.',
      ]);
      DB::table('screening_types')->insert([
        'name'=>'Sablon Polyflex',
        'description'=>'Polyflex menggunakan material sejenis sticker vinyl dan memiliki hasil warna yang cerah dan detail serta awet dan juga tahan lama, namun sayangnya tidak dapat mencetak warna gradasi dan juga tidak bisa disetrika secara langsung.',
      ]);

    }
}
