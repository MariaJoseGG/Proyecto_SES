<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fluid;

class FluidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=7; $i <= 24; $i++) { 
            $fluid=new Fluid;
            if($i<10){
                $fluid->hour='0'.$i.'';
            }
            else{
                $fluid->hour=''.$i.'';  
            }
            $fluid->save();
        }

        for ($i=0; $i <= 6; $i++) { 
            $fluid=new Fluid;
            $fluid->hour='0'.$i.'';
            $fluid->save();
        }
    }
}
