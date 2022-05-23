<?php
return [
    'picpay\\V1\\Rest\\Transaction\\Controller' => [
        'collection' => [
            'POST' => [
                'request' => '{
	"value": 100.00,
	"payer": 1,
	"payee": 2
}

Onde o value informa o valor em moeda REAL da transação.
Onde o payer informa o usuário pagador da transação.
Onde o payee informa o usuário recebedor do pagamento da transação.',
                'response' => '{
	"statusTransaction": true,
	"idTransaction": 71,
	"idNotification": 92,
	"dateTransaction": "2022-05-22 22:27:54",
	"_links": {
		"self": {
			"href": "http:\\/\\/localhost:8080\\/api\\/transaction"
		}
	}
}

Onde o statusTransaction informa se a transação foi realizada com sucesso.
Onde o idTransaction informa o identificador único gerado para a transação salva em banco de dados.
Onde o idNotification informa o identificador único gerado pelo Serviço de Notificação de Recebimento de Pagamento.
Onde o dateTransaction informa a a data e hora da transação salva em banco de dados.',
                'description' => 'Request na API /api/transaction.
API Privada utilizando autenticação HTTP BASIC.
Possui integrações com libs terceiras de Notificação de SMS/Emaile e Serviço Autorizado de Transferência Externo.',
            ],
            'description' => 'API responsável por realizar transações de pagamentos entre usuários de app.',
        ],
        'description' => 'API responsável por realizar transações de pagamentos entre usuários de app.',
    ],
];
