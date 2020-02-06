<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Database\DatabaseBARInterface;
use AideTravaux\CEE\OS\Database\DatabaseBARTrait;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BAREN109 implements DatabaseBARInterface
{
    use DatabaseBARTrait;

    /**
     * @property string
     */
    const NOM = 'Réduction des apports solaires par la toiture - (France d\'outre-mer)';

    /**
     * @property string
     */
    const CODE = 'BAR-EN-109';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-en-109_1.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants en France d\'outre-mer';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'une toiture ou d\'éléments de toiture permettant la réduction des apports solaires';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 30;

    /**
     * @property string
     */
    const TYPE_BATIMENT = Entries::OS_TYPES_BATIMENT['os_type_batiment_1'];

    /**
     * @property string
     */
    const ZONE_GEOGRAPHIQUE = Entries::OS_ZONES_GEOGRAPHIQUES['os_zone_geographique_2'];

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
                return 400;
            case Entries::TYPES_LOGEMENT['type_logement_3']:
                return 520;
            default:
                return 0;
        }
    }

    /**
     * Surface de toiture protégée
     * @param BARInterface
     * @return float
     */
    public static function getFacteur(BARInterface $model): float
    {
        return (float) $model->getSurfaceToitureProtegee();
    }

}
