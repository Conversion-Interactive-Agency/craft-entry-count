<?php
/**
 * @copyright Copyright (c) PutYourLightsOn : forked version by Conversionia
 */

namespace conversionia\entrycount\variables;

use craft\elements\db\EntryQuery;
use conversionia\entrycount\EntryCount;
use conversionia\entrycount\models\EntryCountModel;

/**
 * Entry Count Variable
 */
class EntryCountVariable
{
    /**
     * Returns count
     *
     * @param int $entryId
     *
     * @return EntryCountModel
     */
    public function getCount($entryId): EntryCountModel
    {
        return EntryCount::$plugin->entryCount->getCount($entryId);
    }

    /**
     * Returns counted entries
     *
     * @return EntryQuery
     */
    public function getEntries(): EntryQuery
    {
        return EntryCount::$plugin->entryCount->getEntries();
    }

    /**
     * Increment count
     *
     * @param int $entryId
     */
    public function increment($entryId)
    {
        EntryCount::$plugin->entryCount->increment($entryId);
    }
}
