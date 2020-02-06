<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Database\DatabaseBARInterface;
use AideTravaux\CEE\OS\Database\DatabaseBARTrait;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH117 implements DatabaseBARInterface
{
    use DatabaseBARTrait;

    /**
     * @property string
     */
    const NOM = 'Robinet thermostatique';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-117';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-117_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place de robinets thermostatiques sur des radiateurs existants raccordés 
    à un système de chauffage central à combustible avec chaudière existante';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 20;

    /**
     * @property string
     */
    const TYPE_BATIMENT = Entries::OS_TYPES_BATIMENT['os_type_batiment_1'];

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
        switch ($model->getTypeLogement()) {
            case Entries::TYPES_LOGEMENT['type_logement_1']:
                switch ($model->getZoneClimatique()) {
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                        return 1700;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                        return 1400;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                        return 930;
                    default:
                        return 0;
                }
            case Entries::TYPES_LOGEMENT['type_logement_2']:
                switch ($model->getTypeChauffage()) {
                    case Entries::TYPES_CHAUFFAGE['type_chauffage_1']:
                        switch ($model->getZoneClimatique()) {
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                return 1200;
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                return 980;
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                return 650;
                            default:
                                return 0;
                        }
                    case Entries::TYPES_CHAUFFAGE['type_chauffage_2']:
                        switch ($model->getZoneClimatique()) {
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                return 1600;
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                return 1300;
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                return 890;
                            default:
                                return 0;
                        }
                    default:
                        return 0;
                }
            default:
                return 0;
        }
    }

    /**
     * Nombre de robinets thermostatiques
     * @param BARInterface
     * @return float
     */
    public static function getFacteur(BARInterface $model): float
    {
        return (float) $model->getNombreRobinetsThermostatiques();
    }

}
