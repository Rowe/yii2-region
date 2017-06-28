<?php

namespace rowe\region;

use yii\web\AssetBundle;

class RegionWidgetAsset extends AssetBundle
{

    public $sourcePath = '@vendor/rowe/yii2-region-selector/src/assets';

    public $baseUrl = '';

    public $css = [
        'css/areaStyle.css',
    ];
    public $js = [
        'js/area.js',
        'js/charfirstPinyin.js',

    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}

