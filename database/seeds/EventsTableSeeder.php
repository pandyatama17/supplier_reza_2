<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('events')->delete();
      DB::table('events')->insert([
        'name'=>'Wedding',
        'price'=>'2200000',
        'description'=>'(2 Fotographer & 1 Videgrapher) Cd Video yang Sudah melalui proses editing, 1 Album Foto , 3 Foto yang di cetak Ukuran 12R dan 14R',
        'photographer'=>'2',
        'videographer'=>'1',
        'album'=>'1',
        'printed_photo'=>'3',
        'extras'=>null,
      ]);
      DB::table('events')->insert([
        'name'=>'Khitan',
        'price'=>'2100000',
        'description'=>'(2 Fotographer & 1 Videgrapher) Cd Video yang Sudah melalui proses editing, 1 Album Foto , 3 Foto yang di cetak Ukuran 10R dan 12R',
        'photographer'=>'2',
        'videographer'=>'1',
        'album'=>'1',
        'printed_photo'=>'3',
        'extras'=>null,
      ]);
      DB::table('events')->insert([
        'name'=>'Gathering',
        'price'=>'1500000',
        'description'=>'(2 Fotographer & 1 Videgrapher) Cd Video yang Sudah melalui proses editing & 1 album Foto , price 1 day = 1500k lebih dari sehari otomatis nambah 650k',
        'photographer'=>'2',
        'videographer'=>'1',
        'album'=>'1',
        'printed_photo'=>'0',
        'extras'=>null,
      ]);
      DB::table('events')->insert([
        'name'=>'Reuni',
        'price'=>'1500000',
        'description'=>'(1 Fotographer & 1 Videgrapher) Cd Video yang Sudah melalui proses editing + Foto Booth',
        'photographer'=>'1',
        'videographer'=>'1',
        'album'=>'0',
        'printed_photo'=>'0',
        'extras'=>'Photo Booth',
      ]);
      DB::table('events')->insert([
        'name'=>'Wisuda Sekolah',
        'price'=>'2000000',
        'description'=>'(2 Fotographer & 1 Videgrapher) Cd Video yang Sudah melalui proses editing + Foto Booth',
        'photographer'=>'2',
        'videographer'=>'1',
        'album'=>'0',
        'printed_photo'=>'0',
        'extras'=>'Photo Booth',
      ]);
      DB::table('events')->insert([
        'name'=>'Pesta',
        'price'=>'1500000',
        'description'=>'(1 Fotographer & 1 Videgrapher) Cd Video yang Sudah melalui proses editing + Foto Booth',
        'photographer'=>'1',
        'videographer'=>'1',
        'album'=>'0',
        'printed_photo'=>'0',
        'extras'=>'Photo Booth',
      ]);
    }
}
