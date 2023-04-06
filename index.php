<?php
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="pt=BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Windows 95 Key Validator</title>
</head>

<body>
    <div class="container">
        <div class="box">
            <h1>Windows 95 Key Validator</h1>
            <form action="#" method="post">
                <label for="key">Key:</label>
                <input class="form-text" type="text" name="key" id="key" <?php if (isset($_POST['key'])) {
                                                            $valor = $_POST['key'];
                                                            echo "value = '$valor'";
                                                        } ?>>
                <input type="submit" value="Check" class="button">
            </form>
            <?php
            if (isset($_POST['key'])) {

                $key = $_POST['key'];

                $lenght = strlen($key);

                if ($lenght > 0) {
                    $is_valid = false;
                    if ($lenght == 11) {
                        if (retail_key($key)) {
                            $is_valid = true;
                        };
                    } elseif ($lenght == 23) {
                        if (oem_key($key)) {
                            $is_valid = true;
                        };
                    }

                    if ($is_valid) {
                        echo "<p>It is a Valid Key</p>";
                    } else {
                        echo "<p>It isn't a Valid Key</p>";
                    }
                }
            }

            ?>
        </div>
    </div>

</body>

</html>