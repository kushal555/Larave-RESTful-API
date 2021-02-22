<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /** @test */
    public function tetsRequiredFieldsForRegistration(){

        $this->json('POST','api/v1/user/register',['Accept' => 'application/json'])
        ->assertStatus(422)
        ->assertJson([
            "errors"    =>  [
                    "name"  => ["The name field is required."],
                    "email" => ["The email field is required."],
                    "password"  => ["The password field is required."]
            ]
        ]);
    }
}
