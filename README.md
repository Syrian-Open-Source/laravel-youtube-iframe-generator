![logo](assets/logo.png)

# YouTube Frame Generator
Laravel package allows you to generate an iframe tag with a video player depending on a YouTube URL.

##### 1 - Dependency
The first step is using composer to install the package and automatically update your composer.json file, you can do this by running:

```shell
composer require syrian-open-source/laravel-youtube-iframe-generator
```

##### 2 - Copy the package providers to your local config with the publish command, this will publish the config:
```shell
php artisan yframe:install
```

Features
-----------
basic usage:

```php
{!! \SOS\LaravelYoutubeFrameGenerator\Facades\YFrameFacade::generate('https://www.youtube.com/watch?v=35JzR2ymxJE')!!}

```
Or you can use the directive
```php
@yframe('https://www.youtube.com/watch?v=35JzR2ymxJE')
```

If you want to set your css, attributes, height, width or fullscreen allowed:
```php

{!! \SOS\LaravelYoutubeFrameGenerator\Facades\YFrameFacade::width('100%')
        ->height('400px')
        ->isFullscreen(true)
        ->generate('https://www.youtube.com/watch?v=35JzR2ymxJE'); !!}

```
Using the directive
```php
@yframe('https://www.youtube.com/watch?v=35JzR2ymxJE', [
    'width'     => '100%',
    'height'    => '400px',
    'isFullscreen'  => true,
])

```
Changelog
---------
Please see the [CHANGELOG](https://github.com/syrian-open-source/laravel-youtube-iframe-generator/blob/master/CHANGELOG.md) for more information about what has changed or updated or added recently.

Security
--------
If you discover any security related issues, please email them first to alali.abdusslam@gmail.com, 
if we do not fix it within a short period of time please open a new issue describing your problem. 

Credits
-------
* [Abdussalam M. Al-Ali](https://www.linkedin.com/in/abdussalam-alali/)
* [All contributors](https://github.com/syrian-open-source/laravel-youtube-iframe-generator/graphs/contributors)

About Syrian Open Source
-------
The Syrian Open Source platform is the first platform on GitHub dedicated to bringing Syrian developers from different cultures and experiences together, to work on projects in different languages, tasks, and versions, and works to attract Syrian developers to contribute more under one platform to open source software, work on it, and issue it with high quality and advanced engineering features, which It stimulates the dissemination of the open-source concept in the Syrian software community, and also contributes to raising the efficiency of developers by working on distributed systems and teams.
