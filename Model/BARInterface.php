<?php

namespace AideTravaux\CEE\OS\Model;

interface BARInterface
{

    public function getCodeDepartement(): string;

    public function getZoneClimatique(): string;

    public function getTypeLogement(): string;

    public function getAncienneteLogement(): string;

    public function getEnergieChauffage(): string;

    public function getTypeChauffage(): string;

    public function getSurfaceCapteurs(): float;

    public function getSurfaceChauffee(): float;

    public function getSurfaceHabitable(): float;

    public function getSurfaceIsolant(): float;

    public function getSurfaceToitureProtegee(): float;

    public function getEfficaciteSaisonniere(): int;

    public function getScop(): float;

    public function getNombreLogements(): int;

    public function getNombreChaudieres(): int;

    public function getNombreRadiateurs(): int;

    public function getNombreRobinetsThermostatiques(): int;

    public function getNombreFenetres(): int;

    public function getNombreFermetures(): int;

    public function getTypeVmcDoubleFlux(): string;

    public function getTypeEchangeurVentilation(): string;

    public function getTypeVmcSimpleFlux(): string;

    public function getTypeCaissonVentilation(): string;

    public function getTypeVentilationHybride(): string;

    public function getTypeExtracteurVentilation(): string;

    public function getLongueurReseauIsolee(): float;

}
