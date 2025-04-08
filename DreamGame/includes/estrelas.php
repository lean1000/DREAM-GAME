<?php
function renderizarEstrelas($avaliacao) {
    $avaliacao = intval($avaliacao); // Garantir que a avaliação seja um número inteiro
    echo '<div class="estrelas">'; // Contêiner para as estrelas
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $avaliacao) {
            echo '<i class="star filled">★</i>'; // Para estrelas cheias
        } else {
            echo '<i class="star empty">★</i>'; // Para estrelas vazias
        }
    }
    echo '</div>';
}
?>