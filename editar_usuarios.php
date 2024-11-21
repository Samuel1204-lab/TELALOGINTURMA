<?php
session_start();
require_once 'usuario.php';
$usuario = new Usuario();
$usuario->conectar("cadastrousuarioturma33", "localhost", "root", "");

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $resposta = $usuario->listarUsuarioId($id);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUÁRIO-EDITAR</title>
</head>
<body>
    <?php
if (isset($_POST['editar']) && !empty($_POST['id'])) {
    $usuario->editar_usu($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['telefone']);
}
?>
        <div id="editForm" class="editar-formulário">
            <form method="POST" action="" class="formulário">
                <input type="hidden" name="id" id="edit-ID" value="<?=$resposta['id_usuario']?>">
                <label for="Nome">Nome:</label>
                <input type="text" name="nome" id="Nome" class="input-edit" value="<?=$resposta['nome']?>">
                <label for="Email">Email:</label>
                <input type="email" name="email" id="Email" class="input-edit" value="<?=$resposta['email']?>">
                <label for="Telefone">Telefone:</label>
                <input type="tel" name="telefone" id="edit-telefone" class="input-edit" value="<?=$resposta['telefone']?>">   
                <button type="submit" name="editar" class="btn-salvar">Confirmar Alterações</button>
            </form>
        </div>



