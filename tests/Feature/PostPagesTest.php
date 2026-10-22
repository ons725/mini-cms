
<?php

use App\Models\Post;

test('la liste affiche un article', function () {
    $post = Post::create([
        'title' => 'Mon article de test',
        'slug' => 'mon-article-de-test',
        'body' => 'Voici le contenu de mon article de test.',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $this->get('/posts')
        ->assertOk()
        ->assertSee($post->title);
});

test('la liste vide affiche un message', function () {
    $this->get('/posts')
        ->assertOk()
        ->assertSee('Aucun article');
});

test('le détail affiche un article', function () {
    $post = Post::create([
        'title' => 'Article detail',
        'slug' => 'article-detail',
        'body' => 'Contenu suffisamment long pour le test.',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $this->get(route('posts.show', $post))
        ->assertOk()
        ->assertSee($post->title)
        ->assertSee($post->body);
});

test('un article inconnu retourne une erreur 404', function () {
    $this->get('/posts/slug-inexistant')
        ->assertNotFound();
});

test('le formulaire de creation est accessible', function () {
    $this->get(route('posts.create'))
        ->assertOk()
        ->assertSee('title')
        ->assertSee('slug');
});
