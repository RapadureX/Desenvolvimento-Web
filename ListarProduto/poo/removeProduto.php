<?php require "autoload.php";

use Ifnc\Tads\Gateway\ProdutoGateway;
use PDO as PDOAlias;

$conn = new PDOAlias("sqlite:".__DIR__."/database/tads.db");

ProdutoGateway::setConnection($conn);
$gw = new ProdutoGateway();

$gw->delete($_GET[id]);

header("location:index.php");