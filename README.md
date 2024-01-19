## Get Started

This guide will walk you through the steps needed to get this project up and running on your local machine.

### Prerequisites

Before you begin, ensure you have the following installed:

- Docker
- Docker Compose

### Building the Docker Environment

Build and start the containers:

```
docker-compose up -d --build
```

### Installing Dependencies

```
docker-compose exec app sh
composer install
```

### Database Setup

Set up the database. This typically involves running migrations and possibly seeding the database:

```
bin/cake migrations migrate
bin/cake migrations seed --seed MainSeed
```

### Accessing the Application

The application should now be accessible at http://localhost:34251

## Articles API Usage

This document provides examples of curl commands to interact with the Articles API. The API supports standard CRUD (Create, Read, Update, Delete) operations on article resources.

### All URLs referenced in the documentation have the following base:

```
http://localhost:34251
```

### Retrieve All Articles (GET)

To get a list of all articles, send a GET request to /articles.json.

Example:

```
curl -X GET http://localhost:34251/articles.json
```

### Retrieve a Single Article (GET)

To get a specific article by its ID, send a GET request to /articles/{id}.json, replacing {id} with the article ID.

Example:

```
curl -X GET http://localhost:34251/articles/1.json
```

### Create an Article (POST)

To create a new article, send a POST request to /articles.json. Include the article details in the request body as JSON.

Example:

```
curl -X POST http://localhost:34251/articles.json \
     -H "Content-Type: application/json" \
     -d '{
           "title": "Example Article Title",
           "slug": "example-article-title",
           "body": "This is the body of the article."
         }'
```

### Update an Article (PUT)

To update an existing article, send a PUT request to /articles/{id}.json, replacing {id} with the article ID. Include the article details to be updated in the request body as JSON.

Example:

```
curl -X PUT http://localhost:34251/articles/1.json \
     -H "Content-Type: application/json" \
     -d '{
           "title": "Updated Article Title",
           "body": "This is the updated body of the article."
         }'
```

### Delete an Article (DELETE)

To delete an article, send a DELETE request to /articles/{id}.json, replacing {id} with the article ID.

Example:

```
curl -X DELETE http://localhost:34251/articles/1.json
```
