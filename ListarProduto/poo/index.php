<?php
require "autoload.php";

use Ifnc\Tads\Gateway\ProdutoGateway;
use PDO as PDOAlias;
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container-fluid">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Descrição</th>
            <th scope="col">Estoque</th>
            <th scope="col">Preço de Custo</th>
            <th scope="col">Preço de Venda</th>
            <th scope="col">Codigo de Barras</th>
            <th scope="col">Data de Cadastro</th>
            <th scope="col">Origem</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $conn = new PDOAlias("sqlite:".__DIR__."/database/tads.db");
        ProdutoGateway::setConnection($conn);
        $gw = new ProdutoGateway();
        $produtos = $gw->all();
        foreach ($produtos as $produto):
        ?>
        <tr>
            <th scope="row"><?=$produto->id?></th>
            <td><?=$produto->descricao?></td>
            <td><?=$produto->estoque?></td>
            <td><?=$produto->preco_custo?></td>
            <td><?=$produto->preco_venda?></td>
            <td><?=$produto->codigo_barras?></td>
            <td><?=$produto->data_cadastro?></td>
            <td><?=$produto->origem?></td>
            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alteraProduto"
                        data-id="<?=$produto->id?>" data-descricao="<?=$produto->descricao?>"
                        data-estoque="<?=$produto->estoque?>" data-pC="<?=$produto->preco_custo?>"
                        data-pV="<?=$produto->preco_venda?>" data-cod="<?=$produto->codigo_barras?>">Alterar</button>
                <a class="btn btn-danger" href="removeProduto.php?id=<?=$produto->id?>" role="button">Remover</a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <hr/>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adicionaProduto">
        Adicionar novo Produto
    </button>
    <div class="modal fade" id="adicionaProduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Adicionar novo Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="adicionaProduto.php">
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input name="descricao" type="text" class="form-control" id="descricao">
                        </div>
                        <div class="form-group">
                            <label for="estoque">Estoque</label>
                            <input name="estoque" type="text" class="form-control" id="estoque">
                        </div>
                        <div class="form-group">
                            <label for="preco_custo">Preço de Custo</label>
                            <input name="preco_custo" type="text" class="form-control" id="preco_custo">
                        </div>
                        <div class="form-group">
                            <label for="preco_venda">Preço de Venda</label>
                            <input name="preco_venda" type="text" class="form-control" id="preco_venda">
                        </div>
                        <div class="form-group">
                            <label for="codigo_barras">Codigo de Barras</label>
                            <input name="codigo_barras" type="text" class="form-control" id="codigo_barras">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="alteraProduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="alteraProduto.php">
                        <input name="id" type="hidden" id="id">
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input name="descricao" type="text" class="form-control" id="descricao">
                        </div>
                        <div class="form-group">
                            <label for="estoque">Estoque</label>
                            <input name="estoque" type="text" class="form-control" id="estoque">
                        </div>
                        <div class="form-group">
                            <label for="preco_custo">Preço de Custo</label>
                            <input name="preco_custo" type="text" class="form-control" id="preco_custo">
                        </div>
                        <div class="form-group">
                            <label for="preco_venda">Preço de Venda</label>
                            <input name="preco_venda" type="text" class="form-control" id="preco_venda">
                        </div>
                        <div class="form-group">
                            <label for="codigo_barras">Codigo de Barras</label>
                            <input name="codigo_barras" type="text" class="form-control" id="codigo_barras">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $('#alteraProduto').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var info = button.data();
        var modal = $(this);
        modal.find('.modal-title').text('Alterar Produto - ' + info['descricao'] + ' ID - ' + info['id']);
        modal.find('#id')[0].value = info['id'];
        modal.find('#descricao')[0].value = info['descricao'];
        modal.find('#estoque')[0].value = info['estoque'];
        modal.find('#preco_custo')[0].value = info['pc'];
        modal.find('#preco_venda')[0].value = info['pv'];
        modal.find('#codigo_barras')[0].value = info['cod'];
    })
</script>
</body>
</html>