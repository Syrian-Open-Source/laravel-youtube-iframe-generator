<?php

namespace SOS\LaravelYoutubeFrameGenerator\Providers;

use Illuminate\Support\ServiceProvider;
use SOS\LaravelYoutubeFrameGenerator\Classes\YFrame;
use SOS\LaravelYoutubeFrameGenerator\Commands\InstallCommand;

class YFrameServiceProviders extends ServiceProvider
{
    /**
     *
     *
     * @author Abdussalam M. Al-Ali
     */
    public function boot()
    {
        $this->publishesPackages();
        $this->resolveCommands();
        $this->registerFacades();
    }

    /**
     *
     *
     * @author Abdussalam M. Al-Ali
     */
    public function register()
    {
    }

    /**
     *
     */
    protected function registerFacades()
    {
        $this->app->singleton('YFrameFacade', function () {
            return new YFrame();
        });
    }

    /**
     * publish files
     *
     * @author Abdussalam M. Al-Ali
     */
    protected function publishesPackages()
    {
        $this->publishes([
            __DIR__.'/../Config/youtube_frame_generator.php' => config_path('youtube_frame_generator.php'),
        ], 'youtube-frame-generator');
    }

    /**
     *
     *
     * @author Abdussalam M. Al-Ali
     */
    private function resolveCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
