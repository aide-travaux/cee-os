<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH104
{
    /**
     * @property string
     */
    const NOM = 'Pompe à chaleur de type air/eau ou eau/eau';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-104';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-104_mod_a23-2_apres_01-02-2017_1.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'une pompe à chaleur (PAC) de type air/eau ou eau/eau';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 17;

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
                if ( $model->getEfficaciteSaisonniere() >= 102 && $model->getEfficaciteSaisonniere() < 110 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 52700;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 43100;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 28700;
                        default:
                            return 0;
                    }
                } elseif ( $model->getEfficaciteSaisonniere() >= 110 && $model->getEfficaciteSaisonniere() < 120 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 66400;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 54400;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 36200;
                        default:
                            return 0;
                    }
                } elseif ( $model->getEfficaciteSaisonniere() >= 120 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 79900;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 65400;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 43600;
                        default:
                            return 0;
                    }
                }
                return 0;

            case Entries::TYPES_LOGEMENT['type_logement_2']:
                if ( $model->getEfficaciteSaisonniere() >= 102 && $model->getEfficaciteSaisonniere() < 110 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 24500;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 20100;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 13400;
                        default:
                            return 0;
                    }
                } elseif ( $model->getEfficaciteSaisonniere() >= 110 && $model->getEfficaciteSaisonniere() < 120 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 32200;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 26400;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 17600;
                        default:
                            return 0;
                    }
                } elseif ( $model->getEfficaciteSaisonniere() >= 120 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 39700;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 32500;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 21700;
                        default:
                            return 0;
                    }
                }
                return 0;
            default:
                return 0;
        }
    }

    /**
     * Facteur correctif selon la surface chauffée 
     * @param BARInterface
     * @return float
     */
    public static function getFacteur(BARInterface $model): float
    {
        switch ($model->getTypeLogement()) {
            case Entries::TYPES_LOGEMENT['type_logement_1']:
                if ( $model->getSurfaceChauffee() < 70 ) {
                    return (float) 0.5;
                } elseif ( $model->getSurfaceChauffee() >= 70 && $model->getSurfaceChauffee() < 90 ) {
                    return (float) 0.7;
                } elseif ( $model->getSurfaceChauffee() >= 90 && $model->getSurfaceChauffee() < 110 ) {
                    return (float) 1;
                } elseif ( $model->getSurfaceChauffee() >= 110 && $model->getSurfaceChauffee() <= 130 ) {
                    return (float) 1.1;
                } elseif ( $model->getSurfaceChauffee() > 130 ) {
                    return (float) 1.6;
                }
                return (float) 0; 

            case Entries::TYPES_LOGEMENT['type_logement_2']:
                if ( $model->getSurfaceChauffee() < 35 ) {
                    return (float) 0.5;
                } elseif ( $model->getSurfaceChauffee() >= 35 && $model->getSurfaceChauffee() < 60 ) {
                    return (float) 0.7;
                } elseif ( $model->getSurfaceChauffee() >= 60 && $model->getSurfaceChauffee() < 70 ) {
                    return (float) 1;
                } elseif ( $model->getSurfaceChauffee() >= 70 && $model->getSurfaceChauffee() < 90 ) {
                    return (float) 1.2;
                } elseif ( $model->getSurfaceChauffee() >= 90 && $model->getSurfaceChauffee() < 110 ) {
                    return (float) 1.5;
                } elseif ( $model->getSurfaceChauffee() >= 110 && $model->getSurfaceChauffee() <= 130 ) {
                    return (float) 1.9;
                } elseif ( $model->getSurfaceChauffee() > 130 ) {
                    return (float) 2.5;
                }
                return (float) 0;

            default:
                return (float) 0;
        }
    }

}
