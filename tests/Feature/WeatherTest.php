<?php

namespace Tests\Unit;

use App\Http\Controllers\AuthController;
use App\Models\User;
use Laravel\Passport\Passport;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
class WeatherTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIssueToken()
    {
        Passport::actingAs(
            User::find(1),
            ['*']
        );
        $response = $this->get('/api/v1/weather/tehran');

        $response->assertStatus(200);
    }
}
