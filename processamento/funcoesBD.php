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

    function retornarAlunos(){

        $conexao = conectarBD();
        $consulta = "SELECT * FROM aluno";
        $listarAlunos = mysqli_query($conexao, $consulta);
        return $listarAlunos;
    }
        
    function alterarAluno($nome, $email, $senha, $alunoId) {

        $conexao = conectarBD();
        $consulta = "UPDATE aluno SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = '$alunoId'";
        mysqli_query($conexao, $consulta);
    }

    function excluirAluno($alunoId) {

        $conexao = conectarBD();
        $consulta = "DELETE FROM aluno WHERE id = '$alunoId'";
        mysqli_query($conexao, $consulta);
    }




    function inserirProfessor($nome, $email, $senha, $categoriaId){

        $conexao = conectarBD();
        $consulta = "INSERT INTO professor (nome, email, senha, categoria_id) VALUES ('$nome','$email','$senha','$categoriaId')";
        mysqli_query($conexao,$consulta);
    }

    function retornarProfessores(){

        $conexao = conectarBD();
        $consulta = "SELECT p.*, c.nome AS categoria_nome 
                    FROM professor p 
                    INNER JOIN categoria c ON p.categoria_id = c.id";
        $listaProfessores = mysqli_query($conexao, $consulta);
        return $listaProfessores;
    }

    function alterarProfessor($nome, $email, $senha, $categoriaId, $professorId) {

        $conexao = conectarBD();
        $consulta = "UPDATE professor SET nome = '$nome', email = '$email', senha = '$senha',  categoria_id = '$categoriaId' WHERE id = '$professorId'";
        mysqli_query($conexao, $consulta);
    }

    function excluirProfessor($professorId) {

        $conexao = conectarBD();
        $consulta = "DELETE FROM professor WHERE id = '$professorId'";
        mysqli_query($conexao, $consulta);
    }





    function inserirCurso($nome, $descricao, $professorId, $categoriaId){

        $conexao = conectarBD();
        $consulta = "INSERT INTO curso (nome, descricao, professor_id, categoria_id) VALUES ('$nome','$descricao','$professorId','$categoriaId')";
        mysqli_query($conexao, $consulta);
    }

    function retornarCursos(){

        $conexao = conectarBD();
        $consulta = "SELECT cu.*, c.nome AS categoria_nome, c.imagem AS categoria_imagem
                    FROM curso cu
                    INNER JOIN categoria c ON cu.categoria_id = c.id";
        $listaCursos = mysqli_query($conexao, $consulta);
        return $listaCursos;
    }

    function retornarNomeCurso($cursoId){

        $conexao = conectarBD();
        $consulta = "SELECT * FROM curso WHERE id = '$cursoId'";
        $nomeCurso = mysqli_query($conexao, $consulta);
        return $nomeCurso;
    }

   function alterarCurso($nome, $descricao, $professorId, $categoriaId, $cursoId){

        $conexao = conectarBD();
        $consulta = "UPDATE curso SET nome = '$nome', descricao = '$descricao', professor_id = '$professorId', categoria_id = '$categoriaId' WHERE id = '$cursoId'";
        mysqli_query($conexao, $consulta);
    }

    function excluirCurso($cursoId){

        $conexao = conectarBD();

        // primeiro apaga as aulas do curso (a aula depende do curso)
        $consulta = "DELETE FROM aula WHERE curso_id = '$cursoId'";
        mysqli_query($conexao, $consulta);

        // depois apaga o curso
        $consulta = "DELETE FROM curso WHERE id = '$cursoId'";
        mysqli_query($conexao, $consulta);
    }




    function inserirAula($cursoId, $titulo, $descricao, $ordem, $duracao){

        $conexao = conectarBD();
        $consulta = "INSERT INTO aula (curso_id, titulo, descricao, ordem, duracao) VALUES ('$cursoId','$titulo','$descricao','$ordem','$duracao')";
        mysqli_query($conexao, $consulta);
    }

    function retornarAulas($cursoId){

        $conexao = conectarBD();
        $consulta = "SELECT * FROM aula WHERE curso_id = '$cursoId' ORDER BY ordem ASC";
        $listaAulas = mysqli_query($conexao, $consulta);
        return $listaAulas;
    }

    function alterarAula($titulo, $descricao, $ordem, $duracao, $aulaId){

        $conexao = conectarBD();
        $consulta = "UPDATE aula SET titulo = '$titulo', descricao = '$descricao', ordem = '$ordem', duracao = '$duracao' WHERE id = '$aulaId'";
        mysqli_query($conexao, $consulta);
    }

    function excluirAula($aulaId) {

        $conexao = conectarBD();
        $consulta = "DELETE FROM aula WHERE id = '$aulaId'";
        mysqli_query($conexao, $consulta);
    }

    function inserirCategoria($nome, $imagem){

        $conexao = conectarBD();
        $imagem = mysqli_real_escape_string($conexao, $imagem);
        $consulta = "INSERT INTO categoria (nome, imagem) VALUES ('$nome', '$imagem')";
        mysqli_query($conexao, $consulta);
    }

    function retornarCategorias(){

        $conexao = conectarBD();
        $consulta = "SELECT * FROM categoria";
        $listaCategorias = mysqli_query($conexao, $consulta);
        return $listaCategorias;
    }

    function alterarCategoria($nome, $imagem, $categoriaId){

        $conexao = conectarBD();
        $imagem = mysqli_real_escape_string($conexao, $imagem);
        $consulta = "UPDATE categoria SET nome = '$nome', imagem = '$imagem' WHERE id = '$categoriaId' ";
        mysqli_query($conexao, $consulta);
    }

    function excluirCategoria($categoriaId) {

        $conexao = conectarBD();
        $consulta = "DELETE FROM categoria WHERE id = '$categoriaId'";
        mysqli_query($conexao, $consulta);
    }

    function inserirProprietario($usuario, $email, $senha){

        $conexao = conectarBD();
        $consulta = "INSERT INTO proprietario (usuario, email, senha) VALUES ('$usuario','$email','$senha')";
        mysqli_query($conexao, $consulta);
    }

    function buscarProprietario($login){

        $conexao = conectarBD();
        $consulta = "SELECT * FROM proprietario WHERE email = '$login' OR usuario = '$login'";
        $resultado = mysqli_query($conexao, $consulta);
        return $resultado;
    }

    function redefinirSenha($email, $senha){

        $conexao = conectarBD();
        $consulta = "UPDATE proprietario SET senha = '$senha' WHERE email = '$email'";
        mysqli_query($conexao, $consulta);
    }

?>