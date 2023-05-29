<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        $this->call(BloodTableSeeder::class);
        $this->call(NationalitieTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(SpecializationTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(GradeTableSeeder::class);
        $this->call(ClassroomTableSeeder::class);
        $this->call(SectionTableSeeder::class);
        $this->call(ParentsTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
