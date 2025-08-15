<?php
/**
 * @var \App\Kernel\Auth\AuthInterface $auth
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Kernel\View $view
 * @var \App\Kernel\Storage\Storage $storage
 * @var \App\Models\Movie $movie
 */
$view->component('header');
?>
<main>
    <div class="container">
        <div class="one-movie">
            <div class="card mb-3 mt-3 one-movie__item">
                <div class="row g-3">
                    <div class="col-md-4">
                        <img  src="<?php echo $storage->url($movie->getPreview()); ?>" class="img-fluid rounded one-movie__image" alt="<?php echo $movie->getName(); ?>">
                        <?php if ($auth->check()){ ?>
                            <form action="/reviews/add" method="post" class="m-3 w-100">
                                <input type="hidden" name="id" value="<?php echo $movie->getId(); ?>">
                                <select
                                        class="form-select <?php echo $session->has('rating') ? 'is-invalid' : ''; ?>"
                                        name="rating"
                                        aria-label="Default select example"
                                >
                                    <option selected>Оценка</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <?php if($session->has('rating')){ ?>
                                    <div id="description" class="invalid-feedback">
                                        <?php echo $session->getFlash('rating')[0]; ?>
                                    </div>
                                <?php } ?>
                                <div class="form-floating mt-2">
                                    <textarea name="review"
                                              class="form-control <?php echo $session->has('review') ? 'is-invalid' : ''; ?>"
                                              placeholder="Укажи свое мнение о фильме"
                                              id="floatingTextarea2"
                                              style="height: 100px"
                                    ></textarea>
                                    <label for="floatingTextarea2">Комментарий</label>
                                </div>
                                <?php if($session->has('review')){ ?>
                                    <div id="description" class="invalid-feedback">
                                        <?php echo $session->getFlash('review')[0]; ?>
                                    </div>
                                <?php } ?>
                                <button type="submit" class="btn btn-primary mt-2">Оставить отзыв</button>
                            </form>
                        <?php } else {?>
                                <div class="alert alert-info m-3">
                                    Для того, что бы оставить отзыв необходимо <a href="/login">авторизироваться</a>!
                                </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h1 class="card-title"><?php echo $movie->getName(); ?></h1>
                            <p class="card-text">Оценка <span class="badge bg-warning warn__badge">7.9</span></p>
                            <p class="card-text"><?php echo $movie->getDescription(); ?></p>
                            <p class="card-text"><small class="text-body-secondary">Добавлен <?php echo $movie->getCreatedAt(); ?></small></p>
                            <h4>Отзывы</h4>
                            <div class="one-movie__reviews">
                                <div class="card">
                                    <div class="card-header">
                                        Пользователь: hello@areaweb.su
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p>В сериале и теперь хватает брутальной жестокости и разбросанных по кадрам кишок. Более того, первые эпизоды третьего сезона могут похвастаться одними из самых мерзких (но по-своему креативных) сцен во всём шоу.</p>
                                            <footer class="blockquote-footer">Оценка <span class="badge bg-warning warn__badge">8</span></footer>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        Пользователь: hello@areaweb.su
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p>В сериале и теперь хватает брутальной жестокости и разбросанных по кадрам кишок. Более того, первые эпизоды третьего сезона могут похвастаться одними из самых мерзких (но по-своему креативных) сцен во всём шоу.</p>
                                            <footer class="blockquote-footer">Оценка <span class="badge bg-warning warn__badge">8</span></footer>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        Пользователь: hello@areaweb.su
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p>В сериале и теперь хватает брутальной жестокости и разбросанных по кадрам кишок. Более того, первые эпизоды третьего сезона могут похвастаться одними из самых мерзких (но по-своему креативных) сцен во всём шоу.</p>
                                            <footer class="blockquote-footer">Оценка <span class="badge bg-warning warn__badge">8</span></footer>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        Пользователь: hello@areaweb.su
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p>В сериале и теперь хватает брутальной жестокости и разбросанных по кадрам кишок. Более того, первые эпизоды третьего сезона могут похвастаться одними из самых мерзких (но по-своему креативных) сцен во всём шоу.</p>
                                            <footer class="blockquote-footer">Оценка <span class="badge bg-warning warn__badge">8</span></footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $view->component('footer'); ?>