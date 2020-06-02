<?php
/**
 * Created by [%CREATOR%].
 * User: [%USER%]
 * Date: [%DATE%]
 * Time: [%TIME%]
 */

namespace NewProject\Data;

use diCore\Admin\Data\Skin;

class Config extends \diCore\Data\Config
{
	const siteTitle = '';
	const mainDomain = '[%DOMAIN%]';
	const mainLanguage = 'ru';
	const folderForAssets = 'assets/';
    const adminSkin = Skin::entrine;

	protected static $location = \diLib::LOCATION_VENDOR_BEYOND;
}