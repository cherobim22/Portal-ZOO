<?php
require_once('../src/dao/AnimaisDAO.php');

$id = $_GET['id'];

$stmt = AnimaisDAO::delete($id);

header(("Location: animais"));