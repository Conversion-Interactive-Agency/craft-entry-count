<?php
/**
 * @copyright Copyright (c) PutYourLightsOn : forked version by Conversionia
 */

namespace conversionia\entrycount\controllers;

use Craft;
use craft\web\Controller;
use conversionia\entrycount\EntryCount;
use DateTime;

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

    public function actionExportAll(): array
    {
        $this->response->format = "csv";
        $date = new DateTime('now' );
        $filename = $date->format('Y-m-d H-i') . ' entry-count-export.csv';
        $this->response->downloadHeaders = $filename;
        return EntryCount::$plugin->entryCount->exportAll();
    }

    public function actionResetAll()
    {
        EntryCount::$plugin->entryCount->resetAll();

        Craft::$app->getSession()->setNotice(Craft::t('entry-count', 'All Entry counts reset.'));

        return $this->redirect('entry-count');
    }
}
