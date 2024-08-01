<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
## Documentation pour mettre en place une search dans le blog 
Pour mettre en place un système de recherche dans Laravel pour votre blog, vous pouvez suivre ces étapes :

1. **Configuration de la base de données** :
   Assurez-vous d'avoir une table dans votre base de données qui contiendra les données que vous souhaitez rechercher. Par exemple, une table `articles` pour les articles de blog.

2. **Création du modèle** :
   Créez un modèle Eloquent pour votre table. Dans votre terminal, exécutez la commande Artisan pour générer un nouveau modèle :
   ```
   php artisan make:model Article
   ```

3. **Définition de la recherche dans le contrôleur** :
   Dans votre contrôleur (par exemple `ArticleController`), définissez une méthode pour gérer la recherche. Voici un exemple simple :

   ```php
   use App\Models\Article;
   use Illuminate\Http\Request;

   public function search(Request $request)
   {
       $query = $request->input('query');

       $articles = Article::where('title', 'LIKE', "%{$query}%")
                          ->orWhere('content', 'LIKE', "%{$query}%")
                          ->get();

       return view('search_results', compact('articles', 'query'));
   }
   ```

4. **Création de la vue de recherche** :
   Créez une vue pour afficher les résultats de recherche (`search_results.blade.php` par exemple) où vous affichez les articles trouvés.

5. **Ajout du formulaire de recherche** :
   Dans votre vue principale ou dans votre barre de navigation, ajoutez un formulaire pour soumettre une requête de recherche :
   
   ```html
   <form action="{{ route('search') }}" method="GET">
       <input type="text" name="query" placeholder="Rechercher...">
       <button type="submit">Rechercher</button>
   </form>
   ```

6. **Routes** :
   Ajoutez une route pour votre fonction de recherche dans `routes/web.php` :

   ```php
   Route::get('/search', [ArticleController::class, 'search'])->name('search');
   ```

7. **Validation (optionnel)** :
   Vous pouvez ajouter de la validation pour le champ de recherche pour gérer les cas où aucun terme n'est entré.


## Pour implémenter la fonctionnalité de commentaires sur votre blog Laravel, voici les étapes générales que vous pouvez suivre :

1. **Modèles de Données :**
   - Créez un modèle `Article` pour représenter vos articles dans la base de données.
   - Créez un modèle `Comment` pour représenter les commentaires liés à chaque article.

2. **Relations :**
   - Définissez une relation "one-to-many" entre les articles et les commentaires. Chaque article peut avoir plusieurs commentaires.

3. **Migration de la Base de Données :**
   - Créez une migration pour la table des commentaires (`comments`) qui inclut les colonnes nécessaires comme `article_id`, `user_id` (si vous avez un système d'utilisateurs), `content`, etc.

4. **Contrôleur :**
   - Créez un contrôleur pour gérer les actions liées aux commentaires. Vous aurez probablement des méthodes pour afficher les commentaires d'un article spécifique, ajouter un nouveau commentaire, etc.

5. **Routes :**
   - Définissez les routes nécessaires dans votre fichier `web.php` pour gérer les actions liées aux commentaires comme l'affichage et l'ajout de commentaires.

6. **Vues :**
   - Créez les vues nécessaires pour afficher les commentaires sous chaque article et pour permettre aux utilisateurs d'ajouter de nouveaux commentaires.
   - Vous aurez besoin d'une vue pour afficher tous les commentaires d'un article particulier lorsque l'utilisateur clique sur l'article pour voir les détails complets.

7. **Formulaire de Commentaire :**
   - Créez un formulaire dans la vue de détails de l'article (`show.blade.php` par exemple) pour permettre aux utilisateurs de soumettre de nouveaux commentaires.
   - Le formulaire doit être soumis à une route qui gère l'ajout de commentaires.

8. **Traitement des Commentaires :**
   - Dans votre contrôleur, créez une méthode pour traiter le formulaire de commentaire et enregistrer le nouveau commentaire dans la base de données.

9. **Affichage des Commentaires :**
   - Dans la vue d'affichage des détails de l'article, itérez sur la liste des commentaires associés à cet article et affichez-les.

Voici un exemple simplifié de ce à quoi cela pourrait ressembler en termes de code :

**Modèle `Article` :**
```php
class Article extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
```

**Modèle `Comment` :**
```php
class Comment extends Model
{
    protected $fillable = ['user_id', 'article_id', 'content'];
    
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
```

**Contrôleur pour les Commentaires :**
```php
class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);
        
        $article->comments()->create([
            'user_id' => auth()->id(), // Si vous avez un système d'authentification
            'content' => $validatedData['content'],
        ]);
        
        return back()->with('success', 'Commentaire ajouté avec succès.');
    }
}
```

**Vue `show.blade.php` (Détails de l'Article) :**
```php
<h1>{{ $article->title }}</h1>
<p>{{ $article->content }}</p>

<!-- Affichage des commentaires -->
@if($article->comments->count() > 0)
    <h2>Commentaires</h2>
    <ul>
        @foreach($article->comments as $comment)
            <li>{{ $comment->content }}</li>
        @endforeach
    </ul>
@endif

<!-- Formulaire pour ajouter un commentaire -->
<form action="{{ route('comments.store', $article->id) }}" method="POST">
    @csrf
    <textarea name="content" rows="4" cols="50" placeholder="Votre commentaire"></textarea>
    <button type="submit">Ajouter un commentaire</button>
</form>
```
 
## Pour ajouter une fonctionnalité de "like" aux commentaires dans votre application Laravel, vous pouvez suivre ces étapes :

1. **Modèle de Données :**
   - Créez un modèle `Like` pour représenter les likes liés à chaque commentaire.

2. **Relations :**
   - Définissez une relation "one-to-many" entre les commentaires et les likes. Chaque commentaire peut avoir plusieurs likes.

3. **Migration de la Base de Données :**
   - Créez une migration pour la table des likes (`likes`) qui inclut les colonnes nécessaires comme `comment_id`, `user_id`, etc.

4. **Contrôleur :**
   - Créez un contrôleur pour gérer les actions liées aux likes, comme l'ajout d'un like à un commentaire.

5. **Routes :**
   - Définissez les routes nécessaires dans votre fichier `web.php` pour gérer les actions liées aux likes, comme l'ajout et la suppression de likes.

6. **Vues :**
   - Modifiez vos vues pour inclure des boutons de "like" à côté de chaque commentaire et afficher le nombre de likes.

7. **Traitement des Likes :**
   - Dans votre contrôleur, créez des méthodes pour ajouter et retirer des likes.

Voici un exemple de code pour chacune de ces étapes :

**Modèle `Like` :**
```php
class Like extends Model
{
    protected $fillable = ['user_id', 'comment_id'];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
```

**Modèle `Comment` avec la relation `likes` :**
```php
class Comment extends Model
{
    protected $fillable = ['user_id', 'article_id', 'content'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
```

**Migration pour la table `likes` :**
```php
public function up()
{
    Schema::create('likes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('comment_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('likes');
}
```

**Contrôleur `LikeController` :**
```php
class LikeController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        $comment->likes()->create([
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Commentaire aimé avec succès.');
    }

    public function destroy(Comment $comment)
    {
        $comment->likes()->where('user_id', auth()->id())->delete();

        return back()->with('success', 'Like retiré avec succès.');
    }
}
```

**Routes dans `web.php` :**
```php
use App\Http\Controllers\LikeController;

Route::post('/comments/{comment}/likes', [LikeController::class, 'store'])->name('likes.store');
Route::delete('/comments/{comment}/likes', [LikeController::class, 'destroy'])->name('likes.destroy');
```

**Vue `show.blade.php` (Détails de l'Article) avec les boutons de "like" :**
```php
<h1>{{ $article->title }}</h1>
<p>{{ $article->content }}</p>

<!-- Affichage des commentaires -->
@if($article->comments->count() > 0)
    <h2>Commentaires</h2>
    <ul>
        @foreach($article->comments as $comment)
            <li>
                {{ $comment->content }}
                <div>
                    <!-- Bouton pour liker le commentaire -->
                    @if($comment->likes->contains('user_id', auth()->id()))
                        <form action="{{ route('likes.destroy', $comment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Unlike</button>
                        </form>
                    @else
                        <form action="{{ route('likes.store', $comment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Like</button>
                        </form>
                    @endif
                    <!-- Afficher le nombre de likes -->
                    <span>{{ $comment->likes->count() }} likes</span>
                </div>
            </li>
        @endforeach
    </ul>
@endif

<!-- Formulaire pour ajouter un commentaire -->
<form action="{{ route('comments.store', $article->id) }}" method="POST">
    @csrf
    <textarea name="content" rows="4" cols="50" placeholder="Votre commentaire"></textarea>
    <button type="submit">Ajouter un commentaire</button>
</<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Dashboard</a>
            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
          <span class="absolute -inset-1.5"></span>
          <span class="sr-only">View notifications</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
          </svg>
        </button>

        <!-- Profile dropdown -->
        <div class="relative ml-3">
          <div>
            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </button>
          </div>

          <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->
          <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Dashboard</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
    </div>
  </div>
</nav>

## Navbar 

Voici un exemple de navbar simple et réactive (responsive) en utilisant Tailwind CSS. Cette navbar contient un logo et quelques liens de navigation. Elle inclut également un menu burger pour les écrans mobiles.

1. **Installez Tailwind CSS dans votre projet Laravel (si ce n'est pas déjà fait) en suivant les étapes précédentes.**

2. **Créez la structure HTML de la navbar dans votre fichier Blade (par exemple, `resources/views/navbar.blade.php`) :**

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <a href="#" class="text-white text-lg font-bold">Logo</a>
            <div class="hidden md:flex space-x-4">
                <a href="#" class="text-gray-300 hover:text-white">Home</a>
                <a href="#" class="text-gray-300 hover:text-white">About</a>
                <a href="#" class="text-gray-300 hover:text-white">Services</a>
                <a href="#" class="text-gray-300 hover:text-white">Contact</a>
            </div>
            <div class="md:hidden">
                <button id="menu-btn" class="text-gray-300 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="menu" class="hidden md:hidden mt-2 space-y-2">
            <a href="#" class="block text-gray-300 hover:text-white">Home</a>
            <a href="#" class="block text-gray-300 hover:text-white">About</a>
            <a href="#" class="block text-gray-300 hover:text-white">Services</a>
            <a href="#" class="block text-gray-300 hover:text-white">Contact</a>
        </div>
    </nav>
    <script>
        document.getElementById('menu-btn').addEventListener('click', function() {
            document.getElementById('menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
```

3. **Ajoutez le CSS Tailwind dans votre fichier `resources/css/app.css` :**

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

4. **Compilez vos assets avec Laravel Mix en exécutant la commande suivante :**

```bash
npm run dev
```

Ce code crée une navbar avec un menu burger pour les écrans mobiles. Les classes Tailwind CSS utilisées facilitent le style et la réactivité. Vous pouvez ajuster les couleurs, les espacements et d'autres styles en fonction de vos besoins.

