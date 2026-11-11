function abrirModal() {
    document.getElementById("cadastrar-modal").style.display = "block";
}

function fecharModal() {
    document.getElementById("cadastrar-modal").style.display = "none";
}
const modal = document.getElementById('cadastrar-modal');
modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        fecharModal();
    }
});