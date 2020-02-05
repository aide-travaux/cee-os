<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH121
{
    /**
     * @property string
     */
    const NOM = 'Système de comptage individuel d\'énergie de chauffage';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-121';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-121_mod_a27-2_a_compter_du_01-04-2018_1.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Appartements existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un système de comptage individuel d\'énergie de chauffage 
    pour un système de chauffage collectif';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 10;

    /**
     * @property string
     */
    const TYPE_BATIMENT = Entries::OS_TYPES_BATIMENT['os_type_batiment_3'];

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
        return 11500;
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
