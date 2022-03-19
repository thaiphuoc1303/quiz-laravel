<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('khoi')->insert(['ten' => 10]);
        DB::table('khoi')->insert(['ten' => 11]);
        DB::table('khoi')->insert(['ten' => 12]);

        DB::table('lop')->insert(['ten' => '10.1', 'khoi'=>1]);
        DB::table('lop')->insert(['ten' => '10.2', 'khoi'=>1]);
        DB::table('lop')->insert(['ten' => '10.3', 'khoi'=>1]);
        DB::table('lop')->insert(['ten' => '11.1', 'khoi'=>2]);
        DB::table('lop')->insert(['ten' => '11.2', 'khoi'=>2]);
        DB::table('lop')->insert(['ten' => '11.3', 'khoi'=>2]);
        DB::table('lop')->insert(['ten' => '12.1', 'khoi'=>3]);
        DB::table('lop')->insert(['ten' => '12.2', 'khoi'=>3]);
        DB::table('lop')->insert(['ten' => '12.3', 'khoi'=>3]);

        DB::table('chuong')->insert(['ten' => 'Chương đại 1', 'khoi'=>1, 'dai_hinh'=> 1, 'ki'=>1]);
        DB::table('chuong')->insert(['ten' => 'Chương đại 2', 'khoi'=>1, 'dai_hinh'=> 1, 'ki'=>1]);
        DB::table('chuong')->insert(['ten' => 'Chương hình 1', 'khoi'=>1, 'dai_hinh'=> 0, 'ki'=>1]);
        DB::table('chuong')->insert(['ten' => 'Chương hình 2', 'khoi'=>1, 'dai_hinh'=> 0, 'ki'=>1]);
        DB::table('chuong')->insert(['ten' => 'Chương đại 3', 'khoi'=>2, 'dai_hinh'=> 1, 'ki'=>1]);
        DB::table('chuong')->insert(['ten' => 'Chương đại 4', 'khoi'=>2, 'dai_hinh'=> 1, 'ki'=>1]);
        DB::table('chuong')->insert(['ten' => 'Chương hình 3', 'khoi'=>2, 'dai_hinh'=> 0, 'ki'=>1]);
        DB::table('chuong')->insert(['ten' => 'Chương hình 4', 'khoi'=>2, 'dai_hinh'=> 0, 'ki'=>1]);
        DB::table('chuong')->insert(['ten' => 'Chương đại 5', 'khoi'=>3, 'dai_hinh'=> 1, 'ki'=>1]);
        DB::table('chuong')->insert(['ten' => 'Chương đại 6', 'khoi'=>3, 'dai_hinh'=> 1, 'ki'=>1]);
        DB::table('chuong')->insert(['ten' => 'Chương hình 5', 'khoi'=>3, 'dai_hinh'=> 0, 'ki'=>1]);
        DB::table('chuong')->insert(['ten' => 'Chương hình 6', 'khoi'=>3, 'dai_hinh'=> 0, 'ki'=>1]);

        DB::table('theloai')->insert(['ten'=>'Mệnh đề', 'chuong'=>1]);
        DB::table('theloai')->insert(['ten'=>'Tập hợp', 'chuong'=>1]);
        DB::table('theloai')->insert(['ten'=>'Các định nghĩa', 'chuong'=>3]);
        DB::table('theloai')->insert(['ten'=>'Tổng hiệu hai vectơ', 'chuong'=>3]);
        DB::table('theloai')->insert(['ten'=>'Hàm số lượng giác', 'chuong'=>5]);
        DB::table('theloai')->insert(['ten'=>'Phương trình lượng giác cơ bản', 'chuong'=>5]);
        DB::table('theloai')->insert(['ten'=>'Phép biến hình', 'chuong'=>7]);
        DB::table('theloai')->insert(['ten'=>'Phép tịnh tiến', 'chuong'=>7]);
        DB::table('theloai')->insert(['ten'=>'Sự đồng biến nghịch biến của hàm số', 'chuong'=>9]);
        DB::table('theloai')->insert(['ten'=>'Cực trị của hàm số', 'chuong'=>9]);
        DB::table('theloai')->insert(['ten'=>'Khái niệm về khối đa diện', 'chuong'=>11]);
        DB::table('theloai')->insert(['ten'=>'Khối đa diện lồi và khối đa diện đều', 'chuong'=>11]);

    }
}
