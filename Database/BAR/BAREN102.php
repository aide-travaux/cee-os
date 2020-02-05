<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BAR\BAREN102 as ModelInterface;

abstract class BAREN102
{
    /**
     * @property string
     */
    const NOM = 'Isolation des murs';

    /**
     * @property string
     */
    const CODE = 'BAR-EN-102';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-en-102_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un doublage isolant (complexe ou sur ossature) sur mur(s) en façade ou en pignon';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 30;

    /**
     * Retourne le montant de certificats pour les informations transmises
     * @param ModelInterface
     * @return float
     */
    public static function get(ModelInterface $model): float
    {
        return (float) self::getMontantForfaitaire($model) * self::getFacteur($model);
    }

    /**
     * Retourne le montant forfaitaire de certificats en kWh cumac
     * @param ModelInterface
     * @return int
     */
    public static function getMontantForfaitaire(ModelInterface $model): int
    {
        switch ($model->getZoneClimatique()) {
            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                switch ($model->getEnergieChauffage()) {
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                        return 2400;
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                        return 3800;
                    default:
                        return 0;
                }
            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                switch ($model->getEnergieChauffage()) {
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                        return 2000;
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                        return 3100;
                    default:
                        return 0;
                }
            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                switch ($model->getEnergieChauffage()) {
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                        return 1300;
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                        return 2100;
                    default:
                        return 0;
                }
            default:
                return 0;
        }
    }

    /**
     * Surface d'isolant
     * @param ModelInterface
     * @return float
     */
    public static function getFacteur(ModelInterface $model): float
    {
        return (float) $model->getSurfaceIsolant();
    }

}
