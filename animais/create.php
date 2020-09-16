<?php

require_once('../src/dao/AnimaisDAO.php');

$nome = $_POST['nome'];
$alimentacao = $_POST['alimentacao'];
$peso = $_POST['peso'];
$categoria = $_POST['categoria_id'];
$longevidade = $_POST['longevidade'];


$stmt = AnimaisDAO::create($nome, $alimentacao, $categoria, $peso, $longevidade );

header(("Location: animais"))


?>