<?php

use MMWS\Model\Endpoint;

return [
    'getUniqId' => [
        'uid' => [
            'params' => ['len', 'hash'],
            'body' =>
            $e = new Endpoint(),
            $e->get('uniqid_gen', 'getUniqueId')
                ->cache()
        ],
        'body' => [
            $e = new Endpoint(),
            $e->get('uniqid_gen', 'getUniqueId')
                ->cache()
        ]
    ],
];
