<?php

namespace SOS\LaravelYoutubeFrameGenerator\Abstracts;

abstract class YFrameAbstract
{
    private $css = '';
    private $id = '';
    private $fullscreen = false;
    private $attributes = '';

    /**
     * @return mixed
     * @author Abdussalam M. Al-Ali
     */
    public function getCss()
    {
        return $this->css;
    }

    /**
     * @param  mixed  $css
     *
     * @return YFrameAbstract
     * @author Abdussalam M. Al-Ali
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
     * @author Abdussalam M. Al-Ali
     */
    public function getId($url)
    {
        return $this->id;
    }

    /**
     * @param  mixed  $id
     *
     * @return YFrameAbstract
     * @author Abdussalam M. Al-Ali
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     * @author Abdussalam M. Al-Ali
     */
    public function getIsFullscreen()
    {
        return $this->fullscreen;
    }

    /**
     * @param  bool  $fullscreen
     *
     * @return YFrameAbstract
     * @author Abdussalam M. Al-Ali
     */
    public function isFullscreen($fullscreen = true)
    {
        $this->fullscreen = $fullscreen;

        return $this;
    }

    /**
     * @return string
     * @author Abdussalam M. Al-Ali
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param  string  $attributes
     *
     * @return YFrameAbstract
     * @author Abdussalam M. Al-Ali
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
     *
     * @return YFrameAbstract
     * @author karam mustafa
     */
    public function width($width = 500)
    {
        $this->setCss("width:".$width.';');

        return $this;
    }

    /**
     * set the default height.
     *
     * @param  int  $height
     *
     * @return YFrameAbstract
     * @author karam mustafa
     */
    public function height($height = 300)
    {
        $this->setCss("height:".$height.';');

        return $this;

    }

}
