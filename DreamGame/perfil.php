<link rel="stylesheet" href="./assets/css/perfil.css">
<?php
include './includes/header.php';
require_once './classes/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

try {
    $conn = Conexao::getConexao();
    $id = $_SESSION['usuario_id'];

    $stmt = $conn->prepare("
        SELECT tu.email, tu.senha, ti.nome, ti.apelido 
        FROM tb_info_users tu 
        JOIN tb_users ti ON tu.ID_users = ti.ID_users 
        WHERE tu.ID_users = ?
    ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    if (!$usuario) {
        echo "<p>Usuário não encontrado.</p>";
        exit;
    }
} catch (Exception $e) {
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

            <input type="text" name="apelido" class="perfil-input" value="<?= htmlspecialchars($usuario['apelido']) ?>" disabled required>
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