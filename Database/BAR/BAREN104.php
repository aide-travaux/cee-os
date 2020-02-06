<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Database\DatabaseBARInterface;
use AideTravaux\CEE\OS\Database\DatabaseBARTrait;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BAREN104 implements DatabaseBARInterface
{
    use DatabaseBARTrait;

    /**
     * @property string
     */
    const NOM = 'Fenêtre ou porte-fenêtre complète avec vitrage isolant';

    /**
     * @property string
     */
    const CODE = 'BAR-EN-104';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-en-104_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants, à l\'exclusion des parties communes non chauffées';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'une fenêtre, fenêtre de toiture ou porte-fenêtre complète avec vitrage isolant. ';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 24;

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
        switch ($model->getZoneClimatique()) {
            case Entries::ZONES_CLIMATIQUES['zone_climatique_1']:
                switch ($model->getEnergieChauffage()) {
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                        return 5200;
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                        return 8200;
                    default:
                        return 0;
                }
            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                switch ($model->getEnergieChauffage()) {
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                        return 4200;
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                        return 6700;
                    default:
                        return 0;
                }
            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                switch ($model->getEnergieChauffage()) {
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                        return 2800;
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                        return 4500;
                    default:
                        return 0;
                }
            default:
                return 0;
        }
    }

    /**
     * Surface d'isolant
     * @param BARInterface
     * @return float
     */
    public static function getFacteur(BARInterface $model): float
    {
        return (float) $model->getNombreFenetres();
    }

}
