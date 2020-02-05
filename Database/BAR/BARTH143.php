<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BAR\BARTH143 as ModelInterface;

abstract class BARTH143
{
    /**
     * @property string
     */
    const NOM = 'Système solaire combinée (France métropolitaine)';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-143';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-143_2.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiment résidentiel : maisons individuelles existantes en France métropolitaine';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un système solaire combiné (SSC) destiné au chauffage et à la production 
    d\'eau chaude sanitaire';

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
        return (float) self::getMontantForfaitaire($model);
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
                return 134800;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                return 121000;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                return 100500;
            default:
                return 0;
        }
    }

}
