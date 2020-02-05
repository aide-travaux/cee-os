<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH116
{
    /**
     * @property string
     */
    const NOM = 'Plancher chauffant hydraulique à basse température';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-116';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-116_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un plancher chauffant hydraulique à basse température associé à 
    un dispositif de régulation';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 50;

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
                        return 300;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                        return 250;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                        return 160;
                    default:
                        return 0;
                }
            case Entries::TYPES_LOGEMENT['type_logement_2']:
                switch ($model->getTypeChauffage()) {
                    case Entries::TYPES_CHAUFFAGE['type_chauffage_1']:
                        switch ($model->getZoneClimatique()) {
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                return 210;
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                return 170;
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                return 110;
                            default:
                                return 0;
                        }
                    case Entries::TYPES_CHAUFFAGE['type_chauffage_2']:
                        switch ($model->getZoneClimatique()) {
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                return 280;
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                return 230;
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                return 150;
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
     * Surface chauffée
     * @param BARInterface
     * @return float
     */
    public static function getFacteur(BARInterface $model): float
    {
        return (float) $model->getSurfaceChauffee();
    }

}
