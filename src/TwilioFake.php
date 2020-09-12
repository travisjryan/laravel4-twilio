<?php

namespace Aloha\Twilio;

use Aloha\Twilio\Interfaces\CommunicationsFacilitator;
use Twilio\Rest\Api;
use Twilio\Rest\Api\V2010;
use Twilio\Rest\Api\V2010\Account\CallInstance;
use Twilio\Rest\Api\V2010\Account\MessageInstance;
use Twilio\Rest\Client;

class Dummy implements CommunicationsFacilitator
{
    /*
     * @throws Twilio\Exceptions\ConfigurationException
     */
    public function message(string $to, string $message, array $mediaUrls = [], array $params = []): MessageInstance
    {
        return new MessageInstance($this->v2010ApiClient(), [], '');
    }

    /*
     * @param callable|string $message
     * @throws Twilio\Exceptions\ConfigurationException
     */
    public function call(string $to, $message, array $params = []): CallInstance
    {
        return new CallInstance($this->v2010ApiClient(), [], '');
    }

    private function v2010ApiClient(): V2010
    {
        $dummyClient = new Client('nonsense', 'nonsense');

        return new V2010(
            new Api($dummyClient)
        );
    }
}
