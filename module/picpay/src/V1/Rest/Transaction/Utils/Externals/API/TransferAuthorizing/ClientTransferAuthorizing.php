<?php

namespace picpay\V1\Rest\Transaction\Utils\Externals\API\TransferAuthorizing;

use Exception;
use Laminas\Http\Client;
use Laminas\Http\Request;

class ClientTransferAuthorizing
{
    const URI = "https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6";
    const RESPONSE_API_OK = "Autorizado";

    private $client;
    private $request;

    public function __construct(
        Request $request,
        Client $client
    ) {
        $this->client = $client;
        $this->request = $request;
    }

    /**
     * Realizar o consumo da Api https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6
     * @return bool
     * @throws Exception
     */
    public function queryTransferAuthorizing(): bool
    {
        try {
            $this->request->setUri(self::URI);
            $response = $this->client->send($this->request);
            
            if (!$response->isSuccess()) {
                throw new Exception("Erro na operação.");
            }
            
            return $this->parseResponse(json_decode($response->getContent()));
        } catch (Exception $e) {
            throw new Exception(sprintf("Houve um problema para consumir a API de Autorização de Transferência: %s", $e->getMessage()));
        }
    }

    private function parseResponse($content): bool
    {
        $isAuthorizingOk = false;

        if (isset($content->message) && self::RESPONSE_API_OK === $content->message) {
            $isAuthorizingOk = true;
        }

        return $isAuthorizingOk;
    }
}
