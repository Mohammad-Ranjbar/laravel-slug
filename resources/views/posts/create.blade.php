<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Laravel</title>
</head>

<body>


<form action="/posts" method="post">

    {{csrf_field()}}
    <fieldset>

    <legend>Create Post</legend>

    <div class="form-group">
        <label for="title"></label>
        <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">

    </div>

    <div class="form-group">
        <label for="body"></label>
        <input type="text" class="form-control" name="body" id="body" value="{{old('body')}}">

    </div>

        <button type="submit" class="btn btn-primary">create post</button>

    </fieldset>

</form>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>






</body>

</html>
