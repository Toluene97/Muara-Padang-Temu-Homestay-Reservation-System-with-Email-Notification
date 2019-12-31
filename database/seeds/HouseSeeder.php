<?php

use Illuminate\Database\Seeder;
use App\Model\House;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $houses = [
            [
                'name' => 'Marriott',
                'price_weekend' => 'RM 250.00',
                'price_weekday' => 'RM 200.00',
                'detail' => '3 Bedroom ( 3 queen bed )'
            ],
            [
                'name' => 'Sutra',
                'price_weekend' => 'RM 230.00',
                'price_weekday' => 'RM 200.00',
                'detail' => '2 Bedroom ( 1 queen bed & 2 single bed)'
            ],
            [
                'name' => 'Maya',
                'price_weekend' => 'RM 250.00',
                'price_weekday' => 'RM 200.00',
                'detail' => '3 Bedroom ( 3 queen bed )'
            ]
        ];

        foreach ($houses as $house) {
            House::create(array(
                'name' => $house['name'],
                'price_weekend' => $house['price_weekend'],
                'price_weekday' => $house['price_weekday'],
                'detail' => $house['detail']
            ));
        }
    }
}
