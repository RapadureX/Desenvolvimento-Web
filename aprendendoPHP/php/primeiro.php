<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PrimeiroPHP</title>
</head>
<body>
    <?php
        //Manipulação de String, utilizando alguns métodos
        $txt1 = "Ola Mundo!";
        $txt2 = "o mundo é lindo.";
        echo $txt1." ".$txt2."</br>";
        echo "$txt1 que prazer esta aqui, $txt2</br>";
        echo "tamanha da String 1 = ".strlen($txt1)."</br>";//Pega o tamanho da String
        echo "tamanha da String 2 = ".strlen($txt2)."</br>";//Pegao tamanho da String
        echo "Número de Palavaras da String 1 = ".str_word_count($txt1)."</br>";//Conta quantas palavras tem a String
        echo "Número de Palavaras da String 2 = ".str_word_count($txt2)."</br>";//Conta quantas palavras tem a String
        echo "Olá Mundo!, o inverso seria, ".strrev($txt1)."</br>";//reverte a palavra(OBS.: como se fosse num espelho)
        echo "A posição de lindo na String 2 = ".strpos($txt2,"lindo")."</br>";//Pega a posição da palavra na String
        echo "Substituindo a palavra mundo e colocando a palavra pessoal em sua posição na String 1 = "
            .str_replace("Mundo", "Pessoal", $txt1)."</br>";//Substitui uma palavra ou caracter na String por outra palavra ou caracter

        //Manipulação variaveis, Escopo Local, Global e Static
        $x = 5;
        $y = 3;
        function somar(){
            global $x, $y;
            $soma = $x + $y;
            echo $soma."</br>";
        }

        function subtrair(){
            $subtracao = $GLOBALS['x'] - $GLOBALS['y'];
            echo $subtracao."</br>";
        }

        //Criação de classe, instanciando o Objeto da classe e utilizando seus métodos por meio do Objeto da classe
        class Calculadora{

            private $x;
            private $y;

            function Calculadora($x, $y){
                $this-> x = $x;
                $this-> y = $y;
            }

            function somar(){
                $soma = $this->x + $this->y;
                echo $soma."</br>";
            }

            function subtrair(){
                $subtracao = $this->x - $this->y;
                echo $subtracao."</br>";
            }

            function multiplicar(){
                $multiplicacao = $this->x * $this->y;
                echo $multiplicacao."</br>";
            }

            function dividir(){
                if($this->x > $this->y && $this->y > 0) {
                    $divisao = $this->x / $this->y;
                    echo $divisao."</br>";
                }else if($this->x > 0){
                    $divisao = $this->y / $this->x;
                    echo $divisao."</br>";
                }
            }
        }

        $calc = new Calculadora(4, 2);
        $calc->somar();
        $calc->subtrair();
        $calc->multiplicar();
        $calc->dividir();

    ?>

</body>
</html>