<?php

namespace AideTravaux\CEE\Os\Database\BAR;

use AideTravaux\CEE\Os\Data\Entries;
use AideTravaux\CEE\Os\Model\BAR\BARTH137 as ModelInterface;

abstract class BARTH137
{
    /**
     * @property string
     */
    const NOM = 'Raccordement d\'un bâtiment résidentiel à un réseau de chaleur';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-137';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-137_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels (appartements ou maisons individuelles) existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Raccordement d\'un bâtiment résidentiel existant à un réseau de chaleur existant';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 30;

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
                switch ($model->getZoneClimatique()) {
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                        return 96300;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                        return 81400;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                        return 58600;
                    default:
                        return 0;
                }
            case Entries::TYPES_LOGEMENT['type_logement_3']:
                switch ($model->getZoneClimatique()) {
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                        return 55500;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                        return 47900;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                        return 35600;
                    default:
                        return 0;
                }
            default:
                return 0;
        }
    }

    /**
     * Facteur correctif selon la surface chauffée | Nombre d'appartements
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
            case Entries::TYPES_LOGEMENT['type_logement_3']:
                return (float) $model->getNombreAppartements();
            default:
                return (float) 0;
        }
    }

}
