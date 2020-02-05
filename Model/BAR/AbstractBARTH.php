<?php

namespace AideTravaux\CEE\Os\Model\BAR;

abstract class AbstractBARTH implements
    BARTH101,
    BARTH104,
    BARTH106,
    BARTH110,
    BARTH111,
    BARTH112,
    BARTH116,
    BARTH117,
    BARTH118,
    BARTH121,
    BARTH123,
    BARTH124,
    BARTH125,
    BARTH127,
    BARTH129,
    BARTH137,
    BARTH143,
    BARTH148,
    BARTH155,
    BARTH158,
    BARTH159,
    BARTH160,
    BARTH162,
    BARTH163
{

    public function getCodeDepartement(): string
    {
        return '';
    }

    public function getZoneClimatique(): string
    {
        return '';
    }

    public function getTypeLogement(): string
    {
        return '';
    }

    public function getAncienneteLogement(): string
    {
        return '';
    }

    public function getEnergieChauffage(): string
    {
        return '';
    }

    public function getTypeChauffage(): string
    {
        return '';
    }

    public function getSurfaceCapteurs(): float
    {
        return (float) 0;
    }

    public function getSurfaceIsolant(): float
    {
        return (float) 0;
    }

    public function getSurfaceToitureProtegee(): float
    {
        return (float) 0;
    }

    public function getSurfaceChauffee(): float
    {
        return (float) 0;
    }

    public function getSurfaceHabitable(): float
    {
        return (float) 0;
    }

    public function getEfficaciteSaisonniere(): int
    {
        return (int) 0;
    }

    public function getScop(): float
    {
        return (float) 0;
    }

    public function getNombreAppartements(): int
    {
        return (int) 0;
    }

    public function getNombreChaudieres(): int
    {
        return (int) 0;
    }

    public function getNombreRadiateurs(): int
    {
        return (int) 0;
    }

    public function getNombreRobinetsThermostatiques(): int
    {
        return (int) 0;
    }

    public function getNombreFenetres(): float
    {
        return (float) 0;
    }

    public function getNombreFermetures(): int
    {
        return (int) 0;
    }

    public function getTypeVmcDoubleFlux(): string
    {
        return '';
    }

    public function getTypeEchangeurVentilation(): string
    {
        return '';
    }

    public function getTypeVmcSimpleFlux(): string
    {
        return '';
    }

    public function getTypeCaissonVentilation(): string
    {
        return '';
    }

    public function getTypeVentilationHybride(): string
    {
        return '';
    }

    public function getTypeExtracteurVentilation(): string
    {
        return '';
    }

    public function getLongueurReseauIsolee(): float
    {
        return (float) 0;
    }
    
}
