<?php

namespace SOS\LaravelYoutubeFrameGenerator\Facades;

use Illuminate\Support\Facades\Facade;
use SOS\LaravelYoutubeFrameGenerator\Classes\IFrame;
use SOS\LaravelYoutubeFrameGenerator\Classes\YFrame;

/**
 * @method YFrame setExample(string $url)
 */
class YFrameFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'YFrameFacade';
    }
}
