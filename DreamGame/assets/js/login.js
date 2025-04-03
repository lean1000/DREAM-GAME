function validarFormulario(event) {
    event.preventDefault();
    
    let email = document.getElementById("email").value;
    let senha = document.getElementById("senha").value;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (!emailRegex.test(email)) {
        alert("Por favor, insira um e-mail válido.");
        return false;
    }
    
    if (senha.length > 16) {
        alert("A senha deve ter no máximo 16 caracteres.");
        return false;
    }
    
    document.getElementById("loginForm").submit();
}