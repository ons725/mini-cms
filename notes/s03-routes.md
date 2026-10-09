
# Session 03 - Routes, contrôleurs et layout

## Défi

URL produite par route('about') :

http://localhost:8000/a-propos

URL produite par route('posts.show', 'routes-et-controleurs') :

http://localhost:8000/posts/routes-et-controleurs

URL produite par route('posts.archive', 2025) :

http://localhost:8000/posts/archive/2025

Pourquoi /posts/archive/abc et /posts/article-inconnu répondent toutes deux 404, et quelle ligne de code en est responsable dans chaque cas ?

- /posts/archive/abc : la contrainte ->whereNumber('year') rejette la valeur non numérique.
- /posts/article-inconnu : la méthode show() utilise abort(404) lorsque le slug n'existe pas.

Que se passe-t-il si une vue appelle route('posts.show') sans paramètre ?

Laravel renvoie une erreur Missing required parameter, car la route posts.show exige le paramètre slug.