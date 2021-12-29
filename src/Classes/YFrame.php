<?php

namespace SOS\LaravelYoutubeFrameGenerator\Classes;


/**
 * Class IFrame
 *
 * @author your name
 * @package SOS\MultiProcess\Classes
 */
class YFrame extends YFrameAbstract
{
    /**
     * description
     *
     * @author your name
     * @var
     */
    private $example;

    /**
     * description
     *
     * @return mixed
     * @author your name
     */
    public function getExample()
    {
        return $this->example;
    }

    /**
     * description
     *
     * @param  mixed  $example
     *
     * @return IFrame
     * @author your name
     */
    public function setExample($example)
    {
        $this->example = $example;

        return $this;
    }
}
