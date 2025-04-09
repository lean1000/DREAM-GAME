document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('cadastroForm');
    const btnCadastrar = document.getElementById('btnCadastrar');

    const apelido = document.getElementById('apelido');
    const email = document.getElementById('email');
    const nome = document.getElementById('nomeCompleto');
    const senha = document.getElementById('senha');
    const confirmarSenha = document.getElementById('confirmarSenha');

    const erros = {
        apelido: document.getElementById('erroApelido'),
        email: document.getElementById('erroEmail'),
        nome: document.getElementById('erroNome'),
        senha: document.getElementById('erroSenha'),
        confirmarSenha: document.getElementById('erroConfirmarSenha')
    };

    const validarNome = nome => /^([A-ZÁÉÍÓÚÂÊÎÔÛÃÕ][a-záéíóúâêîôûãõ]+)(\s[A-ZÁÉÍÓÚÂÊÎÔÛÃÕ][a-záéíóúâêîôûãõ]+)+$/.test(nome);
    const validarSenha = senha => /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/.test(senha);

    const validarCampos = async () => {
        let valido = true;

        // Apelido
        if (apelido.value.length < 3) {
            erros.apelido.innerText = 'Apelido muito curto.';
            erros.apelido.style.display = 'block';
            valido = false;
        } else {
            const response = await fetch(`./auxilio/verifica_existencia.php?campo=apelido&valor=${apelido.value}`);
            const data = await response.json();
            if (data.existe) {
                erros.apelido.innerText = 'Apelido já existe.';
                erros.apelido.style.display = 'block';
                valido = false;
            } else {
                erros.apelido.style.display = 'none';
            }
        }

        // Nome
        if (!validarNome(nome.value)) {
            erros.nome.innerText = 'Nome inválido.';
            erros.nome.style.display = 'block';
            valido = false;
        } else {
            erros.nome.style.display = 'none';
        }

        // Email
        if (!email.value.includes('@')) {
            erros.email.innerText = 'Email inválido.';
            erros.email.style.display = 'block';
            valido = false;
        } else {
            const response = await fetch(`./auxilio/verifica_existencia.php?campo=email&valor=${email.value}`);
            const data = await response.json();
            if (data.existe) {
                erros.email.innerText = 'Email já cadastrado.';
                erros.email.style.display = 'block';
                valido = false;
            } else {
                erros.email.style.display = 'none';
            }
        }

        // Senha
        if (!validarSenha(senha.value)) {
            erros.senha.innerText = 'Senha fraca.';
            erros.senha.style.display = 'block';
            valido = false;
        } else {
            erros.senha.style.display = 'none';
        }

        // Confirmar senha
        if (senha.value !== confirmarSenha.value) {
            erros.confirmarSenha.innerText = 'Senhas diferentes.';
            erros.confirmarSenha.style.display = 'block';
            valido = false;
        } else {
            erros.confirmarSenha.style.display = 'none';
        }

        btnCadastrar.disabled = !valido;
    };

    form.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', validarCampos);
    });
});