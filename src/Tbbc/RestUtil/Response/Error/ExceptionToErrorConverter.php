<?php

namespace Tbbc\RestUtil\Response\Error;

use Tbbc\RestUtil\Response\HttpCodes;

class ExceptionToErrorConverter
{
    private $map = array(
        'InvalidArgumentException' => array(
           'status'                    => HttpCodes::HTTP_BAD_REQUEST,
           'add_code'                  => '02',
           'message'                   => 'InvalidArgumentException',
           'extended_message_property' => null,
           'more_info_url'             => null,
        ),
    );

    /**
     * @param array $map
     */
    public function __construct(array $map = array())
    {
        if (!empty($map)) {
            $this->map = $map;
        }
    }

    /**
     * @param \Exception $e
     * @return null|Error
     */
    public function convert(\Exception $e)
    {
        if (null == ($mapping = $this->getMapping($e))) {
            return null;
        }

        $status = $mapping['status'];
        $message = $mapping['message'];
        $extendedMessage = null;
        $moreInfoUrl = $mapping['more_info_url'];

        if (!empty($mapping['extended_message_property'])) {
            try {
                $getter = 'get' . ucfirst($mapping['extended_message_property']);
                $extendedMessage = $e->$getter();
            } catch(\Exception $e) {
                // simply ignore it
            }
        }

        $error = new Error($status, $this->createCode($mapping), $message, $extendedMessage, $moreInfoUrl);

        return $error;
    }

    /**
     * @param \Exception $e
     * @return null|array
     */
    private function getMapping(\Exception $e)
    {
        $exceptionClass = $this->getFqcn($e);
        if (!array_key_exists($exceptionClass, $this->map)) {
            return null;
        }

        return $this->map[$exceptionClass];
    }

    /**
     * @param Object $object
     * @return string
     */
    private function getFqcn($object)
    {
        return get_class($object);
    }

    /**
     * @param array $mapping
     * @return int
     */
    private static function createCode($mapping)
    {
        $code = ((string) $mapping['status']) . $mapping['add_code'];

        return (int) $code;
    }
}