<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH123
{
    /**
     * @property string
     */
    const NOM = 'Optimiseur de relance en chauffage collectif';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-123';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-123_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Appartements existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un optimiseur de relance sur un circuit de chauffage collectif 
    à combustible existant';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 15;

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
                return 12400;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                return 10100;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                return 6700;
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
