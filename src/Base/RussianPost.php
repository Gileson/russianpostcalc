<?php
namespace Gileson\RussianPostCalc\Base;

use Gileson\RussianPostCalc\Letterhead;
use Gileson\RussianPostCalc\Response\Calc;
use Gileson\RussianPostCalc\Response\File;
use Gileson\RussianPostCalc\RussianPost;
use Gileson\RussianPostCalc\RussianPostCalcException;

abstract class BaseRussianPost {

    static protected $instance = null;

    /**
     * API URL
     */
    const API_URL = 'http://russianpostcalc.ru/api_v1.php';

    /**
     * API ключ
     * @var string
     */
    protected $api_key = null;
    /**
     * Пароль от аккаунта
     * @var string
     */
    protected $api_password = null;

    /**
     * @return RussianPost
     */
    static function instance() {
        if(is_null(self::$instance)) {
            self::$instance = new \Gileson\RussianPostCalc\RussianPost();
        }

        return self::$instance;
    }

    /**
     * @param $key - API ключ
     *
     * @return $this
     */
    function setApiKey($key) {
        $this->api_key = $key;

        return $this;
    }

    /**
     * @param $password - пароль от личного кабинета
     *
     * @return $this
     */
    function setApiPassword($password) {
        $this->api_password = $password;

        return $this;
    }

    /**
     * Печать бланка адресного ярлыка
     *
     * @param Letterhead $list            - Массив данных о почтовых отправлениях закодированный Letterhead. Данные параметры печатаются без проверки. Что введено, то
     *                                    будет напечатано.
     * @param bool       $print0          - Значение 1 или 0. Если 1, то нулевая объявленная ценность и наложенный платеж печатается как 0 руб., иначе остается пустое
     *                                    место
     * @param bool       $printnalogkareq - Значение 1 или 0. Если 1, то печатаются реквизиты для наложенного платежа (также требуется значение nalogka_ur_lico_cb=1 в
     *                                    конкретном отправлении), иначе не печатаются
     *
     * @return File
     * @throws RussianPostCalcException
     */
    function printF7p(Letterhead $list, $print0 = false, $printnalogkareq = false) {
        $params   = [
            'print0'          => (int) $print0,
            'printnalogkareq' => (int) $printnalogkareq,
            'list'            => $list->toJson(),
        ];
        $response = $this->sendRequest('print_f7p', $params);

        return new File($response->link);
    }

    /**
     * Печать сопроводительного бланка ф.116
     *
     * @param Letterhead $list            - Массив данных о почтовых отправлениях закодированный Letterhead. Данные параметры печатаются без проверки. Что введено, то
     *                                    будет напечатано.
     * @param bool       $f116_onepage    - Значение 1 или 0. Если 1, то форма 116 печатается на 1 листе А4, иначе на двух листах А5
     * @param bool       $print0          - Значение 1 или 0. Если 1, то нулевая объявленная ценность и наложенный платеж печатается как 0 руб., иначе остается пустое
     *                                    место
     *
     * @return File
     * @throws RussianPostCalcException
     */
    function printF116(Letterhead $list, $f116_onepage = false, $print0 = false) {
        $params   = [
            'f116_onepage' => (int) $f116_onepage,
            'print0'       => (int) $print0,
            'list'         => $list->toJson(),
        ];
        $response = $this->sendRequest('print_f116', $params);

        return new File($response->link);
    }

    /**
     * Печать бланка почтового перевода ф.112эн
     *
     * @param Letterhead $list               - Массив данных о почтовых отправлениях закодированный Letterhead. Данные параметры печатаются без проверки. Что введено, то
     *                                       будет напечатано.
     * @param bool       $f113_oborot        - Значение 1 или 0. Если 1, тогда оборотная сторона бланка ф.112 печатается, иначе - нет
     * @param bool       $nalogka_ur_lico_cb - Значение 1 или 0. Если 1, тогда заполняются поля для перевода на банковский счет, иначе - нет
     *
     * @return File
     * @throws RussianPostCalcException
     */
    function printF112(Letterhead $list, $f113_oborot = false, $nalogka_ur_lico_cb = false) {
        $params   = [
            'f113_oborot'        => (int) $f113_oborot,
            'nalogka_ur_lico_cb' => (int) $nalogka_ur_lico_cb,
            'list'               => $list->toJson(),
        ];
        $response = $this->sendRequest('print_f112', $params);

        return new File($response->link);
    }

    /**
     * Печать бланка почтового перевода ф.113эф
     *
     * @param Letterhead $list               - Массив данных о почтовых отправлениях закодированный Letterhead. Данные параметры печатаются без проверки. Что введено, то
     *                                       будет напечатано.
     * @param bool       $f113_oborot        - Значение 1 или 0. Если 1, тогда оборотная сторона бланка ф.112 печатается, иначе - нет
     * @param bool       $nalogka_ur_lico_cb - Значение 1 или 0. Если 1, тогда заполняются поля для перевода на банковский счет, иначе - нет
     *
     * @return File
     * @throws RussianPostCalcException
     */
    function printF113(Letterhead $list, $f113_oborot = false, $nalogka_ur_lico_cb = false) {
        $params   = [
            'f113_oborot'        => (int) $f113_oborot,
            'nalogka_ur_lico_cb' => (int) $nalogka_ur_lico_cb,
            'list'               => $list->toJson(),
        ];
        $response = $this->sendRequest('print_f113', $params);

        return new File($response->link);
    }

    /**
     * @param      $from_index    - индекс отправления
     * @param      $to_index      - индекс назначения
     * @param      $weight        - вес в килограммах
     * @param null $declared_cost - объявленная стоимость
     *
     * @return Calc
     * @throws RussianPostCalcException
     */
    function calc($from_index, $to_index, $weight, $declared_cost = null) {
        if(!$from_index) {
            throw new RussianPostCalcException('Не указан индекс отправления');
        }
        if(!$to_index) {
            throw new RussianPostCalcException('Не указан индекс получения');
        }
        if(!$weight) {
            throw new RussianPostCalcException('Не указан вес');
        }
        $params                   = [];
        $params['from_index']     = (int) $from_index;
        $params['to_index']       = (int) $to_index;
        $params['weight']         = (float) $weight;
        $params['ob_cennost_rub'] = (float) $declared_cost;

        $response = $this->sendRequest('calc', $params);

        return new Calc($response);
    }

    /**
     * @param       $method    - метод
     * @param array $params    - параметры метода
     * @param bool  $need_hash - нужна ли подпись запроса
     *
     * @return mixed
     * @throws RussianPostCalcException
     */
    protected function sendRequest($method, $params = [], $need_hash = true) {
        if(is_null($this->api_key)) {
            throw new RussianPostCalcException('Не задан API ключ');
        }
        if(is_null($this->api_password) && $need_hash) {
            throw new RussianPostCalcException('Не задан API пароль');
        }

        $params['apikey'] = $this->api_key;
        $params['method'] = $method;
        if($need_hash) {
            $to_hash        = $params;
            $to_hash[]      = $this->api_password;
            $params['hash'] = md5(implode('|', $to_hash));
        }

        $context = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => 'Content-Type: application/x-www-form-urlencoded' . PHP_EOL,
                'content' => http_build_query($params),
            ],
        ]);

        $result = json_decode(file_get_contents(self::API_URL, false, $context));
        if($result) {
            if('done' == $result->msg->type) {
                return $result;
            }
            throw new RussianPostCalcException($result->msg->text);
        }
        throw new RussianPostCalcException('Не удалось связаться с сервером');
    }

}

