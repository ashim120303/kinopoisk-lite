<?php
/**
 * @var \App\Kernel\View $view
 * @var \App\Kernel\Session\SessionInterface $session
 * @var array<\App\Models\Category> $categories
 */
$view->component('header', [
        'bootstrap' => '../../assets/css/bootstrap.min.css',
        'app' => '../../assets/css/app.css',
        'js' => '../../assets/js/color-modes.js',
]);
?>
<main>
    <div class="container">
        <h3 class="mt-3">Добавление фильма</h3>
        <hr>
    </div>
    <div class="container">
        <form action="/admin/movies/add" method="post" enctype="multipart/form-data" class="d-flex flex-column justify-content-center w-50 gap-2 mt-5 mb-5">
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text"
                               class="form-control <?php echo $session->has('name') ? 'is-invalid' : ''; ?>"
                               name="name"
                               id="name"
                               placeholder="Шрек"
                        >
                        <label for="name">Название</label>
                        <?php if($session->has('name')){ ?>
                        <div id="name" class="invalid-feedback">
                            <?php echo $session->getFlash('name')[0]; ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <textarea
                               style="height: 100px"
                               class="form-control <?php echo $session->has('description') ? 'is-invalid' : ''; ?>"
                               name="description"
                               id="description"
                               placeholder="Описание..."
                        ></textarea>
                        <label for="email">Описание</label>
                        <?php if($session->has('description')){ ?>
                            <div id="description" class="invalid-feedback">
                                <?php echo $session->getFlash('description')[0]; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="mb-3">
                        <label for="image">Обложка</label>
                        <input type="file"
                               class="form-control"
                               name="image"
                               id="image"
                        >
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <label for="image">Выбрать Жанр</label>
                <select name="category" aria-label="Default select example">
                    <option selected>Жанр</option>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category->getId(); ?>">
                            <?php echo $category->getName(); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="row g-2">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </form>
    </div>
</main>

<?php $view->component('footer'); ?>
