<?php

namespace SOS\LaravelYoutubeFrameGenerator\Providers;

use Illuminate\Support\ServiceProvider;
use SOS\LaravelYoutubeFrameGenerator\Commands\InstallCommand;
use SOS\LaravelYoutubeFrameGenerator\Classes\YFrame;

class YFrameServiceProviders extends ServiceProvider
{
    /**
     *
     *
     * @author your name
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
     * @author your name
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
     * @author your name
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
     * @author your name
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
