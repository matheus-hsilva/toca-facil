
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

    function retornarProfessores(){
        $conexao = conectarBD();
        $consulta = "SELECT id, nome FROM professor";
        $listaProfessores = mysqli_query($conexao, $consulta);
        return $listaProfessores;
    }

    function inserirCurso($nome, $descricao, $professorId){
        $conexao = conectarBD();
        $consulta = "INSERT INTO curso (nome, descricao, professor_id) VALUES ('$nome','$descricao','$professorId')";
        mysqli_query($conexao, $consulta);
    }

    function retornarAlunos(){

        $conexao = conectarBD();
        $consulta = "SELECT * FROM aluno";
        $listarAlunos = mysqli_query($conexao, $consulta);
        return $listarAlunos;
    }

?>
