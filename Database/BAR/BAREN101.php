<?php

namespace AideTravaux\CEE\Os\Database\BAR;

use AideTravaux\CEE\Os\Data\Entries;
use AideTravaux\CEE\Os\Model\BAR\BAREN101 as ModelInterface;

abstract class BAREN101
{
    /**
     * @property string
     */
    const NOM = 'Isolation de combles ou de toiture';

    /**
     * @property string
     */
    const CODE = 'BAR-EN-101';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-en-101_mod_a27-2_a_compter_du_01-04-2018_1.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'une isolation thermique en comble perdu ou en rampant de toiture';

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
                return 1700;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                return 1400;
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
