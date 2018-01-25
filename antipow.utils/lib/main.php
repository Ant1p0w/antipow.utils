<?
namespace Antipow\Utils;

use Bitrix\Main\Loader;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Page\Asset;

class Main
{
    public function loadLocalLib()
    {
        Loader::includeSharewareModule('antipow.utils');
    }

    public function appendScriptsToPage()
    {

        if (!defined("ADMIN_SECTION") && $ADMIN_SECTION !== true)
        {

            $module_id = pathinfo(dirname(__DIR__))["basename"];

            Asset::getInstance()->addJs("/bitrix/js/" . $module_id . "/script.min.js");
            Asset::getInstance()->addCss("/bitrix/css/" . $module_id . "/style.css");
        }

        return false;
    }

    //вывод массива для админа
    public static function pre($arr)
    {
        global $USER;
        if ($USER->IsAdmin())
        {
            print_r("<pre>");
            print_r($arr);
            print_r("</pre>");
        }
    }
}