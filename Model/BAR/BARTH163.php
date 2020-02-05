<?php

namespace AideTravaux\CEE\OS\Model\BAR;

interface BARTH163
{
    /**
     * Retourne la zone climatique du projet
     * @return string
     */
    public function getZoneClimatique(): string;

    /**
     * Retourne le nombre de chaudières à raccorder au conduit
     * @return int
     */
    public function getNombreChaudieres(): int;

}
