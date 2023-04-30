# Internations 
Task: User management system We have designed a coding task that is intentionally vague and open-ended in its specification so that you have the opportunity to take it in almost any direction you wish.

- Candidate: Fernando Giroto
- Technical Test: Backend Engineer at InterNations

## Stories
• As an admin | can add users - a user has a name.
• As an admin I can delete users
• As an admin I can assign users to a group they aren't already part of As an admin I can remove users from a group.
• As an admin | can create groups
• As an admin I can delete groups when they no longer have members Artifacts
• Please implement the design using a modern PHP framework. Bonus points if that happens to
be Symfony. Focus equally on software design and code.
• Show me a small domain model for the processes above (in UML or anything else) • Show me a database model.
• Design a convenient API that other developers would love to use for the tasks above.

## Installation

Edit .ENV

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=databasename
DB_USERNAME=username
DB_PASSWORD=password
```

Install the dependencies and devDependencies and start the server.

```sh
npm install
composer install
```

** In case of an error when running npm install, run the code in the terminal in the project folder and run npm install again:

```sh
export NODE_OPTIONS=--openssl-legacy-provider
```

## Run Project

```sh
php artisan migragre
php artisan jwt:secret
npm run dev
php artisan serve
```

## Development

```sh
http://127.0.0.1:8000
```

## License
```sh
Fernando Giroto
www.fernandogiroto.com
Internations
```

