<?php

namespace Manfredjb\LaravelBac;

use GuzzleHttp\Psr7\Response;

class Transaction
{
    const RESPONSE_SUCCESS = '100';
    const RESPONSE_FAIL = '200';
    const RESPONSE_DECLINE = '300';

    /**
     * 1 = Transacción Aprobada
     * 2 = Transacción Denegada
     * 3 = Error en datos de la transacción o error del sistema
     *
     * @var string
     */
    protected $response;

    /**
     * Llave de seguridad obtenida de la Sucursal Electrónica
     *
     * @var string
     */
    protected $responseText;

    /**
     * Código de autorización de la transacción
     *
     * @var string
     */
    protected $authcode;

    /**
     * Identificador de la transacción
     *
     * @var string
     */
    protected $transactionid;

    /**
     * Encriptación de los valores, seguridad
     *
     * @var string
     */
    protected $hash;

    /**
     * Código de respuesta de validación AVS
     *
     * @var string
     */
    protected $avsresponse;

    /**
     * Código de respuesta de validación CVV
     *
     * @var string
     */
    protected $cvvresponse;

    /**
     * Monto de la transacción, ya sea de una tarjeta de débito, crédito o puntos
     *
     * @var double
     */
    protected $amount;

    /**
     * En caso que la transacción sea "Consulta de Puntos", en este campo se devolverá la cantidad de puntos
     * disponibles que tiene la tarjeta para el plan especificado
     *
     * @var double
     */
    protected $purshamount;

    /**
     * Número de orden enviado en la solicitud original
     *
     * @var string
     */
    protected $orderId;

    /**
     * Debe enviar la constante “auth” para solicitar la autorización de la compra
     *
     * @var string
     */
    protected $type;

    /**
     * Código de resultado de la transacción
     *
     * @var string
     */
    protected $responseCode;

    public function __construct(
        $response,
        $responsetext,
        $authcode,
        $transactionid,
        $avsresponse,
        $cvvresponse,
        $orderid,
        $type,
        $responseCode)
    {
        $this->response = $response;
        $this->responseText = $responsetext;
        $this->authcode = $authcode;
        $this->transactionid = $transactionid;
        $this->avsresponse = $avsresponse;
        $this->cvvresponse = $cvvresponse;
        $this->orderId = $orderid;
        $this->type = $type;
        $this->responseCode = $responseCode;
    }

    /**
     * @param Response $response
     * @return Transaction
     */
    public static function createFromResponse(Response $response){
        parse_str($response->getBody()->getContents(), $result);
        return new static(
            $result['response'],
            $result['responsetext'],
            $result['authcode'],
            $result['transactionid'],
            $result['avsresponse'],
            $result['cvvresponse'],
            $result['orderid'],
            $result['type'],
            $result['response_code']
        );
    }

    public function isSuccess(){
        return $this->response == 1;
    }

    /**
     * @return string
     */
    public function getResponse(): string
    {
        return $this->response;
    }

    /**
     * @param string $response
     */
    public function setResponse(string $response): void
    {
        $this->response = $response;
    }

    /**
     * @return string
     */
    public function getResponseText(): string
    {
        return $this->responseText;
    }

    /**
     * @param string $responseText
     */
    public function setResponseText(string $responseText): void
    {
        $this->responseText = $responseText;
    }

    /**
     * @return string
     */
    public function getAuthcode(): string
    {
        return $this->authcode;
    }

    /**
     * @param string $authcode
     */
    public function setAuthcode(string $authcode): void
    {
        $this->authcode = $authcode;
    }

    /**
     * @return string
     */
    public function getTransactionid(): string
    {
        return $this->transactionid;
    }

    /**
     * @param string $transactionid
     */
    public function setTransactionid(string $transactionid): void
    {
        $this->transactionid = $transactionid;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }

    /**
     * @return string
     */
    public function getAvsresponse(): string
    {
        return $this->avsresponse;
    }

    /**
     * @param string $avsresponse
     */
    public function setAvsresponse(string $avsresponse): void
    {
        $this->avsresponse = $avsresponse;
    }

    /**
     * @return string
     */
    public function getCvvresponse(): string
    {
        return $this->cvvresponse;
    }

    /**
     * @param string $cvvresponse
     */
    public function setCvvresponse(string $cvvresponse): void
    {
        $this->cvvresponse = $cvvresponse;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getPurshamount(): float
    {
        return $this->purshamount;
    }

    /**
     * @param float $purshamount
     */
    public function setPurshamount(float $purshamount): void
    {
        $this->purshamount = $purshamount;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getResponseCode(): string
    {
        return $this->responseCode;
    }

    /**
     * @param string $responseCode
     */
    public function setResponseCode(string $responseCode): void
    {
        $this->responseCode = $responseCode;
    }


}