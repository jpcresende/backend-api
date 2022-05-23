Laminas API Tools Skeleton Application
======================================

Requirements
------------

Please see the [composer.json](composer.json) file.

Installation
------------

### Via Git (clone)

First, clone the repository:

```bash
# git clone git@github.com:jpcresende/backend-api.git # optionally, specify the directory in which to clone
$ cd path/to/install
```

At this point, you need to use [Composer](https://getcomposer.org/) to install
dependencies. Assuming you already have Composer:

```bash
$ composer install
```

### All methods

Once you have the basic installation, you need to put it in development mode:

```bash
$ cd path/to/install
$ composer development-enable
```

Now, fire it up! Do one of the following:

- Create a vhost in your web server that points the DocumentRoot to the
  `public/` directory of the project
- Fire up the built-in web server in PHP(**note**: do not use this for
  production!)

In the latter case, do the following:

```bash
$ cd path/to/install
$ php -S 0.0.0.0:8080 -ddisplay_errors=0 -t public public/index.php
# OR use the composer alias:
$ composer serve
```

You can then visit the site at http://localhost:8080/ - which will bring up a
welcome page and the ability to visit the dashboard in order to create and
inspect your APIs.

### Docker

If you develop or deploy using Docker, we provide configuration for you.

Prepare your development environment using [docker compose](https://docs.docker.com/compose/install/):

```bash
$ git clone git@github.com:jpcresende/backend-api.git
$ cd backend-api
$ docker-compose build
# Install dependencies via composer, if you haven't already:
$ docker-compose run api-tools composer install
# Enable development mode:
$ docker-compose run api-tools composer development-enable
```

Start the container:

```bash
$ docker-compose up
```

Access Laminas API Tools from `http://localhost:8080/` or `http://<boot2docker ip>:8080/` if on Windows or Mac.

You may also use the provided `Dockerfile` directly if desired.

Once installed, you can use the container to update dependencies:

```bash
$ docker-compose run api-tools composer update
```

Or to manipulate development mode:

```bash
$ docker-compose run api-tools composer development-enable
$ docker-compose run api-tools composer development-disable
$ docker-compose run api-tools composer development-status
```
