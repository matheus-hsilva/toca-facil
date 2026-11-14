
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

    function retornarCursos(){
        $conexao = conectarBD();
        $consulta = "SELECT id, nome, descricao, imagem FROM curso";
        $listaCursos = mysqli_query($conexao, $consulta);
        return $listaCursos;
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

    function inserirAula($cursoId, $titulo, $descricao, $ordem, $duracao){
        $conexao = conectarBD();
        $consulta = "INSERT INTO aula (curso_id, titulo, descricao, ordem, duracao) VALUES ('$cursoId','$titulo','$descricao','$ordem','$duracao')";
        mysqli_query($conexao, $consulta);
    }

    function retornarAulas($cursoId){
    $conexao = conectarBD();
    $consulta = "SELECT * FROM aula
                 WHERE curso_id = '$cursoId'
                 ORDER BY ordem ASC";
    $listaAulas = mysqli_query($conexao, $consulta);
    return $listaAulas;
    }

    function alterarAula($titulo, $descricao, $ordem, $duracao, $aulaId){
        $conexao = conectarBD();
        $consulta = "UPDATE aula SET
                 titulo = '$titulo',
                 descricao = '$descricao',
                 ordem = '$ordem',
                 duracao = '$duracao'
                 WHERE id = '$aulaId'";
        mysqli_query($conexao, $consulta);
    }

    function excluirAula($aulaId) {
        $conexao = conectarBD();
        $consulta = "DELETE FROM aula WHERE id = '$aulaId'";
        mysqli_query($conexao, $consulta);
}

?>
