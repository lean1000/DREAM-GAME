<?php
include './includes/header.php'; // Já inicia a sessão, então não precisa chamar session_start() aqui

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

try {
    $banco = new PDO("mysql:host=localhost;dbname=db_dreamgame", "root", "");
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_SESSION['usuario_id'];

    $query = "SELECT tu.email, tu.senha, ti.nome 
              FROM tb_info_users tu 
              JOIN tb_users ti ON tu.ID_users = ti.ID_users 
              WHERE tu.ID_users = :id";
    $stmt = $banco->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        echo "<p>Usuário não encontrado.</p>";
        exit;
    }
} catch (PDOException $e) {
    die("Erro no banco de dados: " . $e->getMessage());
}
?>

<section class="perfil-section">
    <main class="perfil-main">
        <form method="POST" action="./auxilio/atualizar_perfil.php" id="formPerfil">
            <div class="perfil-header">
                <h1 class="perfil-nome"><?= htmlspecialchars($usuario['nome']) ?></h1>
                <a href="./auxilio/logout.php" class="perfil-btn-sair">Sair</a>
            </div>

            <h2 class="perfil-subtitulo">Informações da Conta</h2>
            <hr class="perfil-linha">

            <input type="text" name="nome" class="perfil-input" value="<?= htmlspecialchars($usuario['nome']) ?>" disabled required>
            <input type="email" name="email" class="perfil-input" value="<?= htmlspecialchars($usuario['email']) ?>" disabled required>
            <input type="password" name="senha" class="perfil-input" placeholder="Nova senha (opcional)" disabled>

            <div class="perfil-botoes">
                <button type="button" class="perfil-botao-editar" onclick="habilitarEdicao()">Editar</button>
                <input type="submit" class="perfil-botao-salvar" value="Salvar Alterações" style="display: none;">
            </div>
        </form>
    </main>
</section>

<script>
function habilitarEdicao() {
    const inputs = document.querySelectorAll('.perfil-input');
    const salvarBtn = document.querySelector('.perfil-botao-salvar');
    const editarBtn = document.querySelector('.perfil-botao-editar');

    inputs.forEach(input => input.disabled = false);
    salvarBtn.style.display = 'inline-block';
    editarBtn.style.display = 'none';
}
</script>

<?php include './includes/footer.php'; ?>