<?php
/**
 * @copyright Copyright (c) PutYourLightsOn : forked version by Conversionia
 */

namespace conversionia\entrycount\controllers;

use Craft;
use craft\web\Controller;
use conversionia\entrycount\EntryCount;

/**
 * EntryCountController
 */
class EntryCountController extends Controller
{
    /**
     * Reset count
     */
    public function actionReset()
    {
        $entryId = Craft::$app->getRequest()->getRequiredParam('entryId');

        EntryCount::$plugin->entryCount->reset($entryId);

        Craft::$app->getSession()->setNotice(Craft::t('entry-count', 'Entry count reset.'));

        return $this->redirect('entry-count');
    }
}
