<?php

use Illuminate\Database\Seeder;
use App\Model\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $reservations = [
            [
                'check_in' => '2019-10-5',
                'check_out' => '2019-10-6',
                'num_of_guests' => 7,
                'final_price' => 'RM 500.00',
                'user_id' => '1',
                'HouseId' => 1
           ],
           [
                'check_in' => '2019-10-10',
                'check_out' => '2019-10-11',
                'num_of_guests' => 6,
                'final_price' => 'RM 400.00',
                'user_id' => '1',
                'HouseId' => 2
            ]
        ];
        foreach ($reservations as $reservation) {
            Reservation::create(array(
                'check_in' => $reservation['check_in'],
                'check_out' => $reservation['check_out'],
                'num_of_guests' => $reservation['num_of_guests'],
                'final_price' => $reservation['final_price'],
                'user_id' => $reservation['user_id'],
                'HouseId' => $reservation['HouseId']
            ));
        }
    }
}
