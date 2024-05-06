# Zebrand Test

This project contains an example of a simple API of products, which sends a notification email to admins when a product
is changed by other admin

## Run Locally

You should have a Mysql database to run this project

Clone the project

```bash
  git clone https://github.com/miguelangel45/Zebrand-test
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

To see the api reference of this project you can open this url on your browser when you have the service up and running

[http://localhost:5173/idoc](http://localhost:5173/idoc)

replace the port if you needed

### Note about email notification

To run successfully the email notification process, you must run the following command on a terminal (if you use docker
to deploy, inside the container where the code is allocated) 

```bash
    php artisan queue:work
```

this command will continue to run until its manually stopped or the terminal closes.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
