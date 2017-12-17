<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Define which configuration should be used
    |--------------------------------------------------------------------------
    */

    'use' => 'production',

    /*
    |--------------------------------------------------------------------------
    | AMQP properties separated by key
    |--------------------------------------------------------------------------
    */

    'properties' => [

        'production' => [
            'host'                  => 'mosquito.rmq.cloudamqp.com',
            'port'                  => 5672,
            'username'              => 'bcoocfcv',
            'password'              => '4s4ROw5Zeqy_QhtNKQ5uXtDz2SVj3DBG',
            'vhost'                 => 'bcoocfcv',
            'connect_options'       => [],
            'ssl_options'           => [],

            'exchange'              => 'subscriber',
            'exchange_type'         => 'direct',
            'exchange_passive'      => false,
            'exchange_durable'      => true,
            'exchange_auto_delete'  => false,
            'exchange_internal'     => false,
            'exchange_nowait'       => false,
            'exchange_properties'   => [],

            'queue_force_declare'   => false,
            'queue_passive'         => false,
            'queue_durable'         => true,
            'queue_exclusive'       => false,
            'queue_auto_delete'     => false,
            'queue_nowait'          => false,
            'queue_properties'      => ['x-ha-policy' => ['S', 'all']],

            'consumer_tag'          => 'enterprise_consumer',
            'consumer_no_local'     => false,
            'consumer_no_ack'       => false,
            'consumer_exclusive'    => false,
            'consumer_nowait'       => false,
            'timeout'               => 5,
            'persistent'            => false,
        ],

    ],

];
