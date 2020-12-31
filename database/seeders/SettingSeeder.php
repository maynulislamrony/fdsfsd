<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'company_name' =>'DIGITAL SHOP',
            'company_email' => 'digitalshop@gmail.com',
            'company_phone' => '962515326',
            'company_mobile' => '0170000000',
            'company_city'=>'Dhaka',
            'company_country'=>'Bangladesh',
            'company_zipcode'=>'1613',
            'company_address'=>'Kaligonj Bazar, kaligonj, Gazipur',
            'company_photo'=>'upload/shop.png',
        ]);
    }
}
