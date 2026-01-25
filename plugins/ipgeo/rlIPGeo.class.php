<?php

/******************************************************************************
 *  
 *  PROJECT: Flynax Classifieds Software
 *  VERSION: 4.9.3
 *  LICENSE: FL38HVY4OFS3 - https://www.flynax.com/flynax-software-eula.html
 *  PRODUCT: 
 *  DOMAIN: gmowinmobil.com
 *  FILE: INDEX.PHP
 *  
 *  The software is a commercial product delivered under single, non-exclusive,
 *  non-transferable license for one domain or IP address. Therefore distribution,
 *  sale or transfer of the file in whole or in part without permission of Flynax
 *  respective owners is considered to be illegal and breach of Flynax License End
 *  User Agreement.
 *  
 *  You are not allowed to remove this information from the file without permission
 *  of Flynax respective owners.
 *  
 *  Flynax Classifieds Software 2024 | All copyrights reserved.
 *  
 *  https://www.flynax.com
 ******************************************************************************/

use GeoIp2\Database\Reader;
use GeoIp2\Exception\AddressNotFoundException;
use Flynax\Utils\Util;

class rlIPGeo extends Flynax\Abstracts\AbstractPlugin implements Flynax\Interfaces\PluginInterface
{
    public function install() {}
    public function hookInit()
    {
        return;
    }
    protected static function adaptLanguageCodes(?array $locations = []): array
    {
        return [];
    }
    public function hookApMixConfigItem(&$param1) {}
    public function hookApNotifications(&$notices) {}
    public function hookApAjaxRequest(&$out = null, $item = null) {}
    public function update130() {}
    public function update140() {}
    public function update200() {}
    public function uninstall() {}
}
