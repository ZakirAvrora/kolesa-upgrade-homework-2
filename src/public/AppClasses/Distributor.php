<?php

namespace AppClasses;

/**
 * Класс Distributor распределяет элементы заданного массива 
 * в зависимости от категории и типа рекламного объекта.
 * 
 * Иммет метод getAdverts() который возвращает уже распределенные рекламные обькты.
 */
class Distributor
{
    protected $advertObjects = array();
    public function __construct($adverts)
    {
        foreach ($adverts as $advert) {

            $objectToAdvert = match ($advert['type']) {
                'dom' => new  \AppClasses\Catalog\Home($advert['rooms']),
                'kvartira' => new   \AppClasses\Catalog\Appartment($advert['rooms']),
            };

            $advertObject = match ($advert['category']) {
                'sale' => new Advert\SaleAdvert($advert['price'], $objectToAdvert),
                'rent' => new Advert\RentAdvert($advert['price'], $advert['period'], $objectToAdvert),
            };
            array_push($this->advertObjects, $advertObject);
        }
    }

    public function getAdverts(): array
    {
        return $this->advertObjects;
    }
}
