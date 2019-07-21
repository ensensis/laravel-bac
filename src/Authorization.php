<?php

namespace Ensensis\LaravelBac;


class Authorization
{
    const TYPE_AUTH = 'auth';

    /**
     * Debe enviar la constante “auth” para solicitar la autorización de la compra
     *
     * @var string
     */
    protected $type;

    /**
     * Llave de seguridad debe extraerse del Control Panel del proveedor
     *
     * @var string
     */
    protected $keyid;

    /**
     * Numérico Número de tarjeta de crédito o débito
     *
     * @var string
     */
    protected $creditCardNumber;

    /**
     * Fecha de expiración de la tarjeta, con formato de dos dígitos para el mes y dos dígitos para el año, para
     * Noviembre del 2012 se debe enviar 1112
     *
     * @var string
     */
    protected $expirationDate;

    /**
     * Monto de la transacción, se debe enviar con dos decimales, para una transacción de 10 dólares se debe enviar
     * 10.00 y una de 1000 dólares se debe enviar 1000.00
     *
     * @var double
     */
    protected $amount;

    /**
     * Identificador de referencia del comercio afiliado, en el cual puede almacenar datos como el número de factura,
     * contrato, entre otros
     *
     * @var string
     */
    protected $orderId;

    /**
     * Código de Seguridad de la tarjeta
     *
     * @var string
     */
    protected $ccv;

    /**
     * Variable codificada con algoritmo md5
     *
     * @var string
     */
    protected $hash;

    /**
     * Variable codificada con algoritmo md5
     *
     * @var string
     */
    protected $time;

    public function __construct($creditCardNumber, $expirationDate, $amount, $orderId)
    {
        $this->type = self::TYPE_AUTH;
        $this->creditCardNumber = $creditCardNumber;
        $this->expirationDate = $expirationDate;
        $this->amount = $amount;
        $this->orderId = $orderId;
        $this->time = time();
        $this->hash = $this->makeHash();

    }

    private function makeHash(){
        $key = config('bac.key');

        return md5("{$this->orderId}|{$this->amount}|{$this->time}|{$key}");
    }
    
    public function toFields(){
        $keyId = config('bac.key_id');

        return [
            'ccnumber' => $this->creditCardNumber,
            'ccexp' => $this->expirationDate,
            'amount' => $this->amount,
            'cvv' => $this->ccv,
            'type' => $this->type,
            'key_id' => $keyId,
            'hash' => $this->hash,
            'time' => $this->time,
            'orderid' => $this->orderId,
        ];
    }
}