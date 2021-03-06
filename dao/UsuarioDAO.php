<?php

require_once '../model/Usuario.php';
require_once '../connection/ConnectionFactory.php';
abstract class UsuarioDAO {

    


    public static function inserir(Usuario $usuario) {


        try {

            $conn = getConnection();

            $stmt = $conn->prepare('INSERT INTO usuario (nome, sobrenome, cidade, estado, email, username, senha) VALUES (?,?,?,?,?,?,?)');

            $stmt->bindValue(1, $usuario->getNome());
            $stmt->bindValue(2, $usuario->getSobrenome());
            $stmt->bindValue(3, $usuario->getCidade());
            $stmt->bindValue(4, $usuario->getEstado());
            $stmt->bindValue(5, $usuario->getEmail());
            $stmt->bindValue(6, $usuario->getUsuario());
            $stmt->bindValue(7, $usuario->getSenha());

            if ($stmt->execute()) {
                setcookie("nome", $usuario->getNome());
                setcookie("sobrenome", $usuario->getSobrenome());
                setcookie("cidade", $usuario->getCidade());
                setcookie("estado", $usuario->getEstado());
                setcookie("email", $usuario->getEmail());
                setcookie("username", $usuario->getUsuario());
                setcookie("senha", $usuario->getSenha());
                header('location: ../views/home.php');
            } else {
                
                
                header('location: ../views/cadastrar.html');
                
                
            }
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
    }

    public static function update(Usuario $usuario) {


        try {

            $conn = getConnection();

            $stmt = $conn->prepare('UPDATE usuario SET nome=?, sobrenome=?, cidade=?, estado=?, email=?, senha=?, perfil=? WHERE username=?');

            $stmt->bindValue(1, $usuario->getNome());
            $stmt->bindValue(2, $usuario->getSobrenome());
            $stmt->bindValue(3, $usuario->getCidade());
            $stmt->bindValue(4, $usuario->getEstado());
            $stmt->bindValue(5, $usuario->getEmail());
            $stmt->bindValue(6, $usuario->getSenha());
            $stmt->bindValue(7, $usuario->getPerfil());
            $stmt->bindValue(8, $usuario->getUsuario());
            

            if ($stmt->execute()) {
                setcookie("nome", $usuario->getNome());
                setcookie("sobrenome", $usuario->getSobrenome());
                setcookie("cidade", $usuario->getCidade());
                setcookie("estado", $usuario->getEstado());
                setcookie("email", $usuario->getEmail());
                setcookie("username", $usuario->getUsuario());
                setcookie("senha", $usuario->getSenha());
                setcookie("perfil", $usuario->getPerfil());
                header('location: ../views/home.php');
            } else {
                
                
                header('location: ../views/edicao.php');
                
                
            }
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
    }
    
}
