<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('teachers')->delete();

        $Teachers = [
            ['en' => 'Ahmed Jamal' , 'ar' => 'احمد جمال'],
        ];

        foreach ($Teachers as $Teachersitem) {
            # code...
            Teacher::create([
                'Name' =>$Teachersitem,
                'Email' => 'teachers@gmail.com',
                'Password' => '147258369',
                'Specialization_id' => 1,
                'Gender_id' =>  1,
                'Joining_Date' =>date('2019-01-01'),
                'Address' => 'غزة',
            ]);
        }
    }
}
