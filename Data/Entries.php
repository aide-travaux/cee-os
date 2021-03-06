<?php

namespace AideTravaux\CEE\OS\Data;

use AideTravaux\Core\Entries as CoreEntries;

abstract class Entries extends CoreEntries
{
    /**
     * @property array
     */
    const OS_TYPES_BATIMENT = [
        'os_type_batiment_1' => 'Bâtiments résidentiels existants',
        'os_type_batiment_2' => 'Maisons individuelles existantes',
        'os_type_batiment_3' => 'Appartements existants',
        'os_type_batiment_4' => 'Maisons individuelles neuves ou existantes',
        'os_type_batiment_5' => 'Bâtiments résidentiels collectifs existants'
    ];

    /**
     * @property array
     */
    const OS_ZONES_GEOGRAPHIQUES = [
        'os_zone_geographique_1' => 'France',
        'os_zone_geographique_2' => 'France d\'outre-mer',
        'os_zone_geographique_3' => 'France métropolitaine'
    ];

    /**
     * @property array
     */
    const ENERGIES_CHAUFFAGE = [
        'energie_chauffage_1' => 'Électricité',
        'energie_chauffage_2' => 'Combustible'
    ];

    /**
     * @property array
     */
    const ANCIENNETES_LOGEMENT = [
        'anciennete_logement_1' => 'Logement existant',
        'anciennete_logement_2' => 'Logement neuf'
    ];

    /**
     * @property array
     */
    const TYPES_CHAUFFAGE = [
        'type_chauffage_1' => 'Chauffage individuel',
        'type_chauffage_2' => 'Chauffage collectif'
    ];

    /**
     * @property array
     */
    const TYPES_ECHANGEUR = [
        'type_echangeur_1' => 'Échangeur individuel',
        'type_echangeur_2' => 'Échangeur collectif'
    ];

    /**
     * @property array
     */
    const TYPES_VMC_SIMPLE_FLUX = [
        'type_vmc_simple_flux_1' => 'VMC de type A',
        'type_vmc_simple_flux_2' => 'VMC de type B'
    ];

    /**
     * @property array
     */
    const TYPES_VMC_DOUBLE_FLUX = [
        'type_vmc_double_flux_1' => 'VMC double flux autoréglable',
        'type_vmc_double_flux_2' => 'VMC double flux modulé'
    ];

    /**
     * @property array
     */
    const TYPES_VENTILATION_HYBRIDE = [
        'type_ventilation_hybride_1' => 'Ventilation hybride hygroréglable de type A',
        'type_ventilation_hybride_2' => 'Ventilation hybride hygroréglable de type B'
    ];

    /**
     * @property array
     */
    const TYPES_CAISSON_VENTILATION = [
        'type_caisson_ventilation_1' => 'Caisson standard',
        'type_caisson_ventilation_2' => 'Caisson basse consommation'
    ];

    /**
     * @property array
     */
    const TYPES_EXTRACTEUR_VENTILATION = [
        'type_extracteur_ventilation_1' => 'Extracteur standard',
        'type_extracteur_ventilation_2' => 'Extracteur basse consommation'
    ];

    /**
     * @property array
     */
    const USAGES_CHAUDIERE = [
        'usage_chaudiere_1' => 'Chauffage',
        'usage_chaudiere_2' => 'ECS',
        'usage_chaudiere_3' => 'Chauffage et ECS'
    ];
}
