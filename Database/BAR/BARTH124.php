<?php

namespace AideTravaux\CEE\OS\Database\BAR;

use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Model\BARInterface;

abstract class BARTH124
{
    /**
     * @property string
     */
    const NOM = 'Chauffe-eau solaire individuel (France d\'outre-mer)';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-124';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-124_mod_a18-2_1.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Maisons individuelles neuves ou existantes';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un chauffe-eau solaire individuel (CESI)';

    /**
     * @property int
     */
    const DUREE_DE_VIE_CONVENTIONNELLE = 17;

    /**
     * @property string
     */
    const TYPE_BATIMENT = Entries::OS_TYPES_BATIMENT['os_type_batiment_4'];

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
        switch ($model->getAncienneteLogement()) {
            case Entries::ANCIENNETES_LOGEMENT['anciennete_logement_1']:
                switch ($model->getCodeDepartement()) {
                    case '971':
                        return 6100;
                    case '972':
                        return 6100;
                    case '973':
                        return 5500;
                    case '974':
                        return 4600;
                    case '976':
                        return 6100;
                    default:
                        return 0;
                }
            case Entries::ANCIENNETES_LOGEMENT['anciennete_logement_2']:
                switch ($model->getCodeDepartement()) {
                    case '971':
                        return 3100;
                    case '972':
                        return 3100;
                    case '973':
                        return 5500;
                    case '974':
                        return 2300;
                    case '976':
                        return 3100;
                    default:
                        return 0;
                }
            default:
                return 0;
        }
    }

    /**
     * Surface de capteurs posés
     * @param BARInterface
     * @return float
     */
    public static function getFacteur(BARInterface $model): float
    {
        return (float) $model->getSurfaceCapteurs();
    }

}
