<?php
    session_start();
    require "funcoesBD.php";

    if ($_POST['acao'] == 'cadastrarAluno'){

        if(!empty($_POST['inputNome']) && 
        !empty($_POST['inputEmail']) &&
        !empty($_POST['inputSenha'])) {
        
            $nome = $_POST['inputNome'];
            $email = $_POST['inputEmail'];
            $senha = password_hash($_POST['inputSenha'], PASSWORD_DEFAULT);
            
            inserirAluno($nome, $email, $senha);
        }


        header('Location:../view/Ver_alunos.php');
        die();

    } else if ($_POST['acao'] == 'cadastrarProfessor'){
        
        if(!empty($_POST['inputNome']) && 
        !empty($_POST['inputEmail']) &&
        !empty($_POST['inputSenha']) &&
        !empty($_POST['inputEspecialidade'])) {
        
            $nome = $_POST['inputNome'];
            $email = $_POST['inputEmail'];
            $senha = password_hash($_POST['inputSenha'], PASSWORD_DEFAULT);
            $categoriaId = $_POST['inputEspecialidade'];
            
            inserirProfessor($nome, $email, $senha, $categoriaId);
        }


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
            $categoriaId = $_POST['inputCategoria'];
           
            inserirCurso($nome, $descricao, $professorId, $categoriaId);
        }


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
            $categoriaId = $_POST['inputCategoria'];

            alterarCurso($nome, $descricao, $professorId, $categoriaId, $cursoId);
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
        if (!empty($_POST['inputCodigo']) &&
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
        if (!empty($_POST['inputCodigoExcluir']) &&
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

            alterarAluno($nome, $email, $senha, $alunoId);
        }


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
            $categoriaId = $_POST['inputEspecialidade'];
            $professorId = $_POST['inputCodigo'];
            
            alterarProfessor($nome, $email, $senha, $categoriaId, $professorId);
        }

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

            try {
                excluirCategoria($categoriaId);
            } catch (mysqli_sql_exception $e) {
                $_SESSION['erroCategoria'] = "Esta categoria está sendo usada em cursos ou professores.";
            }
        }

        header('Location:../view/Ver_categorias.php');
        die();

        } else if ($_POST['acao'] == 'login'){

            $login = $_POST['inputLogin'];
            $senha = $_POST['inputSenha'];

            $resultado = buscarProprietario($login);
            $proprietario = mysqli_fetch_assoc($resultado);

            if ($proprietario && password_verify($senha, $proprietario['senha'])) {

                $_SESSION['proprietarioId'] = $proprietario['id'];
                $_SESSION['proprietarioUsuario'] = $proprietario['usuario'];

                header('Location:../view/Principal.php');
                die();
            }

            $_SESSION['erroLogin'] = 'Usuário ou senha incorretos.';
            header('Location:../view/login.php');
            die();

        } else if ($_POST['acao'] == 'cadastrarProprietario'){

            if (!empty($_POST['inputUsuario']) &&
            !empty($_POST['inputEmail']) &&
            !empty($_POST['inputSenha'])) {

                $usuario = $_POST['inputUsuario'];
                $email = $_POST['inputEmail'];
                $senha = password_hash($_POST['inputSenha'], PASSWORD_DEFAULT);

                if (mysqli_num_rows(buscarProprietario($usuario)) > 0 || mysqli_num_rows(buscarProprietario($email)) > 0) {
                    $_SESSION['erroCadastro'] = 'Usuário ou e-mail já cadastrado.';
                    header('Location:../view/Cadastrar_proprietario.php');
                    die();
                }

                inserirProprietario($usuario, $email, $senha);
            }

            header('Location:../view/login.php');
            die();

        } else if ($_POST['acao'] == 'redefinirSenha'){

        if (!empty($_POST['inputEmail']) && 
        !empty($_POST['inputSenha'])) {

            $email = $_POST['inputEmail'];
            $senha = password_hash($_POST['inputSenha'], PASSWORD_DEFAULT);
            
            redefinirSenha($email, $senha);
        }

        header('Location:../view/login.php');
        die();

    }
?>

