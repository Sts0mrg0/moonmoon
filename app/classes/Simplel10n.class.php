<?php


class Simplel10n {

    public $locale;
    public $l10nFolder;

    public function __construct($locale='en') {
        $GLOBALS['locale'] = array();
        $this->locale      = $locale;
        $this->l10nFolder  = dirname(__FILE__) . '/../l10n/';
        $this->load($this->l10nFolder . $this->locale);
    }

    public function setL1OnFolder($path) {
        $this->l10nFolder = $path;
    }

    static function getString($str) {
        if(array_key_exists($str, $GLOBALS['locale'])) {
            return $GLOBALS['locale'][$str];
        } else {
            return $str;
        }
    }

    static function load($pathToFile) {

        if (!file_exists($pathToFile . '.lang')) return false;

        $file = file($pathToFile . '.lang');

        foreach ($file as $k => $v) {
            if (substr($v,0,1) == ';' && !empty($file[$k+1])) {
                $GLOBALS['locale'][trim(substr($v,1))] = trim($file[$k+1]);
            }
        }
    }
}