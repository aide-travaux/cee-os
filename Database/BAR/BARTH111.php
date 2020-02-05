<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH111
{
    /**
     * @property string
     */
    const NOM = 'Régulation par sonde de température extérieure';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-111';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-111_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Maisons individuelles existantes';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'une sonde de température extérieure reliée à une régulation d\'un 
    système de chauffage existant sur boucle à eau chaude';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 11;

    /**
     * @property string
     */
    const TYPE_BATIMENT = Entries::OS_TYPES_BATIMENT['os_type_batiment_2'];

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
                switch ($model->getEnergieChauffage()) {
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                        return 2200;
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                        return 3300;
                    default:
                        return 0;
                }
            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                switch ($model->getEnergieChauffage()) {
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                        return 1800;
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                        return 2700;
                    default:
                        return 0;
                }
            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                switch ($model->getEnergieChauffage()) {
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                        return 1200;
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                        return 1800;
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

}
