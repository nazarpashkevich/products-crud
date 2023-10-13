<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //without factory
        Product::insertOrIgnore([
            [
                'id' => 1,
                'title' => 'Bare Coffee Roasters Colombia',
                'price' => 500,
                'description' => 'This coffee comes from the same farm as our Pink Bourbon, while it is a lower
                cupping score it is still an outstanding coffee. The farm has belonged
                to the Becerra family for more than 45 years. Jose Fernando Becerra is a farmer in his second generatio',
            ],
            [
                'id' => 2,
                'title' => 'Huila Pink Bourbon 250',
                'price' => 250,
                'description' => 'The Bacerra family has owned the farm for more than 45 years. It is an 8 Ha farm,
                the main crop is coffee, but they also produce bananas and oranges. The farm is covered by shade of
                the walnut and Cedar tree. ',
            ],
            [
                'id' => 3,
                'title' => 'Bare Coffee Roasters Colombia 200',
                'price' => 122.5,
                'description' => 'This coffee comes from the same farm as our Pink Bourbon, while it is a lower
                cupping score it is still an outstanding coffee. The farm has belonged
                to the Becerra family for more than 45 years. Jose Fernando Becerra is a farmer in his second generatio',
            ]
        ]);
    }
}
