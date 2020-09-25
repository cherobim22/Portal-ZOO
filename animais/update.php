<?php

require_once('../src/dao/AnimaisDAO.php');


$id= $_POST['id'];
$nome = $_POST['nome'];
// $img = $_POST['imagem'];
$alimentacao = $_POST['alimentacao'];
$peso = $_POST['peso'];
$categoria = $_POST['categoria_id'];
$longevidade = $_POST['longevidade'];


$con = ConnectionFactory::getConnection();

$stmt = AnimaisDAO::update($id, $nome, $alimentacao, $categoria, $peso, $longevidade);


// $stmt = AnimaisDAO::update($id, $nome, $img, $alimentacao, $categoria, $peso, $longevidade );

header(("Location: ../animais"));

?>