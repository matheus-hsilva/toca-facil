function abrirModal() {
    document.getElementById("cadastrar-modal").style.display = "block";
}

function abrirModalAtualizar(campo, id) {
    document.getElementById(campo).value = id;
    document.getElementById("atualizar-modal").style.display = "block";
}

function abrirModalExcluir(campo, id) {
    document.getElementById(campo).value = id;
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

