const editarBtn = document.querySelector('.perfil-editar-btn');
const salvarBtn = document.querySelector('.perfil-salvar-btn');
const inputs = document.querySelectorAll('.perfil-input');

editarBtn.addEventListener('click', () => {
    inputs.forEach(input => {
        input.removeAttribute('readonly');
        input.style.backgroundColor = "#fff";
    });
    editarBtn.style.display = 'none';
    salvarBtn.style.display = 'inline-block';
});

salvarBtn.addEventListener('click', (e) => {

    alert("Informações salvas!");
});