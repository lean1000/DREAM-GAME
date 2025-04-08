<?php
function renderizarEstrelas($avaliacao) {
    $avaliacao = intval($avaliacao);
    echo '<div class="estrelas">';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $avaliacao) {
            echo '<i class="bi bi-star-fill" style="color: gold;"></i>';
        } else {
            echo '<i class="bi bi-star" style="color: gold;"></i>';
        }
    }
    echo '</div>';
}

renderizarEstrelas($avaliacao); // ← chamada aqui
?>
