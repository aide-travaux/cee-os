<?php

namespace AideTravaux\CEE\Os\Model\BAR;

interface BARTH124
{
    /**
     * Retourne le code département du projet
     * @return string
     */
    public function getCodeDepartement(): string;

    /**
     * Retourne l'ancienneté du logement
     * @return string
     */
    public function getAncienneteLogement(): string;

    /**
     * Retourne la surface de capteurs installée (m²)
     * @return float
     */
    public function getSurfaceCapteurs(): float;

}
