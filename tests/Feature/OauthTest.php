<?php

namespace Tests\Unit;

use App\Http\Controllers\AuthController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
class OauthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIssueToken()
    {
         $body = [
            'client_id'     =>     1,
            'grant_type'     =>     'password',
            'client_secret'     =>     '1fCgDfNkhTcspQu8JGfAKAdv4Bi3tP8xb9z37j8x',
            'scope'     =>     '*',
            'username'     =>     'sefer@zon.com',
            'password'     =>     'sefer@zone',
        ];

        $this->json('POST','/api/v1/oauth/token',$body,['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure(['token_type','expires_in','access_token','refresh_token']);
    }
}
