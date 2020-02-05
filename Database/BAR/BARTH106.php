<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH106
{
    /**
     * @property string
     */
    const NOM = 'Chaudière individuelle à haute performance énergétique';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-106';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-106_mod_a23-2_apres_01-02-2017_1.pdf';

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
                switch ($model->getZoneClimatique()) {
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                        return 46900;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                        return 39600;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                        return 28500;
                    default:
                        return 0;
                }
            case Entries::TYPES_LOGEMENT['type_logement_2']:
                switch ($model->getZoneClimatique()) {
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                        return 24800;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                        return 21200;
                    case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                        return 15800;
                    default:
                        return 0;
                }
            default:
                return 0;
        }
    }

    /**
     * Facteur correctif selon la surface habitable 
     * @param BARInterface
     * @return float
     */
    public static function getFacteur(BARInterface $model): float
    {
        switch ($model->getTypeLogement()) {
            case Entries::TYPES_LOGEMENT['type_logement_1']:
                if ( $model->getSurfaceHabitable() < 70 ) {
                    return (float) 0.5;
                } elseif ( $model->getSurfaceHabitable() >= 70 && $model->getSurfaceHabitable() < 90 ) {
                    return (float) 0.7;
                } elseif ( $model->getSurfaceHabitable() >= 90 && $model->getSurfaceHabitable() < 110 ) {
                    return (float) 1;
                } elseif ( $model->getSurfaceHabitable() >= 110 && $model->getSurfaceHabitable() <= 130 ) {
                    return (float) 1.1;
                } elseif ( $model->getSurfaceHabitable() > 130 ) {
                    return (float) 1.6;
                }
                return (float) 0; 
            case Entries::TYPES_LOGEMENT['type_logement_2']:
                return (float) 1;
            default:
                return (float) 0;
        }
    }

}
