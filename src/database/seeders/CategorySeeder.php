<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => '魚',
                'sort_order' => 1,
            ],
            [
                'name' => 'どんぶり',
                'sort_order' => 2,
            ],
            [
                'name' => 'その他',
                'sort_order' => 3,
            ],
            [
                'name' => 'イタリアン',
                'sort_order' => 4,
            ],
        ]);
        DB::table('secondary_categories')->insert([
            [
                'name' => '海鮮丼',
                'sort_order' => 1,
                'primary_category_id' => 1,
            ],
            [
                'name' => '寿司',
                'sort_order' => 2,
                'primary_category_id' => 1,
            ],
            [
                'name' => '唐揚げ丼',
                'sort_order' => 1,
                'primary_category_id' => 2,
            ],
            [
                'name' => '天丼',
                'sort_order' => 2,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'カツ丼',
                'sort_order' => 3,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'サラダチキン',
                'sort_order' => 1,
                'primary_category_id' => 3,
            ],
            [
                'name' => 'パスタ',
                'sort_order' => 1,
                'primary_category_id' => 4,
            ],
            [
                'name' => 'ピザ',
                'sort_order' => 2,
                'primary_category_id' => 4,
            ],
        ]);
    }
}
