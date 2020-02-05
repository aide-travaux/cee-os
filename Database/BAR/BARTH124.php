<?php

namespace AideTravaux\CEE\Os\Database\BAR;

use AideTravaux\CEE\Os\Data\Entries;
use AideTravaux\CEE\Os\Model\BAR\BARTH124 as ModelInterface;

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
     * @param ModelInterface
     * @return float
     */
    public static function getFacteur(ModelInterface $model): float
    {
        return (float) $model->getSurfaceCapteurs();
    }

}
