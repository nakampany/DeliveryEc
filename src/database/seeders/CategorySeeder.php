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
                'name' => '海鮮',
                'sort_order' => 1,
            ],
            [
                'name' => '丼',
                'sort_order' => 2,
            ],
            [
                'name' => 'イタリアン',
                'sort_order' => 3,
            ],
            [
                'name' => 'その他',
                'sort_order' => 4,
            ],
        ]);
        DB::table('secondary_categories')->insert([
            [
                'name' => '寿司名人',
                'sort_order' => 1,
                'primary_category_id' => 1,
            ],
            [
                'name' => '魚丼屋A',
                'sort_order' => 2,
                'primary_category_id' => 1,
            ],
            [
                'name' => '魚丼屋B',
                'sort_order' => 3,
                'primary_category_id' => 1,
            ],
            [
                'name' => '魚の恩返し',
                'sort_order' => 4,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'DONBURIKAN',
                'sort_order' => 1,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'あわらのからあげ',
                'sort_order' => 2,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'woo kYons kitchen(イタリアン)',
                'sort_order' => 1,
                'primary_category_id' => 3,
            ],
            [
                'name' => 'Macho-s chicken(サラダチキン専門店)',
                'sort_order' => 1,
                'primary_category_id' => 4,
            ],
            [
                'name' => 'ジーパイ（台湾からあげ）',
                'sort_order' => 2,
                'primary_category_id' => 4,
            ],
        ]);
    }
}
