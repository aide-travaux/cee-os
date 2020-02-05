<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BAR\BARTH158 as ModelInterface;

abstract class BARTH158
{
    /**
     * @property string
     */
    const NOM = 'Émetteur électrique à régulation électronique à fonctions avancées';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-158';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-158_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un émetteur électrique de type rayonnant ou radiateur à 
    régulation électronique à fonctions avancées';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 16;

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
                        return 3200;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                        return 2600;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                        return 1800;
                    default:
                        return 0;
                }
            case Entries::TYPES_LOGEMENT['type_logement_2']:
                switch ($model->getZoneClimatique()) {
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                        return 2200;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                        return 1800;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                        return 1200;
                    default:
                        return 0;
                }
            default:
                return 0;
        }
    }

    /**
     * Nombre de radiateurs installés
     * @param ModelInterface
     * @return float
     */
    public static function getFacteur(ModelInterface $model): float
    {
        return (float) $model->getNombreRadiateurs();
    }

}