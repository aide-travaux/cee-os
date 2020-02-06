# Certificat d'économies d'énergie - Opérations standardisées

## Introduction

La classe CEEOS retourne toutes les informations relatives à une fiche d'opération standardisée

## Méthodes

```
CEEOS::get(string $codeOs): ?string;
```
Retourne la classe correspondante à la fiche d'opération standardisée

## Taux de couverture des fiches d'opérations standardisées

- AGRI : 0/21
- BAR : 33/53
- BAT : 0/53
- IND : 0/35
- RES : 0/11
- TRA : 0/29

## Exemple

```
use AideTravaux\CEE\OS\CEEOS;

CEEOS::get('BAR-EN-101');

```

## Sources

- [Liste des fiches d'opérations standardisées pour la 4ème période d'engagement](http://atee.fr/c2e/operations-standardisees-4eme-periode)
