<?php

namespace picpay\V1\Rest\Transaction\Service;

use Exception;
use picpay\V1\Rest\Transaction\Service\AbstractServiceInterface;
use stdClass;

class TransactionService implements AbstractServiceInterface
{

    /**
     * Realizar a Transação de Transferência
     * @param stdClass $stdClass
     * @return array
     * @throws Exception
     */
    public function sendTransaction(stdClass $stdClass): array
    {
        date_default_timezone_set('America/Sao_Paulo');

        #Persiste nas tabelas de dominio todos os dados da transacao
        #Adiciona na fila o evento de Enviar Notificação via SMS e Email (RABBITMQ) 
        #Gera LOG

        return [
            "statusTransaction" => true,
            "idTransaction" => rand(1, 100),
            "idNotification" => rand(1, 100),
            "dateTransaction" => date("Y-m-d H:i:s"),
        ];
    }

    /**
     * Realizar o rollback da operacao caso existir algum problema
     * @param stdClass $stdClass
     * @return bool
     * @throws Exception
     */
    public function roolbackTransaction(stdClass $data)
    {
        #TODO
    }
}
