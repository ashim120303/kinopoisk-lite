<?php
/**
 * @var \App\Kernel\View $view
 * @var array<\App\Models\Movie> $movies
 */
$view->component('header', [
    'bootstrap' => '../../assets/css/bootstrap.min.css',
    'app' => '../../assets/css/app.css',
    'js' => '../../assets/js/color-modes.js',
]);
?>
<main>
    <div class="container">
        <h3 class="mt-3">Новинки</h3>
        <hr>
        <div class="movies">
            <?php
            foreach ($movies as $movie) {
                $view->component('movie', ['movie' => $movie]);
            }
            ?>
        </div>
    </div>
</main>
<?php $view->component('footer'); ?>
