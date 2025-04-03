function validarFormulario(event) {
    event.preventDefault();
    
    let email = document.getElementById("email").value;
    let senha = document.getElementById("senha").value;
    let confirmarSenha = document.getElementById("confirmarSenha").value;
    let dataNascimento = document.getElementById("dataNascimento").value;
    let erroMsg = document.getElementById("erroMsg");
    
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let senhaRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/;
    
    erroMsg.style.display = "none";
    erroMsg.innerHTML = "";
    
    if (!emailRegex.test(email)) {
        erroMsg.innerHTML = "Por favor, insira um e-mail válido.";
        erroMsg.style.display = "block";
        return false;
    }
    
    if (!senhaRegex.test(senha)) {
        erroMsg.innerHTML = "A senha deve ter entre 8 e 16 caracteres, incluindo pelo menos uma letra, um número e um caractere especial.";
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
    
    document.getElementById("cadastroForm").submit();
}