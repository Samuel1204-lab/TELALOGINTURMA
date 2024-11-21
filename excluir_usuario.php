<?php
session_start();
require_once 'usuario.php';
$usuario = new Usuario();
$usuario->conectar("cadastrousuarioturma33", "localhost", "root", "");

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $resposta = $usuario->listarUsuarioId($id);

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUÁRIO-EXCLUIR</title>
</head>
<body>
    <?php
if (isset($_POST['Excluir']) && !empty($_POST['id'])) {
    $usuario->excluir_usu($_POST['id']);

    header('location: arearestrita.php');
}

?>

?>
        <div id="editForm" class="editar-formulário">
            <form method="POST" action="" class="formulário">
                <label for="Nome">ID:</label>
                <input type="text" name="id" id="edit-ID" value="<?=$resposta['id_usuario']?>"> 
                <button type="submit" name="Excluir" class="btn-salvar">Confirmar Alterações</button>
            </form>
        </div>

