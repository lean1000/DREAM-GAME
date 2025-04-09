document.getElementById("formEsqueciSenha").addEventListener("submit", function (e) {
    const novaSenha = document.getElementById("nova_senha").value;
    const confirmarSenha = document.getElementById("confirmar_senha").value;

    const senhaRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-])[A-Za-z\d!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]{8,16}$/;

    if (!senhaRegex.test(novaSenha)) {
        alert("A senha deve ter entre 8 e 16 caracteres e conter pelo menos uma letra, um número e um caractere especial.");
        e.preventDefault();
        return;
    }

    if (novaSenha !== confirmarSenha) {
        alert("As senhas não coincidem.");
        e.preventDefault();
        return;
    }
});
