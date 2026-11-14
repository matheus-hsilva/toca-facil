<?php
    session_start();
    require "funcoesBD.php";

    if ($_POST['acao'] == 'cadastrarAluno'){

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
        !empty($_POST['inputProfessorId']) &&
        !empty($_POST['inputCategoria'])) {
        
        $nome = $_POST['inputNome'];
        $descricao = $_POST['inputDescricao'];
        $professorId = $_POST['inputProfessorId'];
        $categoria = $_POST['inputCategoria'];
        }

        inserirCurso($nome, $descricao, $professorId, $categoria);

        header('Location:../view/Ver_cursos.php');
        die();

    } else if ($_POST['acao'] == 'atualizarCurso') {

        if (!empty($_POST['inputCodigo']) &&
            !empty($_POST['inputNome']) &&
            !empty($_POST['inputDescricao']) &&
            !empty($_POST['inputProfessorId']) &&
            !empty($_POST['inputCategoria'])) {

            $cursoId = $_POST['inputCodigo'];
            $nome = $_POST['inputNome'];
            $descricao = $_POST['inputDescricao'];
            $professorId = $_POST['inputProfessorId'];
            $categoria = $_POST['inputCategoria'];

            alterarCurso($nome, $descricao, $professorId, $categoria, $cursoId);
        }

        header('Location:../view/Ver_cursos.php');
        die();

    } else if ($_POST['acao'] == 'excluirCurso') {

        if (!empty($_POST['inputCodigoExcluir'])) {

            $cursoId = $_POST['inputCodigoExcluir'];
            
            excluirCurso($cursoId);
        }

        header('Location:../view/Ver_cursos.php');
        die();

    } else if ($_POST['acao'] == 'cadastrarAula') {
            if (!empty($_POST['inputCursoId']) &&
                !empty($_POST['inputTitulo']) &&
                !empty($_POST['inputDescricao']) &&
                !empty($_POST['inputOrdem']) &&
                !empty($_POST['inputDuracao'])) {

                $cursoId = $_POST['inputCursoId'];
                $titulo = $_POST['inputTitulo'];
                $descricao = $_POST['inputDescricao'];
                $ordem = $_POST['inputOrdem'];
                $duracao = $_POST['inputDuracao'];

                inserirAula($cursoId, $titulo, $descricao, $ordem, $duracao);
            }

            header('Location:../view/Ver_aulas.php?id=' . $cursoId);
            die();

    } else if ($_POST['acao'] == 'atualizarAula') {
        if (
            !empty($_POST['inputCodigo']) &&
            !empty($_POST['inputCursoId']) &&
            !empty($_POST['inputTitulo']) &&
            !empty($_POST['inputDescricao']) &&
            !empty($_POST['inputOrdem']) &&
            !empty($_POST['inputDuracao'])) {

            $aulaId = $_POST['inputCodigo'];
            $cursoId = $_POST['inputCursoId'];
            $titulo = $_POST['inputTitulo'];
            $descricao = $_POST['inputDescricao'];
            $ordem = $_POST['inputOrdem'];
            $duracao = $_POST['inputDuracao'];

            alterarAula($titulo, $descricao, $ordem, $duracao, $aulaId);
        }

        header('Location:../view/Ver_aulas.php?id=' . $cursoId);
        die();

    } else if ($_POST['acao'] == 'excluirAula') {
        if (
            !empty($_POST['inputCodigoExcluir']) &&
            !empty($_POST['inputCursoId'])) {
                
            $aulaId = $_POST['inputCodigoExcluir'];
            $cursoId = $_POST['inputCursoId'];

            excluirAula($aulaId);
        }

        header('Location:../view/Ver_aulas.php?id=' . $cursoId);
        die();

    }  else if ($_POST['acao'] == 'atualizarAluno'){
        
        if(!empty($_POST['inputNome']) && 
        !empty($_POST['inputEmail']) &&
        !empty($_POST['inputSenha']) &&
        !empty($_POST['inputCodigo'])) {
        
        $nome = $_POST['inputNome'];
        $email = $_POST['inputEmail'];
        $senha = $_POST['inputSenha'];
        $alunoId = $_POST['inputCodigo'];
        }

        alterarAluno($nome, $email, $senha, $alunoId);

        header('Location:../view/Ver_alunos.php');
        die();

    } else if ($_POST['acao'] == 'excluirAluno'){
        
        if(!empty($_POST['inputCodigoExcluir'])) {

        $alunoId = $_POST['inputCodigoExcluir'];
        
        excluirAluno($alunoId);

        }

        header('Location:../view/Ver_alunos.php');
        die();

    } else if ($_POST['acao'] == 'atualizarProfessor'){
        
        if(!empty($_POST['inputNome']) && 
        !empty($_POST['inputEmail']) &&
        !empty($_POST['inputSenha']) &&
        !empty($_POST['inputEspecialidade']) &&
        !empty($_POST['inputCodigo'])) {
        
        $nome = $_POST['inputNome'];
        $email = $_POST['inputEmail'];
        $senha = $_POST['inputSenha'];
        $especialidade = $_POST['inputEspecialidade'];
        $professorId = $_POST['inputCodigo'];
        }

        alterarProfessor($nome, $email, $senha, $especialidade, $professorId);

        header('Location:../view/Ver_professores.php');
        die();

    } else if ($_POST['acao'] == 'excluirProfessor'){
        
        if(!empty($_POST['inputCodigoExcluir'])) {

        $professorId = $_POST['inputCodigoExcluir'];
        
        excluirProfessor($professorId);

        }

        header('Location:../view/Ver_professores.php');
        die();

    } else if ($_POST['acao'] == 'cadastrarCategoria'){

        if(!empty($_POST['inputNome']) && 
        $_FILES['inputImagem']['error'] == 0) {

        $nome = $_POST['inputNome'];
        $imagem = file_get_contents($_FILES['inputImagem']['tmp_name']);
        
        inserirCategoria($nome, $imagem);

        }

        header('Location:../view/Ver_categorias.php');
        die();

    } else if ($_POST['acao'] == 'atualizarCategoria'){

        if (!empty($_POST['inputNome']) && 
        !empty($_POST['inputCodigo']) &&
        $_FILES['inputImagem']['error'] == 0) {

        $nome = $_POST['inputNome'];
        $categoriaId = $_POST['inputCodigo'];
        $imagem = file_get_contents($_FILES['inputImagem']['tmp_name']);
        
        alterarCategoria($nome, $imagem, $categoriaId);

        }

        header('Location:../view/Ver_categorias.php');
        die();

    } else if ($_POST['acao'] == 'excluirCategoria'){
    
        if(!empty($_POST['inputCodigoExcluir'])) {

        $categoriaId = $_POST['inputCodigoExcluir'];
        
        excluirCategoria($categoriaId);

        }

        header('Location:../view/Ver_categorias.php');
        die();

    }
?>