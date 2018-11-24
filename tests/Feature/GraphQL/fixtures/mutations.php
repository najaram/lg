<?php

return [
    'createUser' => '
        mutation createUser($name: String, $email: String, $password: String) {
            createUser(name: $name, email: $email, password: $password) {
                name
                email
            }
        }
    ',

    'createTask' => '
        mutation createTask($title: String, $description: String) {
            createTask(title: $title, description: $description) {
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
