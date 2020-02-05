<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH127
{
    /**
     * @property string
     */
    const NOM = 'Ventilation Mécanique Contrôlée simple flux hygroréglable (France métropolitaine)';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-127';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-127_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants en France métropolitaine';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un système de ventilation mécanique contrôlée (VMC) simple flux 
    hygroréglable de type A ou B';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 17;

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
                        switch ($model->getEnergieChauffage()) {
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                return 27400;
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                return 42900;
                            default:
                                return 0;
                        }
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                        switch ($model->getEnergieChauffage()) {
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                return 22400;
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                return 35100;
                            default:
                                return 0;
                        }
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                        switch ($model->getEnergieChauffage()) {
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                return 14900;
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                return 23400;
                            default:
                                return 0;
                        }
                    default:
                        return 0;
                }
            case Entries::TYPES_LOGEMENT['type_logement_2']:
                switch ($model->getZoneClimatique()) {
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                        switch ($model->getEnergieChauffage()) {
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                return 18000;
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                return 27500;
                            default:
                                return 0;
                        }
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                        switch ($model->getEnergieChauffage()) {
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                return 14700;
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                return 22500;
                            default:
                                return 0;
                        }
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                        switch ($model->getEnergieChauffage()) {
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                return 9800;
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                return 15000;
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
     * Facteur correctif selon la surface habitable | Nombre de logements | Type d'installation
     * @param BARInterface
     * @return float
     */
    public static function getFacteur(BARInterface $model): float
    {
        switch ($model->getTypeLogement()) {
            case Entries::TYPES_LOGEMENT['type_logement_1']:
                return (float) self::getFacteurSurface($model) * self::getFacteurInstallation($model);
            case Entries::TYPES_LOGEMENT['type_logement_2']:
                return (float) $model->getNombreAppartements() * self::getFacteurInstallation($model);
            default:
                return (float) 0;
        }
    }

    /**
     * Facteur correctif de surface
     * @param BARInterface
     * @return float
     */
    public static function getFacteurSurface(BARInterface $model): float
    {
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
    }

    /**
     * Facteur correctif selon le type d'installation
     * @param BARInterface
     * @return float
     */
    public static function getFacteurInstallation(BARInterface $model): float
    {
        switch ($model->getTypeVmcSimpleFlux()) {
            case Entries::TYPES_VMC_SIMPLE_FLUX['type_vmc_simple_flux_1']:
                switch ($model->getTypeCaissonVentilation()) {
                    case Entries::TYPES_CAISSON_VENTILATION['type_caisson_ventilation_1']:
                        switch ($model->getTypeLogement()) {
                            case Entries::TYPES_LOGEMENT['type_logement_2']:
                                return (float) 0.85;
                            default:
                                return (float) 0;
                        }
                    case Entries::TYPES_CAISSON_VENTILATION['type_caisson_ventilation_2']:
                        switch ($model->getTypeLogement()) {
                            case Entries::TYPES_LOGEMENT['type_logement_1']:
                                return (float) 0.9;
                            case Entries::TYPES_LOGEMENT['type_logement_2']:
                                return (float) 0.9;
                            default:
                                return (float) 0;
                        }
                    default:
                        return (float) 0;
                }
            case Entries::TYPES_VMC_SIMPLE_FLUX['type_vmc_simple_flux_2']:
                switch ($model->getTypeCaissonVentilation()) {
                    case Entries::TYPES_CAISSON_VENTILATION['type_caisson_ventilation_1']:
                        switch ($model->getTypeLogement()) {
                            case Entries::TYPES_LOGEMENT['type_logement_2']:
                                return (float) 0.95;
                            default:
                                return (float) 0;
                        }
                    case Entries::TYPES_CAISSON_VENTILATION['type_caisson_ventilation_2']:
                        switch ($model->getTypeLogement()) {
                            case Entries::TYPES_LOGEMENT['type_logement_1']:
                                return (float ) 1;
                            case Entries::TYPES_LOGEMENT['type_logement_2']:
                                return (float ) 1;
                            default:
                                return (float) 0;
                        }
                    default:
                        return (float) 0;
                }
            default:
                return (float) 0;
        }
    }

}
