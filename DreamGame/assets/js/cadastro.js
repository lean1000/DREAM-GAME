document.addEventListener("DOMContentLoaded", () => {
    const nomeInput = document.getElementById("nomeCompleto");

    nomeInput.addEventListener("input", () => {
        let valor = nomeInput.value
            .toLowerCase()
            .replace(/[^a-zA-ZÀ-ÿ\s]/g, "")
            .replace(/\b\w/g, (char) => char.toUpperCase());
        nomeInput.value = valor;
    });
});

async function verificarExistencia(campo, valor) {
    const formData = new FormData();
    formData.append("campo", campo);
    formData.append("valor", valor);

    const response = await fetch("./auxilio/verificaUsuario.php", {
        method: "POST",
        body: formData,
    });
    const resultado = await response.text();
    return resultado === "existe";
}

async function validarFormulario() {
    let apelido = document.getElementById("apelido").value.trim();
    let nome = document.getElementById("nomeCompleto").value.trim();
    let email = document.getElementById("email").value.trim();
    let senha = document.getElementById("senha").value;
    let confirmarSenha = document.getElementById("confirmarSenha").value;
    let dataNascimento = document.getElementById("dataNascimento").value;
    let erroMsg = document.getElementById("erroMsg");

    erroMsg.style.display = "none";
    erroMsg.innerHTML = "";

    const emailRegex = /^[^\s@]+@[^\s@]+\.(com|br|net|org|gov|edu)$/;
    const senhaRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/;

    if (await verificarExistencia("apelido", apelido)) {
        erroMsg.innerHTML = "Este apelido já está em uso.";
        erroMsg.style.display = "block";
        return false;
    }

    if (await verificarExistencia("email", email)) {
        erroMsg.innerHTML = "Este e-mail já está cadastrado.";
        erroMsg.style.display = "block";
        return false;
    }

    if (!emailRegex.test(email)) {
        erroMsg.innerHTML = "Por favor, insira um e-mail válido.";
        erroMsg.style.display = "block";
        return false;
    }

    if (!senhaRegex.test(senha)) {
        erroMsg.innerHTML = "A senha deve conter entre 8 e 16 caracteres, incluindo uma letra, um número e um caractere especial.";
        erroMsg.style.display = "block";
        return false;
    }

    if (senha !== confirmarSenha) {
        erroMsg.innerHTML = "As senhas não coincidem.";
        erroMsg.style.display = "block";
        return false;
    }

    let anoNascimento = new Date(dataNascimento).getFullYear();
    if (anoNascimento < 1970 || anoNascimento > 2025) {
        erroMsg.innerHTML = "O ano de nascimento deve estar entre 1970 e 2025.";
        erroMsg.style.display = "block";
        return false;
    }

    return true;
}