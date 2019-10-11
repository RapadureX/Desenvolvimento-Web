<?php
require "autoload.php";

use Ifnc\Tads\Gateway\ProdutoGateway;
use PDO as PDOAlias;


$conn = new PDOAlias("sqlite:".__DIR__."/database/tads.db");

    ProdutoGateway::setConnection($conn);
    $gw = new ProdutoGateway();
    $data = new stdClass();
    $data->id = 4;
    $data->descricao = 'Chucrute';
    $data->estoque = 30;
    $data->preco_custo = 4;
    $data->preco_venda = 6;
    $data->codigo_barras = '13523892134234';
    $data->data_cadastro = date('Y-m-d');
    $data->origem = 'N';

    var_dump($gw->update($data));


?>