<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div> <fieldset><legend>Quest&atilde;o 1</legend>
            <?php
                for($valorAtual = 1; $valorAtual <= 100; $valorAtual++){ 
                    if (($valorAtual % 3 == 0) && ($valorAtual % 5 == 0)) {
                        echo "<p>FizzBuzz</p>"; 
                    } elseif ($valorAtual % 3 == 0) {
                        echo "<p>Fizz</p>"; 
                    } elseif ($valorAtual % 5 == 0) {
                        echo "<p>Buzz</p>"; 
                    } else {
                        echo "<p>".$valorAtual."</p>"; 
                    }
                } 
            ?>
        </fieldset>
        </div>
    </body>
</html>