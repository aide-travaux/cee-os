<?php

namespace AideTravaux\CEE\Os\Database\BAR;

use AideTravaux\CEE\Os\Data\Entries;
use AideTravaux\CEE\Os\Model\BAR\BARTH162 as ModelInterface;

abstract class BARTH162
{
    /**
     * @property string
     */
    const NOM = 'Système énergétique comportant des capteurs solaires photovoltaïques et
    thermiques à circulation d\'eau (France métropolitaine)';

    /**
     * @property string
     */
    const CODE = 'BAR-TH-162';

    /**
     * @property string
     */
    const URL = 'http://atee.fr/sites/default/files/bar-th-162_0.pdf';

    /**
     * @property string
     */
    const SECTEUR_APPLICATION = 'Maisons individuelles existantes en France métropolitaine';

    /**
     * @property string
     */
    const DENOMINATION = 'Mise en place d\'un système énergétique composé de capteurs solaires hybrides 
    (à la fois photovoltaïques et thermiques) avec circulation d\'eau permettant de récupérer la chaleur 
    produite par les capteurs et de l\'utiliser pour la préparation d\'eau chaude sanitaire ou le chauffage 
    de la maison';

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
        return 20900;
    }

}
