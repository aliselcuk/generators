<?php namespace AliSelcuk\Generators;

use AliSelcuk\Generators\Commands\MigrateGenerateCommand;
use Webofis\Platform\Support\ServiceProvider;

class GeneratorsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerConfig();
//        $this->registerMigration();

        $this->app->singleton('migration.generate',
            function($app) {
                return new MigrateGenerateCommand(
                    $app->make('AliSelcuk\Generators\Generator'),
                    $app->make('AliSelcuk\Generators\Filesystem\Filesystem'),
                    $app->make('AliSelcuk\Generators\Compilers\TemplateCompiler'),
                    $app->make('migration.repository'),
                    $app->make('config')
                );
            });

        $this->commands('migration.generate');

        // Bind the Repository Interface to $app['migrations.repository']
        $this->app->bind('Illuminate\Database\Migrations\MigrationRepositoryInterface', function($app) {
            return $app['migration.repository'];
        });
    }

    /**
     * Register the config paths
     */
    public function registerConfig()
    {
        $packageConfigFile = __DIR__.'/../config/config.php';
        $config = $this->app['files']->getRequire($packageConfigFile);

        $this->app['config']->set('generators.config', $config);
    }

    /**
     * Register the migration generator
     */
    protected function registerMigration()
    {
        $this->app->singleton('generate.migration', function ($app) {
            return $this->app->make('AliSelcuk\Generators\Commands\MigrationGeneratorCommand');
        });

        $this->commands('generate.migration');
    }
}
