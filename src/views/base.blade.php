<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <meta name="theme-color" content="#1565C0">
        <link href="{{ elixir('css/app.min.css') }}" rel="stylesheet" type="text/css">
        <title>{{ flatpage.title }}</title>
    </head>
    <body>
        <h1>{{ flatpage.title }}</h1>
        {{ flatpage.content }}
    </body>
</html>
