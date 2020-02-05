<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BAR\BARTH159 as ModelInterface;

abstract class BARTH159
{
    /**
     * @property string
     */
    const NOM = 'Pompe à chaleur hybride individuelleu';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-159';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-159_2.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'une pompe à chaleur air/eau individuelle comportant un 
    dispositif d\'appoint utilisant un combustible liquide ou gazeux et une régulation qui les pilote';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 17;

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
        switch ($model->getTypeLogement()) {
            case Entries::TYPES_LOGEMENT['type_logement_1']:
                if ( $model->getEfficaciteSaisonniere() >= 111 && $model->getEfficaciteSaisonniere() < 120 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 74100;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 62800;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 45600;
                        default:
                            return 0;
                    }
                } elseif ( $model->getEfficaciteSaisonniere() >= 120 && $model->getEfficaciteSaisonniere() < 130 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 90300;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 76500;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 55400;
                        default:
                            return 0;
                    }
                } elseif ( $model->getEfficaciteSaisonniere() >= 130 && $model->getEfficaciteSaisonniere() < 140 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 104800;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 88800;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 64400;
                        default:
                            return 0;
                    }
                } elseif ( $model->getEfficaciteSaisonniere() >= 140 && $model->getEfficaciteSaisonniere() < 150 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 117200;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 99400;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 72000;
                        default:
                            return 0;
                    }
                } elseif ( $model->getEfficaciteSaisonniere() >= 150 && $model->getEfficaciteSaisonniere() < 160 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 128000;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 108500;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 78700;
                        default:
                            return 0;
                    }
                } elseif ( $model->getEfficaciteSaisonniere() >= 160 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 137500;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 116600;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 84500;
                        default:
                            return 0;
                    }
                }
                return 0;

            case Entries::TYPES_LOGEMENT['type_logement_2']:
                if ( $model->getEfficaciteSaisonniere() >= 111 && $model->getEfficaciteSaisonniere() < 120 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 39600;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 33900;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 25600;
                        default:
                            return 0;
                    }
                } elseif ( $model->getEfficaciteSaisonniere() >= 120 && $model->getEfficaciteSaisonniere() < 130 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 48200;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 41300;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 31200;
                        default:
                            return 0;
                    }
                } elseif ( $model->getEfficaciteSaisonniere() >= 130 && $model->getEfficaciteSaisonniere() < 140 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 55900;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 47900;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 36200;
                        default:
                            return 0;
                    }
                } elseif ( $model->getEfficaciteSaisonniere() >= 140 && $model->getEfficaciteSaisonniere() < 150 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 62600;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 53600;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 40500;
                        default:
                            return 0;
                    }
                } elseif ( $model->getEfficaciteSaisonniere() >= 150 && $model->getEfficaciteSaisonniere() < 160 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 68400;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 58600;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 44200;
                        default:
                            return 0;
                    }
                } elseif ( $model->getEfficaciteSaisonniere() >= 160 ) {
                    switch ($model->getZoneClimatique()) {
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                            return 73400;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                            return 62900;
                        case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                            return 47500;
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
     * @param ModelInterface
     * @return float
     */
    public static function getFacteur(ModelInterface $model): float
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
