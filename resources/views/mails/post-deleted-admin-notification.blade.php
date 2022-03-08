<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h2>Un post è stato eliminato</h2>
    <div>Titolo: {{ $deleted_post_title }}</div>
    <div>Per vedere tutti i post <a href="{{ route('admin.posts.index') }}">clicca qui</a>.</div>

</body>
</html>