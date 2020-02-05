<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH113
{
    /**
     * @property string
     */
    const NOM = 'Chaudière biomasse individuelle';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-113';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-113_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Maisons individuelles existantes';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'une chaudière biomasse individuelle';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 17;

    /**
     * @property string
     */
    const TYPE_BATIMENT = Entries::OS_TYPES_BATIMENT['os_type_batiment_2'];

    /**
     * @property string
     */
    const ZONE_GEOGRAPHIQUE = Entries::OS_ZONES_GEOGRAPHIQUES['os_zone_geographique_1'];

    /**
     * Retourne le montant de certificats pour les informations transmises
     * @param BARInterface
     * @return float
     */
    public static function get(BARInterface $model): float
    {
        return (float) self::getMontantForfaitaire($model);
    }

    /**
     * Retourne le montant forfaitaire de certificats en kWh cumac
     * @param BARInterface
     * @return int
     */
    public static function getMontantForfaitaire(BARInterface $model): int
    {
        switch ($model->getZoneClimatique()) {
            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                return 142300;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                return 116400;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                return 77600;
            default:
                return 0;
        }
    }

}
