<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 2a</title>
    <style>
        body
        {
            background: antiquewhite;
            font-size: 20px;
            font-family: "Segoe Script", serif;
        }
    </style>
</head>
<body>
<div>
    <?php
    $count = "0"; //words
    $symbols = "0";
    $text = "";

    // If the button is pressed and there's text in the box, counts symbols & words
    if (isset($_POST['button']) && isset($_POST['text']))
    {
        $text = $_POST['text'];
        $matches = array();

        $pattern = '/\S+/ui'; //anything that's not a space
        $count = (string)preg_match_all($pattern, $text, $matches); //typecasting function (into string)

        $pattern = '/./ui'; //any symbol
        $symbols = (string)preg_match_all($pattern, $text, $matches);
    }
    ?>

    <form method="post">
        <textarea name="text" rows="7" cols = "50" style = "background-color: tan"></textarea>
        <input type="submit" name="button" value="Посчитать" style = "background-color: dimgrey">
        <p>В тексте "<?=$text?>" найдено <?=$count?> слов и <?=$symbols?> символов.</p>
    </form>

</div>
</body>
</html>