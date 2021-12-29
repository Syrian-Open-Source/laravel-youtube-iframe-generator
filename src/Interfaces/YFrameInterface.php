<?php

namespace SOS\LaravelYoutubeFrameGenerator\Interfaces;

interface YFrameInterface
{
    /**
     * generate a frame to a youtube url.
     *
     * @param string $url
     *
     * @return mixed
     * @author karam mustafa
     */
    public function generate($url);
}
