<?php
/**
 * @var \App\Kernel\Session\Session $session
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Add movie page</h1>

    <form action="/admin/movies/add" method="post">
        <div>
            <p>Name</p>
            <input type="text" name="name" id="name">
            <?php if($session->has('name')){ ?>
                <ul>
                    <?php foreach ($session->getFlash('name') as $error) { ?>
                    <li style="color:red"><?php echo $error ?></li>
                    <?php } ?>
                </ul>
            <?php }?>
        </div>
        <div>
            <button>Submit</button>
        </div>
    </form>
</body>
</html>

