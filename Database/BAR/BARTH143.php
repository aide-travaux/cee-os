<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Database\DatabaseBARInterface;
use AideTravaux\CEE\OS\Database\DatabaseBARTrait;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH143 implements DatabaseBARInterface
{
    use DatabaseBARTrait;

    /**
     * @property string
     */
    const NOM = 'Système solaire combinée (France métropolitaine)';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-143';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-143_2.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiment résidentiel : maisons individuelles existantes en France métropolitaine';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un système solaire combiné (SSC) destiné au chauffage et à la production 
    d\'eau chaude sanitaire';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 20;

    /**
     * @property string
     */
    const TYPE_BATIMENT = Entries::OS_TYPES_BATIMENT['os_type_batiment_2'];

    /**
     * @property string
     */
    const ZONE_GEOGRAPHIQUE = Entries::OS_ZONES_GEOGRAPHIQUES['os_zone_geographique_3'];

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
                return 134800;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                return 121000;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                return 100500;
            default:
                return 0;
        }
    }

    /**
     * @inheritdoc
     */
    public static function getFacteur(BARInterface $model): float
    {
        return (float) 1;
    }

}
