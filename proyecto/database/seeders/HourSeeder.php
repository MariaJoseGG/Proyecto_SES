<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hour;

class HourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 24; $i++) {
            $hour=new Hour;
            if($i<10){
                $hour->name='0'.$i.':00';
            }
            else{
                $hour->name=''.$i.':00'; 
            }
            $hour->save();
        }
    }
}
