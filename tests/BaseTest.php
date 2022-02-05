<?php

namespace SOS\LaravelYoutubeFrameGenerator\Tests;

use Illuminate\Support\Facades\Blade;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use SOS\LaravelYoutubeFrameGenerator\Providers\YFrameServiceProviders;

class BaseTest extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            YFrameServiceProviders::class,
        ];
    }

    /**
     * description
     *
     * @author Abdussalam M. Al-Ali
     */
    public function test_base_test()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_can_compile_directive_using_only_url()
    {
        $string = '@yframe(\'https://www.youtube.com/watch?v=r2VFipOrjO4\')';

        $expected = "<?php echo (new \SOS\LaravelYoutubeFrameGenerator\Classes\YFrame())->generate('https://www.youtube.com/watch?v=r2VFipOrjO4'); ?>";
        $this->assertEquals($expected, Blade::compileString($string));
    }

    /** @test */
    public function it_can_compile_directive_using_url_with_all_options()
    {
        $string = "@yframe('https://www.youtube.com/watch?v=r2VFipOrjO4', [
                    'width' => '100vw',
                    'height' => '600px',
                    'isFullscreen' => true,
                    ])";

        $expected = "<?php echo (new \SOS\LaravelYoutubeFrameGenerator\Classes\YFrame())->width('100vw')->height('600px')->isFullscreen(true)->generate('https://www.youtube.com/watch?v=r2VFipOrjO4'); ?>";
        $this->assertEquals($expected, Blade::compileString($string));
    }
}
