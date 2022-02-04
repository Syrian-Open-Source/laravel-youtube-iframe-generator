<?php

namespace SOS\LaravelYoutubeFrameGenerator\Providers;

use Illuminate\Support\Facades\Blade;
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
        $this->registerDirectives();
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

    protected function registerDirectives()
    {
        Blade::directive('yframe', function ($expression) {
            list($url, $options) = $this->extractArguments($expression);

            $width = $this->printMethodChain('width', $options);
            $height = $this->printMethodChain('height', $options);
            $isFullscreen = $this->printMethodChain('isFullscreen', $options);

            return sprintf('<?php echo (new \SOS\LaravelYoutubeFrameGenerator\Classes\YFrame())%s%s%s->generate(%s); ?>', $width, $height, $isFullscreen, $url);
        });
    }

    private function printMethodChain($key, $array)
    {
        return array_key_exists($key, $array) ? "->$key($array[$key])" : '';
    }

    private function extractArguments($arguments)
    {
        list($url, $options) = explode(',', $arguments, 2);
        $options = collect(explode(',', trim(trim(str_replace(['[', ']'], ['', ''], $options)), ','))) // remove array brackets, trim trailing comma
            ->map(fn ($item) => explode('=>', trim($item)))
            ->map(fn ($item) => [trim(trim($item[0]), '\'"'), trim($item[1])]) // remove quotation from array keys
            ->pluck('1', '0');

        return [$url, $options->toArray()];
    }
}
