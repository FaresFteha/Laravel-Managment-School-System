<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use App\Models\Grade;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\Grades\GradeController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GradeTest extends TestCase
{

    // use RefreshDatabase, WithFaker;

    // public function testGradeCreation()
    // {
    //     $data = [
    //         'name_en' => 'English Grade Name',
    //         'name' => 'Arabic Grade Name',
    //         'notes_en' => 'English Grade Notes',
    //         'notes' => 'Arabic Grade Notes',
    //         'created_at' => '2023-04-27 12:36:00',
    //         'updated_at' =>  '2023-04-27 12:36:00',

    //     ];

    //     // Mock the request object with validated data
    //     $request = \Mockery::mock(\Illuminate\Http\Request::class);
    //     $request->shouldReceive('validated')->once()->andReturn($data);


    //     // Check if the grade was actually created in the database
    //     $this->assertDatabaseHas('grades', [
    //         'name' => '{"en":"English Grade Name","ar":"Arabic Grade Name"}',
    //         'notes' => '{"en":"English Grade Notes","ar":"Arabic Grade Notes"}',
    //         'created_at' => '2023-04-27 12:36:00',
    //         'updated_at' =>  '2023-04-27 12:36:00',
    //     ]);
    // }
    // public function testGradeUpdate()
    // {
    //     // Create a new grade in the database
    //     $grade = Grade::factory()->create();

    //     // Prepare some sample input data to update the grade
    //     $data = [
    //         'id' => $grade->id,
    //         'name_en' => 'New English Grade Name',
    //         'name' => 'New Arabic Grade Name',
    //         'notes_en' => 'New English Grade Notes',
    //         'notes' => 'New Arabic Grade Notes',
    //         'created_at' => '2023-04-27 12:36:00',
    //         'updated_at' =>  '2023-04-27 12:36:00',
    //     ];

    //     // Mock the request object with validated data
    //     $request = \Mockery::mock(\Illuminate\Http\Request::class);
    //     $request->shouldReceive('validated')->once()->andReturn($data);

    //     // Check if the grade was actually updated in the database
    //     $this->assertDatabaseHas('grades', [
    //         'id' => $grade->id,
    //         'name' => '{"en":"New English Grade Name","ar":"New Arabic Grade Name"}',
    //         'notes' => '{"en":"New English Grade Notes","ar":"New Arabic Grade Notes"}',
    //         'created_at' => '2023-04-27 12:36:00',
    //         'updated_at' =>  '2023-04-27 12:36:00',
    //     ]);
    // }
}
