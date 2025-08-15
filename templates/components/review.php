<?php
/**
 * @var \App\Models\Review $review
 */
?>
<div class="card">
    <div class="card-header">
        Пользователь: <?php echo $review->getUser()->getName(); ?>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p><?php echo $review->getReview() ?></p>
            <footer class="blockquote-footer">Оценка <span class="badge bg-warning warn__badge"><?php echo $review->getRating(); ?></span></footer>
        </blockquote>
    </div>
</div>
