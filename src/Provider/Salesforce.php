<?php

namespace Flipbox\OAuth2\Client\Provider;

use Craft;
use flipbox\ember\helpers\ModelHelper;

use Exception;
use InvalidArgumentException;

class Salesforce extends \Stevenmaguire\OAuth2\Client\Provider\Salesforce
{
    /**
     * @var string
     */
    public $apiVersion = 'v20.0';

    /**
     * Retrieves the currently configured provider api version.
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    /**
     * Updates the provider api version with a given value.
     *
     * @throws  InvalidArgumentException
     * @param string $apiVersion
     * @return  Salesforce
     */
    public function setApiVersion($apiVersion)
    {
        try {
            $this->domain = (string) $apiVersion;
        } catch (Exception $e) {
            throw new InvalidArgumentException(
                'Value provided as api version is not a string'
            );
        }

        return $this;
    }
}
