
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', [PageController::class, 'home'])->name('home');

// Dashboard : utilisateur connecté et vérifié
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Archive des articles publiés
Route::get('/posts/archive/{year}', [PostController::class, 'archive'])
    ->whereNumber('year')
    ->name('posts.archive');

// Articles publics : consulter la liste et lire un article
Route::resource('posts', PostController::class)
    ->only(['index', 'show']);

// Gestion des articles : administrateur uniquement
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('posts', PostController::class)
        ->except(['index', 'show']);
});

// Gestion du profil : utilisateur connecté uniquement
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
