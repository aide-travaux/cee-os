<?php

namespace AideTravaux\CEE\Os\Database\BAR;

use AideTravaux\CEE\Os\Data\Entries;
use AideTravaux\CEE\Os\Model\BAR\BARTH125 as ModelInterface;

abstract class BARTH125
{
    /**
     * @property string
     */
    const NOM = 'Système de ventilation double flux autoréglable ou modulé à haute performance (France métropolitaine)';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-125';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-125_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants en France métropolitaine';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un système de ventilation mécanique double flux autoréglable 
    en installation individuelle ou collective, ou modulé avec bouches d\'extraction hygroréglables en 
    installation individuelle seulement';

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
        switch ($model->getTypeVmcDoubleFlux()) {
            case Entries::TYPES_VMC_DOUBLE_FLUX['type_vmc_double_flux_1']:
                switch ($model->getTypeLogement()) {
                    case Entries::TYPES_LOGEMENT['type_logement_1']:
                        switch ($model->getZoneClimatique()) {
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 28500;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 46100;
                                    default:
                                        return 0;
                                }
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 23300;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 37700;
                                    default:
                                        return 0;
                                }
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 15500;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 25100;
                                    default:
                                        return 0;
                                }
                            default:
                                return 0;
                        }
                    case Entries::TYPES_LOGEMENT['type_logement_2']:
                        switch ($model->getTypeEchangeurVentilation()) {
                            case Entries::TYPES_ECHANGEUR['type_echangeur_1']:
                                switch ($model->getZoneClimatique()) {
                                    case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                        switch ($model->getEnergieChauffage()) {
                                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                                return 16900;
                                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                                return 29300;
                                            default:
                                                return 0;
                                        }
                                    case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                        switch ($model->getEnergieChauffage()) {
                                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                                return 13800;
                                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                                return 23900;
                                            default:
                                                return 0;
                                        }
                                    case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                        switch ($model->getEnergieChauffage()) {
                                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                                return 9200;
                                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                                return 16000;
                                            default:
                                                return 0;
                                        }
                                    default:
                                        return 0;
                                }
                            case Entries::TYPES_ECHANGEUR['type_echangeur_2']:
                                switch ($model->getZoneClimatique()) {
                                    case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                        switch ($model->getEnergieChauffage()) {
                                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                                return 15100;
                                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                                return 26500;
                                            default:
                                                return 0;
                                        }
                                    case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                        switch ($model->getEnergieChauffage()) {
                                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                                return 12400;
                                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                                return 21700;
                                            default:
                                                return 0;
                                        }
                                    case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                        switch ($model->getEnergieChauffage()) {
                                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                                return 9300;
                                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                                return 14400;
                                            default:
                                                return 0;
                                        }
                                    default:
                                        return 0;
                                }
                            default:
                                return 0;
                        }
                    default:
                        return 0;
                }
            case Entries::TYPES_VMC_DOUBLE_FLUX['type_vmc_double_flux_2']:
                switch ($model->getTypeLogement()) {
                    case Entries::TYPES_LOGEMENT['type_logement_1']:
                        switch ($model->getZoneClimatique()) {
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 32600;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 52200;
                                    default:
                                        return 0;
                                }
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 26700;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 42700;
                                    default:
                                        return 0;
                                }
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 17800;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 28500;
                                    default:
                                        return 0;
                                }
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
     * Facteur correctif selon la surface habitable | Nombre de logements
     * @param ModelInterface
     * @return float
     */
    public static function getFacteur(ModelInterface $model): float
    {
        switch ($model->getTypeVmcDoubleFlux()) {
            case Entries::TYPES_VMC_DOUBLE_FLUX['type_vmc_double_flux_1']:
                switch ($model->getTypeLogement()) {
                    case Entries::TYPES_LOGEMENT['type_logement_1']:
                        if ( $model->getSurfaceHabitable() < 35 ) {
                            return (float) 0.3;
                        } elseif ( $model->getSurfaceHabitable() >= 35 && $model->getSurfaceHabitable() < 60 ) {
                            return (float) 0.5;
                        } elseif ( $model->getSurfaceHabitable() >= 60 && $model->getSurfaceHabitable() < 70 ) {
                            return (float) 0.6;
                        } elseif ( $model->getSurfaceHabitable() >= 70 && $model->getSurfaceHabitable() < 90 ) {
                            return (float) 0.7;
                        } elseif ( $model->getSurfaceHabitable() >= 90 && $model->getSurfaceHabitable() < 110 ) {
                            return (float) 1.0;
                        } elseif ( $model->getSurfaceHabitable() >= 110 && $model->getSurfaceHabitable() <= 130 ) {
                            return (float) 1.1;
                        } elseif ( $model->getSurfaceHabitable() > 130 ) {
                            return (float) 1.6;
                        }
                        return (float) 0;
                    case Entries::TYPES_LOGEMENT['type_logement_2']:
                        return (float) $model->getNombreAppartements();
                    default:
                        return (float) 0;
                }
            case Entries::TYPES_VMC_DOUBLE_FLUX['type_vmc_double_flux_2']:
                switch ($model->getTypeLogement()) {
                    case Entries::TYPES_LOGEMENT['type_logement_1']:
                        if ( $model->getSurfaceHabitable() < 35 ) {
                            return (float) 0.3;
                        } elseif ( $model->getSurfaceHabitable() >= 35 && $model->getSurfaceHabitable() < 60 ) {
                            return (float) 0.5;
                        } elseif ( $model->getSurfaceHabitable() >= 60 && $model->getSurfaceHabitable() < 70 ) {
                            return (float) 0.6;
                        } elseif ( $model->getSurfaceHabitable() >= 70 && $model->getSurfaceHabitable() < 90 ) {
                            return (float) 0.7;
                        } elseif ( $model->getSurfaceHabitable() >= 90 && $model->getSurfaceHabitable() < 110 ) {
                            return (float) 1.0;
                        } elseif ( $model->getSurfaceHabitable() >= 110 && $model->getSurfaceHabitable() <= 130 ) {
                            return (float) 1.1;
                        } elseif ( $model->getSurfaceHabitable() > 130 ) {
                            return (float) 1.6;
                        }
                        return (float) 0;
                    default:
                        return (float) 0;
                }
            default:
                return (float) 0;
        }
    }

}
