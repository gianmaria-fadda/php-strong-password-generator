<?php

    function generatePassword($len) {
        $pass = '';


        $upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowerCase = 'abcdefghijklmnopquwxyz';
        $numbers = '0123456789';
        $symbols = '!?[]@#';
        $allCharachter = $upperCase.$lowerCase.$numbers.$symbols;

        $firstIndex = 0;
        $lastIndex = strlen($allCharachter) - 1;

        for ($i=0; $i < $len; $i++) { 

            $randomIndex = rand($firstIndex, $lastIndex);

            $pass .= $allCharachter[$randomIndex];
        }

        return $pass;
    }

    $minLenght = 3;
    $maaxLenght = 16;

    $lenght = null;
    $pasword = null;

    if (isset($_GET['lenght'])) {
        $lenght = intval($_GET['lenght']);

        var_dump($lenght);

        if ($lenght >= 3 && $lenght <= $maxLenght) {
            
            $password = generatePassword($lenght);

            var_dump($password);
            
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <header>

        <h1>
            PHP Strong Password Generator
        </h1>

    </header>
    
    <main>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="GET">
                    <div class="mb-3">
                        <label for="length" class="form-label">
                            <strong>Lunghezza password <span class="text-danger">*</span></strong>
                        </label>
                        <input type="number" name="length" id="length" class="form-control" min="3" max="16" required>

                        <div class="row g-3 align-items-center mt-3">
                            <div class="col-auto">
                                <label for="inputPassword6" class="col-form-label">Password</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="inputPassword6" class="form-control" value="<?php echo htmlspecialchars($password); ?>" readonly>
                            </div>
                            <div class="col-auto">
                                <span id="passwordHelpInline" class="form-text">
                                    Must be 3-16 characters long.
                                </span>
                            </div>
                        </div>

                        <?php if ($password != null): ?>
                            <div class="row mt-4">
                                <div class="col col-sm-6 mx-sm-auto text-center">
                                    <p>La tua password è: <?php echo htmlspecialchars($password); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                        <button type="submit" class="btn btn-primary">Genera Password</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>