<?php
    session_start();
    require "funcoesBD.php";

    if($_POST['acao'] == 'cadastrarAluno'){

        if(!empty($_POST['inputNome']) && 
        !empty($_POST['inputEmail']) &&
        !empty($_POST['inputSenha'])) {
        
        $nome = $_POST['inputNome'];
        $email = $_POST['inputEmail'];
        $senha = $_POST['inputSenha'];
        }

        inserirAluno($nome, $email, $senha);

        header('Location:../view/Ver_alunos.php');
        die();

    } else if ($_POST['acao'] == 'cadastrarProfessor'){
        
        if(!empty($_POST['inputNome']) && 
        !empty($_POST['inputEmail']) &&
        !empty($_POST['inputSenha']) &&
        !empty($_POST['inputEspecialidade'])) {
        
        $nome = $_POST['inputNome'];
        $email = $_POST['inputEmail'];
        $senha = $_POST['inputSenha'];
        $especialidade = $_POST['inputEspecialidade'];
        }

        inserirProfessor($nome, $email, $senha, $especialidade);

        header('Location:../view/Ver_professores.php');
        die();

    }  else if ($_POST['acao'] == 'cadastrarCurso'){
        
        if(!empty($_POST['inputNome']) && 
        !empty($_POST['inputDescricao']) &&
        !empty($_POST['inputProfessorId'])) {
        
        $nome = $_POST['inputNome'];
        $descricao = $_POST['inputDescricao'];
        $professorId = $_POST['inputProfessorId'];
        }

        inserirCurso($nome, $descricao, $professorId);

        header('Location:../view/Ver_cursos.php');
        die();

    } 
?>