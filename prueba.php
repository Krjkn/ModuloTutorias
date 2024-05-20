<?php

$permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$string_length = 6;

function generate_string($input, $strength = 5) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}

$captcha_string = generate_string($permitted_chars, $string_length);
//echo $captcha_string;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Esta es la imagen</h1>
    <img src="genera.php/?captcha_string=<?php echo $captcha_string ?>" >
</body>
</html>