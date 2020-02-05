<?php

namespace AideTravaux\CEE\Os\Database\BAR;

use AideTravaux\CEE\Os\Data\Entries;
use AideTravaux\CEE\Os\Model\BAR\BARTH101 as ModelInterface;

abstract class BARTH101
{
    /**
     * @property string
     */
    const NOM = 'Chauffe-eau solaire individuel (France métropolitaine)';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-101';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-101_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiment résidentiel : maisons individuelles existantes en France métropolitaine';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un chauffe-eau solaire individuel (CESI)';

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
                return 21500;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                return 24100;
            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                return 27600;
            default:
                return 0;
        }
    }

}
