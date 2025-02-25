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
    <?php
    $file = fopen("messages.txt", "r");

    //Output lines until EOF is reached
    while(! feof($file)) {
        $line = fgets($file);
        echo $line. "<br>";
    }

    fclose($file);
    ?>
</body>
</html>