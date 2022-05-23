<?php
return [
    'service_manager' => [
        'invokables' => array(
            'Transaction\Service\TransactionService' => \picpay\V1\Rest\Transaction\Service\TransactionService::class,
            'Transaction\Validator\TransactionValidator' => \picpay\V1\Rest\Transaction\Validator\TransactionValidator::class,
            'Transaction\Exception\ExternalServiceNotAuthorizingException' => \picpay\V1\Rest\Transaction\Exception\ExternalServiceNotAuthorizingException::class,
            'Transaction\Exception\NoSuficientBalanceException' => \picpay\V1\Rest\Transaction\Exception\NoSuficientBalanceException::class,
            'Transaction\Exception\NotAllowedTransferUserException' => \picpay\V1\Rest\Transaction\Exception\NotAllowedTransferUserException::class,
        ),
        'factories' => [
            \picpay\V1\Rest\Transaction\Resource\TransactionResource::class => \picpay\V1\Rest\Transaction\ResourceFactory\TransactionResourceFactory::class,
        ]
    ],
    'router' => [
        'routes' => [
            'picpay.rest.transaction' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/transaction[/:transaction_id]',
                    'defaults' => [
                        'controller' => 'picpay\\V1\\Rest\\Transaction\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'picpay.rest.transaction',
        ],
    ],
    'api-tools-rest' => [
        'picpay\\V1\\Rest\\Transaction\\Controller' => [
            'listener' => \picpay\V1\Rest\Transaction\Resource\TransactionResource::class,
            'route_name' => 'picpay.rest.transaction',
            'route_identifier_name' => 'transaction_id',
            'collection_name' => 'transaction',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'collection_class' => \picpay\V1\Rest\Transaction\Collection\TransactionCollection::class,
            'service_name' => 'transaction',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'picpay\\V1\\Rest\\Transaction\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'picpay\\V1\\Rest\\Transaction\\Controller' => [
                0 => 'application/vnd.picpay.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'picpay\\V1\\Rest\\Transaction\\Controller' => [
                0 => 'application/vnd.picpay.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \picpay\V1\Rest\Transaction\Collection\TransactionCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'picpay.rest.transaction',
                'route_identifier_name' => 'transaction_id',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools-mvc-auth' => [
        'authorization' => [
            'picpay\\V1\\Rest\\Transaction\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
    'api-tools-content-validation' => [
        'picpay\\V1\\Rest\\Transaction\\Controller' => [
            'input_filter' => 'picpay\\V1\\Rest\\Transaction\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'picpay\\V1\\Rest\\Transaction\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'value',
                'description' => 'Responsável por informar o valor em real (R$) da transação.',
                'error_message' => 'O valor é obrigatório e deve ser informado.',
            ],
            1 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Laminas\I18n\Validator\IsInt::class,
                        'options' => [
                            'message' => 'O pagador deve ser um identificador numérico.',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Laminas\I18n\Filter\Alnum::class,
                        'options' => [],
                    ],
                ],
                'error_message' => 'O pagador é obrigatório e deve ser informado.',
                'name' => 'payer',
                'description' => 'Responsável por informar o pagador da transação.',
                'field_type' => '',
            ],
            2 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Laminas\I18n\Validator\IsInt::class,
                        'options' => [
                            'message' => 'O recebedor deve ser um identificador numérico.',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Laminas\I18n\Filter\Alnum::class,
                        'options' => [],
                    ],
                ],
                'error_message' => 'O recebedor é obrigatório e deve ser informado.',
                'name' => 'payee',
                'description' => 'Responsável por informar o recebedor da transação.',
            ],
        ],
    ],
];
