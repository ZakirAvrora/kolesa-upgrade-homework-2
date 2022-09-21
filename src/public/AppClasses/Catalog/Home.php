<?php

namespace AppClasses\Catalog;

/**
 * Класс Home представлеят класс обьктов которые представляют собой дом. 
 * 
 * Можно расширить (добавить новые аттрибуты и изменять getPropertyMsg()) на свое усмотрение
 */
class Home extends Residency implements ObjectToAdvert
{

    public function __construct(int $rooms)
    {
        $this->rooms = $rooms;
    }

    public function getProportyMsg(): string
    {
        return (string)$this->rooms . "-комнатный дом";
    }
}
