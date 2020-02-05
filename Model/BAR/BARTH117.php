<?php

namespace AideTravaux\CEE\Os\Model\BAR;

interface BARTH117
{
    /**
     * Retourne la zone climatique du projet
     * @return string
     */
    public function getZoneClimatique(): string;

    /**
     * Retourne le type de logement
     * @return string
     */
    public function getTypeLogement(): string;

    /**
     * Retourne le type de chauffage
     * @return string
     */
    public function getTypeChauffage(): string;

    /**
     * Retourne le nombre de robinets thermostatiques installés
     * @return int
     */
    public function getNombreRobinetsThermostatiques(): int;

}
