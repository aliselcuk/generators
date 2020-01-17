<?php namespace Way\Generators;

use Illuminate\Support\ServiceProvider;

class GeneratorsServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->registerConfig();
        $this->registerMigration();
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
            return $this->app->make('Way\Generators\Commands\MigrationGeneratorCommand');
        });

        $this->commands('generate.migration');
    }
}
