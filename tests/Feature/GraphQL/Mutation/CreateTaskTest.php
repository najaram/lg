<?php

namespace Tests\Feature\GraphQL\Mutation;

use App\Task;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Feature\GraphQL\GraphQLTestCase;

class CreateTaskTest extends GraphQLTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_create_a_task()
    {
        $user = factory(User::class)->create([
            'name'  => 'John Doe',
            'email' => 'john@example.com'
        ]);

        $response = $this->actingAs($user, 'api')
            ->sendMutation('createTask', [
                'title'       => 'Example title',
                'description' => 'Example description'
            ]);

        $response->assertJson([
            'data' => [
                'createTask' => [
                    'title'       => 'Example title',
                    'description' => 'Example description',
                    'user'        => [
                        'name'  => 'John Doe',
                        'email' => 'john@example.com'
                    ]
                ]
            ]
        ]);
        tap(Task::latest('id')->first(), function ($task) {
            $this->assertEquals('Example title', $task->title);
            $this->assertEquals('Example description', $task->description);
        });
    }
}
