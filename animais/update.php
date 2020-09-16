<?php

require_once('../src/dao/AnimaisDAO.php');


$id= $_POST['id'];
$nome = $_POST['nome'];
$alimentacao = $_POST['alimentacao'];
$peso = $_POST['peso'];
$categoria = $_POST['categoria_id'];
$longevidade = $_POST['longevidade'];




$stmt = AnimaisDAO::update($id, $nome, $alimentacao, $categoria, $peso, $longevidade );

header(("Location: animais"));

?>