<?php
/**
 * @copyright Copyright (c) PutYourLightsOn : forked version by Conversionia
 */

namespace conversionia\entrycount\models;

use craft\base\Model;

/**
 * SettingsModel
 */
class SettingsModel extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var bool
     */
    public $ignoreLoggedInUsers = false;

    /**
     * @var string
     */
    public $ignoreIpAddresses;
}
