<?php

namespace Tbbc\RestUtil\Response\Error;


class Error
{
    /**
     * Http status code
     *
     * @var int
     */
    private $status;

    /**
     * Api error code
     *
     * @var int
     */
    private $code;

    /**
     * Descriptive message of error
     *
     * @var string
     */
    private $message;

    /**
     * Additional information about the error
     *
     * @var string
     */
    private $extendedMessage;

    /**
     * Url for getting more info about the error
     *
     * @var string
     */
    private $moreInforUrl;


    public function __construct($status, $code, $message, $extendedMessage = null, $moreInfoUrl = null)
    {
        if (null == $status) {
            throw new \InvalidArgumentException('Http status cannot be null.');
        }

        $this->status = $status;
        $this->code = $code;
        $this->message = $message;
        $this->extendedMessage = $extendedMessage;
        $this->moreInforUrl = $moreInfoUrl;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getMoreInforUrl()
    {
        return $this->moreInforUrl;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getExtendedMessage()
    {
        return $this->extendedMessage;
    }
}