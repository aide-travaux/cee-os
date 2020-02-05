<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH110
{
    /**
     * @property string
     */
    const NOM = 'Radiateur basse température pour un chauffage central';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-110';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-110_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un radiateur basse température pour un système de chauffage central';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 35;

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
                        return 910;
                    default:
                        return 0;
                }
            case Entries::TYPES_LOGEMENT['type_logement_2']:
                switch ($model->getTypeChauffage()) {
                    case Entries::TYPES_CHAUFFAGE['type_chauffage_1']:
                        switch ($model->getZoneClimatique()) {
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                return 1100;
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                return 880;
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                return 590;
                            default:
                                return 0;
                        }
                    case Entries::TYPES_CHAUFFAGE['type_chauffage_2']:
                        switch ($model->getZoneClimatique()) {
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                return 1000;
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                return 850;
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                return 560;
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
     * Nombre de radiateurs installés
     * @param BARInterface
     * @return float
     */
    public static function getFacteur(BARInterface $model): float
    {
        return (float) $model->getNombreRadiateurs();
    }

}
