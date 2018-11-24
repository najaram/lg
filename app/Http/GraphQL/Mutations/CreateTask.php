<?php

namespace App\Http\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Auth;

class CreateTask
{
    public function resolve($rootValue, array $args, $context, ResolveInfo $info)
    {
        $user = Auth::user();

        return $user->tasks()->create([
            'user_id'     => $args['userId'],
            'title'       => $args['title'],
            'description' => $args['description']
        ]);
    }
}
