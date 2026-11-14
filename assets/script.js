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