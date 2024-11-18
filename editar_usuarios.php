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
    $usuario->editar_usu($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['novo_id']);
}
?>
        <div id="editForm" class="edit-form">
            <form method="POST" action="" class="formulário">
                <input type="hidden" name="id" id="edit-ID">
                <label for="Nome">Nome:</label>
                <input type="text" name="nome" id="Nome" class="input-edit" required>
                <label for="Email">Email:</label>
                <input type="email" name="email" id="Email" class="input-edit" required>
                <label for="edit-telefone">Telefone:</label>
                <input type="tel" name="telefone" id="edit-telefone" class="input-edit" required>
                <label for="edit-ID">ID:</label>
                <input type="number" name="novo_id" id="novo-ID" class="input-edit" required>
                <button type="submit" name="editar" class="btn-salvar">Confirmar Alterações</button>
            </form>
        </div>

<?php
session_start();
require_once 'usuario.php';
$usuario = new Usuario();
$usuario->conectar("cadastrousuarioturma33", "localhost", "root", "");
  
    
 
?>


