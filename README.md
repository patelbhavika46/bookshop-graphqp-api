# Bookshop graphql API Project

## Overview

This is a Symfony project that provides [brief description of what your project does].

## Requirements

Before you start, make sure you have the following installed:

- PHP 7.4 or higher
- Composer
- Symfony CLI (optional, but recommended for development)
- Database (e.g., MySQL, PostgreSQL)

## Installation

Follow these steps to set up the project:

1. **Clone the repository:**

```bash
   git clone https://github.com/patelbhavika46/bookshop-graphqp-api.git
   cd bookshop-graphqp-api
```

2. **Install Composer:**
```bash
composer install
```

3. **Set up your environment variables:**
add your database credentials or other environment variables.
```dotenv
DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"
```

4. **Create the database (if necessary):**
```bash
symfony console doctrine:database:create
```

5. **Start Docker (Optional):**
start docker with below command:
```bash
docker-compose up -d
```
stop docker with below command:
```bash
docker-compose down 
```

6. **Run migrations:**
```bash 
symfony console doctrine:migrations:migrate
```

7. **Start the Symfony server (optional):**
```bash
symfony server:start
```

8. **Clear Cache (if needed):**
```bash
symfony console cache:clear 
		 or
php bin/console cache:clear
```

9. **Testing GraphQL API**
reference queries to test api

[GraphQL API Documentation](docs/graphql.md)