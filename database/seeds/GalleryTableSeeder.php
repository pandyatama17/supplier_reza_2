<?php

use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('gallery')->delete();
      DB::table('gallery')->insert([
        'title'=>'judul1',
        'description'=>'ni isinya deskripsi gallery bang. sementara gue isi pake lorem dulu Lorem ipsum dolor s',
        'category'=>'Khitanan',
        'date'=>date("Y/m/d"),
        'tags'=>'khitanan, sunatan',
        'photographer'=>'gatau',
      ]);
      DB::table('gallery')->insert([
        'title'=>'Main Bola',
        'description'=>'ini anak-anak pada main bola di pantai Lorem ipsum dolor s',
        'category'=>'Reuni',
        'date'=>date("Y/m/d"),
        'tags'=>'reuni, sma, ',
        'photographer'=>'gatau',
      ]);
      DB::table('gallery')->insert([
        'title'=>'Ini Pada Angkat Tangan',
        'description'=>'ini anak-anak pada angkat tangan, padahal gatau ngapa. Lorem ipsum dolor s',
        'category'=>'Gathering',
        'date'=>date("Y/m/d"),
        'tags'=>'gathering, acara',
        'photographer'=>'gatau',
      ]);
      DB::table('gallery')->insert([
        'title'=>'Ini Pada Angkat Tangan juga',
        'description'=>'ini anak-anak pada angkat tangan, padahal gatau ngapa pada gajelas dah. Lorem ipsum dolor s',
        'category'=>'Gathering',
        'date'=>date("Y/m/d"),
        'tags'=>'gathering, acara',
        'photographer'=>'gatau',
      ]);
      DB::table('gallery')->insert([
        'title'=>'Pada Mainan apaan tau',
        'description'=>'ini anak-anak pada mainan apasi gajelas bat. Lorem ipsum dolor s',
        'category'=>'Gathering',
        'date'=>date("Y/m/d"),
        'tags'=>'gathering, acara',
        'photographer'=>'gatau',
      ]);
      DB::table('gallery')->insert([
        'title'=>'Penyerahan Medali Wisuda SD Islam Karya Mukti',
        'description'=>'Penyerahan medali kelulusan oleh guru terhadap siswa. Lorem ipsum dolor s',
        'category'=>'wisuda',
        'date'=>date("Y/m/d"),
        'tags'=>'wisuda, sd islam karya mukti',
        'photographer'=>'gatau',
      ]);
      DB::table('gallery')->insert([
        'title'=>'Pentas Seni SD Islam Karya Mukti',
        'description'=>'pentas oleh siswa. Lorem ipsum dolor s',
        'category'=>'wisuda',
        'date'=>date("Y/m/d"),
        'tags'=>'wisuda, sd islam karya mukti',
        'photographer'=>'gatau',
      ]);
      DB::table('gallery')->insert([
        'title'=>'Pengajar SD Islam Karya Mukti',
        'description'=>'Keluarga besar pengajar SD ini. Lorem ipsum dolor s',
        'category'=>'wisuda',
        'date'=>date("Y/m/d"),
        'tags'=>'wisuda, sd islam karya mukti',
        'photographer'=>'gatau',
      ]);
      DB::table('gallery')->insert([
        'title'=>'Itu Bokap-bokapnya Senyum',
        'description'=>'tawa lagi lu. Lorem ipsum dolor s',
        'category'=>'khitanan',
        'date'=>date("Y/m/d"),
        'tags'=>'khitanan',
        'photographer'=>'gatau',
      ]);
      DB::table('gallery')->insert([
        'title'=>'Orang tua dan Pengantin Sunat',
        'description'=>'emaknya senyum. Lorem ipsum dolor s',
        'category'=>'khitanan',
        'date'=>date("Y/m/d"),
        'tags'=>'khitanan',
        'photographer'=>'gatau',
      ]);
      DB::table('gallery')->insert([
        'title'=>'Keluaga Pengantin SUnat',
        'description'=>'Lorem ipsum dolor s',
        'category'=>'khitanan',
        'date'=>date("Y/m/d"),
        'tags'=>'khitanan',
        'photographer'=>'gatau',
      ]);
      DB::table('gallery')->insert([
        'title'=>'Anak siapa nih',
        'description'=>'Lorem ipsum dolor s',
        'category'=>'khitanan',
        'date'=>date("Y/m/d"),
        'tags'=>'khitanan',
        'photographer'=>'gatau',
      ]);
    }
}
