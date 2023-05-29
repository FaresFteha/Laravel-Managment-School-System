<?php

namespace Database\Seeders;

use App\Models\Type_Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('type__bloods')->delete();
        //حطيتها بالاول عشان كل مرة دعمل سيد اكلو احذف سيد القديم ونفذلي الجديد

        $Types = ['O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];

        foreach ($Types as $Typesitms) {
            # code...
            Type_Blood::create(['Type_Blood'=>$Typesitms]);
        }
    }
}
