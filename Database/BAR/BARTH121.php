<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BAR\BARTH121 as ModelInterface;

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
        return 11500;
    }

    /**
     * Nombre d'appartements
     * @param ModelInterface
     * @return float
     */
    public static function getFacteur(ModelInterface $model): float
    {
        return (float) $model->getNombreAppartements();
    }

}
