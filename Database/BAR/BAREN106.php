<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BAR\BAREN106 as ModelInterface;

abstract class BAREN106
{
    /**
     * @property string
     */
    const NOM = 'Isolation de combles ou de toitures - (France d\'outre-mer)';

    /**
     * @property string
     */
    const CODE = 'BAR-EN-106';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-en-106_mod_a20-3_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Bâtiments résidentiels existants ou neufs en France d\'outre-mer à l\'exception 
    des bâtiments neufs à la Réunion construits à une altitude supérieure à 600 m';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'une isolation thermique en comble perdu ou en rampant de toiture';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 30;

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
        switch ($model->getAncienneteLogement()) {
            case Entries::ANCIENNETES_LOGEMENT['anciennete_logement_1']:
                switch ($model->getTypeLogement()) {
                    case Entries::TYPES_LOGEMENT['type_logement_1']:
                        return 320;
                    case Entries::TYPES_LOGEMENT['type_logement_3']:
                        return 380;
                    default:
                        return 0;
                }
            case Entries::ANCIENNETES_LOGEMENT['anciennete_logement_2']:
                switch ($model->getTypeLogement()) {
                    case Entries::TYPES_LOGEMENT['type_logement_1']:
                        return 210;
                    case Entries::TYPES_LOGEMENT['type_logement_3']:
                        return 250;
                    default:
                        return 0;
                }
            default:
                return 0;
        }
    }

    /**
     * Surface d'isolant
     * @param ModelInterface
     * @return float
     */
    public static function getFacteur(ModelInterface $model): float
    {
        return (float) $model->getSurfaceIsolant();
    }

}
