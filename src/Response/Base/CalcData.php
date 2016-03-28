<?php
namespace Gileson\RussianPostCalc\Response\Base;

abstract class CalcData {

    /**
     * Тип отправления
     * @var string
     */
    protected $type;
    /**
     * Стоимость отправления
     * @var float
     */
    protected $cost;
    /**
     * Срок отправления
     * @var int
     */
    protected $days;

    // типы отправления
    const TYPE_FIRST_CLASS = 'rp_1class';
    const TYPE_MAIN_CLASS  = 'rp_main';

    protected $type_names = [
        self::TYPE_FIRST_CLASS => '1 Класс',
        self::TYPE_MAIN_CLASS  => 'Ценная Посылка, обычное отправление',
    ];

    function __construct($type, $cost, $days) {
        $this->type = $type;
        $this->cost = $cost;
        $this->days = $days;
    }

    /**
     * Получить тип отправления
     * @return string
     */
    function getType() {
        return (string) $this->type;
    }

    /**
     * Получить название типа отправления
     * @return string
     */
    function getTypeName() {
        return (string) $this->type_names[$this->getType()];
    }

    /**
     * Получить стоимость отправления
     * @return float
     */
    function getCost() {
        return (float) $this->cost;
    }

    /**
     * Получить срок отправления в днях
     * @return int
     */
    function getDays() {
        return (int) $this->days;
    }

}