<?php
/**
 * @var \App\Kernel\View $view
 * @var array<\App\Models\Movie> $movies
 */
$view->component('header');
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
