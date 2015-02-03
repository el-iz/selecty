<?php
/**
 * @Author: eliz
 * @Date:   2015-01-28 10:50:59
 * @Last Modified by:   eliz
 * @Last Modified time: 2015-02-03 16:08:24
 */

namespace eliz\selecty;

use yii\web\AssetBundle;

class SelectyAsset extends AssetBundle
{
    public $sourcePath = '@vendor/elizzk/selecty/assets';
    public $css = [
        'selecty.css'
    ];
    public $js = [
    	'selecty.js'
    ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset'
    ];
} 