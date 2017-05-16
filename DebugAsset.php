<?php
/**
 * @link http://www.Emframework.com/
 * @copyright Copyright (c) 2008 Em Software LLC
 * @license http://www.Emframework.com/license/
 */

namespace em\debug;

use em\web\AssetBundle;

/**
 * Debugger asset bundle
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DebugAsset extends AssetBundle
{
    public $sourcePath = '@em/debug/assets';
    public $css = [
        'main.css',
        'toolbar.css',
    ];
    public $depends = [
        'em\web\EmAsset',
        'em\bootstrap\BootstrapAsset',
    ];
}
