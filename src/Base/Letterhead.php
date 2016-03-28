<?php
namespace Gileson\RussianPostCalc\Base;

abstract Class BaseLetterhead {

    protected $info = [];

    /**
     * @param $function
     * @param $value
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function _($function, $value) {
        $key = mb_substr($function, 3);
        if(!ctype_lower($key)) {
            $key = strtolower(preg_replace('/(.)(?=[A-Z])/', '$1_', $key));
        }
        $this->info[$key] = $value;

        return $this;
    }

    /**
     * @param $country - страна места отправления
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setFromCountry($country) {
        return $this->_(__FUNCTION__, $country);
    }

    /**
     * @param $index - почтовый индекс места отправления
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setFromIndex($index) {
        return $this->_(__FUNCTION__, $index);
    }

    /**
     * @param $state - область/регион места отправления
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setFromState($state) {
        return $this->_(__FUNCTION__, $state);
    }

    /**
     * @param $city - город/населенный пункт места отправления
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setFromCity($city) {
        return $this->_(__FUNCTION__, $city);
    }

    /**
     * @param $addr - обратный адрес отправителя (улица, дом, квартира/офис)
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setFromAddr($addr) {
        return $this->_(__FUNCTION__, $addr);
    }

    /**
     * @param $fio - ФИО или наименование организации отправителя
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setFromFio($fio) {
        return $this->_(__FUNCTION__, $fio);
    }

    /**
     * @param $country - страна места получателя
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setToCountry($country) {
        return $this->_(__FUNCTION__, $country);
    }

    /**
     * @param $index - почтовый индекс места получателя
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setToIndex($index) {
        return $this->_(__FUNCTION__, $index);
    }

    /**
     * @param $state - область/регион места получателя
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setToState($state) {
        return $this->_(__FUNCTION__, $state);
    }

    /**
     * @param $city - город/населенный пункт места получателя
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function seToCity($city) {
        return $this->_(__FUNCTION__, $city);
    }

    /**
     * @param $addr - адрес получателя (улица, дом, квартира/офис)
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setToAddr($addr) {
        return $this->_(__FUNCTION__, $addr);
    }

    /**
     * @param $fio - ФИО или наименование организации получателя
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setToFio($fio) {
        return $this->_(__FUNCTION__, $fio);
    }

    /**
     * @param $nalogka_ur_lico_cb - значение '1' - печатать реквизиты наложенного платежа на бланке. Значение '0' - нет
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setNalogkaUrLicoCb($nalogka_ur_lico_cb) {
        return $this->_(__FUNCTION__, (bool) $nalogka_ur_lico_cb);
    }

    /**
     * @param $from_inn - ИНН получателя (ООО или ИП)
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setFromInn($from_inn) {
        return $this->_(__FUNCTION__, $from_inn);
    }

    /**
     * @param $from_bik - БИК Банка, в котором открыт счет
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setFromBik($from_bik) {
        return $this->_(__FUNCTION__, $from_bik);
    }

    /**
     * @param $from_bank - наименование банка
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setFromBank($from_bank) {
        return $this->_(__FUNCTION__, $from_bank);
    }

    /**
     * @param $from_ks - корреспондентский счет
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setFromKs($from_ks) {
        return $this->_(__FUNCTION__, $from_ks);
    }

    /**
     * @param $to_tel - телефонный номер получателя (формат: +7XXXXXXXXXX, 8XXXXXXXXXX, 7XXXXXXXXXX)
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setToTel($to_tel) {
        return $this->_(__FUNCTION__, $to_tel);
    }

    /**
     * @param $order_id - номер заказа (в Вашей системе учета)
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setOrderId($order_id) {
        return $this->_(__FUNCTION__, $order_id);
    }

    /**
     * @param $ob_cennost_rub - сумма объявленной ценности
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setObCennostRub($ob_cennost_rub) {
        return $this->_(__FUNCTION__, $ob_cennost_rub);
    }

    /**
     * @param $nalogka_rub - сумма наложенного платежа
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setNalogkaRub($nalogka_rub) {
        return $this->_(__FUNCTION__, $nalogka_rub);
    }

    /**
     * @param $p_seriya - серия паспорта
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setPSeriya($p_seriya) {
        return $this->_(__FUNCTION__, $p_seriya);
    }

    /**
     * @param $p_nomer - номер паспорта
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setPNomer($p_nomer) {
        return $this->_(__FUNCTION__, $p_nomer);
    }

    /**
     * @param $p_vidan - дата выдачи (формат: ДД.ММ.ГГГГ)
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setPVidan($p_vidan) {
        return $this->_(__FUNCTION__, $p_vidan);
    }

    /**
     * @param $p_vidal - наименования учреждения выдавшего паспорт
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setPVidal($p_vidal) {
        return $this->_(__FUNCTION__, $p_vidal);
    }

    /**
     * @param $parcel_type - наименования учреждения выдавшего паспорт
     *
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setParcelType($parcel_type) {
        return $this->_(__FUNCTION__, $parcel_type);
    }

    /**
     * тип отправления. 'rp' - посылка
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setParcelTypeRp() {
        return $this->setParcelType('rp');
    }

    /**
     * ип отправления. 'rp_1class' - отправление 1 класса
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setParcelTypeRp1class() {
        return $this->setParcelType('rp_1class');
    }

    /**
     * тип отправления. 'banderol' - бандероль
     * @return \Gileson\RussianPostCalc\Letterhead
     */
    function setParcelTypeBanderol() {
        return $this->setParcelType('banderol');
    }

    function toJson() {
        return json_encode($this->info);
    }

}