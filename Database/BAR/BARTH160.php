<?php

namespace AideTravaux\CEE\Os\Database\BAR;

use AideTravaux\CEE\Os\Data\Entries;
use AideTravaux\CEE\Os\Model\BAR\BARTH160 as ModelInterface;

abstract class BARTH160
{
    /**
     * @property string
     */
    const NOM = 'Isolation d\'un réseau hydraulique de chauffage ou d\'eau chaude sanitaire';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-160';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-160_v_a27-1_a_compter_du_01-04-2018_2.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'une isolation sur un réseau hydraulique de chauffage existant 
    ou d\'eau chaude sanitaire existant, situé hors du volume chauffé, pour un système de chauffage collectif 
    existant maintenu en température (bouclé ou tracé)';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 20;

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
        switch ($model->getZoneClimatique()) {
            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                return 6700;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                return 5600;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                return 4900;
            default:
                return 0;
        }
    }

    /**
     * Longueur isolée du réseau de chauffage ou d\'ECS hors du volume chauffé
     * @param ModelInterface
     * @return float
     */
    public static function getFacteur(ModelInterface $model): float
    {
        return (float) $model->getLongueurReseauIsolee();
    }

}
