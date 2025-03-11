# GraphQL API Documentation

## Authors
#### Query: Get All Authors
```graphql
query GetAuthors {
  authors {
    edges {
      node {
        id
        firstName
        lastName
        books {
          edges {
            node {
              id
            }
          }
        }
      }
    }
  }
}
```
#### Query: Create Author
```graphql
mutation CreateAuthor($firstName: String!, $lastName: String!) {
  createAuthor(input: {firstName: $firstName, lastName: $lastName}) {
    clientMutationId
    author {
      firstName
      lastName
    }
  }
}
```
```variables
{
  "firstName": "John",
  "lastName": "Doe"
}
```
#### Query: Update Author
graphqp```
mutation UpdateAuthor($id: ID!, $firstName: String!, $lastName: String!, $clientMutationId: String!) {
  updateAuthor(input: {id: $id, firstName: $firstName, lastName: $lastName, clientMutationId: $clientMutationId}) {
    clientMutationId
    author {
      id
      firstName
      lastName
    }
  }
}
```
```variables
{
  "id": "/api/authors/1",
  "firstName": "shaun",
  "lastName": "Doe",
  "clientMutationId": "123456"
}
```
#### Query: Delete Author
```graphql
mutation DeleteAuthor($id: ID!) {
  deleteAuthor(input: {id: $id}) {
    clientMutationId
  }
}
```
```variables
{
  "id": "/api/authors/2"
}
```
## Customer
#### Query: Get Customers
```graphql
query GetCustomer {
  customers {
    edges {
      node {
        id
        firstName
        lastName
        purchases {
          edges {
            node {
              id
            }
          }
        }
      }
    }
  }
}
```
#### Query: Create Customer
```graphql
mutation CreateCustomer($firstName: String!, $lastName: String!) {
  createCustomer(input: {firstName: $firstName, lastName: $lastName}) {
    clientMutationId
    customer {
      firstName
      lastName
    }
  }
}
```
```variables
{
  "firstName": "Alex",
  "lastName": "Doe"
}
```