<?php
/**
 * @var \App\Kernel\Storage\Storage $storage
 * @var \App\Models\Movie $movie
 */
?>

<a href="/movie?id=<?php echo $movie->getId(); ?>" class="card text-decoration-none movies__item">
    <img src="<?php echo $storage->url($movie->getPreview()); ?>" height="200px" class="card-img-top" alt="<?php echo $movie->getName(); ?>">
    <div class="card-body">
        <h5 class="card-title"><?php echo $movie->getName(); ?></h5>
        <p class="card-text">Оценка <span class="badge bg-warning warn__badge"><?php echo $movie->avgRating()?></span></p>
        <p class="card-text"><?php echo $movie->getDescription(); ?></p>
    </div>
</a>