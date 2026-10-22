<?php

use App\Models\Post;

it('uses the post slug in the detail route', function () {
    $post = Post::create([
        'title' => 'Routes et contrôleurs',
        'slug' => 'routes-et-controleurs',
        'body' => 'Contenu de démonstration.',
        'is_published' => true,
        'published_at' => now(),
    ]);

    expect(route('posts.show', $post))->toBe('http://localhost:8000/posts/routes-et-controleurs');
});

it('returns a 404 for an unknown slug', function () {
    $this->get('/posts/article-inconnu')->assertNotFound();
});

it('shows posts for a valid archive year', function () {
    Post::create([
        'title' => 'Article d\'archive',
        'slug' => 'article-darchive',
        'body' => 'Contenu de démonstration.',
        'is_published' => true,
        'published_at' => '2025-02-14 08:00:00',
    ]);

    $this->get('/posts/archive/2025')->assertOk();
});
