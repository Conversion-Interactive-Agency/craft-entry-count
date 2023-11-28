<?php
/**
 * @copyright Copyright (c) PutYourLightsOn : forked version by Conversionia
 */

namespace conversionia\entrycount;

use Craft;
use craft\base\Plugin;
use craft\web\twig\variables\CraftVariable;
use conversionia\entrycount\models\SettingsModel;
use conversionia\entrycount\services\EntryCountService;
use conversionia\entrycount\variables\EntryCountVariable;
use conversionia\entrycount\exporter\EntryCountExport;
use yii\base\Event;

/**
 * EntryCount
 *
 * @property EntryCountService $entryCount
 */
class EntryCount extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var EntryCount
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();

        self::$plugin = $this;

        // Register services as components
        $this->setComponents([
            'entryCount' => EntryCountService::class,
        ]);

        // Register variable
        Event::on(CraftVariable::class, CraftVariable::EVENT_INIT, function(Event $event) {
            /** @var CraftVariable $variable */
            $variable = $event->sender;
            $variable->set('entryCount', EntryCountVariable::class);
        });
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel(): SettingsModel
    {
        return new SettingsModel();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml()
    {
        return Craft::$app->getView()->renderTemplate('entry-count/settings', [
            'settings' => $this->getSettings()
        ]);
    }
}
