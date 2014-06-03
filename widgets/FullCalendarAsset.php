<?php

/**
 * @copyright Copyright &copy; Thiago Talma, thiagomt.com, 2014
 * @package yii2-fullcalendar-widget
 * @version 1.0.0
 */

namespace talma\widgets;

use yii\web\AssetBundle;
use Yii;

/**
 * Asset bundle for FullCalendar
 *
 * @author Thiago Talma <thiago@thiagomt.com>
 * @since 1.0
 */
class FullCalendarAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $depends = ['yii\web\JqueryAsset'];

    /**
     * @inheritdoc
     */
    public $js = ['lib/jquery-ui.custom.min.js', 'lib/moment.min.js', 'fullcalendar.js'];

    /**
     * @var string App language
     */
    public $language;

    /**
     * @var boolean If the plugin displays a Google calendar.
     */
    public $googleCalendar = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->css = ['fullcalendar.css', 'fullcalendar.print.css'];
        $this->sourcePath = __DIR__ . '/../assets';
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {
        $language = $this->language ? $this->language : Yii::$app->language;
        $this->js[] = "lang/{$language}.js";

        if ($this->googleCalendar) {
            $this->js[] = "gcal.js";
        }

        parent::registerAssetFiles($view);
    }
}
