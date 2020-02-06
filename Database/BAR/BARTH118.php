<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Database\DatabaseBARInterface;
use AideTravaux\CEE\OS\Database\DatabaseBARTrait;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH118 implements DatabaseBARInterface
{
    use DatabaseBARTrait;

    /**
     * @property string
     */
    const NOM = 'Système de régulation par programmation d\'intermittence';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-118';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-118_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place, sur un système de chauffage existant (collectif ou individuel), 
    d\'un équipement ayant la fonction de programmation d\'intermittence (thermostat programmable)';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 12;

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
                        switch ($model->getEnergieChauffage()) {
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                return 11600;
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                return 14200;
                            default:
                                return 0;
                        }
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                        switch ($model->getEnergieChauffage()) {
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                return 9500;
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                return 11600;
                            default:
                                return 0;
                        }
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                        switch ($model->getEnergieChauffage()) {
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                return 6300;
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                return 7700;
                            default:
                                return 0;
                        }
                    default:
                        return 0;
                }
            case Entries::TYPES_LOGEMENT['type_logement_2']:
                switch ($model->getTypeChauffage()) {
                    case Entries::TYPES_CHAUFFAGE['type_chauffage_1']:
                        switch ($model->getZoneClimatique()) {
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 4300;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 6600;
                                    default:
                                        return 0;
                                }
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 3500;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 5400;
                                    default:
                                        return 0;
                                }
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 2300;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 3600;
                                    default:
                                        return 0;
                                }
                            default:
                                return 0;
                        }
                    case Entries::TYPES_CHAUFFAGE['type_chauffage_2']:
                        switch ($model->getEnergieChauffage()) {
                            case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                switch ($model->getZoneClimatique()) {
                                    case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                        return 9100;
                                    case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                        return 7400;
                                    case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                        return 4900;
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
     * Facteur correctif selon la surface chauffée | Nombre d'appartements
     * @param BARInterface
     * @return float
     */
    public static function getFacteur(BARInterface $model): float
    {
        switch ($model->getTypeLogement()) {
            case Entries::TYPES_LOGEMENT['type_logement_1']:
                if ( $model->getSurfaceChauffee() < 35 ) {
                    return (float) 0.3;
                } elseif ( $model->getSurfaceChauffee() >= 35 && $model->getSurfaceChauffee() < 60 ) {
                    return (float) 0.5;
                } elseif ( $model->getSurfaceChauffee() >= 60 && $model->getSurfaceChauffee() < 70 ) {
                    return (float) 0.6;
                } elseif ( $model->getSurfaceChauffee() >= 70 && $model->getSurfaceChauffee() < 90 ) {
                    return (float) 0.7;
                } elseif ( $model->getSurfaceChauffee() >= 90 && $model->getSurfaceChauffee() < 110 ) {
                    return (float) 1.0;
                } elseif ( $model->getSurfaceChauffee() >= 110 && $model->getSurfaceChauffee() <= 130 ) {
                    return (float) 1.1;
                } elseif ( $model->getSurfaceChauffee() > 130 ) {
                    return (float) 1.6;
                }
                return (float) 0;

            case Entries::TYPES_LOGEMENT['type_logement_2']:
                return 
                    ($model->getTypeChauffage() === Entries::TYPES_CHAUFFAGE['type_chauffage_2']
                    && $model->getEnergieChauffage() === Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2'])
                    ? $model->getNombreAppartements() : 1
                ;
            default:
                return (float) 1;
        }
    }

}
