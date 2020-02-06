<?php

namespace AideTravaux\CEE\OS\Database;

use AideTravaux\CEE\OS\Model\BARInterface;

trait DatabaseBARTrait
{
    /**
     * @param BARInterface
     * @return array
     */
    public static function toArray(BARInterface $model): array
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
