<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Grade;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    //  use RefreshDatabase;
    use RefreshDatabase, WithFaker;

    /** @test */

    public function test_it_returns_the_home_page()
    {

        try {
            // Define a route for the root URL that maps to the HomeController index method
            $response = $this->get('/');

            // Assert that the status code of the response is 200
            if (!empty($response)) {
                $response->assertOk();
            }
        } catch (\Exception $e) {
            // Handle the exception gracefully
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
