<?php
require_once('../src/utils/ConnectionFactory.php');
require_once('../src/dao/AnimaisDAO.php');

// var_dump($_POST);
// exit(0);

$nome = $_POST['nome'];
$imagem = $_POST['imagem'];
$categoria = $_POST['categoria_id'];
$alimentacao = $_POST['alimentacao'];
$peso = $_POST['peso'];
$longevidade = $_POST['longevidade'];


$con = ConnectionFactory::getConnection();
$stmt = $con->prepare("INSERT INTO animaisdd (img_animal, nome, categoria_id, peso, alimentacao, longevidade) 
                                        VALUES ( :imagem, :nome, :categoria_id, :peso, :alimentacao, :longevidade)");
$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":imagem", $imagem);
$stmt->bindParam(":categoria_id", $categoria);
$stmt->bindParam(":alimentacao", $alimentacao);
$stmt->bindParam(":peso", $peso);
$stmt->bindParam(":longevidade", $longevidade);
$stmt->execute();


header(("Location: animais"));


?>
