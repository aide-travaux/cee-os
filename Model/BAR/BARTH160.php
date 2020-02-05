<?php

namespace AideTravaux\CEE\Os\Model\BAR;

interface BARTH160
{
    /**
     * Retourne la zone climatique du projet
     * @return string
     */
    public function getZoneClimatique(): string;

    /**
     * Retourne la longueur isolée du réseau de chauffage ou d’ECS hors du volume chauffé
     * @return float
     */
    public function getLongueurReseauIsolee(): float;

}
