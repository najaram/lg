<?php

namespace Tests\Feature\GraphQL\Mutation;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Feature\GraphQL\GraphQLTestCase;

class CreateUserTest extends GraphQLTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function can_create_a_user()
    {
        $response = $this->sendMutation('createUser', [
            'name'     => 'John Doe',
            'email'    => 'john@example.com',
            'password' => 'secret'
        ]);

        $response->assertJson([
            'data' => [
                'createUser' => [
                    'name'  => 'John Doe',
                    'email' => 'john@example.com'
                ]
            ]
        ]);
        tap(User::latest('id')->first(), function ($user) {
            $this->assertEquals('John Doe', $user->name);
            $this->assertEquals('john@example.com', $user->email);
        });
    }
}
