<?php
/**
 * Created by PhpStorm.
 * User: tneumann
 * Date: 11/4/17
 * Time: 9:06 PM
 */

namespace vonZnotz\MtgDeckParser\Plugin;


interface ExternalCardDatabaseProviderInterface
{
    public function downloadDatabase();
    public function extractDatabase();
    public function importDatabse();
}