<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Where the templates for the generators are stored...
    |--------------------------------------------------------------------------
    |
    */
    'migration_template_path' => realpath(__DIR__.'/../templates/migration.txt'),

    'schema_template_path' => realpath(__DIR__.'/../templates/schema.txt'),

    /*
    |--------------------------------------------------------------------------
    | Where the generated files will be saved...
    |--------------------------------------------------------------------------
    |
    */
    'migration_target_path'   => base_path('database/migrations'),

];
