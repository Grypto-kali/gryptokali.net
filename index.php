<?php
$info = file_get_contents('info.txt');
$info_for_js = nl2br(htmlspecialchars($info));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grypto-kali</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Grypto.png" type="image/x-icon">
    <script type="text/javascript" src="jquery-3.6.1.min.js"></script>
</head>
<body>
    <p class="console">
        <span id="caption"></span>
        <span id="cursor">|</span>
    </p>

    <script type="text/javascript">
    var textToType = "<?php echo str_replace(array("\r","\n","\r\n","\n\r"), '', $info_for_js); ?>";

    $(document).ready(function() {
        function type(index = 0) {
            if (index < textToType.length) {
                $('#caption').html(textToType.substr(0, index++));
                setTimeout(function() {
                    type(index);
                }, 5);
            }
        }

        function cursorAnimation() {
            $('#cursor').animate({
                opacity: 0
            }, 'fast', 'swing').animate({
                opacity: 1
            }, 'fast', 'swing');
        }

        setInterval(cursorAnimation, 600);
        type(); 
    });
    </script>
</body>
</html>
