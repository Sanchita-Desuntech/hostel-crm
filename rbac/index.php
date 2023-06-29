<?php

require_once __DIR__  . '/vendor/autoload.php';

use Bera\Db\Db;

$db = new Db('crm_task', 'localhost', 'root', '', null, true);

$modules = [
    [
        'name' => 'Dashboard',
        'actions' => [
            'view'
        ],
    ],
    [
        'name' => 'Customers',
        'actions' => [
            'view', 'add', 'edit', 'delete'
        ],
    ],
    [
        'name' => 'Task Management',
        'actions' => [
            'view', 'add', 'edit'
        ],
    ],
    [
        'name' => 'Employee Management',
        'actions' => [
            'view', 'add', 'edit', 'delete'
        ],
    ],
    [
        'name' => 'Service Management',
        'actions' => [
            'view', 'add', 'edit', 'delete'
        ],
    ],
    [
        'name' => 'Invoice Management',
        'actions' => [
            'manage'
        ],
    ],
    [
        'name' => 'Package Management',
        'actions' => [
            'view', 'add', 'edit', 'delete'
        ],
    ],
    [
        'name' => 'Payment Management',
        'actions' => [
            'manage'
        ],
    ],
    [
        'name' => 'Coupon Management',
        'actions' => [
            'view', 'add', 'edit', 'delete'
        ],
    ],
    [
        'name' => 'Settings',
        'actions' => [
            'manage'
        ]
    ]
];


echo "Setting up module actions....." . PHP_EOL;

foreach($modules as $module) {

    $module_name = $module['name'];

    // find module
    $sql = "SELECT * FROM tbl_module WHERE name = ?";
    $result = $db->query($sql, [$module_name])->one();
    
    if( $result ) {
        foreach($module['actions']  as $action) {
            $db->insert('tbl_module_action', [
                'module_id' => $result['id'],
                'action_name' => $action
            ]);
        }    
    }
}

echo "module actions init done....." . PHP_EOL;