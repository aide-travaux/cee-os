<?php

namespace AideTravaux\CEE\OS\Model\BAR;

abstract class AbstractBAREN implements
    BAREN101,
    BAREN102,
    BAREN103,
    BAREN104,
    BAREN105,
    BAREN106,
    BAREN108,
    BAREN109
{
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

    public function getSurfaceIsolant(): float
    {
        return (float) 0;
    }

    public function getNombreFenetres(): int
    {
        return (int) 0;
    }

    public function getNombreFermetures(): int
    {
        return (int) 0;
    }

    public function getSurfaceToitureProtegee(): float
    {
        return (float) 0;
    }
    
}
