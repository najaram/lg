<?php

namespace Tests\Feature\GraphQL\Query;

use App\Task;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Feature\GraphQL\GraphQLTestCase;

class ViewTaskTest extends GraphQLTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_view_a_task()
    {
        $user = factory(User::class)->create(['name' => 'John Doe', 'email' => 'john@example.com']);
        $task = factory(Task::class)->create([
            'user_id'     => $user->id,
            'title'       => 'Example title',
            'description' => 'Example description'
        ]);

        $response = $this->actingAs($user, 'api')
            ->sendQuery('task', [
                'id' => $task->id
            ]);

        $response->assertJson([
            'data' => [
                'task' => [
                    'title'       => 'Example title',
                    'description' => 'Example description',
                    'user'        => [
                        'name'  => 'John Doe',
                        'email' => 'john@example.com'
                    ]
                ]
            ]
        ]);
    }
}
