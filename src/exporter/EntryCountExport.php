<?php

namespace conversionia\entrycount\exporter;

use craft\base\Element;
use craft\db\ActiveQuery;
use craft\elements\Entry;
use craft\base\ElementExporter;
use craft\elements\db\ElementQuery;
use craft\elements\db\ElementQueryInterface;
use craft\helpers\ArrayHelper;

class EntryCountExport extends ElementExporter
{
    public static function displayName(): string
    {
        return 'Entry Count';
    }

    public function export($query): array
    {
        $results = [];

        foreach ($query->each() as $element) {
            /** @var Element $element */
            $results[] = [
                'id' => $element->entryId,
                'count' => $element->count,
                'dateCreated' => $element->dateCreated,
                'dateUpdated' => $element->dateUpdated,
            ];
        }

        return $results;
    }
}
