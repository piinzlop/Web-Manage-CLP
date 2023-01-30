<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <button id="showInputBtn">Show Input</button>
    <div id="inputContainer" style="display: none;">
        <input type="text" id="exampleInput">
    </div>
</br>
    <script>
        var showInputBtn = document.getElementById("showInputBtn");
        var inputContainer = document.getElementById("inputContainer");

        showInputBtn.addEventListener("click", function() {
            inputContainer.style.display = "block";
            showInputBtn.style.display = "none";
        });
    </script>


    <?php

    // เข้ารหัส
    $encoded_string = base64_encode('ice');
    echo "Encoded string: " . $encoded_string . "<br>";

    // ถอดรหัส
    $decoded_string = base64_decode($encoded_string);
    echo "Decoded string: " . $decoded_string . "<br><br><br>";

    // เข้ารหัสแบบ hash
    $hashed_password = hash('sha256', '11111111R');
    echo "Decoded string: " . $hashed_password;


    ?>

</body>

</html>