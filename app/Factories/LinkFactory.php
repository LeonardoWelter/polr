<?php
namespace App\Factories;

use App\Models\Link;
use App\Helpers\CryptoHelper;
use App\Helpers\LinkHelper;


class LinkFactory {
    const MAXIMUM_LINK_LENGTH = 65535;

    private static function formatLink($link_ending, $secret_ending=false) {
        /**
        * Given a link ending and a boolean indicating whether a secret ending is needed,
        * return a link formatted with app protocol, app address, and link ending.
        * @param string $link_ending
        * @param boolean $secret_ending
        * @return string
        */
        $short_url = env('APP_PROTOCOL') . env('APP_ADDRESS') . '/' . $link_ending;

        if ($secret_ending) {
            $short_url .= '/' . $secret_ending;
        }

        return $short_url;
    }

    public static function createLink($long_url, $is_secret=false, $custom_ending=null, $link_ip='127.0.0.1', $creator=false, $return_object=false, $is_api=false) {
        /**
        * Given parameters needed to create a link, generate appropriate ending and
        * return formatted link.
        *
        * @param string $custom_ending
        * @param boolean (optional) $is_secret
        * @param string (optional) $custom_ending
        * @param string $link_ip
        * @param string $creator
        * @param bool $return_object
        * @param bool $is_api
        * @return string $formatted_link
        */

        if (strlen($long_url) > self::MAXIMUM_LINK_LENGTH) {
            // If $long_url is longer than the maximum length, then
            // throw an Exception
            throw new \Exception('A URL inserida é maior que o tamanho máximo permitido.');
        }

        $is_already_short = LinkHelper::checkIfAlreadyShortened($long_url);

        if ($is_already_short) {
            throw new \Exception('A URL inserida pertence a um domínio proibido.');
        }

        if (!$is_secret && (!isset($custom_ending) || $custom_ending === '') && (LinkHelper::longLinkExists($long_url, $creator) !== false)) {
            // if link is not specified as secret, is non-custom, and
            // already exists in Polr, lookup the value and return
            $existing_link = LinkHelper::longLinkExists($long_url, $creator);
            return self::formatLink($existing_link);
        }

        if (isset($custom_ending) && $custom_ending !== '') {
            // has custom ending
            $ending_conforms = LinkHelper::validateEnding($custom_ending);
            if (!$ending_conforms) {
                throw new \Exception('URLs personalizadas só podem conter caracteres alfanuméricos (A-z / 0-9), hífen (-) e underline (_).');
            }

            $ending_in_use = LinkHelper::linkExists($custom_ending);
            if ($ending_in_use) {
                throw new \Exception('Essa URL personalizada já está em uso.');
            }

            $link_ending = $custom_ending;
        }
        else {
            if (env('SETTING_PSEUDORANDOM_ENDING')) {
                // generate a pseudorandom ending
                $link_ending = LinkHelper::findPseudoRandomEnding();
            }
            else {
                // generate a counter-based ending or use existing ending if possible
                $link_ending = LinkHelper::findSuitableEnding();
            }
        }

        $link = new Link;
        $link->short_url = $link_ending;
        $link->long_url  = $long_url;
        $link->ip        = $link_ip;
        $link->is_custom = $custom_ending != null;

        $link->is_api    = $is_api;

        if ($creator) {
            $link->creator = $creator;
        }

        if ($is_secret) {
            $rand_bytes_num = intval(env('POLR_SECRET_BYTES'));
            $secret_key = CryptoHelper::generateRandomHex($rand_bytes_num);
            $link->secret_key = $secret_key;
        }
        else {
            $secret_key = false;
        }

        $link->save();

        $formatted_link = self::formatLink($link_ending, $secret_key);

        if ($return_object) {
            return $link;
        }

        return $formatted_link;
    }

}
