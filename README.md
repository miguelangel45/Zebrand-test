# Zebrand Test

This project contains an example of a simple API of products, which sends a notification email to admins when a product
is changed by other admin

## Run Locally

You should have a Mysql database to run this project

Clone the project

```bash
  git clone https://link-to-project
```

Go to the project directory

```bash
  cd my-project
```

Install dependencies

```bash
  composer install
```

Modify the .env file with the database credentials and SMTP service (I used [mailtrap](https://mailtrap.io/) to create a
fake mailbox to test the notifications)

Start the server

```bash
  php artisan serve
```

## Dockerization

This project contains a docker-compose file to make easier the deployment in local environments

to run this with docker you must have installed [Docker](https://docs.docker.com/) on your machine

To deploy run the following command
``` bash
docker-compose up
```

this will install all the dependencies and serves the application instantly

## API Reference

To see the api reference of this project

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
