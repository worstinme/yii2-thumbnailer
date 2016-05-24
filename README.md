# yii2-uikit

[UiKit](http://getuikit.com/) extensions for Yii2


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist worstinme/yii2-thumbnailer
```
write to /config/web.php and create folder /thumbnails/

```
'controllerMap' => [
	'images'=>[
	    'class'=>'worstinme\thumbnailer\ImagesController',
	],
	...
],
```

urlRules for /thumbnails/ folder:

```
['pattern'=>'thumbnails/<width:\d+>-<height:\d+>/<image:[\w\-\_\.\/]+>',
        'route'=>'images/thumbnails','suffix'=>''],
```