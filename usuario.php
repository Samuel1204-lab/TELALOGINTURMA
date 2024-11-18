
<?php
class Usuario
{
    private $pdo;



    public $msgerro = "";


    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;

        try 
        {
            $pdo = new PDO("mysql:dbname=" . $nome, $usuario, $senha);
        } catch (PDOException $erro) 
        {
            $msgerro = $erro->getMessage();
        }
    }

    public function cadastrar($nome, $telefone, $email, $senha)
    {
        global $pdo;
        //verificar se o email já está sendo cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :m"); // :e  significa que colocamos um apelido na variável email do PHP
        $sql->bindValue(":m", $email);
        $sql->execute();

        //verificar se existe email cadastrado
        if ($sql->rowCount() > 0) 
        {
            return false;
        } 
        else 
        {
            //cadastrar usuario
            $sql = $pdo->prepare("INSERT INTO usuario(nome,telefone,email,senha) VALUES (:n,:t,:e,:s)");
            $sql->bindValue(":n", $nome );
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true;
        }
    }

    public function logar($email, $senha)
    {
        global $pdo;

        $verificaremail = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e AND senha = :s");
        $verificaremail->bindValue(":e", $email);
        $verificaremail->bindValue(":s", md5($senha));
        $verificaremail->execute();


        if ($verificaremail->rowCount() > 0) 
        { //posso logar no sistema, pois o email e senha já existem no banco de dados e estão de acordo
            $dados = $verificaremail->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dados['id_usuario'];
            return true;

        } 
        else 
        {
            return false;
        }

    }

    public function listarUsuarios()
    {
        global $pdo;
        $sqllistar = $pdo->prepare("SELECT * FROM usuario");
        $sqllistar->execute();
        if ($sqllistar->rowCount() > 0) 
        {
            $dados = $sqllistar->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        }
        else 
        {
            return false;
        }
    }
    public function excluirUsuario($id)
    {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM usuario WHERE id_usuario = :id");
        $sql->bindValue(":id", $id);
        return $sql->execute();
    }
 
    public function editar_usu($id, $nome, $email, $telefone, $novoId)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE usuario SET nome = :n, email = :e, telefone = :t, id_usuario = :idn WHERE id_usuario = :id");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":e", $email);
        $sql->bindValue(":t", $telefone);
        $sql->bindValue(":id", $id);
        return $sql->execute();
    }

    
}


?>