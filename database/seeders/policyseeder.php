<?php

namespace Database\Seeders;

use App\Models\policysettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class policyseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policys= [
            [
                 'privacy_policy'=>"test plicy",
                 'terms_conditions'=>"terms_conditions",
                 'refund_policy'=>"refund_policy",
                 'payment_plicy'=>"payment_plicy",
                 'about_us'=>"about_us",
            ]
        ];
        policysettings::insert($policys);
    }
}
