# Certificat d'économies d'énergie - Opérations standardisées

## Description

Librarie PHP d'estimation du gisement de certificats d'économies d'énergie d'un projet de travaux.

## Valeur de retour

Retourne le volume de certificats d'économies d'énergie potentiel du projet soumis

## Taux de couverture des fiches d'opérations standardisées

- AGRI : 0/21
- BAR : 33/53
- BAT : 0/53
- IND : 0/35
- RES : 0/11
- TRA : 0/29

## Exemple

```
use AideTravaux\CEE\OS\Database\BAR\BAREN101;
use AideTravaux\CEE\OS\Model\BAR\AbstractBAR as BARModel;

class Model extends BARModel
{
    public function getZoneClimatique(): string
    {
        return 'H1';
    }

    public function getSurfaceIsolant(): float
    {
        return (float) 100;
    }
}

$model = new Model();
$result = BAREN101::get($model);

echo $result;

```

## Sources

- [Liste des fiches d'opérations standardisées pour la 4ème période d'engagement](http://atee.fr/c2e/operations-standardisees-4eme-periode)
