<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH163
{
    /**
     * @property string
     */
    const NOM = 'Conduit d\'évacuation des produits de combustion';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-163';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-163.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels collectifs existants disposant, pour chaque logement, 
    d\'un chauffage central individuel par chaudière utilisant un combustible gazeux';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un conduit d\'évacuation des produits de combustion permettant le 
    raccordement de chaudières à condensation en remplacement de chaudières individuelles non étanches 
    (type B) ou étanches sur un conduit collectif fonctionnant en tirage naturel';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 30;

    /**
     * @property string
     */
    const TYPE_BATIMENT = Entries::OS_TYPES_BATIMENT['os_type_batiment_5'];

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
        return (float) self::getMontantForfaitaire($model) * self::getFacteur($model);
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
                return 37600;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                return 32300;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                return 24600;
            default:
                return 0;
        }
    }

    /**
     * Nombre de chaudières à raccorder au conduit
     * @param BARInterface
     * @return float
     */
    public static function getFacteur(BARInterface $model): float
    {
        return (float) $model->getNombreChaudieres();
    }

}
