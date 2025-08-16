<?php
/**
 * @var \App\Kernel\View $view
 * @var array<\App\Models\Movie> $movies
 */
$view->component('header');
?>
    <main>
        <div class="container">
            <h3 class="mt-3">Лучшие фильмы</h3>
            <hr>
            <div class="movies">
                <?php foreach ($movies as $movie): ?>
                    <?php $view->component('movie', ['movie' => $movie]); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
<?php $view->component('footer'); ?>