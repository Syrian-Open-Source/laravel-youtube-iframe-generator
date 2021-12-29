<?php

namespace SOS\LaravelYoutubeFrameGenerator\Classes;


use SOS\LaravelYoutubeFrameGenerator\Interfaces\YFrameInterface;

/**
 * Class IFrame
 *
 * @author your name
 * @package SOS\LaravelYoutubeFrameGenerator\Classes
 */
class YFrame extends YFrameAbstract implements YFrameInterface
{

    /**
     * @param  string  $url
     *
     * @return mixed
     * @author karam mustaf
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

        //otherwise assume that the user passed the id
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
            $this->getFullscreen() ? 'allowfullscreen' : '',
            $this->getAttributes(),
            $this->getCss()
        );
    }


}
