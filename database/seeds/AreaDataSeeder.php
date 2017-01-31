<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreaDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        *	Seeder for Areas
        */
        $area1 = new Area();
        $area2 = new Area();
        $area3 = new Area();
        $area4 = new Area();
        $area5 = new Area();
        $area6 = new Area();
        $area7 = new Area();
        $area8 = new Area();
        $area9 = new Area();
        $area10 = new Area();

        $area1->area_name  = 'Madina Town';
        $area1->city_id  = '1';
        $area1->save();

        $area2->area_name  = 'D Ground';
        $area2->city_id  = '1';
        $area2->save();

        $area3->area_name  = 'Susan Road';
        $area3->city_id  = '1';
        $area3->save();

        $area4->area_name  = 'Jhal Chowk';
        $area4->city_id  = '1';
        $area4->save();

        $area5->area_name  = 'Satyana Road';
        $area5->city_id  = '1';
        $area5->status  = 'Inactive';
        $area5->save();

        $area6->area_name  = 'Lahore Road';
        $area6->city_id  = '1';
        $area6->save();

        $area7->area_name  = 'Jhang Road';
        $area7->city_id  = '1';
        $area7->save();

        $area8->area_name  = 'Kashmir Road';
        $area8->city_id  = '2';
        $area8->save();

        /*$area9->area_name  = 'Summundri Road';
        $area9->city_id  = '1';
        $area9->save();

        $area10->area_name  = 'Allama Iqbal Colony';
        $area10->city_id  = '1';
        $area10->status  = 'Inactive';
        $area10->save();*/
    }
}
