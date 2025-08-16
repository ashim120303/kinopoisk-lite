<?php
/**
 * @var \App\Kernel\View $view
 * @var array<\App\Models\Category> $categories
 */
$view->component('header');
?>
<main>
    <div class="container">
        <h3 class="mt-3">Жанры</h3>
        <hr>
        <div class="movies">
            <?php foreach($categories as $category) { ?>
                <a href="/categories/movies?id=<?= $category->getId(); ?>" class="card text-decoration-none movies__item">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $category->getName() ?></h5>
                        <p class="card-text">
                            Фильмов
                            <span class="badge bg-info warn__badge"><?= $category->getMoviesCount(); ?></span>
                        </p>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</main>
<?php $view->component('footer'); ?>