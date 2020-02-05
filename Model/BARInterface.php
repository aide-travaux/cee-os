<?php

namespace AideTravaux\CEE\OS\Model;

interface BARInterface
{
    /**
     * Retourne le code administratif du département du projet
     * @return string
     */
    public function getCodeDepartement(): string;

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
     * Retourne l'ancienneté du logement
     * @return string
     */
    public function getAncienneteLogement(): string;

    /**
     * Retourne l'énergie de chauffage du logement
     * @return string
     */
    public function getEnergieChauffage(): string;

    /**
     * Retourne le type de chauffage du logement
     * @return string
     */
    public function getTypeChauffage(): string;

    /**
     * Retourne la surface des capteurs solaires intallés
     * @return float
     */
    public function getSurfaceCapteurs(): float;

    /**
     * Retourne la surface chauffée par l'appareil installé
     * @return float
     */
    public function getSurfaceChauffee(): float;

    /**
     * Retourne la surface habitable du logement
     * @return float
     */
    public function getSurfaceHabitable(): float;

    /**
     * Retourne la surface de l'isolant posé
     * @return float
     */
    public function getSurfaceIsolant(): float;

    /**
     * Retourne la surface de toiture protégée
     * @return float
     */
    public function getSurfaceToitureProtegee(): float;

    /**
     * Retourne l'efficacité énergétique saisonnière de l'apparel installé
     * @return int
     */
    public function getEfficaciteSaisonniere(): int;

    /**
     * Retoune le coefficient de performance énergétique saisonnier de l'appareil installé
     * @return float
     */
    public function getScop(): float;

    /**
     * Retourne le nombre d'appartement
     * @return int
     */
    public function getNombreAppartements(): int;

    /**
     * Retourne le nombre de chaudières installées
     * @return int
     */
    public function getNombreChaudieres(): int;

    /**
     * Retourne le nombre de radiateurs installés
     * @return int
     */
    public function getNombreRadiateurs(): int;

    /**
     * Retourne le nombre de robinets thermostatiques installés
     * @return int
     */
    public function getNombreRobinetsThermostatiques(): int;

    /**
     * Retourne le nombre de fenêtres et portes-fenêtres installées
     * @return int
     */
    public function getNombreFenetres(): int;

    /**
     * Retourne le nombre de fermetures installées
     * @return int
     */
    public function getNombreFermetures(): int;

    /**
     * Retourne le type de VMC double flux installée
     * @return string
     */
    public function getTypeVmcDoubleFlux(): string;

    /**
     * Retourne le type d'échangeur installé
     * @return string
     */
    public function getTypeEchangeurVentilation(): string;

    /**
     * Retourne le type de VMC simple flux installée
     * @return string
     */
    public function getTypeVmcSimpleFlux(): string;

    /**
     * Retourne le type de caisson de ventilation installé
     * @return string
     */
    public function getTypeCaissonVentilation(): string;

    /**
     * Retourne le type de ventilation hybride installée
     * @return string
     */
    public function getTypeVentilationHybride(): string;

    /**
     * Retourne le type d'extracteur de ventilation installé
     * @return string
     */
    public function getTypeExtracteurVentilation(): string;

    /**
     * Retourne la longueur du réseau de chauffage ou de production d'ECS isolée
     * @return float
     */
    public function getLongueurReseauIsolee(): float;
}
