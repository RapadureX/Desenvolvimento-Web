<?php require "autoload.php";

use Ifnc\Tads\Gateway\ProdutoGateway;
use PDO as PDOAlias;

$conn = new PDOAlias("sqlite:".__DIR__."/database/tads.db");

ProdutoGateway::setConnection($conn);
$gw = new ProdutoGateway();
$data = new stdClass();

$data->id = $_GET[id];
$data->descricao = $_GET[descricao];
$data->estoque = $_GET[estoque];
$data->preco_custo = $_GET[preco_custo];
$data->preco_venda = $_GET[preco_venda];
$data->codigo_barras = $_GET[codigo_barras];
$data->data_cadastro = date('Y-m-d');
$data->origem = 'N';

$gw->update($data);

header("location:index.php");