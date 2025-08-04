<?php
/**
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Kernel\View $view
 */
$view->component('header');
?>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
<main class="form-signin w-100 m-auto">
    <form action="/login" method="post">
        <div class="d-flex" style="align-items: center; justify-content: space-between">
            <h2>Вход</h2>
            <a href="/" class="d-flex align-items-center mb-5 mb-lg-0 text-white text-decoration-none">
                <h5 class="m-0">Кинопоиск <span class="badge bg-warning warn__badge">Lite</span></h5>
            </a>
        </div>
        <div class="form-floating mt-3">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@areaweb.su"> <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Пароль"> <label for="floatingPassword">Пароль</label>
        </div>
        <?php if($session->has('error')){ ?>
            <div class="alert alert-danger">
                <?php echo $session->getFlash('error'); ?>
            </div>
        <?php }?>

        <button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; Кинопоиск Lite 2023</p>
    </form>
</main>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
