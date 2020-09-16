<?php

$id= $_POST['id'];
$nome = $_POST['nome'];

require_once('../src/dao/CategoriaDAO.php');

$stmt = CategoriaDAO::update($id, $nome);

header(("Location: categorias"));

?>