<?php

namespace AideTravaux\CEE\Os\Database\BAR;

use AideTravaux\CEE\Os\Data\Entries;
use AideTravaux\CEE\Os\Model\BAR\BARTH148 as ModelInterface;

abstract class BARTH148
{
    /**
     * @property string
     */
    const NOM = 'Chauffe-eau thermodynamique à accumulation';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-148';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-148_mod_a15-2_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un chauffe-eau thermodynamique individuel à accumulation';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 17;

    /**
     * Retourne le montant de certificats pour les informations transmises
     * @param ModelInterface
     * @return float
     */
    public static function get(ModelInterface $model): float
    {
        return (float) self::getMontantForfaitaire($model);
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
                return 15600;
            case Entries::TYPES_LOGEMENT['type_logement_2']:
                return 11900;
            default:
                return 0;
        }
    }

}
