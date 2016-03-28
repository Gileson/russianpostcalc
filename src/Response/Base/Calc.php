<?php
namespace Gileson\RussianPostCalc\Response\Base;

use Gileson\RussianPostCalc\Response\CalcData;
use Gileson\RussianPostCalc\Response\Response;

abstract class Calc extends Response {

    protected $calc = [];
    /**
     * @var null|\StdClass
     */
    protected $info = null;

    function __construct($data) {
        $this->setCalcData($data->calc);
        $this->info = $data->info;
    }

    protected function setCalcData($data) {
        if(count($data)) {
            foreach($data as $row) {
                $this->calc[] = new CalcData($row->type, $row->cost, $row->days);
            }
        }

        return $this;
    }

    function getCalc() {
        return $this->calc;
    }

    function getInfo() {
        return $this->info;
    }

    function getWeight() {
        return $this->info->weight;
    }

    function getDeclareCost() {
        return $this->info->ob_cennost_rub;
    }

    function getFromIndex() {
        return $this->info->from_index;
    }

    function getFromCity() {
        return $this->info->from_city;
    }

    function getFromState() {
        return $this->info->from_state;
    }

    function getToIndex() {
        return $this->info->to_index;
    }

    function getToCity() {
        return $this->info->to_city;
    }

    function getToState() {
        return $this->info->to_state;
    }

}