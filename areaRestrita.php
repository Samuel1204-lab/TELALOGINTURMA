<?php
    require_once 'usuario.php';
    $usuario = new Usuario();
    $usuario->conectar("cadastrousuarioturma33", "localhost", "root","");
    $dados = $usuario->listarUsuarios();
?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Listar Dados</title>
</head>
<body>
    <h1 class="listar-usuarios">LISTAR USUÁRIOS <span>CADASTRADOS</span></h1>
        <table class = "lista">
            <thead>
                <tr class="tabela">
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ações</th> <!-- Coluna para o botão -->
                    
                    
                </tr>

            </thead>
            <tbody>


            <?php
                if(!empty($dados))
                {
                    foreach($dados as $pessoa):
                ?>
                     <tr class="dados">
                        <td><?php echo $pessoa ['nome']; ?></td>
                        <td><?php echo $pessoa ['email']; ?></td>
                        <td><?php echo $pessoa ['telefone']; ?></td>
                        <td><a href="editar_usuarios.php<?php echo $pessoa['id_usuario']; ?>"><button>Editar</button></a></td>
 
                        
                     </tr>
                     
                        
                <?php
                endforeach;
                }
                else{
                    echo"Nenhum usuário cadstrado";
                }
            ?>


            </tbody>
        </table>
</body>
</html>