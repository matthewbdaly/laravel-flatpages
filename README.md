# laravel-flatpages

[![Build Status](https://travis-ci.org/matthewbdaly/laravel-flatpages.svg?branch=master)](https://travis-ci.org/matthewbdaly/laravel-flatpages)
[![Coverage Status](https://coveralls.io/repos/github/matthewbdaly/laravel-flatpages/badge.svg?branch=master)](https://coveralls.io/github/matthewbdaly/laravel-flatpages?branch=master)

A flatpages implementation for Laravel.

Installation
------------

```bash
$ composer require matthewbdaly/laravel-flatpages
```

Usage
-----

This package includes not only a model and its associated repository and decorator, but also a controller and view for handling the request. However, it does not include a route - this is because ideally the route for the flat pages should be the very last one in your routes, since it can interfere with other routes. Unless all your flat pages will live under a certain route, you should make sure the route for this is the last one executed, otherwise you will have problems with it. Don't say I didn't warn you!

The controller lives at `Matthewbdaly\LaravelFlatpages\Http\Controllers\FlatpageController` and your route should call the `page()` method, with the path passed through as the single argument:

```php
Route::get('{path}', '\Matthewbdaly\LaravelFlatpages\Http\Controllers\FlatpageController@page');
```

Alternatively, you can use the middleware at `Matthewbdaly\LaravelFlatpages\Http\Middleware\FlatpageMiddleware`, which may be more convenient. Be aware it will run on every 404 response received.

Overriding the view
-------------------

The default view used is `flatpages::base`, but this almost certainly isn't what you want, so you'll need to create a new version in your project at `resources\views\vendor\flatpages\base`. Obviously this can extend or include other views in the usual manner.

Every flatpage object has a `template` field. This defaults to null, which will use `flatpages::base`, but you can set it to point at any other view you want to use. Your view will obviously need to use the same variables as the default one, but using this method you can create multiple views that can be used by one or more templates, meaning that part of the content can be kept in the view and part in the database. This makes the package more flexible in that you can choose which content users can manage themselves and which you can control.
