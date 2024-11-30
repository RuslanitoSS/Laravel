<!DOCTYPE html>
<html>
<head>
    <title>Новая статья</title>
</head>
<body>
    <h1>Новая статья опубликована!</h1>
    <p><strong>Название:</strong> {{ $article->name }}</p>
    <p><strong>Описание:</strong> {{ $article->desc }}</p>
    <p><strong>Дата публикации:</strong> {{ $article->date }}</p>
</body>
</html>
