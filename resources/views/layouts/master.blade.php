<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title','Mon blog Laravel')</title>
</head>

<body>
    <header>
        <h1>Mon Blog Laravel </h1>
        <nav>
            <ul>
                <li><a href="/contact-us">Contact</a></li>
                <li><a href="/about">A propos</a></li>
                <li><a href="/articles">Articles</a></li>
            </ul>
        </nav>
    </header>

    <!-- Le contenues de toutes les pages ici -->
    @yield('contenu')
    <!-- Le contenues de toutes les pages ici -->
</body>

</html>