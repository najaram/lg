<?php

return [
    'task' => '
        query task($id: ID!) {
            task(id: $id) {
                title
                description
                user {
                    name
                    email
                }
            }
        }
    '
];
