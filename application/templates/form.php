<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Форма отправки отзыва</title>
    <link rel="stylesheet" type="text/css" href="../../stylesheets/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../stylesheets/form.css">
</head>

<style>
    .text-message {
        width: calc(100% - 60px);
    }
</style>

<body>

<div class="container block">
    <form action="../controllers/form.php" method="post" enctype="multipart/form-data">
        <h2>Написать комментарий</h2>
        <br>
        <div class="row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Имя</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail" name="name" placeholder="Имя" required>
            </div>
        </div>
        <br>
        <div class="row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Почта</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Почта" required>
            </div>
        </div>
        <br>
        <div class="row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Текст</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="inputPassword" name="text"
                          placeholder="Текст" required></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="exampleFormControlFile1">Прикрепить картинку</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
                <input name="picture" type="file" class="form-control-file" id="exampleFormControlFile1"/>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </form>
</div>

<div class="comments-container">
    <?php
    foreach ($comments as $comment) {
        ?>
        <div class="container block row">
            <div class="col col-sm">
                <p><span>Имя пользователя : </span><span><?php echo $comment["name"]?></span></p>
                <p><span>Электронная почта : </span><span><?php echo $comment["email"]?></span></p>
                <?php if ($comment["Img"] != '../usersImg/') { ?>
                    <img height="320px" width="240px" src="<?php echo $comment["Img"]?>"/>
                <?php }
                ?>
            </div>
            <div class="block text-message col">
                <p>Текст сообщения:</p>
                <p><?php echo $comment["text"]?></p>
            </div>
        </div>

        <?php
    }
    
    ?>
</div>

</body>
