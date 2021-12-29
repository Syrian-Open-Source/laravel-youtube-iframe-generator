<?php

namespace SOS\LaravelYoutubeFrameGenerator\Classes;


use SOS\LaravelYoutubeFrameGenerator\Abstracts\YFrameAbstract;
use SOS\LaravelYoutubeFrameGenerator\Interfaces\YFrameInterface;

/**
 * Class IFrame
 *
 * @author Abdussalam M. Al-Ali
 * @package SOS\LaravelYoutubeFrameGenerator\Classes
 */
class YFrame extends YFrameAbstract implements YFrameInterface
{

    /**
     * YFrame constructor.
     */
    public function __construct()
    {
        $this->resolveConfig();
    }

    /**
     * Get the youtube id from the inserted link.
     *
     * @param  string  $url
     *
     * @return mixed
     * @author Abdussalam M. Al-Ali
     */
    public function getId($url)
    {
        // check if the youtube link has the following formant:
        // youtube.com/watch?v=xxxxx or youtube.com/?v=xxxxx
        $res = strpos($url, '?v=');
        if ($res !== false) {
            $t = explode("?v=", $url);
            return $t[count($t) - 1];
        }

        // check if the youtube link has the following formant:
        // youtu.be.com/xxxx
        $res = strpos($url, 'youtu.be');
        if ($res !== false) {
            $t = explode($url, '/');
            return $t[count($t) - 1];
        }

        // Otherwise assume that the user passed the id.
        return $url;
    }


    /**
     * @inheritDoc
     */
    public function generate($url)
    {
        return sprintf(
            '<iframe src="https://www.youtube.com/embed/%s" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" %s %s style="%s"></iframe>',
            $this->getId($url),
            $this->getIsFullscreen() ? 'allowfullscreen' : '',
            $this->getAttributes(),
            $this->getCss()
        );
    }

    /**
     * set the default configs.
     *
     * @return  YFrame
     * @author karam mustafa
     */
    private function resolveConfig()
    {
        $this->setCss(config('youtube_frame_generator.css'))
            ->height(config('youtube_frame_generator.height'))
            ->width(config('youtube_frame_generator.width'))
            ->setAttributes(config('youtube_frame_generator.attributes'))
            ->isFullscreen(config('youtube_frame_generator.is_fullscreen'));

        return $this;
    }


}
