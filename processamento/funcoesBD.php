<?php

    function conectarBD(){
        $conexao = mysqli_connect("localhost","root","","toca_facil");
        return($conexao);
    }

    function inserirAluno($nome, $email, $senha){

        $conexao = conectarBD();
        $consulta = "INSERT INTO aluno (nome, email, senha) VALUES ('$nome','$email','$senha')";
        mysqli_query($conexao,$consulta);
    }

    function inserirProfessor($nome, $email, $senha, $especialidade){

        $conexao = conectarBD();
        $consulta = "INSERT INTO professor (nome, email, senha, especialidade) VALUES ('$nome','$email','$senha','$especialidade')";
        mysqli_query($conexao,$consulta);
    }

    function retornarAlunos(){

        $conexao = conectarBD();
        $consulta = "SELECT * FROM aluno";
        $listarAlunos = mysqli_query($conexao, $consulta);
        return $listarAlunos;
    }

?>