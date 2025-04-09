<?php
function renderizarEstrelas($avaliacao) {
    $avaliacao = intval($avaliacao);
    echo '<div class="estrelas">';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $avaliacao) {
            echo '<i class="star filled">★</i>';
        } else {
            echo '<i class="star empty">★</i>';
        }
    }
    echo '</div>';
}
?>