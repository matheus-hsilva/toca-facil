function abrirModal() {
    document.getElementById("cadastrar-modal").style.display = "block";
}

function abrirModalAtualizar(id) {
    document.getElementById("codigo-aluno").value = id;
    document.getElementById("atualizar-modal").style.display = "block";
}

function abrirModalExcluir(id) {
    document.getElementById("codigo-excluir").value = id;
    document.getElementById("excluir-modal").style.display = "block";
}

function fecharModal() {
    document.getElementById("cadastrar-modal").style.display = "none";
    document.getElementById("atualizar-modal").style.display = "none";
    document.getElementById("excluir-modal").style.display = "none";
}

const modalCadastrar = document.getElementById('cadastrar-modal');
const modalAtualizar = document.getElementById('atualizar-modal');
const modalExcluir = document.getElementById('excluir-modal');
modalCadastrar.addEventListener('click', (e) => {
    if (e.target === modalCadastrar) {
        fecharModal();
    }
});

modalAtualizar.addEventListener('click', (e) => {
 if (e.target === modalAtualizar) {
        fecharModal();
    } 
});

modalExcluir.addEventListener('click', (e) => {
 if (e.target === modalExcluir) {
        fecharModal();
    } 
});

function abrirModalAtualizarAula(id, titulo, descricao, ordem, duracao) {
    document.getElementById("codigo-aula").value = id;
    document.getElementById("titulo-aula").value = titulo;
    document.getElementById("descricao-aula").value = descricao;
    document.getElementById("ordem-aula").value = ordem;
    document.getElementById("duracao-aula").value = duracao;
    document.getElementById("atualizar-modal").style.display = "block";
}

function abrirModalExcluirAula(id) {
    document.getElementById("codigo-excluir-aula").value = id;
    document.getElementById("excluir-modal").style.display = "flex";
}

function filtrarProfessores(idCategoria, idProfessor) {
    const categoria = document.getElementById(idCategoria).value;
    const selectProfessor = document.getElementById(idProfessor);

    selectProfessor.disabled = false;
    selectProfessor.value = "";

    for (const opcao of selectProfessor.options) {
        if (opcao.value === "") continue;

        const combina = opcao.dataset.especialidade === categoria;
        opcao.hidden = !combina;
        opcao.disabled = !combina;
    }
}

function abrirModalAtualizarCurso(id, nome, descricao, professorId, categoria) {
    document.getElementById("codigo-curso").value = id;
    document.getElementById("nome-curso").value = nome;
    document.getElementById("descricao-curso").value = descricao;
    document.getElementById("categoria-curso").value = categoria;
    filtrarProfessores("categoria-curso", "professor-curso");
    document.getElementById("professor-curso").value = professorId;
    document.getElementById("atualizar-modal").style.display = "block";
}

function abrirModalExcluirCurso(id) {
    document.getElementById("codigo-excluir-curso").value = id;
    document.getElementById("excluir-modal").style.display = "block";
}