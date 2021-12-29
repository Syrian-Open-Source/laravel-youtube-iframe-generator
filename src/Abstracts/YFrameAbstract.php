<?php

namespace SOS\LaravelYoutubeFrameGenerator\Classes;

class YFrameAbstract
{
    private $css = '';
    private $id = '';
    private $fullscreen = true;
    private $attributes = '';

    /**
     * @return mixed
     * @author karam mustaf
     */
    public function getCss()
    {
        return $this->css;
    }

    /**
     * @param  mixed  $css
     *
     * @return YFrameAbstract
     * @author karam mustaf
     */
    public function setCss($css)
    {
        $this->css .= $css;

        return $this;
    }

    /**
     * @param $url
     *
     * @return mixed
     * @author karam mustaf
     */
    public function getId($url)
    {
        return $this->id;
    }

    /**
     * @param  mixed  $id
     *
     * @return YFrameAbstract
     * @author karam mustaf
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     * @author karam mustaf
     */
    public function getFullscreen()
    {
        return $this->fullscreen;
    }

    /**
     * @param  string  $fullscreen
     *
     * @return YFrameAbstract
     * @author karam mustaf
     */
    public function setFullscreen($fullscreen)
    {
        $this->fullscreen = $fullscreen;

        return $this;
    }

    /**
     * @return string
     * @author karam mustaf
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param  string  $attributes
     *
     * @return YFrameAbstract
     * @author karam mustaf
     */
    public function setAttributes($attributes)
    {
        $this->attributes .= $attributes;

        return $this;
    }

    /**
     * set the default width.
     *
     * @param  int  $width
     * @param  string  $unit
     *
     * @author karam mustafa
     */
    public function width($width = 500, $unit = "px")
    {
        $this->setCss("width:".$width.$unit.';');
    }

    /**
     * set the default height.
     *
     * @param  int  $height
     * @param  string  $unit
     *
     * @author karam mustafa
     */
    public function height($height = 300, $unit = "px")
    {
        $this->setCss("height:".$height.$unit.';');
    }

}
