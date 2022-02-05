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

    /**
     * Register package directives
     *
     * @return void
     * @author Roduan Kareem Aldeen
     */
    protected function registerDirectives()
    {
        Blade::directive('yframe', function ($expression) {
            // destruct array into two variables
            [$url, $options] = $this->extractArguments($expression);

            // get methods to print
            $width = $this->printMethodChain('width', $options);
            $height = $this->printMethodChain('height', $options);
            $isFullscreen = $this->printMethodChain('isFullscreen', $options);

            return sprintf('<?php echo (new \SOS\LaravelYoutubeFrameGenerator\Classes\YFrame())%s%s%s->generate(%s); ?>', $width, $height, $isFullscreen, $url);
        });
    }

    /**
     * Generate ->method(args) string.
     *
     * @param $key
     * @param $array
     * @return string
     *
     * @author Roduan Kareem Aldeen
     */
    private function printMethodChain($key, $array)
    {
        return array_key_exists($key, $array) ? "->$key($array[$key])" : '';
    }

    /**
     * Convert string expression coming from directive
     *
     * @param  string  $expression
     * @return array
     *
     * @author Roduan Kareem Aldeen
     */
    private function extractArguments(string $expression)
    {
        // Separate expression to 2 parameters.
        [$url, $options] = array_merge(explode(',', $expression, 2), [collect([])]);

        if (is_string($options)) {
            // remove array brackets, trim trailing comma
            $options = collect(explode(',', trim(trim(str_replace(['[', ']'], ['', ''], $options)), ',')))
            // make each item as two array items
            ->map(fn ($item) => explode('=>', trim($item)))
            // remove quotation from array keys
            ->map(fn ($item) => [trim(trim($item[0]), '\'"'), trim($item[1])])
            // convert collection to associative array
            ->pluck('1', '0');
        }

        return [$url, $options->toArray()];
    }
}
