<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Welcome Home</h1>
        <p>You are logged in!</p>
        <p>Name: {{ $user->name }}</p>
        <p>Phone: {{ $user->phone }}</p>
    </div>
</body>

</html>
