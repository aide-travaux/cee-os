<?php

namespace AideTravaux\CEE\OS\Database;

use AideTravaux\CEE\OS\DataInterface;

trait DBTrait
{
    /**
     * @inheritdoc
     */
    public static function toArray(DataInterface $model): array
    {
        return [
            'nom' => self::NOM,
            'code' => self::CODE,
            'url' => self::URL,
            'code' => self::CODE,
            'code' => self::CODE,
            'montant' => self::get($model),
            'montant_forfaitaire' => self::getMontantForfaitaire($model),
            'facteur' => self::getFacteur($model)
        ];
    }
}
