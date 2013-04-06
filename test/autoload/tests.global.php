<?php

namespace SoliantEntityAuditTest;

return array(
    'audit' => array(
        'datetime.format' => 'r',
        'paginator.limit' => 20,

        'tableNamePrefix' => '',
        'tableNameSuffix' => '_audit',
        'revisionTableName' => 'Revision',
        'revisionEntityTableName' => 'RevisionEntity',

        'entities' => array(
            'SoliantEntityAuditTest\Models\Album' => array(),
        ),
    ),

    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOSqlite\Driver',
                'params' => array(
                    'user' => 'test',
                    'password' => 'test',
                    'memory' => true,
                ),
            ),
        ),

        'driver' => array(
            'SoliantEntityAudit_moduleDriver' => array(
                'class' => 'SoliantEntityAudit\Mapping\Driver\AuditDriver',
            ),
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\StaticPHPDriver',
                'paths' => array(
                    __DIR__ . '/../SoliantEntityAuditTest/Models',
                ),
            ),

            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Models' => __NAMESPACE__ . '_driver',
                    'SoliantEntityAudit\Entity' => 'SoliantEntityAudit_moduleDriver',
                ),
            ),
        ),
    ),
);
