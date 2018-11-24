## Lg

A simple implementation of GraphQL in Laravel

Queries:
```graphql
query {
  user(id: 1) {
    name
    email
  }
}
```
Result:

```graphql
{
  "data": {
    "user": {
      "name": "John Doe",
      "email": "john@e.com"
    }
  }
}

```

Mutations
```graphql
mutation {
  createTask(title: "Example task", description: "Example description") {
    title
    description
    user {
      id
      name
      email
    }
  }
}
```

Result:
```graphql
{
  "data": {
    "createTask": {
      "title": "Example task",
      "description": "Example description",
      "user": {
        "id": "1",
        "name": "John Doe",
        "email": "john@e.com"
      }
    }
  }
}
```


