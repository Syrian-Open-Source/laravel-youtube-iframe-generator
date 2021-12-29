<?php

namespace SOS\LaravelYoutubeFrameGenerator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method \SOS\LaravelYoutubeFrameGenerator\Abstracts\YFrameAbstract height(string $height)
 * @method \SOS\LaravelYoutubeFrameGenerator\Abstracts\YFrameAbstract width(string $width)
 * @method \SOS\LaravelYoutubeFrameGenerator\Abstracts\YFrameAbstract isFullscreen(bool $value)
 * @method \SOS\LaravelYoutubeFrameGenerator\Abstracts\YFrameAbstract setAttributes(string $attr)
 * @method \SOS\LaravelYoutubeFrameGenerator\Abstracts\YFrameAbstract generate(string $url)
 */
class YFrameFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'YFrameFacade';
    }
}
