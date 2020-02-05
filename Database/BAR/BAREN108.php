<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BAREN108
{
    /**
     * @property string
     */
    const NOM = 'Fermeture isolante';

    /**
     * @property string
     */
    const CODE = 'BAR-EN-108';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-en-108_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place ou remplacement d\'une fermeture isolante sur fenêtre ou porte-fenêtre existante';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 24;

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
                        return 800;
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                        return 1300;
                    default:
                        return 0;
                }
            case Entries::ZONES_CLIMATIQUES['zone_climatique_2']:
                switch ($model->getEnergieChauffage()) {
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                        return 660;
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                        return 1000;
                    default:
                        return 0;
                }
            case Entries::ZONES_CLIMATIQUES['zone_climatique_3']:
                switch ($model->getEnergieChauffage()) {
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']:
                        return 440;
                    case Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']:
                        return 690;
                    default:
                        return 0;
                }
            default:
                return 0;
        }
    }

    /**
     * Nombre de fermetures isolantes
     * @param BARInterface
     * @return float
     */
    public static function getFacteur(BARInterface $model): float
    {
        return (float) $model->getNombreFermetures();
    }

}
