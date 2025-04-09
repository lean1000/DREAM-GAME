document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formEsqueciSenha");
    const apelidoInput = document.querySelector("input[name='apelido']");
    const novaSenhaInput = document.getElementById("nova_senha");
    const confirmarSenhaInput = document.getElementById("confirmar_senha");
    const btnSalvar = document.getElementById("btnSalvar");
    const boxList = document.getElementById("errosLista");

    let apelidoValido = false;

    apelidoInput.addEventListener("input", function () {
        const apelido = apelidoInput.value.trim();
        boxList.innerHTML = "";

        if (apelido.length > 0) {
            fetch(`./auxilio/verifica_apelido.php?apelido=${encodeURIComponent(apelido)}`)
                .then(response => response.text())
                .then(data => {
                    if (data === 'nao_existe') {
                        apelidoValido = false;
                        mostrarErro("Apelido não encontrado.");
                    } else {
                        apelidoValido = true;
                    }
                });
        }
    });

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        boxList.innerHTML = "";

        const novaSenha = novaSenhaInput.value;
        const confirmarSenha = confirmarSenhaInput.value;

        const senhaRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-])[A-Za-z\d!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]{8,16}$/;

        let erros = [];

        if (!apelidoValido) {
            erros.push("Apelido inválido ou não encontrado.");
        }

        if (!senhaRegex.test(novaSenha)) {
            erros.push("A senha deve ter entre 8 e 16 caracteres e conter pelo menos uma letra, um número e um caractere especial.");
        }

        if (novaSenha !== confirmarSenha) {
            erros.push("As senhas não coincidem.");
        }

        if (erros.length > 0) {
            erros.forEach(erro => mostrarErro(erro));
        } else {
            form.submit();
        }
    });

    function mostrarErro(msg) {
        const li = document.createElement("li");
        li.textContent = msg;
        boxList.appendChild(li);
    }
});