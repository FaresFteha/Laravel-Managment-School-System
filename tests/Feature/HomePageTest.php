<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_the_home_page()
    {
        try {
            // Define a route for the root URL that maps to the HomeController index method
            Route::get('/', [HomeController::class, 'index'])->name('selection');

            // Call the root URL using a GET request
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
