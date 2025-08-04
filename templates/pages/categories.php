<?php
/**
 * @var \App\Kernel\View $view
 */
$view->component('header');
?>
<main>
    <div class="container">
        <h3 class="mt-3">Жанры</h3>
        <hr>
        <div class="movies">
            <a href="movie.html" class="card text-decoration-none movies__item">
                <img src="https://avatars.mds.yandex.net/get-kinopoisk-image/1773646/21324634-7afd-4443-8ac4-5c4097ac5b6c/600x900" height="200px" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Комедия</h5>
                    <p class="card-text">Фильмов <span class="badge bg-info warn__badge">10</span></p>
                </div>
            </a>
        </div>
    </div>
</main>
<?php $view->component('footer'); ?>