<?php
require_once('../src/utils/ConnectionFactory.php');
require_once('../src/dao/AnimaisDAO.php');

// var_dump($_POST);
// exit(0);

$nome = $_POST['nome'];
// $imagem = $_POST['imagem'];
$categoria = $_POST['categoria_id'];
$alimentacao = $_POST['alimentacao'];
$peso = $_POST['peso'];
$longevidade = $_POST['longevidade'];

if(isset($_FILES['imagem']['name'])){
    $novo_nome  = '';
}else{
 $pasta_alvo = '/images/uploads/';
    $arquivo_alvo = $pasta_alvo . basename($_FILES['imagem']['name']);

    $extensao = strtolower(pathinfo($arquivo_alvo, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES['imagem']['tmp_name']);

    if(! $check){
        header(("Location: animais"));
        exit(0);
    }
    $extensions = array("jpeg", "jpg", "png");
    if(in_array($extensao, $extensions) === false){
        header(("Location: animais"));
    exit(0); 
    }

    $timestamp = date_timestamp_get(date_create());
    $string = strtolower(str_replace(' ', '-', $nome));
    $string_ok = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

    $novo_nome = $pasta_alvo . $timestamp . '-' .$string_ok . '.' . $extensao;

    $return = move_uploaded_file($_FILES['imagem']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $novo_nome);
}





$con = ConnectionFactory::getConnection();
$stmt = $con->prepare("INSERT INTO animaisdd (img_animal, nome, categoria_id, peso, alimentacao, longevidade) 
                                        VALUES ( :imagem, :nome, :categoria_id, :peso, :alimentacao, :longevidade)");
$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":imagem", $novo_nome);
$stmt->bindParam(":categoria_id", $categoria);
$stmt->bindParam(":alimentacao", $alimentacao);
$stmt->bindParam(":peso", $peso);
$stmt->bindParam(":longevidade", $longevidade);
$stmt->execute();


header(("Location: ../animais"));


?>
