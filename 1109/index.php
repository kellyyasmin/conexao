<?php
$a = 10;
$b = 20;
$dia = "terça";
// if,else,elseif
if ($a > $b) {
echo "a maior que b" . PHP_EOL;
} elseif ($a == $b ) {
echo "a é igual a b" . PHP_EOL;
} else {
echo "a é menor que b"  . PHP_EOL;
}
// operador ternário
$resultado = ($a > $b) ?  "a é maior que b" : "a não é maior que b";
echo $resultado . PHP_EOL;

// switch
switch ($dia) {
case "segunda":
echo "Hoje é segunda-feira" . PHP_EOL;
break;
case "terca":
echo "Hoje é terça-feira" . PHP_EOL;
break;
case "quarta":
echo "Hoje é quarta-feira" . PHP_EOL;
break;
case "quinta":
echo "Hoje é quinta-feira" . PHP_EOL;
break;
case "sexta":
echo "Hoje é sexta-feira" . PHP_EOL;
break;
default:
echo "Não é um dia da semana válido" . PHP_EOL;
}
// while
$x = 1;
while ($x <= 5) {
    echo "O número é: $x" . PHP_EOL;
    $x++;
}

echo PHP_EOL; // apenas para separar saídas

// do-while
$x = 1;
do {
    echo "O número é: $x" . PHP_EOL;
    $x++;
} while ($x <= 5);

echo PHP_EOL;
// for
for ($x = 0; $x <= 10; $x++) {
    echo "O número é: $x" . PHP_EOL;
}
echo PHP_EOL;
// foreach
$cores = array("vermelho", "verde", "azul", "amarelo");
foreach ($cores as $valor) {
    echo "$valor" . PHP_EOL;
}
?>