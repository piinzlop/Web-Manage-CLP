<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // The string to be encoded
    $string = "ice";

    // Encode the string
    $encoded_string = base64_encode($string);
    echo "Encoded string: " . $encoded_string . "<br>";

    // Decode the string
    $decoded_string = base64_decode($encoded_string);
    echo "Decoded string: " . $decoded_string . "<br><br><br>";

    $entered_password = 'iceat_po@rmutsvmail.com';
    $salt = 'random_string';
    $hashed_password = hash('sha256', $salt . $entered_password);
    echo "Decoded string: " . $hashed_password;


    ?>

</body>

</html>