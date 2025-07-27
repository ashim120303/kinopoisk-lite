<?php
/**
 * @var \App\Kernel\Session\SessionInterface $session
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
    <h1>Register</h1>

    <form action="/testReg" method="post">
        <div>
            Email <br>
            <input type="text" name="email"> <br>
            <?php if($session->has('email')){ ?>
                <ul>
                    <?php foreach ($session->getFlash('email') as $error) { ?>
                        <li style="color:red"><?php echo $error ?></li>
                    <?php } ?>
                </ul>
            <?php }?>
            Password <br>
            <input type="password" name="password"> <br>
            <?php if($session->has('password')){ ?>
                <ul>
                    <?php foreach ($session->getFlash('password') as $error) { ?>
                        <li style="color:red"><?php echo $error ?></li>
                    <?php } ?>
                </ul>
            <?php }?>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>