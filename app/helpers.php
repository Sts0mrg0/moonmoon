<?php

/**
 * Path to the _custom_ directory.
 *
 * @param  string $file Append this filename to the returned path.
 * @return string
 */
function custom_path($file = '')
{
    return __DIR__.'/../custom' . (!empty($file) ? '/'.$file : '');
}

/**
 * Is moonmoon installed?
 *
 * @return bool
 */
function is_installed()
{
    return file_exists(custom_path('config.yml')) && file_exists(custom_path('people.opml'));
}

/**
 * Shortcut to Simplel10n::getString().
 *
 * @param  string $str
 * @param  string $comment
 * @return string
 */
function _g($str, $comment='') {
    return Simplel10n::getString($str, $comment);
}