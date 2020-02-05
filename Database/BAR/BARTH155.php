<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH155
{
    /**
     * @property string
     */
    const NOM = 'Ventilation hybride hygroréglable (France métropolitaine)';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-155';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-155_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Appartements existants équipés d\'une ventilation naturelle ou sans système 
    de ventilation en France métropolitaine';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'une ventilation hybride hygroréglable de type A ou B';

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
        switch ($model->getTypeVentilationHybride()) {
            case Entries::TYPES_VENTILATION_HYBRIDE['type_ventilation_hybride_1']:
                switch ($model->getTypeExtracteurVentilation()) {
                    case Entries::TYPES_CAISSON_VENTILATION['type_caisson_ventilation_1']:
                        switch ($model->getZoneClimatique()) {
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 13600;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 22400;
                                    default:
                                        return 0;
                                }
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 11200;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 18300;
                                    default:
                                        return 0;
                                }
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 7400;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 12200;
                                    default:
                                        return 0;
                                }
                            default:
                                return 0;
                        }
                    case Entries::TYPES_CAISSON_VENTILATION['type_caisson_ventilation_2']:
                        switch ($model->getZoneClimatique()) {
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 14500;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 23300;
                                    default:
                                        return 0;
                                }
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 11900;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 19100;
                                    default:
                                        return 0;
                                }
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 7900;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 12700;
                                    default:
                                        return 0;
                                }
                            default:
                                return 0;
                        }
                    default:
                        return 0;
                }
            case Entries::TYPES_VENTILATION_HYBRIDE['type_ventilation_hybride_2']:
                switch ($model->getTypeExtracteurVentilation()) {
                    case Entries::TYPES_CAISSON_VENTILATION['type_caisson_ventilation_1']:
                        switch ($model->getZoneClimatique()) {
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 13900;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 22800;
                                    default:
                                        return 0;
                                }
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 11400;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 18700;
                                    default:
                                        return 0;
                                }
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 7600;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 12400;
                                    default:
                                        return 0;
                                }
                            default:
                                return 0;
                        }
                    case Entries::TYPES_CAISSON_VENTILATION['type_caisson_ventilation_2']:
                        switch ($model->getZoneClimatique()) {
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 14800;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 23700;
                                    default:
                                        return 0;
                                }
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 12100;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 19400;
                                    default:
                                        return 0;
                                }
                            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                                switch ($model->getEnergieChauffage()) {
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                                        return 8100;
                                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                                        return 12900;
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
     * Nombre d'appartements
     * @param BARInterface
     * @return float
     */
    public static function getFacteur(BARInterface $model): float
    {
        return (float) $model->getNombreAppartements();
    }

}
