<?php

namespace TradeApp;

class Exception extends \Exception
{
    /**
     * @var \TradeApp\Payload
     */
    private $response = null;

    public function __construct(Payload $response, $message = '', $code = 0, \Exception $previous = null)
    {
        $exception = parent::__construct($message, $code, $previous);
        $this->response = $response;

        return $exception;
    }

    /**
     * @return \TradeApp\Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
