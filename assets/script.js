function abrirModal() {
    document.getElementById("cadastrar-modal").style.display = "block";
}

function fecharModal() {
    document.getElementById("cadastrar-modal").style.display = "none";
    document.getElementById("atualizar-modal").style.display = "none";
}

function abrirModalAtualizar(id) {
    document.getElementById("codigo-aluno").value = id;
    document.getElementById("atualizar-modal").style.display = "block";
}

const modalCadastrar = document.getElementById('cadastrar-modal');
const modalAtualizar = document.getElementById('atualizar-modal');
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