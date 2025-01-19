<x-mail::message>
    # Статистика

    Количество просмотров статей {{ $article_count }}
    Количество новых комментариев {{ $comment_count }}

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
