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

The controller lives at `Matthewbdaly\LaravelFlatpages\Http\Controllers\FlatpageController` and your route should call the `page()` method, with the path passed through as the single argument.

Overriding the view
-------------------

The view used is `flatpages::base`, but this almost certainly isn't what you want, so you'll need to create a new version in your project at `resources\views\vendor\flatpages\base`. Obviously this can extend or include other views in the usual manner.
