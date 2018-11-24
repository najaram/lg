<?php


namespace Tests\Feature\GraphQL;

use Tests\TestCase;

abstract class GraphQLTestCase extends TestCase
{
    protected $mutations;

    protected $queries;

    protected function setUp()
    {
        parent::setUp();

        $this->mutations = include(__DIR__ . '/fixtures/mutations.php');
        $this->queries = include(__DIR__ . '/fixtures/queries.php');
    }

    public function sendMutation($query, $variables = [])
    {
        return $this->postJson('/graphql', [
            'query'     => $this->mutations[$query],
            'variables' => $variables
        ]);
    }

    public function sendQuery($query, $variables = [])
    {
        return $this->postJson('/graphql', [
            'query'     => $this->queries[$query],
            'variables' => $variables
        ]);
    }
}
