<?php

function renderEstrellas(int $puntos, int $votos): string {
    if ($votos <= 0) {
        return 'Sin valorar';
    }

    $media = $puntos / $votos;          
    $enteras = (int) floor($media);    
    $mediaEstrella = ($media - $enteras) >= 0.5;

    $html = $votos . ' ' . ($votos === 1 ? 'Valoración' : 'Valoraciones') . ' ';

    for ($i = 0; $i < $enteras; $i++) {
        $html .= '<i class="bi bi-star-fill"></i>';
    }

    if ($mediaEstrella) {
        $html .= '<i class="bi bi-star-half"></i>';
    }

    // Opcional: completar hasta 5 estrellas (vacías)
    $pintadas = $enteras + ($mediaEstrella ? 1 : 0);
    for ($i = $pintadas; $i < 5; $i++) {
        $html .= '<i class="bi bi-star"></i>';
    }

    return $html;
}
