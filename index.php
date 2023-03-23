<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style.css">
    <title>Teste array rand</title>
</head>
<body>
<div class="geral">
    <div class="mg40"> 
	<h1 class="c1t">Teste array rand</h1> <br> 
</div>
<div class= "mg40">
	<?php
session_start(); 

if (!isset($_SESSION["vitorias"])) {
    $_SESSION["vitorias"] = 0;
}

if (!isset($_SESSION["empates"])) {
    $_SESSION["empates"] = 0;
}

if (!isset($_SESSION["derrotas"])) {
    $_SESSION["derrotas"] = 0;
}



function computadorJoga() {
    $jogadas = array("pedra", "papel", "tesoura");
    return $jogadas[array_rand($jogadas)];
}

if (isset($_POST["jogada"])) {
    $jogada = $_POST["jogada"];
    $computador = computadorJoga();

    if ($jogada == $computador) {
        $resultado = "Empate!";
        $_SESSION["empates"]++;
    } elseif (($jogada == "pedra" && $computador == "tesoura") || ($jogada == "papel" && $computador == "pedra") || ($jogada == "tesoura" && $computador == "papel")) {
        $resultado = "Deu sorte, ganhou!";
        $_SESSION["vitorias"]++;
    } else {
        $resultado = "Você perdeu kakakakakakak!";
        $_SESSION["derrotas"]++;
    }

    echo "<p>Você jogou: " . $jogada . "</p>";
    echo "<p>O computador jogou: " . $computador . "</p>";
    echo "<p>Resultado: " . $resultado . "</p>";
    echo "<p><a href=''>Jogar novamente</a></p>";  
   

} else {

    echo "<p>Escolha sua jogada:</p>";
    echo "<form method='post'>";
    echo "<input type='radio' name='jogada' value='pedra'> Pedra<br>";
    echo "<input type='radio' name='jogada' value='papel'> Papel<br>";
    echo "<input type='radio' name='jogada' value='tesoura'> Tesoura<br>";
    echo "<input type='submit' value='Jogar'>";
    echo "</form>";
}


echo "<h2>Placar:</h2>";
echo "<p>Vitórias: " . $_SESSION["vitorias"] . "</p>";
echo "<p>Empates: " . $_SESSION["empates"] . "</p>";
echo "<p>Derrotas: " . $_SESSION["derrotas"] . "</p>";

echo "<form method='post'>";
echo "<input type='hidden' name='zerar_placar' value='true'>";
echo "<input class='zp' type='submit' value='Zerar placar'>";
echo "</form>";

if (isset($_POST['zerar_placar']) && $_POST['zerar_placar'] == 'true') {
    $_SESSION['vitorias'] = 0;
    $_SESSION['empates'] = 0;
    $_SESSION['derrotas'] = 0;
}

	?> 
   </div>
</div>
</body>
</html>
