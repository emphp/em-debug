<?php
/**
 * @link http://www.Emframework.com/
 * @copyright Copyright (c) 2008 Em Software LLC
 * @license http://www.Emframework.com/license/
 */

namespace em\debug;

use em\web\AssetBundle;

/**
 * Timeline asset bundle
 *
 * @author Dmitriy Bashkarev <dmitriy@bashkarev.com>
 * @since 2.0.7
 */
class TimelineAsset extends AssetBundle
{
    public $sourcePath = '@em/debug/assets';
    public $css = [
        'timeline.css',
    ];
    public $js = [
        'timeline.js',
    ];
}