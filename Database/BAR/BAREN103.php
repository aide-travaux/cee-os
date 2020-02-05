<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BAR\BAREN103 as ModelInterface;

abstract class BAREN103
{
    /**
     * @property string
     */
    const NOM = 'Isolation d\'un plancher';

    /**
     * @property string
     */
    const CODE = 'BAR-EN-103';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-en-103_mod_a29-2_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un doublage isolant sur/sous un plancher bas situé entre 
    un volume chauffé et un sous-sol non chauffé, un vide sanitaire ou un passage ouvert';

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
                return 1600;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                return 1300;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                return 900;
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
