<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('cdn');
    <title>Document</title>
</head>
<body>
    @if (session('error_message'))
        <div class="alert alert-danger">
            {{ session('error_message') }}
        </div>
    @endif
    <h2 class="mx-4">Login</h2>
    <form method="post" action="user">
        @csrf
        <label class="mx-4" for="username">Username:</label>
        <input type="email" id="username" name="username" required>
        <br>
        <label class="mx-4" for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button class="mx-4" class="btn btn-success" type="submit">Login</button>
    </form>
</body>
</html>
