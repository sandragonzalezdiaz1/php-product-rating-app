<?php

/**
 * Genera el HTML de la valoración de un producto en forma de estrellas.
 * 
 * Calcula la media de puntuación a partir del total de puntos y del número
 * de votos, mostrando:
 * - El número de valoraciones
 * - Estrellas completas según la parte entera de la media
 * - Media estrella si la parte decimal es mayor o igual a 0.5
 * 
 * Utiliza iconos de Bootstrap Icons.
 *
 * @param int $puntos Suma total de puntos del producto
 * @param int $votos Número total de votos del producto
 * 
 * @return string HTML con el texto y las estrellas correspondientes
 */
function renderEstrellas(int $puntos, int $votos): string {

    // Si el producto no tiene votos
    if ($votos <= 0) {
        return 'Sin valorar';
    }

    // Calcula la media de puntuación
    $media = $puntos / $votos;

    // Parte entera de la media (número de estrellas completas)
    $enteras = (int) floor($media);

    // Determina si debe mostrarse media estrella
    $mediaEstrella = ($media - $enteras) >= 0.5;

    // Texto con el número de valoraciones
    $texto = $votos . ' ' . ($votos === 1 ? 'Valoración' : 'Valoraciones') . ' ';

    // Añade las estrellas completas
    for ($i = 0; $i < $enteras; $i++) {
        $texto .= '<i class="bi bi-star-fill"></i>';
    }

    // Añade media estrella si corresponde
    if ($mediaEstrella) {
        $texto .= '<i class="bi bi-star-half"></i>';
    }

    return $texto;
}
