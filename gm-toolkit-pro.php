<?php
/**
 * Plugin Name: GM Automate Pro — E-Commerce & Logistics Engine
 * Plugin URI: https://growthmark.pro
 * Description: High-performance WooCommerce automation suite by GrowthMark: 1-Click fast checkout, Smart Abandoned Cart recovery, Fraud Shield & Anti-Spam protection, WooCommerce Orders list Steadfast & Pathao 1-Click booking with live Delivery Success Ratio meter, instant Telegram merchant alerts, Google Sheets live CRM, and SMS notifications.
 * Version: 4.2.1
 * Author: Tamim Hasan
 * Author URI: https://tamim.growthmark.pro
 * Text Domain: gm-automate-pro
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * WC requires at least: 5.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('GM_AUTOMATE_PRO_VERSION', '4.2.1');
define('GM_AUTOMATE_PRO_FILE', __FILE__);

// Official Brand Icon Base64 Data (Transparent 128x128 White GM Logo)
if (!defined('GM_AUTOMATE_LOGO_BASE64')) {
    define('GM_AUTOMATE_LOGO_BASE64', 'iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAAQAElEQVR4AezcC7A0R1kG4D25IKKmVCyRKhFFFI1orIqIICAkKhBRREAQDBcTQIhGKokFaDDcpAA1AoIKFcAgoECEVFmUihAgYApRuSgigoSyFBUViagg5rK+z7D9M2fPzuw5Z2d252Tnr37/7un++uvv1j0z3bPnuMn4b6stMAbAVrt/MhkDYAyALbfAlqs/rgBjAGy5BbZc/XEFGANgyy2wpeoXtccVoFhiS/MxALbU8UXtMQCKJbY0HwNgSx1f1B4DoFhiS/MxALbU8UXtMQCKJbY0HwNgyxw/r+4YAPMW2bLrMQC2zOHz6o4BMG+RLbseA2DLHD6v7hgA8xbZsusxALbM4fPqjgEwb5Etux4DYEsc3qTmGABNltmS+jEAtsTRTWqOAdBkmS2pHwNgSxzdpOYYAE2W2ZL6MQC2xNFNao4B0GSZLakfA+BG7uhl6o0BsMxCN/L2MQBu5A5ept6RCoDpdLoTHBccH5ywAOq17yxT/Ki0R0f69Oan3hh3ZeCZATj7uJ2dnWlwQ3B9cN0CqNeeblPBAEcuGCK8QCc7nelzQ1f2nOczyACoGSA+3mEAzr4h9ScF3xacETwiOC94cvDY4CHBXYNbBfoJBshlFQyD1LXukAhqtp8Q4QU62el8SurvgC555zp0zpCgqyBKHl8zQC6nDPCE6XT6R+H7t8H7gjcELwt+JXha8OvBK4MrAzR/FfpLgh8OTgq/YkyzanArQmQ048tsvy7XNwvuH1wefd4T3DeQOvdX5wxJeRhEWdEfX+1cn/JNAzOcQxngWeH5/cFXBdL1+e+6OaizVH5h6r8lOCt4ffDX4fWc4OvCXCCkOD0+9YNIESZife7WlvLJwTMi2F8GlwUcL2D/I+Ve0iACIEpb9iz1KU5/Ippyuhl+15QZgLM5eJpriQNPSCENdfRBIxBKn68O3c8G7wvzZwZfHIsLMn1TvbkUWcz6ZNNb5j+rGr1/PhJ9fUDfzyanT7KDpf1SM9h+aTuni9KWPku+Ze/UXJvxL8lA3xQwAKQ44SwOFgyu24CGXqUPAwqGL0mnJwV/mnHukiAwJtpUrT9FBmNX+mf0VwdnBCcGZBXA9AV0xQ5p7jYxVLcc98ltZoBJHGE2npduVwVmPGXrBkj1SokBBUMJhJPD7c0Z/9zkngk2ZQOBT9fnRQ56/19yiazzMqHT1jnmB+p8gEUMY/xq6UsbB1jqPczdJNcUFfV9yFUCwbJqrB/MeMaaRB5tuVxPynhueVagszPiOYFZT6YmOdglZN2nPgzdKmWU53yvNzcL4R8EjwgYwAytHJLrtoSOQfSpw6qhramvNvRfEIKXZuX5vuRmnVcubbnsP0V/M5/z75jRvL3QZZneaELefVprAET5KsKTc4KHnu+NStcGlr2qLeVFiYM4T46OwfSpgy7aGAvqfPQD9L8Y558VGdC6Bamv0/ZWzphkFPy3yCCe8t3zyQGpakzz+jQSHrSBQAftcyj6KE9J0W+mviJM7h5wPiOkuDBxDuX15Tz5v4TyT4JXBS8OPDS+JvlfBP8dCA7Q11igH11/Ks6/MLJoX7fziwwRcfI7+c/bCd3IlcvGRA/B30iwSsOywVfhPd+X8y19T03DA4JlzmccRuOsfwr9xcH3BLeLEz3FPzT5Y4KzgwcF35E2bw9nJv/jQF/6wWdy/cDQvDDOd/+t9gNSt85U6Z8BfzW4R8CpdEuxMZXg9XzQSLRKA+Os0n9ffWP0SvnklvxfSCfKm9EpLkyczzjXpPWJwe3jvPODK4NPhU/1+pTcGQF4mEzTzsfy3ysCm0anp9+7g08G90rdZaE/MbmxU7W+lHEFneB/eEb9mYAMbfqHZMIGxfF/ryKwGiRrTgdt6T0AoryZmGzqPfySCEgJ46rP5Z7EOJz/h2k5NQ57dvDJMKg72oObWeyMAJRDUp0WCgYPmlek/12CU9L/yjQKQqtOqtaXZuNy/qkZ9UUBx9IvxcZUaP41FIL3jeFDJ/Wp6i5xRHfcFnMiuKXsyWm+dUCJpnE538x4Xpx27+DqKM7xKe4cc3R4LEwhKoHhQYvDP5O6fwgPMhh3Yb++Ko0b3mS5eXIPfR5+BT6kamFiAwHygbR+d+R3BuJ5hQ1T1W1qckQno9QMYGvTxgslKLeIP8U5/+Io/Xh9IWWOt2os6tNYl342mNwqON+4jbR9NER2TjY22T2wfm3GEYRtNi82cOs6LTr8XfrYp7B6KnaONmG6GCw67DDABWEm+jmCYXK5KzEM578mHc6P8ZTNZvS7CA9yEV4H5pGxBU0lo/JBxpujtQJZ+n8p9Z5JOLcp+ENS3fPp7SDonpH94yojg4OwH5uVtSt2ht4CIIKLfrPQO+9DI7FAWGQATiaHB52z9QttdTCU/EApfTnPMwC4dbQBjRPIgsrpMbygIatlNyynZDuoHOWh7yHpKPg5v815JgDbfDj0nP/vyc18R91PSNmGVbLu04GVO4AIhfeD0scSRsnKyLmuJ8ZWf16M/19pEDiCIsX9p3gq3Xc4zwMhuHW0AY1AKyDHngHD1D2cfHvaFlVEjjLzT0m7h156c24uFya6auf0+2Q8+xyc//RQe27SvlC2tK+cipNWZrSAAcFVCwAKLDJiMc67ovjrivF0OgjSL91N/unNUz4tuF/gewI7fk9K+aLgGcGLgpfN4LXwTSk7GIKrUvYhyQeTg+8I5C8I81Qt/4YgROyZbPqlkd9Dn28T6A2p2pOmqQEz/EcyzodyzfnnJ78wcG6BZ1P/kKyWMF+Nw4LesUA1i5N76rdBQ4G2sZ4/Y4NuVtxfljH0sYybRb+fXm8OXhc4ZDIDn5nyUwLn7I9O7uwB7p+yvYLTksOdkt8+uN0MTg2Vz8kYPx7nuJ0ZI817U2gqOUIn8O103jZUlv42vcsEOCv93h56zn9M8l8OlvUNyefTYUttwh2Wp36Fr2NOmxkUZSBtBSKfQX3t4lxAPTr5QWDJ1c/9khO967tmwGVAVwfn1aG/djuInuLdDopu8zKSw0OfpfsH0qhv232/tD8tzhcwnC8ofzN9jck28zZLU7epSZmuRnHihRdny+tgaNdXxQDXZAYx4CI6NAsx68PozhV+LkTFqIzH+MuArg72qEP/sJ2clP8ujZzks9rsckzkKA99HGjpLnKk28JU2n8vPC9CER42rQQCu+APmnoFZfsYgBL4Wkbli5RhTG2+0NEOrveFGAx9sqn77aXpNA3ooz7FzpIA4bC7ZbAL4zBlddUAqXO7E4RuF247dCdH1b7gP7NbYPn862Haw4OdfL94U9dBW/80d5c6HyjKxEY7lkpG+pqZqIucUur+Jh04b0a678yKwdiWTOMod67PTBq6cNxTo9+dIi+He41MsdLVtw0e+rzt0KVJjiKjJ/4HpPOnw8+Hrp5dviJjGaOpb5q7T30OxhhfPhO5OHt2WWWl7hPV1WTCcLNiexajlSXXl7/eMnbNyvbeh2olK7DXb2d8upHX7cBxtmNpD5BtcqAHAjw4zrfNbcY7yr5NKtv6prmfRKF+OE8mDGOpW8a/GGUZXdUe45cl1/ayI2KvSngw4GFg1pmZFf+W/45LG/7GfWEcqA94zrHRpa1NX+NYSR6fvl478bNyOCTCR1uGWG8iRF8jUsisWcZ/3zLE+RW/5F8Wpk4LPZzZYi7BxgEHBTnrMggmyBB7Et4cfWZk8GqI7l2h8gMObZycyz1JH+0vifOfn76OpTldf98q1Mff07nPij4HtrnRZBA6UV7uHiivnKvQgthvh+Estwzva6DfCv1+8fLQetJG73u85+b6pYFfG5EHyAGpXpgEDBm8Gt4mAtHzcaF0K9NPWy6PJTbgfPI+Ls7XX10hWMkHhclh8z4HtzT/b4tgjK3Zr2EYTrkVMXZl3ORvD3wR5GugR6a8Xzw8tGcGj8xADmk+ktwDJOBNDrPZdiz5ICS7Ehr1Vh+7im5J/xwKX/eyJz65rJKyun/LlYc+waIvpGrziXCdShHjVsol/58wZshkCx/wGFLbnUOrD2O5XorMIvu+bQc9820nps9NglsHTw+8gn00A/1a4CsltxQy5HJi99ABDvnqM1VbgVlsWb9bKuw/ODjy4w4rjNmuH35FJw99vksoby7pNozUeQBQKwZmIMWr/RcUQ6R4LJWx7xz6W6U22f5O3gRM0HbQs6stvB34mH3PTtlGzbcnlziRbJxVZP5EePuh6TtCUJyZ4p6EnqOfEsG/a9bqBy4fS5ludiT1vyD8rgiNNxf0aR5OImgf0pg9+PqwQb4IaDjAq9DDYiRO6FyeGB5P+xKC7IciCMcUR3CQ9lRPyGNb+kPpo+w3ip/WEJAt2a6EBgTCpenjN4eeA/zYA6Et8FdGr4vTxvl0VT8oFOW7FqoYzG/98G4aRz3ac2MkyzBHqdOnK7hHG8PvAsvpHKfV+VsFXL87DhMEntKdzeuDtgQMmjrIyrHfmEq/bpqkv7cTK0j9+4am/um22USBPiQoBv2zMP/HwDilLpfHUqn/ytT4+BMNg+dy9ZSgcs+1a+dE8lHh2MRfgKR5wnnydJ2atU4p35IKK0WTE7UJgkenk59zh3ziGeL0BEP1EJy88Nc2KHBA5wJROMZgQAbwVG0MxpfPg8MZ91Hp42Hp2uTe6+fpDnQdHvhaUb4oHcvDWYoTy7a8gHPQekYospJHX7SOkNtuBfiwI/1enHFvEf0/Hnwk5WTVayuaQYLgfQnGsHh7V1duG0sbA3qtukesVgUBA2JwUKSf4ONEXX83/31z4No4Ke5KxlXxlozLaW4ZHhrVK/sw02dZggQPtPPAl45WMp9+O9olg7p52k6uu2JC8K547eITY/qAggHfmwafNhuryYBmGnggfEMc6F392vBIceqVTt+waU4h9GrogKYs+04JfWdwn/QyLgemuDAZ2y92NCrLJxmfDhz5glQsuxXg71Zw38jy2PR163F7SNfhpqWGXVH0YsyL9sEHrRnjQe3lMaLl9JYMGViOHbwIBqgcHRq5a0469j1g6n2F+86Mee+gzfmlzd8maPrxhbHJ5hnC3kZYLtzXUF9gY0iZPvLBotcAiOPMIDPSNqiz8jJLmgzC0Ixm+WXw98aZjmBvG16W5fJ+74POgqoudILh7slfG+ZWHOfzxcGp2pOMAxr87EzZ+K6Pwbi5oINdw7a3AmOZ8X56fnnk0Eddug839RoAM7Vji2qDx9/pMTMEAQfPmvdknEAuxnNP9VtCH2u+LYyeFTiIOT25jz/vmfwnA98E+J7eMu2Hp5xpDGPtGWBWgT+HPTdOfmd4NDos7dVyntzO4VvTXz/9U6ySschMvwvCS5kMVeOQ/yNor/LFaIyTbMcmiR9HcrC6ZQbiPDTuq54NbLt6GPNE/6YI7eNPr22/kbIPKX1Vg55jjNGmG56caKPqiXGYscgUVo2pfiuYfyvQ15jnRFE/Rk027Kf/omWbkQrNynms4VbgPu1n27ZLGZ8TKDlZDQAABEFJREFUOKyNP6OiRcex+gCDF7gG1+g5s40nPng6p3BA49DK84MxGvtFB/ytEt4K/GLZOHgBfn7V9PoEEz3VNfIaUsNaAoDCMWBZRj1t++zZuz5DtRpe36A4lqGB3AWuwXVIW5NA4Ti7fWdEpo/GYZzKua0dNYaeDujrtwJNVje7mWTYFy+dhgACr02OmgE9D7i3cxznCoQ+5RBkzgCMZ2fSDy/fM3P+QcdOtymZbRB5KxBQ50Y3v+VL1u/S37WR1hoAhI+F3A7MIt/P++3cf6aeETmij9mDL4dZcd6WsRw/+6ORZNCWqv2nyE9GfZ0VPCc935q6VyUq1B2YX/pvNK09AGgbgwkC90p/K8dRqtc2QUAeRgSzFvlhoK/lXo6vLWm/DrI/X87ljXEY3jaI3AoEleNlP0NTFhiH4rfJTgy+kfETBIxo1nww5XtFCD+B9irHYcConMSRjMuZIduT1EOhletruUfsc+07ZAx/m8iTvN1JNNoOjfCbBp8NrgmUyXBofpvquLEAoHAMZyWww5fijj17p3Y/mjavdz6WFAgcSU5OTdNEMNShHgqt3BO+T7W/M4z9caj3z5ZojtIXn5URnrafjb0KL8G4DL0FF8OuIvzKfeMgO3yx5dRqYP//tamzhevDT7uBztbfn4E+FUhkroPx/C0du4327O8XopPDw18Q+/MwFmCdzPrw3ZUyhoBaxTmCx3cQglagy+vwxbNrH5fsGrurC4bsitdKfGJMq4EZZUuXw65O3SWBz6+/Ncx9dOHPwPsTa37VC3586qTvG0J3x+Cng8sDf1Sq8BFgnc36yLFyinwlaPw9BDuXftxi5ZMXuH5gBntw8MZAEuzyzjCYAKARwwT2+Kt7dWavgx4zwIOXM/YPpN1T9xXJ4R3JPxyUPx1X0adfqnYqPvgOFRHSiidgbSJZ+eQFri8LzasDXxexQQmczlQaVADUtYrSZq6DnrIyWB0s52Z2HepCXv11kIo+F50bqi5bl+UEK10Ebht2uhyzzmuwAVAXkkNnEBRmdh3qjozD63opRy+6CNw29KbfkQgAhhrRjwXGAOjHrkeG6xgAR8ZV/Qg6BkA/dj0yXMcAODKu6kfQMQD6seuR4ToGwMBd1bd4YwD0beGB8x8DYOAO6lu8MQD6tvDA+Y8BMHAH9S3eGAB9W3jg/McAGLiD+hZvDIC+LTxw/mMADNRB6xJrDIB1WXqg44wBMFDHrEusMQDWZemBjjMGwEAdsy6xxgBYl6UHOs4YAAN1zLrEGgNgXZYe6DhjAAzMMesWZwyAdVt8YOONATAwh6xbnDEA1m3xgY03BsDAHLJuccYAWLfFBzbeGAADc8i6xRkDYN0WH9h4YwAMxCGbEmMMgE1ZfiDjjgEwEEdsSowxADZl+YGMOwbAQByxKTHGANiU5Qcy7hgAA3HEpsQYA2BTlh/IuGMAbNgRmx7+/wEAAP//Ih2z9QAAAAZJREFUAwARub953szl5AAAAABJRU5ErkJggg==');
}

// Legacy constant compatibility for existing configurations
if (!defined('GM_AUTOMATE_VERSION')) {
    define('GM_AUTOMATE_VERSION', GM_AUTOMATE_PRO_VERSION);
}
if (!defined('GM_AUTOMATE_FILE')) {
    define('GM_AUTOMATE_FILE', GM_AUTOMATE_PRO_FILE);
}
if (!defined('GM_TOOLKIT_VERSION')) {
    define('GM_TOOLKIT_VERSION', GM_AUTOMATE_PRO_VERSION);
}
if (!defined('GM_TOOLKIT_FILE')) {
    define('GM_TOOLKIT_FILE', GM_AUTOMATE_PRO_FILE);
}

/**
 * Declare HPOS Compatibility
 */
add_action('before_woocommerce_init', function() {
    if (class_exists(\Automattic\WooCommerce\Utilities\FeaturesUtil::class)) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', GM_AUTOMATE_FILE, true);
    }
});

/**
 * ============================================================================
 * 1. GITHUB REMOTE AUTO-UPDATER ENGINE
 * ============================================================================
 */
class GM_GitHub_Updater {
    private $slug;
    private $plugin_file;
    private $github_username = 'growthmark-agency';
    private $github_repo     = 'gm-toolkit-pro';

    public function __construct($plugin_file) {
        $this->plugin_file = $plugin_file;
        $this->slug        = plugin_basename($plugin_file);

        add_filter('pre_set_site_transient_update_plugins', array($this, 'check_update'));
        add_filter('site_transient_update_plugins', array($this, 'check_update'));
        add_filter('plugins_api', array($this, 'plugin_info_popup'), 10, 3);
    }

    public function check_update($transient) {
        if (!is_object($transient)) {
            $transient = new stdClass();
        }

        try {
            $force = isset($_GET['force-check']);
            $remote_data = $this->get_github_release($force);
            if ($remote_data && isset($remote_data['tag_name'])) {
                $new_ver = ltrim($remote_data['tag_name'], 'v');
                if (version_compare(GM_AUTOMATE_VERSION, $new_ver, '<')) {
                    $current_dir = dirname($this->slug);
                    $download_url = '';
                    if (!empty($remote_data['assets'])) {
                        // 1. Match current directory name (e.g. gm-toolkit-pro.zip or gm-automate-pro.zip)
                        foreach ($remote_data['assets'] as $asset) {
                            if (!empty($current_dir) && strpos($asset['name'], $current_dir) !== false && substr($asset['name'], -4) === '.zip') {
                                $download_url = $asset['browser_download_url'];
                                break;
                            }
                        }
                        // 2. Fallback to any .zip asset
                        if (empty($download_url)) {
                            foreach ($remote_data['assets'] as $asset) {
                                if (substr($asset['name'], -4) === '.zip') {
                                    $download_url = $asset['browser_download_url'];
                                    break;
                                }
                            }
                        }
                    }
                    if (empty($download_url) && !empty($remote_data['zipball_url'])) {
                        $download_url = $remote_data['zipball_url'];
                    }

                    $res = new stdClass();
                    $res->id          = !empty($current_dir) ? $current_dir : 'gm-automate-pro';
                    $res->slug        = !empty($current_dir) ? $current_dir : 'gm-automate-pro';
                    $res->plugin      = $this->slug;
                    $res->new_version = $new_ver;
                    $res->url         = 'https://growthmark.pro';
                    $res->package     = $download_url;
                    $res->tested      = '6.8';

                    $transient->response[$this->slug] = $res;
                }
            }
        } catch (\Throwable $e) {}

        return $transient;
    }

    public function plugin_info_popup($res, $action, $args) {
        $allowed_slugs = array('gm-toolkit-pro', 'gm-automate', 'gm-automate-pro');
        if ($action !== 'plugin_information' || !isset($args->slug) || !in_array($args->slug, $allowed_slugs, true)) {
            return $res;
        }

        try {
            $remote = $this->get_github_release();
            if ($remote) {
                $res = new stdClass();
                $res->name          = 'GM Automate Pro — E-Commerce & Logistics Engine';
                $res->slug          = $args->slug;
                $res->version       = ltrim($remote['tag_name'], 'v');
                $res->author        = '<a href="https://tamim.growthmark.pro" target="_blank">Tamim Hasan</a> (GrowthMark)';
                $res->homepage      = 'https://growthmark.pro';
                $res->sections      = array(
                    'description' => 'Official Enterprise E-Commerce Automation Suite for WooCommerce by GrowthMark.',
                    'changelog'   => isset($remote['body']) ? nl2br(esc_html($remote['body'])) : 'Latest stability and security enhancements.'
                );
                return $res;
            }
        } catch (\Throwable $e) {}

        return $res;
    }

    private function get_github_release($force = false) {
        $transient_key = 'gm_github_release_cache';
        if ($force) {
            delete_transient($transient_key);
        } else {
            $cached = get_transient($transient_key);
            if ($cached !== false) {
                return $cached;
            }
        }

        $url = "https://api.github.com/repos/{$this->github_username}/{$this->github_repo}/releases/latest";
        $response = wp_remote_get($url, array(
            'headers' => array('User-Agent' => 'GM-Automate-Updater'),
            'timeout' => 8
        ));

        if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
            return false;
        }

        $data = json_decode(wp_remote_retrieve_body($response), true);
        if (!empty($data) && is_array($data)) {
            set_transient($transient_key, $data, 6 * HOUR_IN_SECONDS);
            return $data;
        }

        return false;
    }
}

/**
 * ============================================================================
 * 2. INTERNATIONAL ENTERPRISE DASHBOARD & SETTINGS CONTROLLER
 * ============================================================================
 */
class GM_Admin_Controller {
    public static function init() {
        add_action('admin_menu', array(__CLASS__, 'add_menu_page'));
        add_action('admin_head', array(__CLASS__, 'admin_custom_css'));
        add_action('admin_init', array(__CLASS__, 'register_all_settings'));
        add_action('wp_ajax_gm_test_telegram', array(__CLASS__, 'test_telegram_connection'));
        add_action('wp_ajax_gm_test_sheets', array(__CLASS__, 'test_sheets_connection'));
        add_action('wp_ajax_gm_test_steadfast', array(__CLASS__, 'test_steadfast_connection'));
        add_action('wp_ajax_gm_clear_leads', array(__CLASS__, 'clear_abandoned_leads'));
        
        // Fraud Shield AJAX Endpoints
        add_action('wp_ajax_gm_add_blacklist', array(__CLASS__, 'ajax_add_blacklist'));
        add_action('wp_ajax_gm_remove_blacklist', array(__CLASS__, 'ajax_remove_blacklist'));
        add_action('wp_ajax_gm_clear_fraud_logs', array(__CLASS__, 'ajax_clear_fraud_logs'));

        // Manual 1-Click Courier Booking & Live Ratio AJAX
        add_action('wp_ajax_gm_manual_book_courier', array(__CLASS__, 'ajax_manual_book_courier'));
        add_action('wp_ajax_gm_check_customer_ratio', array(__CLASS__, 'ajax_check_customer_ratio'));
    }

    public static function admin_custom_css() {
        ?>
        <style>
            #adminmenu #toplevel_page_gm-automate-pro .wp-menu-image img,
            #adminmenu .toplevel_page_gm-automate-pro .wp-menu-image img,
            #adminmenu #toplevel_page_gm-toolkit-pro .wp-menu-image img,
            #adminmenu .toplevel_page_gm-toolkit-pro .wp-menu-image img {
                width: 20px !important;
                height: 20px !important;
                padding: 7px 0 0 0 !important;
                object-fit: contain !important;
                opacity: 0.85 !important;
                transition: all 0.2s ease !important;
            }
            #adminmenu #toplevel_page_gm-automate-pro:hover .wp-menu-image img,
            #adminmenu #toplevel_page_gm-automate-pro.current .wp-menu-image img,
            #adminmenu #toplevel_page_gm-automate-pro.wp-has-current-submenu .wp-menu-image img,
            #adminmenu #toplevel_page_gm-toolkit-pro:hover .wp-menu-image img,
            #adminmenu #toplevel_page_gm-toolkit-pro.current .wp-menu-image img,
            #adminmenu #toplevel_page_gm-toolkit-pro.wp-has-current-submenu .wp-menu-image img {
                opacity: 1 !important;
                filter: drop-shadow(0 0 3px rgba(255,255,255,0.4)) !important;
            }
        </style>
        <?php
    }

    public static function add_menu_page() {
        $icon_file = plugin_dir_path(__FILE__) . 'assets/icon-128x128.png';
        $icon_url  = file_exists($icon_file) ? plugins_url('assets/icon-128x128.png', __FILE__) : 'dashicons-superhero';

        add_menu_page(
            'GM Automate Pro',
            'GM Automate Pro',
            'manage_options',
            'gm-automate-pro',
            array(__CLASS__, 'render_admin_dashboard'),
            $icon_url,
            56
        );

        // Fallback compatibility alias for old bookmarked URLs (page=gm-toolkit-pro)
        add_submenu_page(
            null,
            'GM Automate Pro',
            'GM Automate Pro',
            'manage_options',
            'gm-toolkit-pro',
            array(__CLASS__, 'render_admin_dashboard')
        );
    }

    public static function register_all_settings() {
        register_setting('gm_pro_settings', 'gm_tg_active', 'intval');
        register_setting('gm_pro_settings', 'gm_tg_token', 'sanitize_text_field');
        register_setting('gm_pro_settings', 'gm_tg_chat_id', 'sanitize_text_field');

        register_setting('gm_pro_settings', 'gm_gs_active', 'intval');
        register_setting('gm_pro_settings', 'gm_gs_webhook', 'esc_url_raw');

        register_setting('gm_pro_settings', 'gm_sf_active', 'intval');
        register_setting('gm_pro_settings', 'gm_sf_key', 'sanitize_text_field');
        register_setting('gm_pro_settings', 'gm_sf_secret', 'sanitize_text_field');
        register_setting('gm_pro_settings', 'gm_sf_autobook', 'intval');
        register_setting('gm_pro_settings', 'gm_sf_fraud_check', 'intval');

        register_setting('gm_pro_settings', 'gm_pt_active', 'intval');
        register_setting('gm_pro_settings', 'gm_pt_client_id', 'sanitize_text_field');
        register_setting('gm_pro_settings', 'gm_pt_client_secret', 'sanitize_text_field');
        register_setting('gm_pro_settings', 'gm_pt_store_id', 'sanitize_text_field');

        register_setting('gm_pro_settings', 'gm_sms_active', 'intval');
        register_setting('gm_pro_settings', 'gm_sms_gateway', 'sanitize_text_field');
        register_setting('gm_pro_settings', 'gm_sms_key', 'sanitize_text_field');
        register_setting('gm_pro_settings', 'gm_sms_msg', 'sanitize_textarea_field');

        register_setting('gm_pro_settings', 'gm_ab_active', 'intval');

        // Fraud & Anti-Spam Shield Settings
        register_setting('gm_pro_settings', 'gm_fraud_active', 'intval');
        register_setting('gm_pro_settings', 'gm_rate_limit_active', 'intval');
        register_setting('gm_pro_settings', 'gm_phone_regex_active', 'intval');

        // 1-Click Fast Checkout Setup Settings
        register_setting('gm_pro_settings', 'gm_co_default_product', 'intval');
        register_setting('gm_pro_settings', 'gm_co_inside_ship', 'floatval');
        register_setting('gm_pro_settings', 'gm_co_outside_ship', 'floatval');
        register_setting('gm_pro_settings', 'gm_co_btn_color', 'sanitize_hex_color');
    }

    /**
     * Steadfast Official Packzy API Engine
     */
    public static function execute_steadfast_request($endpoint_path, $method = 'GET', $body_data = null) {
        $sf_key    = trim((string) get_option('gm_sf_key'));
        $sf_secret = trim((string) get_option('gm_sf_secret'));

        if (empty($sf_key) || empty($sf_secret)) {
            return new WP_Error('missing_keys', 'Steadfast API Key or Secret Key is missing in GM Automate.');
        }

        $base_url = 'https://portal.packzy.com/api/v1';
        $url = $base_url . '/' . ltrim($endpoint_path, '/');

        $args = array(
            'method'  => $method,
            'headers' => array(
                'Api-Key'      => $sf_key,
                'Secret-Key'   => $sf_secret,
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json'
            ),
            'timeout' => 15
        );

        if ($body_data && $method === 'POST') {
            $args['body'] = wp_json_encode($body_data);
        }

        $res = wp_remote_request($url, $args);

        if (is_wp_error($res)) {
            // Mirror fallback to portal.steadfast.com.bd
            $alt_url = 'https://portal.steadfast.com.bd/api/v1/' . ltrim($endpoint_path, '/');
            $alt_res = wp_remote_request($alt_url, $args);
            if (!is_wp_error($alt_res)) {
                $res = $alt_res;
            } else {
                return new WP_Error('curl_error', 'Steadfast Connection Error: ' . $res->get_error_message());
            }
        }

        $code = wp_remote_retrieve_response_code($res);
        $body = json_decode(wp_remote_retrieve_body($res), true);

        if ($code === 401) {
            return new WP_Error('auth_error', 'Steadfast Authentication Failed: Invalid API Key or Secret Key.');
        }

        if ($code >= 200 && $code < 300) {
            return $body;
        }

        $err_msg = isset($body['message']) ? $body['message'] : "Steadfast API returned HTTP error {$code}";
        if (isset($body['errors']) && is_array($body['errors'])) {
            $err_msg .= ' (' . implode(', ', array_map(function($e){ return is_array($e) ? implode(' ', $e) : $e; }, $body['errors'])) . ')';
        }

        return new WP_Error('api_error', $err_msg);
    }

    public static function test_steadfast_connection() {
        check_ajax_referer('gm_pro_nonce', 'nonce');
        $sf_key    = isset($_POST['key']) ? sanitize_text_field($_POST['key']) : '';
        $sf_secret = isset($_POST['secret']) ? sanitize_text_field($_POST['secret']) : '';

        if (empty($sf_key) || empty($sf_secret)) {
            wp_send_json_error(array('message' => 'Please enter both API Key and Secret Key.'));
        }

        update_option('gm_sf_key', $sf_key);
        update_option('gm_sf_secret', $sf_secret);

        $res = self::execute_steadfast_request('/get_balance', 'GET');

        if (is_wp_error($res)) {
            wp_send_json_error(array('message' => $res->get_error_message()));
        }

        if (isset($res['status']) && $res['status'] === 200) {
            $bal = isset($res['current_balance']) ? $res['current_balance'] : '0.00';
            wp_send_json_success(array('message' => "Steadfast Connected Successfully! Current Balance: ৳{$bal}"));
        }

        wp_send_json_error(array('message' => 'Connection failed. Please check your credentials.'));
    }

    public static function ajax_manual_book_courier() {
        check_ajax_referer('gm_pro_nonce', 'nonce');
        if (!current_user_can('edit_shop_orders')) {
            wp_send_json_error(array('message' => 'Permission denied.'));
        }

        $order_id = isset($_POST['order_id']) ? intval($_POST['order_id']) : 0;
        $courier  = isset($_POST['courier']) ? sanitize_text_field($_POST['courier']) : 'steadfast';

        if (!$order_id || !function_exists('wc_get_order')) {
            wp_send_json_error(array('message' => 'Invalid Order ID.'));
        }

        $order = wc_get_order($order_id);
        if (!$order) {
            wp_send_json_error(array('message' => 'Order not found.'));
        }

        if ($courier === 'steadfast') {
            $name    = trim($order->get_formatted_billing_full_name());
            $phone   = GM_Core_Engine::sanitize_bd_phone($order->get_billing_phone());
            $address = $order->get_billing_address_1();
            $total   = $order->get_total();

            if (!$phone) {
                wp_send_json_error(array('message' => 'Customer phone is not a valid 11-digit number.'));
            }

            $payload = array(
                'invoice'          => (string)$order_id,
                'recipient_name'   => !empty($name) ? $name : 'Valued Customer',
                'recipient_phone'  => $phone,
                'recipient_address'=> !empty($address) ? $address : 'Dhaka, Bangladesh',
                'cod_amount'       => floatval($total),
                'note'             => 'Booked via GM Automate'
            );

            $result = self::execute_steadfast_request('/create_order', 'POST', $payload);

            if (is_wp_error($result)) {
                wp_send_json_error(array('message' => $result->get_error_message()));
            }

            if (!empty($result['consignment']['tracking_code'])) {
                $trk = $result['consignment']['tracking_code'];
                $cid = isset($result['consignment']['consignment_id']) ? $result['consignment']['consignment_id'] : $trk;
                $order->update_meta_data('_steadfast_tracking_code', $trk);
                $order->update_meta_data('_steadfast_consignment_id', $cid);
                $order->add_order_note("Steadfast Booked. Tracking: {$trk}, Consignment ID: {$cid}");
                $order->save();

                wp_send_json_success(array(
                    'message'       => "Steadfast Parcel Created! Tracking Code: {$trk}",
                    'tracking_code' => $trk,
                    'track_url'     => "https://portal.steadfast.com.bd/tracking/{$trk}"
                ));
            } else {
                $err = isset($result['message']) ? $result['message'] : 'Steadfast booking failed. Please verify API Credentials.';
                wp_send_json_error(array('message' => $err));
            }
        }

        wp_send_json_error(array('message' => 'Unsupported courier provider.'));
    }

    public static function ajax_check_customer_ratio() {
        check_ajax_referer('gm_pro_nonce', 'nonce');
        $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
        $order_id = isset($_POST['order_id']) ? intval($_POST['order_id']) : 0;
        $clean_phone = GM_Core_Engine::sanitize_bd_phone($phone);

        if (!$clean_phone) {
            wp_send_json_error(array('message' => 'Invalid Phone Number'));
        }

        $res = self::execute_steadfast_request("/fraud_check/{$clean_phone}", 'GET');
        if (!is_wp_error($res) && isset($res['delivery_status'])) {
            $data = $res['delivery_status'];
            $transient_key = 'gm_sf_ratio_' . $clean_phone;
            set_transient($transient_key, $data, 12 * HOUR_IN_SECONDS);

            if ($order_id && function_exists('wc_get_order')) {
                $order = wc_get_order($order_id);
                if ($order) {
                    $order->update_meta_data('_gm_cached_ratio_data', $data);
                    $order->save();
                }
            }

            $badge_html = GM_WC_Order_Integration::render_ratio_html_from_data($data);
            wp_send_json_success(array('html' => $badge_html));
        }

        // If no prior parcels found on courier
        $fallback_data = array('total_parcels' => 0, 'delivered' => 0, 'cancelled' => 0, 'success_rate' => 100);
        $badge_html = GM_WC_Order_Integration::render_ratio_html_from_data($fallback_data);
        
        if ($order_id && function_exists('wc_get_order')) {
            $order = wc_get_order($order_id);
            if ($order) {
                $order->update_meta_data('_gm_cached_ratio_data', $fallback_data);
                $order->save();
            }
        }

        wp_send_json_success(array('html' => $badge_html));
    }

    public static function ajax_add_blacklist() {
        check_ajax_referer('gm_pro_nonce', 'nonce');
        if (!current_user_can('manage_options')) wp_send_json_error();

        $type   = sanitize_text_field($_POST['type']);
        $value  = sanitize_text_field($_POST['value']);
        $reason = sanitize_text_field($_POST['reason']);

        if (empty($value)) wp_send_json_error(array('message' => 'Please provide a valid value.'));

        if ($type === 'phone') {
            $clean = preg_replace('/[^0-9]/', '', $value);
            if (strlen($clean) === 13 && substr($clean, 0, 2) === '88') {
                $clean = substr($clean, 2);
            }
            $phones = get_option('gm_blocked_phones', array());
            if (!is_array($phones)) $phones = array();
            $phones[$clean] = array(
                'value'  => $clean,
                'reason' => !empty($reason) ? $reason : 'Manual Block',
                'date'   => current_time('d-M-Y h:i A')
            );
            update_option('gm_blocked_phones', $phones);
            wp_send_json_success(array('message' => "Phone number {$clean} added to blacklist."));
        } elseif ($type === 'ip') {
            $ips = get_option('gm_blocked_ips', array());
            if (!is_array($ips)) $ips = array();
            $ips[$value] = array(
                'value'  => $value,
                'reason' => !empty($reason) ? $reason : 'Manual Block',
                'date'   => current_time('d-M-Y h:i A')
            );
            update_option('gm_blocked_ips', $ips);
            wp_send_json_success(array('message' => "IP address {$value} added to blacklist."));
        }

        wp_send_json_error();
    }

    public static function ajax_remove_blacklist() {
        check_ajax_referer('gm_pro_nonce', 'nonce');
        if (!current_user_can('manage_options')) wp_send_json_error();

        $type  = sanitize_text_field($_POST['type']);
        $value = sanitize_text_field($_POST['value']);

        if ($type === 'phone') {
            $clean = preg_replace('/[^0-9]/', '', $value);
            $phones = get_option('gm_blocked_phones', array());
            if (isset($phones[$clean])) {
                unset($phones[$clean]);
                update_option('gm_blocked_phones', $phones);
            }
            wp_send_json_success(array('message' => "Phone {$clean} removed from blacklist."));
        } elseif ($type === 'ip') {
            $ips = get_option('gm_blocked_ips', array());
            if (isset($ips[$value])) {
                unset($ips[$value]);
                update_option('gm_blocked_ips', $ips);
            }
            wp_send_json_success(array('message' => "IP {$value} removed from blacklist."));
        }

        wp_send_json_error();
    }

    public static function ajax_clear_fraud_logs() {
        check_ajax_referer('gm_pro_nonce', 'nonce');
        if (!current_user_can('manage_options')) wp_send_json_error();
        update_option('gm_fraud_logs', array());
        wp_send_json_success();
    }

    public static function test_telegram_connection() {
        check_ajax_referer('gm_pro_nonce', 'nonce');
        $token   = trim(sanitize_text_field($_POST['token']));
        $chat_id = trim(sanitize_text_field($_POST['chat_id']));

        if (empty($token) || empty($chat_id)) {
            wp_send_json_error(array('message' => 'Please fill both Bot Token and Chat ID.'));
        }

        $msg = "<b>GM Automate Live Alert</b>\n\n";
        $msg .= "<b>GM Automate v4.2.1</b> is active.\n";
        $msg .= "<b>Test Order:</b> #TEST-" . rand(1000, 9999) . "\n";
        $msg .= "<b>Customer:</b> Tamim Hasan (Test)\n";
        $msg .= "<b>Phone:</b> <code>01700000000</code>\n";
        $msg .= "<b>Address:</b> Dhanmondi, Dhaka\n";
        $msg .= "<b>Product:</b> Premium Sample Item\n";
        $msg .= "<b>Total Bill:</b> ৳1,050 (COD)\n";
        $msg .= "<b>Time:</b> " . current_time('d-M-Y h:i A') . "\n";
        $msg .= "\n<i>GrowthMark Automation Engine</i>";

        $res = wp_remote_post("https://api.telegram.org/bot{$token}/sendMessage", array(
            'body'    => array('chat_id' => $chat_id, 'text' => $msg, 'parse_mode' => 'HTML'),
            'timeout' => 10,
            'blocking'=> true
        ));

        if (is_wp_error($res)) {
            wp_send_json_error(array('message' => 'Telegram connection error: ' . $res->get_error_message()));
        }

        $code = wp_remote_retrieve_response_code($res);
        if ($code == 200) {
            // Auto-persist successfully verified credentials
            update_option('gm_tg_token', $token);
            update_option('gm_tg_chat_id', $chat_id);
            update_option('gm_tg_active', 1);

            wp_send_json_success(array('message' => 'Success! Test alert sent & Telegram settings automatically saved.'));
        } else {
            $body = json_decode(wp_remote_retrieve_body($res), true);
            $err = isset($body['description']) ? $body['description'] : 'Unknown error';
            wp_send_json_error(array('message' => "Telegram Error ({$code}): {$err}"));
        }
    }

    public static function test_sheets_connection() {
        check_ajax_referer('gm_pro_nonce', 'nonce');
        $webhook = trim(esc_url_raw($_POST['webhook']));

        if (empty($webhook)) {
            wp_send_json_error(array('message' => 'Please provide your Google Apps Script Webhook URL.'));
        }

        $payload = array(
            'date'         => current_time('d-M-Y h:i A'),
            'order_id'     => '#TEST-' . rand(100, 999),
            'name'         => 'Tamim Hasan (Test)',
            'phone'        => '01700000000',
            'address'      => 'Dhanmondi, Dhaka',
            'area'         => 'Inside Dhaka',
            'products'     => 'Special Package (x1)',
            'total_amount' => 1050,
            'status'       => 'Processing'
        );

        $res = wp_remote_post($webhook, array(
            'headers' => array('Content-Type' => 'application/json; charset=utf-8'),
            'body'    => wp_json_encode($payload),
            'timeout' => 10,
            'blocking'=> true
        ));

        if (is_wp_error($res)) {
            wp_send_json_error(array('message' => 'Google Sheets sync error: ' . $res->get_error_message()));
        }

        $code = wp_remote_retrieve_response_code($res);
        if (($code >= 200 && $code < 300) || $code === 302) {
            // Auto-persist verified webhook
            update_option('gm_gs_webhook', $webhook);
            update_option('gm_gs_active', 1);

            wp_send_json_success(array('message' => 'Connected successfully! Test row added & Webhook automatically saved.'));
        } else {
            wp_send_json_error(array('message' => "Google Apps Script returned HTTP error {$code}. Please verify Web App Deployment settings ('Anyone' access)."));
        }
    }

    public static function clear_abandoned_leads() {
        check_ajax_referer('gm_pro_nonce', 'nonce');
        update_option('gm_abandoned_leads_log', array());
        wp_send_json_success();
    }

    public static function render_admin_dashboard() {
        if (!current_user_can('manage_options')) return;
        $all_leads = get_option('gm_abandoned_leads_log', array());
        if (!is_array($all_leads)) $all_leads = array();

        $abandoned_only = array();
        foreach ($all_leads as $l) {
            if (isset($l['status']) && $l['status'] === 'abandoned') {
                $abandoned_only[] = $l;
            }
        }

        $blocked_phones = get_option('gm_blocked_phones', array());
        if (!is_array($blocked_phones)) $blocked_phones = array();
        $blocked_ips = get_option('gm_blocked_ips', array());
        if (!is_array($blocked_ips)) $blocked_ips = array();
        $fraud_logs = get_option('gm_fraud_logs', array());
        if (!is_array($fraud_logs)) $fraud_logs = array();
        $my_ip = GM_Core_Engine::get_client_ip();

        // Get list of products for dropdown
        $wc_products = array();
        if (function_exists('wc_get_products')) {
            $wc_products = wc_get_products(array('limit' => 50, 'status' => 'publish'));
        }
        ?>
        <!-- Instant Zero-Flicker Preload Style -->
        <script>
            (function(){
                var tab = (location.hash ? location.hash.replace('#tab-','') : '') || localStorage.getItem('gm_active_tab') || 'telegram';
                var s = document.createElement('style');
                s.id = 'gm-preload-tab-style';
                s.innerHTML = '#tab-' + tab + '{ display:block !important; } .gm-nav-item[data-tab="' + tab + '"]{ background:#0F172A !important; color:#FFFFFF !important; }';
                document.head.appendChild(s);
            })();
        </script>

        <style>
            /* Modern Responsive Compact Dashboard Layout */
            #wpfooter { display: none !important; }
            .gm-dash-wrap {
                max-width: 100%;
                width: 100%;
                margin: 10px 0 20px 0;
                padding-right: 18px;
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
                color: #0F172A;
                font-size: 13px;
                box-sizing: border-box;
            }
            .gm-dash-wrap * { box-sizing: border-box; }

            .gm-page-header {
                background: #FFFFFF;
                border: 1px solid #E2E8F0;
                border-radius: 12px;
                padding: 14px 20px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                box-shadow: 0 1px 3px rgba(0,0,0,0.03);
                margin-bottom: 16px;
            }
            .gm-header-brand {
                display: flex;
                align-items: center;
                gap: 12px;
            }
            .gm-brand-logo-badge {
                width: 38px;
                height: 38px;
                background: #0F172A;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 5px;
                box-shadow: 0 2px 6px rgba(15,23,42,0.15);
                flex-shrink: 0;
            }
            .gm-brand-logo-badge img {
                width: 100%;
                height: 100%;
                object-fit: contain;
                display: block;
            }
            .gm-header-title {
                margin: 0;
                font-size: 18px;
                font-weight: 800;
                color: #0F172A;
                letter-spacing: -0.01em;
                line-height: 1.2;
            }
            .gm-header-desc {
                margin: 3px 0 0 0;
                font-size: 12.5px;
                color: #64748B;
                line-height: 1.3;
            }
            
            /* Top Horizontal Tab Navigation Bar (Strict Single-Line like WooCommerce) */
            .gm-nav-tabs-wrapper {
                margin: 0 0 18px 0;
                border-bottom: 2px solid #E2E8F0;
                overflow-x: auto;
                overflow-y: hidden;
                scrollbar-width: none;
                -ms-overflow-style: none;
            }
            .gm-nav-tabs-wrapper::-webkit-scrollbar { display: none; }
            
            .gm-nav-menu {
                display: flex;
                flex-wrap: nowrap !important;
                align-items: center;
                gap: 4px;
                padding: 0 0 8px 0;
                white-space: nowrap;
                min-width: max-content;
            }
            .gm-nav-item {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 7px 12px;
                border-radius: 8px;
                font-weight: 600;
                font-size: 12.5px;
                color: #475569;
                text-decoration: none;
                cursor: pointer;
                transition: all 0.15s ease;
                white-space: nowrap;
                user-select: none;
            }
            .gm-nav-item:hover {
                background: #E2E8F0;
                color: #0F172A;
            }
            .gm-nav-item.active {
                background: #0F172A;
                color: #FFFFFF;
                box-shadow: 0 2px 8px rgba(15,23,42,0.12);
            }
            .gm-nav-item.active .gm-nav-svg {
                stroke: #FDE68A;
            }
            .gm-tab-badge {
                background: #FEE2E2;
                color: #DC2626;
                font-size: 11px;
                font-weight: 800;
                padding: 1px 6px;
                border-radius: 9999px;
                margin-left: 2px;
            }
            .gm-tab-badge-dark {
                background: #0F172A;
                color: #FDE68A;
                font-size: 11px;
                font-weight: 800;
                padding: 1px 6px;
                border-radius: 9999px;
                margin-left: 2px;
            }
            .gm-nav-item.active .gm-tab-badge-dark {
                background: rgba(255,255,255,0.2);
                color: #FFFFFF;
            }
            .gm-nav-item-docs {
                margin-left: auto;
                color: #D97706 !important;
                background: #FFFBEB;
                border: 1px solid #FDE68A;
            }
            .gm-nav-item-docs:hover {
                background: #FEF3C7;
                color: #B45309 !important;
            }
            .gm-nav-item-docs.active {
                background: #D97706 !important;
                color: #FFFFFF !important;
                border-color: #D97706 !important;
            }
            .gm-nav-item-docs.active .gm-nav-svg {
                stroke: #FFFFFF !important;
            }
            .gm-nav-item-docs .gm-nav-svg {
                stroke: #D97706;
            }
            .gm-nav-svg {
                width: 15px;
                height: 15px;
                stroke: #64748B;
                stroke-width: 2;
                fill: none;
                stroke-linecap: round;
                stroke-linejoin: round;
                flex-shrink: 0;
                transition: stroke 0.2s;
            }

            .gm-main-layout {
                display: block;
                width: 100%;
            }
            .gm-panels-wrap {
                width: 100%;
            }
            .gm-panel {
                display: none;
                background: #FFFFFF;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
                padding: 28px 30px;
                box-shadow: 0 2px 12px rgba(0,0,0,0.02);
                width: 100%;
                box-sizing: border-box;
            }
            .gm-panel.active { display: block; }
            .gm-panel-header {
                border-bottom: 1px solid #F1F5F9;
                padding-bottom: 16px;
                margin-bottom: 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 10px;
            }
            .gm-panel-title-wrap {
                display: flex;
                align-items: center;
                gap: 10px;
            }
            .gm-panel-icon-badge {
                width: 36px;
                height: 36px;
                border-radius: 10px;
                background: #F8FAFC;
                border: 1px solid #E2E8F0;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }
            .gm-panel-icon-badge svg {
                width: 18px;
                height: 18px;
                stroke: #0F172A;
                stroke-width: 2;
                fill: none;
            }
            .gm-panel-header h3 {
                margin: 0 0 2px 0;
                font-size: 17px;
                font-weight: 800;
                color: #0F172A;
                letter-spacing: -0.01em;
            }
            .gm-panel-header p { margin: 0; font-size: 12.5px; color: #64748B; }

            .gm-toggle-box {
                background: #F8FAFC;
                border: 1.5px solid #E2E8F0;
                border-radius: 12px;
                padding: 12px 16px;
                margin-bottom: 18px;
                display: flex;
                align-items: center;
                gap: 10px;
                font-weight: 700;
                color: #0F172A;
                font-size: 13px;
                cursor: pointer;
                transition: all 0.2s;
            }
            .gm-toggle-box:has(input:checked) {
                background: #F0FDF4;
                border-color: #86EFAC;
                color: #166534;
            }
            .gm-toggle-box input[type="checkbox"] {
                width: 16px;
                height: 16px;
                accent-color: #059669;
                cursor: pointer;
            }

            .gm-form-group { margin-bottom: 16px; }
            .gm-form-group label {
                display: block;
                font-weight: 700;
                font-size: 12.5px;
                color: #334155;
                margin-bottom: 6px;
            }
            
            .gm-input, .gm-textarea, .gm-select {
                width: 100%;
                padding: 9px 13px;
                border: 1.5px solid #CBD5E1 !important;
                border-radius: 10px !important;
                font-size: 13px;
                color: #0F172A;
                background-color: #FFFFFF;
                outline: none;
                transition: all 0.15s ease;
                box-sizing: border-box;
                box-shadow: 0 1px 2px rgba(0,0,0,0.02);
            }
            .gm-input:focus, .gm-textarea:focus, .gm-select:focus {
                border-color: #0F172A !important;
                box-shadow: 0 0 0 3px rgba(15,23,42,0.08) !important;
            }

            .gm-segmented-pills { display: inline-flex; background: #F1F5F9; padding: 3px; border-radius: 10px; gap: 3px; }
            .gm-pill-btn { border: none; background: transparent; padding: 6px 14px; border-radius: 7px; font-weight: 700; font-size: 12px; color: #64748B; cursor: pointer; transition: all 0.15s; }
            .gm-pill-btn.active { background: #0F172A; color: #FFFFFF; box-shadow: 0 2px 5px rgba(0,0,0,0.08); }

            .gm-btn-test {
                background: #0F172A;
                color: #FFFFFF;
                border: none;
                padding: 10px 18px;
                border-radius: 10px;
                font-weight: 700;
                font-size: 12.5px;
                cursor: pointer;
                transition: all 0.18s;
                display: inline-flex;
                align-items: center;
                gap: 6px;
            }
            .gm-btn-test:hover {
                background: #1E293B;
                transform: translateY(-1px);
                box-shadow: 0 3px 10px rgba(15,23,42,0.12);
            }
            .gm-btn-test svg {
                width: 14px;
                height: 14px;
                stroke: currentColor;
                stroke-width: 2;
                fill: none;
            }

            .gm-save-bar {
                background: #F8FAFC;
                border-top: 1px solid #E2E8F0;
                padding: 16px 20px;
                border-radius: 0 0 16px 16px;
                margin: 24px -24px -24px -24px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 10px;
            }
            
            .gm-badge-status { font-size: 11px; font-weight: 800; padding: 3px 8px; border-radius: 6px; display: inline-flex; align-items: center; gap: 5px; }
            .gm-status-abandoned { background: #FEE2E2; color: #DC2626; border: 1px solid #FCA5A5; }
            .gm-status-dot { width: 5px; height: 5px; border-radius: 50%; display: inline-block; }

            .gm-stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 14px; margin-bottom: 20px; }
            .gm-stat-card { background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 12px; padding: 14px 18px; }
            .gm-stat-card .gm-stat-title { font-size: 11.5px; font-weight: 700; color: #64748B; text-transform: uppercase; margin-bottom: 3px; letter-spacing: 0.05em; }
            .gm-stat-card .gm-stat-val { font-size: 22px; font-weight: 900; color: #0F172A; }

            .gm-footer-credits {
                margin-top: 16px;
                padding: 12px 18px;
                background: #FFFFFF;
                border: 1px solid #E2E8F0;
                border-radius: 12px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 8px;
                font-size: 12px;
                color: #64748B;
            }
            .gm-footer-credits a { color: #D97706; text-decoration: none; font-weight: 700; }

            /* Google Sheets Step Guide & Mac Window Code Box */
            .gm-guide-card {
                background: #F8FAFC;
                border: 1px solid #E2E8F0;
                border-radius: 14px;
                padding: 18px 20px;
                margin-bottom: 20px;
            }
            .gm-guide-head {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 10px;
                margin-bottom: 14px;
                padding-bottom: 10px;
                border-bottom: 1px solid #E2E8F0;
            }
            .gm-guide-title {
                display: flex;
                align-items: center;
                gap: 8px;
                font-size: 13.5px;
                font-weight: 700;
                color: #0F172A;
            }
            .gm-link-btn {
                background: #0F172A;
                color: #FFF !important;
                text-decoration: none;
                font-size: 11.5px;
                font-weight: 700;
                padding: 5px 12px;
                border-radius: 7px;
                display: inline-flex;
                align-items: center;
                gap: 4px;
                transition: background 0.15s;
            }
            .gm-link-btn:hover { background: #1E293B; }

            .gm-step-row {
                display: flex;
                gap: 12px;
                margin-bottom: 14px;
                align-items: flex-start;
            }
            .gm-step-num {
                width: 24px;
                height: 24px;
                border-radius: 50%;
                background: #0F172A;
                color: #FFF;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 800;
                font-size: 11px;
                flex-shrink: 0;
                margin-top: 1px;
            }
            .gm-step-content { flex: 1; min-width: 0; font-size: 12.5px; color: #334155; line-height: 1.5; }
            .gm-step-content strong { color: #0F172A; font-size: 13px; display: block; margin-bottom: 2px; }
            
            /* Professional Mac Code Box with Zero Overlap */
            .gm-code-card {
                background: #0B1120;
                border: 1px solid #1E293B;
                border-radius: 12px;
                margin-top: 10px;
                overflow: hidden;
                box-shadow: 0 4px 14px rgba(0,0,0,0.12);
            }
            .gm-code-topbar {
                background: #1E293B;
                padding: 8px 14px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px solid #334155;
            }
            .gm-code-meta {
                display: flex;
                align-items: center;
                gap: 6px;
            }
            .gm-mac-dot {
                width: 9px;
                height: 9px;
                border-radius: 50%;
                display: inline-block;
            }
            .dot-red { background: #EF4444; }
            .dot-yellow { background: #F59E0B; }
            .dot-green { background: #10B981; }
            .gm-code-title {
                font-size: 11px;
                font-weight: 700;
                color: #94A3B8;
                margin-left: 6px;
                font-family: ui-monospace, SFMono-Regular, Menlo, monospace;
            }
            .gm-btn-copy-script {
                background: #D97706;
                border: none;
                color: #FFFFFF;
                font-size: 11px;
                font-weight: 700;
                padding: 5px 12px;
                border-radius: 6px;
                cursor: pointer;
                transition: all 0.2s;
                display: inline-flex;
                align-items: center;
                gap: 5px;
            }
            .gm-btn-copy-script:hover {
                background: #B45309;
                transform: translateY(-1px);
            }
            .gm-code-body {
                padding: 14px 16px;
                max-height: 220px;
                overflow-y: auto;
            }
            .gm-code-body pre {
                margin: 0;
                color: #E2E8F0;
                font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
                font-size: 11.5px;
                line-height: 1.55;
                white-space: pre;
            }
        </style>

        <div class="gm-dash-wrap">
            <?php
            $logo_url = plugins_url('assets/icon-128x128.png', __FILE__);
            ?>
            <!-- Top Clean Master Header (Minimal, No Enterprise Badge, No Right Badge) -->
            <div class="gm-page-header">
                <div class="gm-header-brand">
                    <div class="gm-brand-logo-badge">
                        <img src="<?php echo esc_url($logo_url); ?>" alt="GM Automate" />
                    </div>
                    <div>
                        <h2 class="gm-header-title">GM Automate Pro</h2>
                        <p class="gm-header-desc">High-Performance E-Commerce, Logistics & Fraud Shield Suite</p>
                    </div>
                </div>
            </div>

            <?php if (isset($_GET['settings-updated'])) : ?>
                <div style="padding:14px 20px; border-left:4px solid #059669; border-radius:12px; margin-bottom:20px; background:#ECFDF5; color:#065F46; font-size:14px; font-weight:700;">
                    Settings updated successfully. All automations are active and running.
                </div>
            <?php endif; ?>

            <!-- Top Horizontal Navigation Tabs (Strict Single-Line like WooCommerce) -->
            <div class="gm-nav-tabs-wrapper">
                <div class="gm-nav-menu">
                    <div class="gm-nav-item active" data-tab="telegram" onclick="gmSwitchTab('telegram', this)">
                        <svg class="gm-nav-svg" viewBox="0 0 24 24"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
                        <span>Telegram</span>
                    </div>
                    <div class="gm-nav-item" data-tab="sheets" onclick="gmSwitchTab('sheets', this)">
                        <svg class="gm-nav-svg" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M3 15h18M9 3v18M15 3v18"/></svg>
                        <span>Google Sheets</span>
                    </div>
                    <div class="gm-nav-item" data-tab="courier" onclick="gmSwitchTab('courier', this)">
                        <svg class="gm-nav-svg" viewBox="0 0 24 24"><path d="M1 3h15v13H1zM16 8h4l3 3v5h-7V8zM5.5 19a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM18.5 19a2.5 2.5 0 100-5 2.5 2.5 0 000 5z"/></svg>
                        <span>Logistics</span>
                    </div>
                    <div class="gm-nav-item" data-tab="abandoned" onclick="gmSwitchTab('abandoned', this)">
                        <svg class="gm-nav-svg" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
                        <span>Abandoned Leads</span>
                        <span id="gmAbandonedBadge" class="gm-tab-badge" style="<?php echo empty($abandoned_only) ? 'display:none;' : ''; ?>"><?php echo count($abandoned_only); ?></span>
                    </div>
                    <div class="gm-nav-item" data-tab="fraud" onclick="gmSwitchTab('fraud', this)">
                        <svg class="gm-nav-svg" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
                        <span>Fraud Shield</span>
                        <span id="gmFraudBadge" class="gm-tab-badge-dark"><?php echo count($blocked_phones) + count($blocked_ips); ?></span>
                    </div>
                    <div class="gm-nav-item" data-tab="sms" onclick="gmSwitchTab('sms', this)">
                        <svg class="gm-nav-svg" viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                        <span>SMS Gateway</span>
                    </div>
                    <div class="gm-nav-item" data-tab="shortcode" onclick="gmSwitchTab('shortcode', this)">
                        <svg class="gm-nav-svg" viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                        <span>1-Click Checkout</span>
                    </div>
                    <div class="gm-nav-item gm-nav-item-docs" data-tab="masterclass" onclick="gmSwitchTab('masterclass', this)">
                        <svg class="gm-nav-svg" viewBox="0 0 24 24"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                        <span>Docs & Tutorials</span>
                    </div>
                </div>
            </div>

            <!-- Full Width Content Panels -->
            <div class="gm-main-layout">
                <div class="gm-panels-wrap">
                    <form method="post" action="options.php" id="gmMainForm">
                        <?php settings_fields('gm_pro_settings'); ?>

                        <!-- 1. TELEGRAM TAB -->
                        <div id="tab-telegram" class="gm-panel">
                            <div class="gm-panel-header">
                                <div class="gm-panel-title-wrap">
                                    <div class="gm-panel-icon-badge">
                                        <svg viewBox="0 0 24 24"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
                                    </div>
                                    <div>
                                        <h3>Telegram Merchant Live Alerts</h3>
                                        <p>Receive instant 0.5-second formatted order alerts on your Telegram bot or team group.</p>
                                    </div>
                                </div>
                                <span id="tgLiveStatus" style="font-size:12px; font-weight:700;"></span>
                            </div>

                            <label class="gm-toggle-box">
                                <input type="checkbox" name="gm_tg_active" value="1" <?php checked(1, get_option('gm_tg_active', (!empty(get_option('gm_tg_token')) ? 1 : 0)), true); ?> />
                                <span>Enable Telegram Instant Order Notifications</span>
                            </label>

                            <div class="gm-form-group">
                                <label>Telegram Bot Token:</label>
                                <input type="text" id="gm_tg_token_field" name="gm_tg_token" class="gm-input" value="<?php echo esc_attr(get_option('gm_tg_token')); ?>" placeholder="e.g. 8504804950:AAHDQS3-C1mEF_RZFBhQaDtKqXky1YFsb3A" />
                                <small style="color:#64748B;">Obtained from Telegram's <code>@BotFather</code>.</small>
                            </div>

                            <div class="gm-form-group">
                                <label>Chat ID / Group ID:</label>
                                <input type="text" id="gm_tg_chat_field" name="gm_tg_chat_id" class="gm-input" value="<?php echo esc_attr(get_option('gm_tg_chat_id')); ?>" placeholder="e.g. 6175075085" />
                                <small style="color:#64748B;">Obtained from <code>@userinfobot</code> or group ID starting with <code>-100...</code></small>
                            </div>

                            <div style="margin-top:20px;">
                                <button type="button" class="gm-btn-test" onclick="gmTriggerTestTelegram()">
                                    <svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                                    Send Realtime Test Message to Telegram
                                </button>
                            </div>

                            <div class="gm-save-bar">
                                <span style="font-size:13px; color:#64748B;">Alerts include customer name, phone, address, ordered items, and total amount.</span>
                                <?php submit_button('Save Settings', 'primary large', 'submit', false); ?>
                            </div>
                        </div>

                        <!-- 2. GOOGLE SHEETS TAB (Universal Multi-Merchant Architecture) -->
                        <div id="tab-sheets" class="gm-panel">
                            <div class="gm-panel-header">
                                <div class="gm-panel-title-wrap">
                                    <div class="gm-panel-icon-badge">
                                        <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M3 15h18M9 3v18M15 3v18"/></svg>
                                    </div>
                                    <div>
                                        <h3>Google Sheets Realtime CRM Sync</h3>
                                        <p>Secure direct sync: Each merchant connects their own private spreadsheet with 100% data isolation.</p>
                                    </div>
                                </div>
                                <span id="gsLiveStatus" style="font-size:12px; font-weight:700;"></span>
                            </div>

                            <label class="gm-toggle-box">
                                <input type="checkbox" name="gm_gs_active" value="1" <?php checked(1, get_option('gm_gs_active'), true); ?> />
                                <span>Enable Google Sheets Live CRM Sync</span>
                            </label>

                            <!-- Universal Multi-Merchant Setup Guide -->
                            <div class="gm-guide-card">
                                <div class="gm-guide-head">
                                    <div class="gm-guide-title">
                                        <svg style="width:16px; height:16px; stroke:#D97706; stroke-width:2; fill:none;" viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                                        <span>How to Connect Your Private Google Sheet</span>
                                    </div>
                                    <a href="https://sheets.new" target="_blank" class="gm-link-btn">
                                        Open New Sheet ↗
                                    </a>
                                </div>

                                <div class="gm-step-row">
                                    <div class="gm-step-num">1</div>
                                    <div class="gm-step-content">
                                        <strong>Create a New Spreadsheet</strong>
                                        Open a new Google Sheet at <a href="https://sheets.new" target="_blank">sheets.new</a> and name it (e.g. <em>"Store Orders Master CRM"</em>).
                                    </div>
                                </div>

                                <div class="gm-step-row">
                                    <div class="gm-step-num">2</div>
                                    <div class="gm-step-content">
                                        <strong>Open Apps Script & Paste the Universal Sync Code</strong>
                                        From the top menu of your sheet, click <strong>Extensions → Apps Script</strong>. Delete any code in the editor, copy the script below, and paste it in:
                                        
                                        <div class="gm-code-card">
                                            <div class="gm-code-topbar">
                                                <div class="gm-code-meta">
                                                    <span class="gm-mac-dot dot-red"></span>
                                                    <span class="gm-mac-dot dot-yellow"></span>
                                                    <span class="gm-mac-dot dot-green"></span>
                                                    <span class="gm-code-title">Google Apps Script (doPost)</span>
                                                </div>
                                                <button type="button" class="gm-btn-copy-script" onclick="gmCopyScriptCode()">
                                                    <svg style="width:13px; height:13px; stroke:currentColor; stroke-width:2; fill:none;" viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
                                                    <span id="gmCopyBtnText">Copy Script Code</span>
                                                </button>
                                            </div>
                                            <div class="gm-code-body">
                                                <pre id="gmGoogleScriptCode">// GM Automate Pro — Universal Google Apps Script Webhook
function doPost(e) {
  try {
    var sheet = SpreadsheetApp.getActiveSpreadsheet().getActiveSheet();
    var data = JSON.parse(e.postData.contents);
    
    // Auto-create styled headers if sheet is newly created
    if (sheet.getLastRow() === 0) {
      var headers = [
        "Date & Time",
        "Order ID",
        "Customer Name",
        "Phone Number",
        "Address",
        "Delivery Area",
        "Ordered Items",
        "Total Amount (BDT)",
        "Order Status"
      ];
      sheet.appendRow(headers);
      var headerRange = sheet.getRange(1, 1, 1, headers.length);
      headerRange.setBackground("#0F172A").setFontColor("#FFFFFF").setFontWeight("bold");
      sheet.setFrozenRows(1);
    }
    
    // Append order as a new row
    sheet.appendRow([
      data.date || new Date().toLocaleString(),
      data.order_id || "N/A",
      data.name || "Customer",
      "'" + (data.phone || ""),
      data.address || "",
      data.area || "",
      data.products || "",
      data.total_amount || 0,
      data.status || "Processing"
    ]);
    
    return ContentService.createTextOutput(JSON.stringify({ status: "success" }))
      .setMimeType(ContentService.MimeType.JSON);
  } catch (err) {
    return ContentService.createTextOutput(JSON.stringify({ status: "error", message: err.toString() }))
      .setMimeType(ContentService.MimeType.JSON);
  }
}</pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="gm-step-row" style="margin-bottom:0;">
                                    <div class="gm-step-num">3</div>
                                    <div class="gm-step-content">
                                        <strong>Deploy as Web App & Paste URL Below</strong>
                                        Click <strong>Deploy → New deployment</strong> (top-right blue button).<br/>
                                        • Select type: <strong>Web app</strong><br/>
                                        • Execute as: <strong>Me (your email)</strong><br/>
                                        • Who has access: <strong>Anyone</strong> <em>(Crucial for receiving order webhooks)</em><br/>
                                        Click <strong>Deploy</strong>, copy the generated <strong>Web app URL</strong>, and paste it into the field below.
                                    </div>
                                </div>
                            </div>

                            <div class="gm-form-group">
                                <label>Your Google Apps Script Webhook URL:</label>
                                <input type="url" id="gm_gs_url_field" name="gm_gs_webhook" class="gm-input" value="<?php echo esc_attr(get_option('gm_gs_webhook')); ?>" placeholder="https://script.google.com/macros/s/.../exec" />
                            </div>

                            <div style="margin-top:20px;">
                                <button type="button" class="gm-btn-test" onclick="gmTriggerTestSheets()">
                                    <svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                                    Send Realtime Test Row to Google Sheet
                                </button>
                            </div>

                            <div class="gm-save-bar">
                                <span style="font-size:13px; color:#64748B;">Complete data isolation: Each merchant's orders sync directly to their own private spreadsheet.</span>
                                <?php submit_button('Save Settings', 'primary large', 'submit', false); ?>
                            </div>
                        </div>

                        <!-- 3. COURIER LOGISTICS TAB -->
                        <div id="tab-courier" class="gm-panel">
                            <div class="gm-panel-header">
                                <div class="gm-panel-title-wrap">
                                    <div class="gm-panel-icon-badge">
                                        <svg viewBox="0 0 24 24"><path d="M1 3h15v13H1zM16 8h4l3 3v5h-7V8zM5.5 19a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM18.5 19a2.5 2.5 0 100-5 2.5 2.5 0 000 5z"/></svg>
                                    </div>
                                    <div>
                                        <h3>Courier Logistics (Steadfast & Pathao)</h3>
                                        <p>Automate parcel creation, 1-click booking from WooCommerce Orders list, and live delivery ratio scoring.</p>
                                    </div>
                                </div>
                                <span id="sfLiveStatus" style="font-size:12px; font-weight:700;"></span>
                            </div>

                            <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:16px; padding:24px; margin-bottom:24px;">
                                <h4 style="margin:0 0 14px 0; font-size:16px; color:#0F172A; display:flex; align-items:center; gap:8px;">
                                    Steadfast Courier API & Live Ratio Engine
                                </h4>
                                <label style="display:flex; align-items:center; gap:8px; margin-bottom:16px; font-weight:700; color:#0F172A; cursor:pointer;">
                                    <input type="checkbox" name="gm_sf_active" value="1" <?php checked(1, get_option('gm_sf_active'), true); ?> />
                                    <span>Enable Steadfast Integration (Enables 1-Click Booking & Delivery Ratio in Orders List)</span>
                                </label>
                                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:14px;">
                                    <div class="gm-form-group">
                                        <label>API Key:</label>
                                        <input type="text" id="gm_sf_key_field" name="gm_sf_key" class="gm-input" value="<?php echo esc_attr(get_option('gm_sf_key')); ?>" />
                                    </div>
                                    <div class="gm-form-group">
                                        <label>Secret Key:</label>
                                        <input type="password" id="gm_sf_secret_field" name="gm_sf_secret" class="gm-input" value="<?php echo esc_attr(get_option('gm_sf_secret')); ?>" />
                                    </div>
                                </div>
                                <div style="margin-bottom:16px;">
                                    <button type="button" class="gm-btn-test" onclick="gmTriggerTestSteadfast()">
                                        <svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                                        Verify Steadfast API Credentials & Check Balance
                                    </button>
                                </div>
                                <label style="display:flex; align-items:center; gap:8px; font-size:13px; color:#334155; cursor:pointer; margin-bottom:8px;">
                                    <input type="checkbox" name="gm_sf_autobook" value="1" <?php checked(1, get_option('gm_sf_autobook'), true); ?> />
                                    Auto-book parcel immediately when order is created (Or leave unchecked for manual 1-click booking)
                                </label>
                                <label style="display:flex; align-items:center; gap:8px; font-size:13px; color:#334155; cursor:pointer;">
                                    <input type="checkbox" name="gm_sf_fraud_check" value="1" <?php checked(1, get_option('gm_sf_fraud_check', 1), true); ?> />
                                    Check Steadfast Customer Return Rate Score (Shows dedicated Delivery Rate badge in Orders list)
                                </label>
                            </div>

                            <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:16px; padding:24px;">
                                <h4 style="margin:0 0 14px 0; font-size:16px; color:#0F172A; display:flex; align-items:center; gap:8px;">
                                    Pathao Courier API
                                </h4>
                                <label style="display:flex; align-items:center; gap:8px; margin-bottom:16px; font-weight:700; color:#0F172A; cursor:pointer;">
                                    <input type="checkbox" name="gm_pt_active" value="1" <?php checked(1, get_option('gm_pt_active'), true); ?> />
                                    <span>Enable Pathao Merchant API</span>
                                </label>
                                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:14px;">
                                    <div class="gm-form-group">
                                        <label>Client ID:</label>
                                        <input type="text" name="gm_pt_client_id" class="gm-input" value="<?php echo esc_attr(get_option('gm_pt_client_id')); ?>" />
                                    </div>
                                    <div class="gm-form-group">
                                        <label>Store ID:</label>
                                        <input type="text" name="gm_pt_store_id" class="gm-input" value="<?php echo esc_attr(get_option('gm_pt_store_id')); ?>" />
                                    </div>
                                </div>
                                <div class="gm-form-group">
                                    <label>Client Secret:</label>
                                    <input type="password" name="gm_pt_client_secret" class="gm-input" value="<?php echo esc_attr(get_option('gm_pt_client_secret')); ?>" />
                                </div>
                            </div>

                            <div class="gm-save-bar">
                                <span style="font-size:13px; color:#64748B;">Tracking codes and delivery meters appear directly in WooCommerce Orders list.</span>
                                <?php submit_button('Save Settings', 'primary large', 'submit', false); ?>
                            </div>
                        </div>

                        <!-- 4. ABANDONED LEADS CRM TAB -->
                        <div id="tab-abandoned" class="gm-panel">
                            <div class="gm-panel-header">
                                <div class="gm-panel-title-wrap">
                                    <div class="gm-panel-icon-badge">
                                        <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
                                    </div>
                                    <div>
                                        <h3>Recoverable Abandoned Leads CRM</h3>
                                        <p>Strictly displays dropped checkouts with customer contact details for immediate sales recovery.</p>
                                    </div>
                                </div>
                                <?php if (!empty($abandoned_only)) : ?>
                                    <button type="button" onclick="gmClearLeads()" style="background:#FEE2E2; color:#DC2626; border:1px solid #FCA5A5; font-size:12px; font-weight:700; padding:6px 12px; border-radius:8px; cursor:pointer;">
                                        Clear Log
                                    </button>
                                <?php endif; ?>
                            </div>

                            <label class="gm-toggle-box">
                                <input type="checkbox" name="gm_ab_active" value="1" <?php checked(1, get_option('gm_ab_active', 1), true); ?> />
                                <span>Enable Smart Abandoned Cart Recovery Engine (All Store Pages)</span>
                            </label>

                            <?php if (empty($abandoned_only)) : ?>
                                <div style="text-align:center; padding:45px 20px; color:#94A3B8;">
                                    <div style="width:48px; height:48px; border-radius:50%; background:#F1F5F9; display:inline-flex; align-items:center; justify-content:center; margin-bottom:12px;">
                                        <svg style="width:24px; height:24px; stroke:#64748B; stroke-width:2; fill:none;" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/></svg>
                                    </div>
                                    <h4 style="margin:0 0 6px 0; color:#334155; font-size:16px;">Zero Abandoned Leads at the Moment</h4>
                                    <p style="margin:0; font-size:13px;">When a visitor types their contact info and drops off without completing an order, their lead profile will appear here instantly.</p>
                                </div>
                            <?php else : ?>
                                <div style="overflow-x:auto;">
                                    <table style="width:100%; border-collapse:collapse; text-align:left; font-size:13px; margin-top:15px; min-width:650px;">
                                        <thead>
                                            <tr style="background:#F8FAFC; border-bottom:2px solid #E2E8F0; color:#475569;">
                                                <th style="padding:10px 12px;">Date & Time</th>
                                                <th style="padding:10px 12px;">Customer Name</th>
                                                <th style="padding:10px 12px;">Phone Number</th>
                                                <th style="padding:10px 12px;">Full Address</th>
                                                <th style="padding:10px 12px;">Selected Product</th>
                                                <th style="padding:10px 12px;">Status</th>
                                                <th style="padding:10px 12px; text-align:right;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach (array_reverse($abandoned_only) as $lead) : 
                                                $clean_p = GM_Core_Engine::sanitize_bd_phone($lead['phone']);
                                                if (!$clean_p) $clean_p = preg_replace('/[^0-9]/', '', $lead['phone']);
                                                $product_txt = !empty($lead['product']) ? $lead['product'] : 'Special Product';
                                                $wa_text = "Hello " . $lead['name'] . "! Did you face any issue while placing your order for " . $product_txt . "? Let us know if we can help!";
                                                $wa_url = "https://wa.me/88{$clean_p}?text=" . urlencode($wa_text);
                                            ?>
                                                <tr style="border-bottom:1px solid #F1F5F9;">
                                                    <td style="padding:12px; color:#64748B;"><?php echo esc_html($lead['date']); ?></td>
                                                    <td style="padding:12px; font-weight:700; color:#0F172A;"><?php echo esc_html($lead['name']); ?></td>
                                                    <td style="padding:12px; font-family:monospace; font-weight:700; color:#D97706;"><?php echo esc_html($lead['phone']); ?></td>
                                                    <td style="padding:12px; color:#475569; font-size:12px; max-width:180px;"><?php echo esc_html(!empty($lead['address']) ? $lead['address'] : 'Incomplete Address'); ?></td>
                                                    <td style="padding:12px; color:#334155; font-weight:600;"><?php echo esc_html($lead['product']); ?></td>
                                                    <td style="padding:12px;">
                                                        <span class="gm-badge-status gm-status-abandoned">
                                                            <span class="gm-status-dot" style="background:#DC2626;"></span> Abandoned
                                                        </span>
                                                    </td>
                                                    <td style="padding:12px; text-align:right;">
                                                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" style="background:#25D366; color:#FFF; text-decoration:none; font-weight:700; padding:6px 10px; border-radius:6px; font-size:11px; display:inline-flex; align-items:center; gap:4px; margin-right:4px;">
                                                            WhatsApp
                                                        </a>
                                                        <a href="tel:<?php echo esc_attr($lead['phone']); ?>" style="background:#0F172A; color:#FFF; text-decoration:none; font-weight:700; padding:6px 10px; border-radius:6px; font-size:11px; display:inline-flex; align-items:center; gap:4px; margin-right:4px;">
                                                            Call
                                                        </a>
                                                        <button type="button" onclick="gmQuickBlockPhone('<?php echo esc_js($lead['phone']); ?>', '<?php echo esc_js($lead['name']); ?>')" style="background:#FEE2E2; color:#DC2626; border:1px solid #FCA5A5; font-weight:700; padding:5px 8px; border-radius:6px; font-size:11px; cursor:pointer;" title="Block this number">
                                                            Block
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>

                            <div class="gm-save-bar">
                                <span style="font-size:13px; color:#64748B;">Recovers 20-30% of dropped checkouts through immediate WhatsApp & phone follow-up.</span>
                                <?php submit_button('Save Settings', 'primary large', 'submit', false); ?>
                            </div>
                        </div>

                        <!-- 5. FRAUD SHIELD & ANTI-SPAM TAB -->
                        <div id="tab-fraud" class="gm-panel">
                            <div class="gm-panel-header">
                                <div class="gm-panel-title-wrap">
                                    <div class="gm-panel-icon-badge">
                                        <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
                                    </div>
                                    <div>
                                        <h3>Fraud Shield & Anti-Spam Engine</h3>
                                        <p>Block fake orders, serial returners, spam bots, and malicious competitors automatically.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="gm-stats-grid">
                                <div class="gm-stat-card">
                                    <div class="gm-stat-title">Blocked Phones</div>
                                    <div class="gm-stat-val" style="color:#DC2626;"><?php echo count($blocked_phones); ?></div>
                                </div>
                                <div class="gm-stat-card">
                                    <div class="gm-stat-title">Blocked IP Addresses</div>
                                    <div class="gm-stat-val" style="color:#2563EB;"><?php echo count($blocked_ips); ?></div>
                                </div>
                                <div class="gm-stat-card">
                                    <div class="gm-stat-title">Intercepted Attempts</div>
                                    <div class="gm-stat-val" style="color:#D97706;"><?php echo count($fraud_logs); ?></div>
                                </div>
                                <div class="gm-stat-card" style="background:#EFF6FF; border-color:#BFDBFE;">
                                    <div class="gm-stat-title" style="color:#1E40AF;">Your Current IP</div>
                                    <div class="gm-stat-val" style="font-size:16px; color:#1E40AF; font-family:monospace; margin-top:4px;">
                                        <?php echo esc_html($my_ip); ?>
                                    </div>
                                </div>
                            </div>

                            <label class="gm-toggle-box" style="margin-bottom:14px;">
                                <input type="checkbox" name="gm_fraud_active" value="1" <?php checked(1, get_option('gm_fraud_active', 1), true); ?> />
                                <span>Enable Active Fraud & Blacklist Shield (Reject Blacklisted Checkouts)</span>
                            </label>

                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:25px;">
                                <label style="background:#F8FAFC; border:1px solid #CBD5E1; border-radius:12px; padding:14px; cursor:pointer; display:flex; align-items:center; gap:8px; font-weight:700; font-size:13px;">
                                    <input type="checkbox" name="gm_rate_limit_active" value="1" <?php checked(1, get_option('gm_rate_limit_active', 1), true); ?> />
                                    <span>Anti-Spam Rate Limiting (Max 2 orders / 10 mins per IP)</span>
                                </label>
                                <label style="background:#F8FAFC; border:1px solid #CBD5E1; border-radius:12px; padding:14px; cursor:pointer; display:flex; align-items:center; gap:8px; font-weight:700; font-size:13px;">
                                    <input type="checkbox" name="gm_phone_regex_active" value="1" <?php checked(1, get_option('gm_phone_regex_active', 1), true); ?> />
                                    <span>Strict BD 11-Digit Phone Validator (Rejects dummy / non-BD numbers)</span>
                                </label>
                            </div>

                            <!-- Manual Add to Blacklist with Segmented Pills -->
                            <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:16px; padding:20px; margin-bottom:25px;">
                                <h4 style="margin:0 0 12px 0; font-size:15px; color:#0F172A;">
                                    Add Phone Number or IP to Blacklist
                                </h4>
                                <div style="display:grid; grid-template-columns:auto 1fr 1fr auto; gap:12px; align-items:center;">
                                    <div class="gm-segmented-pills">
                                        <input type="hidden" id="gmBlType" value="phone" />
                                        <button type="button" class="gm-pill-btn active" id="gmPillPhone" onclick="gmSelectBlType('phone')">Phone</button>
                                        <button type="button" class="gm-pill-btn" id="gmPillIp" onclick="gmSelectBlType('ip')">IP Address</button>
                                    </div>
                                    <input type="text" id="gmBlVal" class="gm-input" placeholder="e.g. 01712345678" />
                                    <input type="text" id="gmBlReason" class="gm-input" placeholder="Reason (e.g. Serial returner)" />
                                    <button type="button" onclick="gmSubmitBlacklist()" style="background:#DC2626; color:#FFF; border:none; padding:12px 20px; border-radius:12px; font-weight:700; font-size:13px; cursor:pointer; box-shadow:0 4px 12px rgba(220,38,38,0.2);">
                                        Block Now
                                    </button>
                                </div>
                            </div>

                            <!-- Blacklisted Phones & IPs Lists -->
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:25px;">
                                <div style="background:#FFF; border:1px solid #E2E8F0; border-radius:16px; padding:20px;">
                                    <h4 style="margin:0 0 10px 0; font-size:14px; color:#0F172A;">Blocked Phone Numbers (<?php echo count($blocked_phones); ?>)</h4>
                                    <?php if (empty($blocked_phones)) : ?>
                                        <p style="margin:0; font-size:12px; color:#94A3B8;">No phone numbers blacklisted yet.</p>
                                    <?php else : ?>
                                        <div style="max-height:220px; overflow-y:auto;">
                                            <?php foreach ($blocked_phones as $pKey => $pData) : ?>
                                                <div style="display:flex; justify-content:space-between; align-items:center; padding:8px 0; border-bottom:1px solid #F1F5F9; font-size:12px;">
                                                    <div>
                                                        <strong style="color:#0F172A; font-family:monospace;"><?php echo esc_html($pKey); ?></strong>
                                                        <span style="color:#64748B; margin-left:6px;">(<?php echo esc_html(isset($pData['reason']) ? $pData['reason'] : 'Blocked'); ?>)</span>
                                                    </div>
                                                    <button type="button" onclick="gmRemoveBlacklist('phone', '<?php echo esc_js($pKey); ?>')" style="background:none; border:none; color:#DC2626; font-weight:700; cursor:pointer; font-size:14px;">✕</button>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div style="background:#FFF; border:1px solid #E2E8F0; border-radius:16px; padding:20px;">
                                    <h4 style="margin:0 0 10px 0; font-size:14px; color:#0F172A;">Blocked IP Addresses (<?php echo count($blocked_ips); ?>)</h4>
                                    <?php if (empty($blocked_ips)) : ?>
                                        <p style="margin:0; font-size:12px; color:#94A3B8;">No IP addresses blacklisted yet.</p>
                                    <?php else : ?>
                                        <div style="max-height:220px; overflow-y:auto;">
                                            <?php foreach ($blocked_ips as $ipKey => $ipData) : ?>
                                                <div style="display:flex; justify-content:space-between; align-items:center; padding:8px 0; border-bottom:1px solid #F1F5F9; font-size:12px;">
                                                    <div>
                                                        <strong style="color:#0F172A; font-family:monospace;"><?php echo esc_html($ipKey); ?></strong>
                                                        <span style="color:#64748B; margin-left:6px;">(<?php echo esc_html(isset($ipData['reason']) ? $ipData['reason'] : 'Blocked'); ?>)</span>
                                                    </div>
                                                    <button type="button" onclick="gmRemoveBlacklist('ip', '<?php echo esc_js($ipKey); ?>')" style="background:none; border:none; color:#DC2626; font-weight:700; cursor:pointer; font-size:14px;">✕</button>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Live Intercepted Attempts Log -->
                            <div style="background:#FFF; border:1px solid #E2E8F0; border-radius:16px; padding:20px;">
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                                    <h4 style="margin:0; font-size:14px; color:#0F172A;">Live Intercepted Security Log</h4>
                                    <?php if (!empty($fraud_logs)) : ?>
                                        <button type="button" onclick="gmClearFraudLogs()" style="background:#FEE2E2; color:#DC2626; border:1px solid #FCA5A5; font-size:11px; font-weight:700; padding:4px 8px; border-radius:6px; cursor:pointer;">Clear Log</button>
                                    <?php endif; ?>
                                </div>
                                <?php if (empty($fraud_logs)) : ?>
                                    <p style="margin:0; font-size:12px; color:#94A3B8;">No malicious attempts detected yet. Your store is protected.</p>
                                <?php else : ?>
                                    <table style="width:100%; border-collapse:collapse; font-size:12px; text-align:left;">
                                        <thead>
                                            <tr style="background:#F8FAFC; color:#64748B;">
                                                <th style="padding:8px;">Date</th>
                                                <th style="padding:8px;">Blocked Value</th>
                                                <th style="padding:8px;">Reason / Action Taken</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach (array_slice(array_reverse($fraud_logs), 0, 10) as $flog) : ?>
                                                <tr style="border-bottom:1px solid #F1F5F9;">
                                                    <td style="padding:8px; color:#64748B;"><?php echo esc_html($flog['date']); ?></td>
                                                    <td style="padding:8px; font-weight:700; color:#DC2626;"><?php echo esc_html($flog['value']); ?></td>
                                                    <td style="padding:8px; color:#334155;"><?php echo esc_html($flog['reason']); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </div>

                            <div class="gm-save-bar">
                                <span style="font-size:13px; color:#64748B;">Saves merchants thousands of takas in courier delivery return charges.</span>
                                <?php submit_button('Save Settings', 'primary large', 'submit', false); ?>
                            </div>
                        </div>

                        <!-- 6. SMS GATEWAY TAB -->
                        <div id="tab-sms" class="gm-panel">
                            <div class="gm-panel-header">
                                <div class="gm-panel-title-wrap">
                                    <div class="gm-panel-icon-badge">
                                        <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                                    </div>
                                    <div>
                                        <h3>Customer SMS Gateway</h3>
                                        <p>Send instant automated order confirmation SMS directly to customer phones.</p>
                                    </div>
                                </div>
                            </div>

                            <label class="gm-toggle-box">
                                <input type="checkbox" name="gm_sms_active" value="1" <?php checked(1, get_option('gm_sms_active'), true); ?> />
                                <span>Enable Customer SMS Notifications</span>
                            </label>

                            <div class="gm-form-group">
                                <label>SMS Provider:</label>
                                <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:12px;">
                                    <label style="border:1.5px solid #CBD5E1; padding:12px; border-radius:12px; cursor:pointer; font-weight:700; font-size:13px; display:flex; align-items:center; gap:8px;">
                                        <input type="radio" name="gm_sms_gateway" value="greenweb" <?php checked(get_option('gm_sms_gateway', 'greenweb'), 'greenweb'); ?> /> Greenweb BD
                                    </label>
                                    <label style="border:1.5px solid #CBD5E1; padding:12px; border-radius:12px; cursor:pointer; font-weight:700; font-size:13px; display:flex; align-items:center; gap:8px;">
                                        <input type="radio" name="gm_sms_gateway" value="bulksmsbd" <?php checked(get_option('gm_sms_gateway'), 'bulksmsbd'); ?> /> BulkSMSBD
                                    </label>
                                    <label style="border:1.5px solid #CBD5E1; padding:12px; border-radius:12px; cursor:pointer; font-weight:700; font-size:13px; display:flex; align-items:center; gap:8px;">
                                        <input type="radio" name="gm_sms_gateway" value="alphasms" <?php checked(get_option('gm_sms_gateway'), 'alphasms'); ?> /> Alpha SMS
                                    </label>
                                </div>
                            </div>

                            <div class="gm-form-group" style="margin-top:16px;">
                                <label>API Key / Token:</label>
                                <input type="text" name="gm_sms_key" class="gm-input" value="<?php echo esc_attr(get_option('gm_sms_key')); ?>" />
                            </div>

                            <div class="gm-form-group">
                                <label>Custom SMS Template:</label>
                                <textarea name="gm_sms_msg" class="gm-textarea" rows="3"><?php echo esc_textarea(get_option('gm_sms_msg', 'Thank you {name}! Your order #{order_id} has been received. Total: ৳{total}.')); ?></textarea>
                                <small style="color:#64748B;">Supported variables: <code>{name}</code>, <code>{order_id}</code>, <code>{total}</code></small>
                            </div>

                            <div class="gm-save-bar">
                                <span style="font-size:13px; color:#64748B;">Instant delivery on Teletalk, Grameenphone, Banglalink, Robi, Airtel.</span>
                                <?php submit_button('Save Settings', 'primary large', 'submit', false); ?>
                            </div>
                        </div>

                        <!-- 7. 1-CLICK CHECKOUT SETUP & CUSTOMIZATION TAB -->
                        <div id="tab-shortcode" class="gm-panel">
                            <div class="gm-panel-header">
                                <div class="gm-panel-title-wrap">
                                    <div class="gm-panel-icon-badge">
                                        <svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                                    </div>
                                    <div>
                                        <h3>1-Click Fast Checkout Setup</h3>
                                        <p>Configure universal shortcode styling, default product, shipping rates, and embed anywhere.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Shortcode Banner Box -->
                            <div style="background:#0F172A; color:#FFF; border-radius:16px; padding:20px 24px; margin-bottom:25px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
                                <div>
                                    <div style="font-size:12px; font-weight:700; color:#94A3B8; text-transform:uppercase; margin-bottom:4px; letter-spacing:0.05em;">Universal Embed Shortcode</div>
                                    <code style="font-size:17px; color:#FDE68A; font-family:monospace; background:rgba(255,255,255,0.08); padding:4px 12px; border-radius:8px;">[gm_checkout]</code>
                                </div>
                                <button type="button" onclick="navigator.clipboard.writeText('[gm_checkout]'); gmNotify('success', 'Copied', 'Shortcode copied to clipboard.');" style="background:#D97706; color:#FFF; border:none; padding:10px 20px; border-radius:10px; font-weight:800; font-size:13px; cursor:pointer;">
                                    Copy Shortcode
                                </button>
                            </div>

                            <!-- Global Checkout Form Customizer -->
                            <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:16px; padding:24px; margin-bottom:25px;">
                                <h4 style="margin:0 0 16px 0; color:#0F172A; font-size:16px;">Form Settings & Default Product</h4>
                                
                                <div style="display:grid; grid-template-columns:1fr 1fr; gap:18px; margin-bottom:16px;">
                                    <div class="gm-form-group">
                                        <label>Default Product (When no shortcode ID is specified):</label>
                                        <select name="gm_co_default_product" class="gm-select">
                                            <option value="0">— Auto-detect Current Page Product —</option>
                                            <?php if (!empty($wc_products)) : 
                                                $selected_p = get_option('gm_co_default_product', 0);
                                                foreach ($wc_products as $p) : ?>
                                                    <option value="<?php echo esc_attr($p->get_id()); ?>" <?php selected($selected_p, $p->get_id()); ?>>
                                                        <?php echo esc_html($p->get_name()); ?> (৳<?php echo esc_html($p->get_price()); ?>)
                                                    </option>
                                                <?php endforeach; 
                                            endif; ?>
                                        </select>
                                    </div>
                                    <div class="gm-form-group">
                                        <label>Button Theme Color:</label>
                                        <input type="color" name="gm_co_btn_color" value="<?php echo esc_attr(get_option('gm_co_btn_color', '#059669')); ?>" style="width:100%; height:44px; padding:4px; border:1.5px solid #CBD5E1; border-radius:12px; cursor:pointer; background:#FFF;" />
                                    </div>
                                </div>

                                <div style="display:grid; grid-template-columns:1fr 1fr; gap:18px;">
                                    <div class="gm-form-group">
                                        <label>Inside Dhaka Delivery Fee (৳):</label>
                                        <input type="number" name="gm_co_inside_ship" class="gm-input" value="<?php echo esc_attr(get_option('gm_co_inside_ship', 60)); ?>" />
                                    </div>
                                    <div class="gm-form-group">
                                        <label>Outside Dhaka Delivery Fee (৳):</label>
                                        <input type="number" name="gm_co_outside_ship" class="gm-input" value="<?php echo esc_attr(get_option('gm_co_outside_ship', 100)); ?>" />
                                    </div>
                                </div>
                            </div>

                            <!-- Shortcode Usage Examples Grid -->
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:18px;">
                                <div style="background:#FFF; border:1px solid #E2E8F0; border-radius:14px; padding:18px;">
                                    <div style="font-weight:800; font-size:14px; color:#0F172A; margin-bottom:6px;">Target Specific Product</div>
                                    <p style="font-size:12px; color:#64748B; margin:0 0 10px 0;">Use product ID to automatically fetch title and price from WooCommerce:</p>
                                    <div style="background:#F1F5F9; padding:8px 12px; border-radius:8px; font-family:monospace; font-size:13px; display:flex; justify-content:space-between; align-items:center;">
                                        <code>[gm_checkout id="45"]</code>
                                        <button type="button" onclick="navigator.clipboard.writeText('[gm_checkout id=\"45\"]'); gmNotify('success', 'Copied', 'Copied to clipboard.');" style="background:#0F172A; color:#FFF; border:none; padding:4px 8px; border-radius:6px; font-size:11px; cursor:pointer;">Copy</button>
                                    </div>
                                </div>

                                <div style="background:#FFF; border:1px solid #E2E8F0; border-radius:14px; padding:18px;">
                                    <div style="font-weight:800; font-size:14px; color:#0F172A; margin-bottom:6px;">Custom Title & Shipping</div>
                                    <p style="font-size:12px; color:#64748B; margin:0 0 10px 0;">Override product title, price, and delivery fee on the fly:</p>
                                    <div style="background:#F1F5F9; padding:8px 12px; border-radius:8px; font-family:monospace; font-size:12px; display:flex; justify-content:space-between; align-items:center;">
                                        <code>[gm_checkout product="Special Combo" price="1200" inside="80" outside="150"]</code>
                                        <button type="button" onclick="navigator.clipboard.writeText('[gm_checkout product=\"Special Combo\" price=\"1200\" inside=\"80\" outside=\"150\"]'); gmNotify('success', 'Copied', 'Copied to clipboard.');" style="background:#0F172A; color:#FFF; border:none; padding:4px 8px; border-radius:6px; font-size:11px; cursor:pointer;">Copy</button>
                                    </div>
                                </div>
                            </div>

                            <div class="gm-save-bar">
                                <span style="font-size:13px; color:#64748B;">Meta Pixel Purchase & Google Tag Manager DataLayer fire automatically on order completion.</span>
                                <?php submit_button('Save Settings', 'primary large', 'submit', false); ?>
                            </div>
                        </div>

                        <!-- 8. VIDEO MASTERCLASS & SETUP GUIDE TAB -->
                        <div id="tab-masterclass" class="gm-panel">
                            <div class="gm-panel-header">
                                <div class="gm-panel-title-wrap">
                                    <div class="gm-panel-icon-badge">
                                        <svg viewBox="0 0 24 24"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                                    </div>
                                    <div>
                                        <h3>Full Automation Masterclass & Video Guide</h3>
                                        <p>Comprehensive step-by-step video walkthrough for configuring and scaling your store.</p>
                                    </div>
                                </div>
                                <span style="font-size:11px; font-weight:800; background:#ECFDF5; color:#065F46; border:1px solid #A7F3D0; padding:4px 10px; border-radius:8px;">Official GrowthMark Academy</span>
                            </div>

                            <!-- Masterclass Video Container -->
                            <div style="background:linear-gradient(135deg, #0F172A 0%, #1E293B 100%); border:1px solid #334155; border-radius:20px; padding:45px 30px; margin-bottom:25px; box-shadow:0 15px 35px rgba(15,23,42,0.15); text-align:center; color:#FFF;">
                                <div style="display:inline-flex; align-items:center; justify-content:center; width:64px; height:64px; background:rgba(217,119,6,0.15); border:2px solid #D97706; border-radius:50%; margin-bottom:16px;">
                                    <svg style="width:28px; height:28px; stroke:#D97706; stroke-width:2; fill:none;" viewBox="0 0 24 24"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                                </div>
                                <h3 style="margin:0 0 8px 0; font-size:22px; font-weight:800; color:#FFF !important;">Official Masterclass Video Releasing Soon</h3>
                                <p style="margin:0 auto 20px auto; max-width:540px; font-size:14px; color:#94A3B8; line-height:1.6;">
                                    Tamim Hasan (Founder, GrowthMark) is recording the comprehensive step-by-step setup walkthrough. It will be streamed directly inside this dashboard in the upcoming release.
                                </p>
                                <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
                                    <a href="https://growthmark.pro" target="_blank" style="background:#D97706; color:#FFF; text-decoration:none; font-weight:800; font-size:13px; padding:10px 22px; border-radius:12px; box-shadow:0 4px 14px rgba(217,119,6,0.3);">
                                        Visit GrowthMark.pro
                                    </a>
                                    <a href="https://tamim.growthmark.pro" target="_blank" style="background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.2); color:#FFF; text-decoration:none; font-weight:700; font-size:13px; padding:10px 22px; border-radius:12px;">
                                        Tamim Hasan Portfolio
                                    </a>
                                </div>
                            </div>

                            <!-- Masterclass Chapters & Breakdown Grid -->
                            <h4 style="margin:0 0 14px 0; font-size:16px; color:#0F172A;">Masterclass Curriculum & Modules</h4>
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:20px;">
                                <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:16px; display:flex; gap:12px; align-items:center;">
                                    <svg style="width:24px; height:24px; stroke:#0F172A; stroke-width:2; fill:none; flex-shrink:0;" viewBox="0 0 24 24"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
                                    <div>
                                        <div style="font-weight:800; font-size:13px; color:#0F172A;">Module 1: Telegram 0.5s Live Alerts</div>
                                        <div style="font-size:12px; color:#64748B;">Bot token & Chat ID connection for team alerts.</div>
                                    </div>
                                </div>

                                <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:16px; display:flex; gap:12px; align-items:center;">
                                    <svg style="width:24px; height:24px; stroke:#0F172A; stroke-width:2; fill:none; flex-shrink:0;" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M3 15h18M9 3v18M15 3v18"/></svg>
                                    <div>
                                        <div style="font-weight:800; font-size:13px; color:#0F172A;">Module 2: Google Sheets Real-Time CRM</div>
                                        <div style="font-size:12px; color:#64748B;">Connecting Apps Script webhook for zero-cost sync.</div>
                                    </div>
                                </div>

                                <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:16px; display:flex; gap:12px; align-items:center;">
                                    <svg style="width:24px; height:24px; stroke:#0F172A; stroke-width:2; fill:none; flex-shrink:0;" viewBox="0 0 24 24"><path d="M1 3h15v13H1zM16 8h4l3 3v5h-7V8zM5.5 19a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM18.5 19a2.5 2.5 0 100-5 2.5 2.5 0 000 5z"/></svg>
                                    <div>
                                        <div style="font-weight:800; font-size:13px; color:#0F172A;">Module 3: Steadfast 1-Click Courier & Ratio</div>
                                        <div style="font-size:12px; color:#64748B;">Auto-booking parcels and detecting return risks.</div>
                                    </div>
                                </div>

                                <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:16px; display:flex; gap:12px; align-items:center;">
                                    <svg style="width:24px; height:24px; stroke:#0F172A; stroke-width:2; fill:none; flex-shrink:0;" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
                                    <div>
                                        <div style="font-weight:800; font-size:13px; color:#0F172A;">Module 4: Abandoned Cart Recovery</div>
                                        <div style="font-size:12px; color:#64748B;">Recovering 25%+ lost leads via 1-click WhatsApp.</div>
                                    </div>
                                </div>

                                <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:16px; display:flex; gap:12px; align-items:center;">
                                    <svg style="width:24px; height:24px; stroke:#0F172A; stroke-width:2; fill:none; flex-shrink:0;" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
                                    <div>
                                        <div style="font-weight:800; font-size:13px; color:#0F172A;">Module 5: Fraud Shield & Blacklist Engine</div>
                                        <div style="font-size:12px; color:#64748B;">Hard-stopping fake orders, serial returners & spam.</div>
                                    </div>
                                </div>

                                <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:16px; display:flex; gap:12px; align-items:center;">
                                    <svg style="width:24px; height:24px; stroke:#0F172A; stroke-width:2; fill:none; flex-shrink:0;" viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                                    <div>
                                        <div style="font-weight:800; font-size:13px; color:#0F172A;">Module 6: High-Converting 1-Click Checkout</div>
                                        <div style="font-size:12px; color:#64748B;">Embedding [gm_checkout] in Elementor / CartFlows.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

            <!-- Footer Branding & Credits Bar -->
            <div class="gm-footer-credits">
                <div>
                    <strong>GM Automate Pro</strong> v4.2.1 • Developed & Engineered by <a href="https://tamim.growthmark.pro" target="_blank">Tamim Hasan</a>
                </div>
                <div>
                    Powered by <a href="https://growthmark.pro" target="_blank">GrowthMark</a>
                </div>
            </div>

        </div>

        <script>
            // Persistent Tab Switcher with Zero Flicker & Dynamic Read Badges
            function gmSwitchTab(tabName, el) {
                document.querySelectorAll('.gm-nav-item').forEach(i => i.classList.remove('active'));
                document.querySelectorAll('.gm-panel').forEach(p => p.classList.remove('active'));
                
                if (el) {
                    el.classList.add('active');
                } else {
                    const navEl = document.querySelector('.gm-nav-item[data-tab="' + tabName + '"]');
                    if (navEl) navEl.classList.add('active');
                }

                const target = document.getElementById('tab-' + tabName);
                if (target) target.classList.add('active');

                // Mark Abandoned Leads as read like Messenger
                if (tabName === 'abandoned') {
                    const badge = document.getElementById('gmAbandonedBadge');
                    if (badge) {
                        badge.style.opacity = '0';
                        setTimeout(() => { badge.style.display = 'none'; }, 200);
                        localStorage.setItem('gm_read_abandoned_count', '<?php echo count($abandoned_only); ?>');
                    }
                }
                // Mark Fraud notifications as read
                if (tabName === 'fraud') {
                    const badge = document.getElementById('gmFraudBadge');
                    if (badge) {
                        badge.style.opacity = '0';
                        setTimeout(() => { badge.style.display = 'none'; }, 200);
                        localStorage.setItem('gm_read_fraud_count', '<?php echo count($blocked_phones) + count($blocked_ips); ?>');
                    }
                }

                // Remove preload style if present
                const preloadStyle = document.getElementById('gm-preload-tab-style');
                if (preloadStyle) preloadStyle.remove();

                // Store active tab
                localStorage.setItem('gm_active_tab', tabName);
                if (history.replaceState) {
                    history.replaceState(null, null, '#tab-' + tabName);
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Initialize notification badges dynamically based on read history
                const totalAbandoned = <?php echo count($abandoned_only); ?>;
                const readAbandoned = parseInt(localStorage.getItem('gm_read_abandoned_count') || '0', 10);
                const unreadAbandoned = totalAbandoned - readAbandoned;
                const abBadge = document.getElementById('gmAbandonedBadge');
                if (abBadge) {
                    if (unreadAbandoned > 0) {
                        abBadge.innerText = unreadAbandoned;
                        abBadge.style.display = 'inline-block';
                    } else {
                        abBadge.style.display = 'none';
                    }
                }

                const totalFraud = <?php echo count($blocked_phones) + count($blocked_ips); ?>;
                const readFraud = parseInt(localStorage.getItem('gm_read_fraud_count') || '0', 10);
                const unreadFraud = totalFraud - readFraud;
                const frBadge = document.getElementById('gmFraudBadge');
                if (frBadge) {
                    if (unreadFraud > 0) {
                        frBadge.innerText = unreadFraud;
                        frBadge.style.display = 'inline-block';
                    } else {
                        frBadge.style.display = 'none';
                    }
                }

                let currentHash = window.location.hash.replace('#tab-', '');
                let savedTab = localStorage.getItem('gm_active_tab');
                let targetTab = currentHash || savedTab || 'telegram';
                if (document.getElementById('tab-' + targetTab)) {
                    gmSwitchTab(targetTab);
                }
            });

            function gmCopyScriptCode() {
                const code = document.getElementById('gmGoogleScriptCode').innerText;
                const btnText = document.getElementById('gmCopyBtnText');
                navigator.clipboard.writeText(code).then(() => {
                    if (btnText) {
                        const original = btnText.innerText;
                        btnText.innerText = 'Copied!';
                        setTimeout(() => { btnText.innerText = original; }, 2500);
                    }
                    gmNotify('success', 'Copied to Clipboard', 'Google Apps Script code copied! Paste it in Extensions → Apps Script.');
                }).catch(() => {
                    gmNotify('error', 'Error', 'Failed to copy script code.');
                });
            }

            function gmSelectBlType(type) {
                document.getElementById('gmBlType').value = type;
                if (type === 'phone') {
                    document.getElementById('gmPillPhone').classList.add('active');
                    document.getElementById('gmPillIp').classList.remove('active');
                    document.getElementById('gmBlVal').placeholder = 'e.g. 01712345678';
                } else {
                    document.getElementById('gmPillIp').classList.add('active');
                    document.getElementById('gmPillPhone').classList.remove('active');
                    document.getElementById('gmBlVal').placeholder = 'e.g. 103.25.1.2';
                }
            }

            async function gmTriggerTestSteadfast() {
                const key = document.getElementById('gm_sf_key_field').value.trim();
                const secret = document.getElementById('gm_sf_secret_field').value.trim();
                const status = document.getElementById('sfLiveStatus');

                if (!key || !secret) {
                    gmNotify('warning', 'Missing Fields', 'Please enter both API Key and Secret Key.');
                    return;
                }

                status.innerText = 'Checking...';
                status.style.color = '#D97706';

                const fd = new FormData();
                fd.append('action', 'gm_test_steadfast');
                fd.append('nonce', '<?php echo wp_create_nonce("gm_pro_nonce"); ?>');
                fd.append('key', key);
                fd.append('secret', secret);

                try {
                    const res = await fetch(ajaxurl, { method: 'POST', body: fd });
                    const data = await res.json();
                    if (data.success) {
                        status.innerText = 'Connected';
                        status.style.color = '#059669';
                        gmNotify('success', 'Steadfast Connected', data.data.message);
                    } else {
                        status.innerText = 'Error';
                        status.style.color = '#DC2626';
                        gmNotify('error', 'Connection Failed', data.data.message);
                    }
                } catch(e) {
                    status.innerText = 'Network Error';
                }
            }

            async function gmSubmitBlacklist() {
                const type = document.getElementById('gmBlType').value;
                const val = document.getElementById('gmBlVal').value.trim();
                const reason = document.getElementById('gmBlReason').value.trim();

                if (!val) {
                    gmNotify('warning', 'Notice', 'Please provide a valid phone or IP.');
                    return;
                }

                const fd = new FormData();
                fd.append('action', 'gm_add_blacklist');
                fd.append('nonce', '<?php echo wp_create_nonce("gm_pro_nonce"); ?>');
                fd.append('type', type);
                fd.append('value', val);
                fd.append('reason', reason);

                const res = await fetch(ajaxurl, { method: 'POST', body: fd });
                const data = await res.json();
                if (data.success) {
                    gmNotify('success', 'Blacklisted', data.data.message);
                    setTimeout(() => window.location.reload(), 1000);
                } else {
                    gmNotify('error', 'Error', 'Error adding to blacklist.');
                }
            }

            function gmQuickBlockPhone(phone, name) {
                gmPromptModal('Block ' + name + ' (' + phone + ')?', 'Enter reason for blocking...', 'Fake / Serial Returned Order', async function(reason) {
                    const fd = new FormData();
                    fd.append('action', 'gm_add_blacklist');
                    fd.append('nonce', '<?php echo wp_create_nonce("gm_pro_nonce"); ?>');
                    fd.append('type', 'phone');
                    fd.append('value', phone);
                    fd.append('reason', reason || 'Blocked from CRM');

                    const res = await fetch(ajaxurl, { method: 'POST', body: fd });
                    const data = await res.json();
                    if (data.success) {
                        gmNotify('success', 'Blocked', phone + ' successfully blacklisted.');
                        setTimeout(() => window.location.reload(), 1000);
                    }
                });
            }

            function gmRemoveBlacklist(type, val) {
                gmConfirmModal('Are you sure you want to remove ' + val + ' from blacklist?', async function() {
                    const fd = new FormData();
                    fd.append('action', 'gm_remove_blacklist');
                    fd.append('nonce', '<?php echo wp_create_nonce("gm_pro_nonce"); ?>');
                    fd.append('type', type);
                    fd.append('value', val);

                    const res = await fetch(ajaxurl, { method: 'POST', body: fd });
                    const data = await res.json();
                    if (data.success) {
                        window.location.reload();
                    }
                });
            }

            function gmClearFraudLogs() {
                gmConfirmModal('Are you sure you want to clear all security logs?', async function() {
                    const fd = new FormData();
                    fd.append('action', 'gm_clear_fraud_logs');
                    fd.append('nonce', '<?php echo wp_create_nonce("gm_pro_nonce"); ?>');
                    await fetch(ajaxurl, { method: 'POST', body: fd });
                    window.location.reload();
                });
            }

            async function gmTriggerTestTelegram() {
                const token = document.getElementById('gm_tg_token_field').value.trim();
                const chatId = document.getElementById('gm_tg_chat_field').value.trim();
                const status = document.getElementById('tgLiveStatus');

                if (!token || !chatId) {
                    gmNotify('warning', 'Notice', 'Please provide Bot Token and Chat ID.');
                    return;
                }

                status.innerText = 'Sending...';
                status.style.color = '#D97706';

                const fd = new FormData();
                fd.append('action', 'gm_test_telegram');
                fd.append('nonce', '<?php echo wp_create_nonce("gm_pro_nonce"); ?>');
                fd.append('token', token);
                fd.append('chat_id', chatId);

                try {
                    const res = await fetch(ajaxurl, { method: 'POST', body: fd });
                    const data = await res.json();
                    if (data.success) {
                        status.innerText = 'Test Sent';
                        status.style.color = '#059669';
                        gmNotify('success', 'Telegram Live', data.data.message);
                    } else {
                        status.innerText = 'Error';
                        status.style.color = '#DC2626';
                        gmNotify('error', 'Telegram Error', data.data.message);
                    }
                } catch(e) {
                    status.innerText = 'Network Error';
                }
            }

            async function gmTriggerTestSheets() {
                const webhook = document.getElementById('gm_gs_url_field').value.trim();
                const status = document.getElementById('gsLiveStatus');

                if (!webhook) {
                    gmNotify('warning', 'Notice', 'Please provide Webhook URL.');
                    return;
                }

                status.innerText = 'Sending row...';
                status.style.color = '#D97706';

                const fd = new FormData();
                fd.append('action', 'gm_test_sheets');
                fd.append('nonce', '<?php echo wp_create_nonce("gm_pro_nonce"); ?>');
                fd.append('webhook', webhook);

                try {
                    const res = await fetch(ajaxurl, { method: 'POST', body: fd });
                    const data = await res.json();
                    if (data.success) {
                        status.innerText = 'Row Synced';
                        status.style.color = '#059669';
                        gmNotify('success', 'Sheets Synced', data.data.message);
                    } else {
                        status.innerText = 'Error';
                        status.style.color = '#DC2626';
                        gmNotify('error', 'Sheets Error', data.data.message);
                    }
                } catch(e) {
                    status.innerText = 'Network Error';
                }
            }

            function gmClearLeads() {
                gmConfirmModal('Are you sure you want to clear all abandoned leads?', async function() {
                    const fd = new FormData();
                    fd.append('action', 'gm_clear_leads');
                    fd.append('nonce', '<?php echo wp_create_nonce("gm_pro_nonce"); ?>');
                    await fetch(ajaxurl, { method: 'POST', body: fd });
                    window.location.reload();
                });
            }
        </script>
        <?php
    }
}

/**
 * ============================================================================
 * 3. WOOCOMMERCE ORDERS LIST & DETAILS COURIER ACTIONS & FRAUD RATIO
 * ============================================================================
 */
class GM_WC_Order_Integration {
    public static function init() {
        // Classic & HPOS Orders List Columns
        add_filter('manage_edit-shop_order_columns', array(__CLASS__, 'add_order_columns'), 20);
        add_action('manage_shop_order_posts_custom_column', array(__CLASS__, 'render_order_columns_classic'), 20, 2);
        
        add_filter('manage_woocommerce_page_wc-orders_columns', array(__CLASS__, 'add_order_columns'), 20);
        add_action('manage_woocommerce_page_wc-orders_custom_column', array(__CLASS__, 'render_order_columns_hpos'), 20, 2);

        // Single Order Edit Meta Box
        add_action('add_meta_boxes', array(__CLASS__, 'add_order_metabox'));

        // Universal Toast & Modal Container
        add_action('admin_footer', array(__CLASS__, 'inject_universal_modal_and_scripts'));
    }

    public static function add_order_columns($columns) {
        $new = array();
        foreach ($columns as $k => $v) {
            $new[$k] = $v;
            if ($k === 'order_status' || $k === 'order_total') {
                $new['gm_delivery_rate'] = 'Delivery Rate';
                $new['gm_courier_action'] = 'Logistics Booking';
            }
        }
        if (!isset($new['gm_delivery_rate'])) {
            $new['gm_delivery_rate'] = 'Delivery Rate';
            $new['gm_courier_action'] = 'Logistics Booking';
        }
        return $new;
    }

    public static function render_order_columns_classic($column, $post_id) {
        if (function_exists('wc_get_order')) {
            $order = wc_get_order($post_id);
            if ($order) self::render_cell($column, $order);
        }
    }

    public static function render_order_columns_hpos($column, $order) {
        if ($order) {
            self::render_cell($column, $order);
        }
    }

    public static function render_cell($column, $order) {
        $order_id = $order->get_id();
        $phone = $order->get_billing_phone();

        if ($column === 'gm_delivery_rate') {
            echo '<div id="gm-rate-wrap-' . esc_attr($order_id) . '">';
            echo self::get_delivery_ratio_badge($phone, $order_id, $order);
            echo '</div>';
        } elseif ($column === 'gm_courier_action') {
            $sf_tracking = $order->get_meta('_steadfast_tracking_code');
            if (!empty($sf_tracking)) {
                $track_url = "https://portal.steadfast.com.bd/tracking/" . esc_attr($sf_tracking);
                echo '<div style="font-size:12px; font-weight:700; color:#065F46; background:#ECFDF5; border:1.5px solid #A7F3D0; padding:6px 12px; border-radius:10px; display:inline-flex; align-items:center; gap:6px;">
                    <span>Steadfast:</span> <a href="' . esc_url($track_url) . '" target="_blank" style="color:#059669; font-weight:800; text-decoration:none;">#' . esc_html($sf_tracking) . '</a>
                </div>';
            } else {
                if (get_option('gm_sf_active')) {
                    echo '<button type="button" class="button" onclick="gmBookOrderCourier(' . esc_js($order_id) . ', \'steadfast\', this)" style="background:linear-gradient(135deg, #0F172A 0%, #1E293B 100%); color:#FFF; border:none; font-weight:700; font-size:12px; padding:6px 14px; border-radius:8px; cursor:pointer; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
                        Send to Steadfast
                    </button>';
                } else {
                    echo '<span style="color:#94A3B8; font-size:12px;">Courier Inactive</span>';
                }
            }
        }
    }

    public static function render_ratio_html_from_data($data) {
        if (is_array($data) && isset($data['total_parcels']) && $data['total_parcels'] > 0) {
            $total = (int) $data['total_parcels'];
            $delivered = (int) (isset($data['delivered']) ? $data['delivered'] : 0);
            $cancelled = (int) (isset($data['cancelled']) ? $data['cancelled'] : 0);
            $rate = isset($data['success_rate']) ? round($data['success_rate']) : round(($delivered / $total) * 100);

            if ($rate >= 80) {
                return "<div style='display:inline-block;'>
                    <span style='background:#ECFDF5; color:#065F46; border:1.5px solid #A7F3D0; font-size:11px; font-weight:800; padding:4px 10px; border-radius:8px; display:inline-flex; align-items:center; gap:6px;'>
                        <span style='width:6px; height:6px; border-radius:50%; background:#059669;'></span> {$rate}% ({$delivered}/{$total})
                    </span>
                    <div style='font-size:10px; color:#059669; font-weight:700; margin-top:2px;'>Safe Customer</div>
                </div>";
            } elseif ($rate >= 55) {
                return "<div style='display:inline-block;'>
                    <span style='background:#FEF3C7; color:#B45309; border:1.5px solid #FDE68A; font-size:11px; font-weight:800; padding:4px 10px; border-radius:8px; display:inline-flex; align-items:center; gap:6px;'>
                        <span style='width:6px; height:6px; border-radius:50%; background:#D97706;'></span> {$rate}% ({$delivered}/{$total})
                    </span>
                    <div style='font-size:10px; color:#D97706; font-weight:700; margin-top:2px;'>Moderate Risk</div>
                </div>";
            } else {
                return "<div style='display:inline-block;'>
                    <span style='background:#FEE2E2; color:#DC2626; border:1.5px solid #FCA5A5; font-size:11px; font-weight:800; padding:4px 10px; border-radius:8px; display:inline-flex; align-items:center; gap:6px;'>
                        <span style='width:6px; height:6px; border-radius:50%; background:#DC2626;'></span> {$rate}% ({$cancelled} Ret)
                    </span>
                    <div style='font-size:10px; color:#DC2626; font-weight:800; margin-top:2px;'>High Return Risk</div>
                </div>";
            }
        }

        return "<div style='display:inline-flex; align-items:center; gap:4px;'>
            <span style='background:#F1F5F9; color:#475569; border:1px solid #E2E8F0; font-size:11px; font-weight:700; padding:4px 10px; border-radius:8px;'>
                <span style='width:6px; height:6px; border-radius:50%; background:#94A3B8;'></span> New Customer
            </span>
        </div>";
    }

    public static function get_delivery_ratio_badge($phone, $order_id = 0, $order = null) {
        if (!get_option('gm_sf_active') || !get_option('gm_sf_fraud_check', 1)) {
            return '<span style="color:#94A3B8; font-size:12px;">—</span>';
        }

        $clean_phone = GM_Core_Engine::sanitize_bd_phone($phone);
        if (!$clean_phone) {
            return '<span style="background:#F1F5F9; color:#64748B; font-size:11px; font-weight:700; padding:4px 8px; border-radius:6px;">New Customer</span>';
        }

        if ($order) {
            $cached_order_data = $order->get_meta('_gm_cached_ratio_data');
            if (!empty($cached_order_data) && is_array($cached_order_data)) {
                return self::render_ratio_html_from_data($cached_order_data);
            }
        }

        $transient_key = 'gm_sf_ratio_' . $clean_phone;
        $data = get_transient($transient_key);

        if ($data !== false) {
            return self::render_ratio_html_from_data($data);
        }

        // Render Instant Check Action Button
        return "<button type='button' class='button button-small' onclick='gmFetchLiveRatio(\"" . esc_js($clean_phone) . "\", " . esc_js($order_id) . ", this)' style='font-size:11px; font-weight:700; background:#F8FAFC; border:1px solid #CBD5E1; color:#334155; border-radius:6px; padding:2px 8px;'>
            Check Ratio
        </button>";
    }

    public static function add_order_metabox() {
        $screens = array('shop_order', 'woocommerce_page_wc-orders');
        foreach ($screens as $screen) {
            add_meta_box(
                'gm_order_courier_box',
                'GM Automate — Logistics & Delivery Intelligence',
                array(__CLASS__, 'render_metabox_content'),
                $screen,
                'side',
                'high'
            );
        }
    }

    public static function render_metabox_content($post_or_order) {
        $order = is_a($post_or_order, 'WC_Order') ? $post_or_order : wc_get_order($post_or_order->ID);
        if (!$order) return;

        $order_id = $order->get_id();
        $sf_tracking = $order->get_meta('_steadfast_tracking_code');
        $phone = $order->get_billing_phone();
        $ratio_badge = self::get_delivery_ratio_badge($phone, $order_id, $order);
        ?>
        <div style="font-size:13px; color:#1E293B;">
            <div style="margin-bottom:14px;">
                <strong>Steadfast Delivery History:</strong>
                <div style="margin-top:6px;" id="gm-rate-wrap-<?php echo esc_attr($order_id); ?>"><?php echo $ratio_badge; ?></div>
            </div>

            <?php if (!empty($sf_tracking)) : 
                $track_url = "https://portal.steadfast.com.bd/tracking/" . esc_attr($sf_tracking);
            ?>
                <div style="background:#ECFDF5; border:1.5px solid #A7F3D0; padding:12px; border-radius:12px; margin-bottom:10px;">
                    <strong style="color:#065F46;">Steadfast Consignment Booked</strong><br/>
                    <span style="font-size:12px; color:#334155;">Tracking: <code><?php echo esc_html($sf_tracking); ?></code></span><br/>
                    <a href="<?php echo esc_url($track_url); ?>" target="_blank" style="display:inline-block; margin-top:6px; background:#059669; color:#FFF; font-weight:700; text-decoration:none; padding:6px 12px; border-radius:6px; font-size:11px;">Track Live Parcel ↗</a>
                </div>
            <?php else : ?>
                <div style="display:flex; flex-direction:column; gap:8px; margin-top:10px;">
                    <?php if (get_option('gm_sf_active')) : ?>
                        <button type="button" class="button button-primary" onclick="gmBookOrderCourier(<?php echo esc_js($order_id); ?>, 'steadfast', this)" style="background:#0F172A; border-color:#0F172A; width:100%; font-weight:800; padding:8px 0; border-radius:8px;">
                            Book with Steadfast Courier
                        </button>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

    public static function inject_universal_modal_and_scripts() {
        ?>
        <!-- Universal Modern Glassmorphism Toast & Modal Container -->
        <div id="gmToastContainer" style="position:fixed; top:35px; right:25px; z-index:999999; display:flex; flex-direction:column; gap:10px; pointer-events:none;"></div>
        <div id="gmModalBackdrop" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.6); backdrop-filter:blur(4px); z-index:999998; align-items:center; justify-content:center;">
            <div id="gmModalCard" style="background:#FFF; width:90%; max-width:440px; border-radius:20px; padding:25px; box-shadow:0 20px 45px rgba(0,0,0,0.2); animation:gmScaleIn 0.2s ease;">
                <div id="gmModalHeader" style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div id="gmModalIconBox" style="width:36px; height:36px; border-radius:10px; background:#F1F5F9; display:flex; align-items:center; justify-content:center;">
                        <svg style="width:18px; height:18px; stroke:#0F172A; stroke-width:2; fill:none;" viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                    </div>
                    <h3 id="gmModalTitle" style="margin:0; font-size:18px; font-weight:800; color:#0F172A;">Modal Title</h3>
                </div>
                <div id="gmModalBody" style="font-size:14px; color:#475569; margin-bottom:20px; line-height:1.5;"></div>
                <div id="gmModalInputArea" style="display:none; margin-bottom:20px;">
                    <input type="text" id="gmModalInputField" class="gm-input" style="width:100%; padding:10px 14px; border:1.5px solid #CBD5E1; border-radius:10px; font-size:14px;" />
                </div>
                <div id="gmModalActions" style="display:flex; justify-content:flex-end; gap:10px;">
                    <button type="button" id="gmModalCancelBtn" style="background:#F1F5F9; color:#475569; border:none; padding:10px 18px; border-radius:10px; font-weight:700; cursor:pointer;">Cancel</button>
                    <button type="button" id="gmModalConfirmBtn" style="background:#0F172A; color:#FFF; border:none; padding:10px 18px; border-radius:10px; font-weight:800; cursor:pointer;">Confirm</button>
                </div>
            </div>
        </div>

        <style>
            @keyframes gmSlideIn { from { transform:translateX(100%); opacity:0; } to { transform:translateX(0); opacity:1; } }
            @keyframes gmScaleIn { from { transform:scale(0.92); opacity:0; } to { transform:scale(1); opacity:1; } }
            .gm-toast { pointer-events:auto; background:#FFF; border:1px solid #E2E8F0; padding:14px 18px; border-radius:14px; box-shadow:0 10px 25px rgba(0,0,0,0.1); display:flex; align-items:center; gap:12px; min-width:280px; max-width:380px; animation:gmSlideIn 0.3s cubic-bezier(0.16,1,0.3,1); }
            .gm-toast.success { border-left:4px solid #059669; }
            .gm-toast.error { border-left:4px solid #DC2626; }
            .gm-toast.warning { border-left:4px solid #D97706; }
        </style>

        <script>
        function gmNotify(type, title, message) {
            const container = document.getElementById('gmToastContainer');
            if (!container) return;
            const toast = document.createElement('div');
            toast.className = 'gm-toast ' + (type || 'success');
            
            let iconSvg = '<svg style="width:18px; height:18px; stroke:#059669; stroke-width:2.2; fill:none;" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>';
            if (type === 'error') {
                iconSvg = '<svg style="width:18px; height:18px; stroke:#DC2626; stroke-width:2.2; fill:none;" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>';
            } else if (type === 'warning') {
                iconSvg = '<svg style="width:18px; height:18px; stroke:#D97706; stroke-width:2.2; fill:none;" viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>';
            }

            toast.innerHTML = `
                <div style="flex-shrink:0;">${iconSvg}</div>
                <div>
                    <div style="font-weight:800; font-size:13px; color:#0F172A;">${title}</div>
                    <div style="font-size:12px; color:#64748B;">${message}</div>
                </div>
            `;
            container.appendChild(toast);
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                toast.style.transition = 'all 0.3s ease';
                setTimeout(() => toast.remove(), 300);
            }, 4000);
        }

        function gmConfirmModal(title, onConfirm) {
            const backdrop = document.getElementById('gmModalBackdrop');
            document.getElementById('gmModalTitle').innerText = 'Confirmation Required';
            document.getElementById('gmModalBody').innerText = title;
            document.getElementById('gmModalInputArea').style.display = 'none';
            
            const cancelBtn = document.getElementById('gmModalCancelBtn');
            const confirmBtn = document.getElementById('gmModalConfirmBtn');

            backdrop.style.display = 'flex';

            cancelBtn.onclick = () => { backdrop.style.display = 'none'; };
            confirmBtn.onclick = () => {
                backdrop.style.display = 'none';
                if (typeof onConfirm === 'function') onConfirm();
            };
        }

        function gmPromptModal(title, placeholder, defaultVal, onConfirm) {
            const backdrop = document.getElementById('gmModalBackdrop');
            const input = document.getElementById('gmModalInputField');
            document.getElementById('gmModalTitle').innerText = title;
            document.getElementById('gmModalBody').innerText = 'Provide details below:';
            document.getElementById('gmModalInputArea').style.display = 'block';
            input.placeholder = placeholder || '';
            input.value = defaultVal || '';

            const cancelBtn = document.getElementById('gmModalCancelBtn');
            const confirmBtn = document.getElementById('gmModalConfirmBtn');

            backdrop.style.display = 'flex';
            input.focus();

            cancelBtn.onclick = () => { backdrop.style.display = 'none'; };
            confirmBtn.onclick = () => {
                const val = input.value.trim();
                backdrop.style.display = 'none';
                if (typeof onConfirm === 'function') onConfirm(val);
            };
        }

        async function gmBookOrderCourier(orderId, courier, btn) {
            const originalText = btn.innerText;
            btn.disabled = true;
            btn.innerText = 'Booking...';

            const fd = new FormData();
            fd.append('action', 'gm_manual_book_courier');
            fd.append('nonce', '<?php echo wp_create_nonce("gm_pro_nonce"); ?>');
            fd.append('order_id', orderId);
            fd.append('courier', courier);

            try {
                const res = await fetch(ajaxurl, { method: 'POST', body: fd });
                const data = await res.json();
                if (data.success) {
                    gmNotify('success', 'Booked', data.data.message);
                    setTimeout(() => window.location.reload(), 1500);
                } else {
                    gmNotify('error', 'Booking Failed', data.data.message);
                    btn.disabled = false;
                    btn.innerText = originalText;
                }
            } catch(e) {
                gmNotify('error', 'Network Error', 'Could not connect to courier API.');
                btn.disabled = false;
                btn.innerText = originalText;
            }
        }

        async function gmFetchLiveRatio(phone, orderId, btn) {
            btn.disabled = true;
            btn.innerText = 'Checking...';

            const fd = new FormData();
            fd.append('action', 'gm_check_customer_ratio');
            fd.append('nonce', '<?php echo wp_create_nonce("gm_pro_nonce"); ?>');
            fd.append('phone', phone);
            fd.append('order_id', orderId);

            try {
                const res = await fetch(ajaxurl, { method: 'POST', body: fd });
                const data = await res.json();
                if (data.success && data.data.html) {
                    const wrap = document.getElementById('gm-rate-wrap-' + orderId);
                    if (wrap) wrap.innerHTML = data.data.html;
                }
            } catch(e) {
                btn.innerText = 'Error';
            }
        }
        </script>
        <?php
    }
}

/**
 * ============================================================================
 * 4. 5-LAYER IRONCLAD FRAUD SHIELD, ABANDONED CART & DYNAMIC CHECKOUT ENGINE
 * ============================================================================
 */
class GM_Core_Engine {
    public static function init() {
        // Quick Order AJAX Handler
        add_action('wp_ajax_growthmark_quick_order', array(__CLASS__, 'handle_quick_order'));
        add_action('wp_ajax_nopriv_growthmark_quick_order', array(__CLASS__, 'handle_quick_order'));

        // Silent Draft Cart Capture AJAX
        add_action('wp_ajax_gm_capture_draft_cart', array(__CLASS__, 'handle_draft_capture'));
        add_action('wp_ajax_nopriv_gm_capture_draft_cart', array(__CLASS__, 'handle_draft_capture'));

        // Abandoned Heartbeat Check
        add_action('init', array(__CLASS__, 'process_abandoned_heartbeat'));

        // Inject Global Rich Form & Package Listener on Every Front-end Page
        add_action('wp_footer', array(__CLASS__, 'inject_global_draft_listener'), 999);

        // Standard WooCommerce Order Processed Hooks (Multi-Channel Full Coverage)
        add_action('woocommerce_checkout_order_processed', array(__CLASS__, 'on_wc_order_processed'), 20, 3);
        add_action('woocommerce_new_order', array(__CLASS__, 'on_wc_new_order'), 20, 2);
        add_action('woocommerce_thankyou', array(__CLASS__, 'on_wc_thankyou'), 20, 1);
        add_action('woocommerce_payment_complete', array(__CLASS__, 'on_wc_order_status_change'), 20, 1);
        add_action('woocommerce_order_status_processing', array(__CLASS__, 'on_wc_order_status_change'), 20, 1);
        add_action('woocommerce_order_status_on-hold', array(__CLASS__, 'on_wc_order_status_change'), 20, 1);
        add_action('woocommerce_order_status_completed', array(__CLASS__, 'on_wc_order_status_change'), 20, 1);
        add_action('woocommerce_order_status_pending', array(__CLASS__, 'on_wc_order_status_change'), 20, 1);

        // 5-LAYER IRONCLAD CHECKOUT VALIDATION (Stops CartFlows, Classic WC & Block Checkouts)
        add_action('woocommerce_checkout_process', array(__CLASS__, 'validate_wc_checkout_process'));
        add_action('woocommerce_after_checkout_validation', array(__CLASS__, 'validate_wc_after_checkout_validation'), 10, 2);
        add_action('woocommerce_checkout_create_order', array(__CLASS__, 'validate_wc_create_order_hard_stop'), 10, 2);

        // Universal Dynamic Shortcode
        add_shortcode('gm_checkout', array(__CLASS__, 'render_checkout_shortcode'));
    }

    public static function sanitize_bd_phone($phone) {
        $digits = preg_replace('/[^0-9]/', '', (string)$phone);
        if (strlen($digits) === 13 && substr($digits, 0, 2) === '88') {
            $digits = substr($digits, 2);
        }
        if (strlen($digits) === 11 && substr($digits, 0, 2) === '01') {
            return $digits;
        }
        return false;
    }

    public static function get_client_ip() {
        $ip = '';
        if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return trim($ip);
    }

    public static function log_fraud_attempt($value, $reason) {
        $logs = get_option('gm_fraud_logs', array());
        if (!is_array($logs)) $logs = array();
        $logs[] = array(
            'date'   => current_time('d-M-Y h:i A'),
            'value'  => $value,
            'reason' => $reason
        );
        if (count($logs) > 60) array_shift($logs);
        update_option('gm_fraud_logs', $logs);
    }

    public static function validate_security($phone, $ip = null) {
        if (!get_option('gm_fraud_active', 1)) {
            return array('valid' => true);
        }

        if (!$ip) $ip = self::get_client_ip();
        $clean_phone = self::sanitize_bd_phone($phone);
        if (!$clean_phone) {
            $clean_phone = preg_replace('/[^0-9]/', '', (string)$phone);
        }
        $phone_suffix = !empty($clean_phone) ? substr($clean_phone, -8) : '';

        // 1. STRICT BLACKLIST CHECK (Applies UNIVERSALLY to everyone)
        $blocked_ips = get_option('gm_blocked_ips', array());
        if (is_array($blocked_ips) && !empty($ip) && isset($blocked_ips[$ip])) {
            self::log_fraud_attempt($ip, 'Blacklisted IP tried to place order');
            return array('valid' => false, 'message' => 'দুঃখিত, আপনার এলাকা বা নেটওয়ার্ক থেকে ক্যাশ অন ডেলিভারি সাময়িকভাবে অনুপলব্ধ। বিস্তারিত জানতে সাপোর্টে কল করুন।');
        }

        $blocked_phones = get_option('gm_blocked_phones', array());
        if (is_array($blocked_phones) && !empty($phone_suffix)) {
            foreach ($blocked_phones as $bp => $bpData) {
                $bp_clean = preg_replace('/[^0-9]/', '', (string)$bp);
                if ($bp_clean === $clean_phone || substr($bp_clean, -8) === $phone_suffix) {
                    self::log_fraud_attempt($clean_phone, 'Blacklisted Phone tried to place order');
                    return array('valid' => false, 'message' => 'দুঃখিত, এই নাম্বারে অনলাইন ক্যাশ অন ডেলিভারি সেবা প্রযোজ্য নয়। সহায়তার জন্য সরাসরি কল করুন।');
                }
            }
        }

        // 2. STRICT 11-DIGIT BD PHONE VALIDATOR
        if (get_option('gm_phone_regex_active', 1)) {
            if (strlen($clean_phone) !== 11 || !preg_match('/^01[3-9]\d{8}$/', $clean_phone)) {
                return array('valid' => false, 'message' => 'অনুগ্রহ করে সঠিক ১১ ডিজিটের মোবাইল নাম্বার দিন (যেমন: 017XXXXXXXX)।');
            }
            $test_patterns = array('01700000000', '01711111111', '01822222222', '01933333333', '01234567890', '01234567891', '01122334455');
            if (in_array($clean_phone, $test_patterns)) {
                self::log_fraud_attempt($clean_phone, 'Dummy test phone number rejected');
                return array('valid' => false, 'message' => 'সঠিক ও সক্রিয় মোবাইল নাম্বার প্রদান করুন।');
            }
        }

        // 3. RATE LIMITING (Exempt shop managers / admins for speed)
        $is_admin = current_user_can('manage_woocommerce') || current_user_can('manage_options');
        if (!$is_admin && get_option('gm_rate_limit_active', 1) && !empty($ip)) {
            $rl_key = 'gm_rl_' . md5($ip);
            $attempts = (int) get_transient($rl_key);
            if ($attempts >= 2) {
                self::log_fraud_attempt($ip, 'Anti-Spam Rate Limit exceeded (>2 orders in 10m)');
                return array('valid' => false, 'message' => 'খুব ঘনঘন অর্ডারের চেষ্টা করা হয়েছে। দয়া করে ১০ মিনিট অপেক্ষা করে পুনরায় চেষ্টা করুন।');
            }
        }

        return array('valid' => true);
    }

    public static function increment_rate_limit($ip) {
        if (!empty($ip) && !(current_user_can('manage_woocommerce') || current_user_can('manage_options'))) {
            $rl_key = 'gm_rl_' . md5($ip);
            $attempts = (int) get_transient($rl_key);
            set_transient($rl_key, $attempts + 1, 600);
        }
    }

    public static function validate_wc_checkout_process() {
        $phone = isset($_POST['billing_phone']) ? sanitize_text_field($_POST['billing_phone']) : '';
        $check = self::validate_security($phone);
        if (!$check['valid']) {
            wc_add_notice($check['message'], 'error');
        }
    }

    public static function validate_wc_after_checkout_validation($data, $errors) {
        $phone = isset($data['billing_phone']) ? $data['billing_phone'] : '';
        $check = self::validate_security($phone);
        if (!$check['valid']) {
            $errors->add('gm_fraud_blocked', $check['message']);
        }
    }

    public static function validate_wc_create_order_hard_stop($order, $data) {
        $phone = $order->get_billing_phone();
        $check = self::validate_security($phone);
        if (!$check['valid']) {
            throw new Exception($check['message']);
        }
    }

    public static function inject_global_draft_listener() {
        if (is_admin()) return;
        if (!get_option('gm_ab_active', 1)) return;
        $ajax_url = admin_url('admin-ajax.php');
        ?>
        <script id="gm-global-draft-tracker">
        (function() {
            let gmLastCaptured = '';
            let gmSessionId = sessionStorage.getItem('gm_checkout_sid');
            if (!gmSessionId) {
                gmSessionId = 'sid_' + Math.random().toString(36).substr(2, 9) + '_' + Date.now();
                sessionStorage.setItem('gm_checkout_sid', gmSessionId);
            }

            function gmDetectSelectedProduct() {
                const checkedRadio = document.querySelector('input[type="radio"]:checked, input[name*="package"]:checked, input[name*="plan"]:checked, input[name*="product"]:checked');
                if (checkedRadio) {
                    const label = checkedRadio.closest('label') || checkedRadio.parentElement;
                    if (label && label.innerText.trim()) {
                        return label.innerText.replace(/\s+/g, ' ').trim();
                    }
                }
                const activeCard = document.querySelector('.package-card.active, .pricing-card.active, .selected-package');
                if (activeCard && activeCard.innerText.trim()) {
                    return activeCard.innerText.replace(/\s+/g, ' ').trim();
                }
                return document.title || 'Special Package';
            }

            function gmSilentDraftCapture(phone, name, address) {
                let clean = phone.replace(/[^0-9]/g, '');
                if (clean.length === 13 && clean.startsWith('8801')) {
                    clean = clean.substring(2);
                }
                if (clean.length >= 10 && clean !== gmLastCaptured) {
                    gmLastCaptured = clean;
                    const productStr = gmDetectSelectedProduct();

                    const params = new URLSearchParams();
                    params.append('action', 'gm_capture_draft_cart');
                    params.append('session_id', gmSessionId);
                    params.append('name', name || 'Customer');
                    params.append('phone', clean);
                    params.append('address', address || '');
                    params.append('product_name', productStr);
                    
                    fetch('<?php echo esc_url($ajax_url); ?>', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: params.toString(),
                        keepalive: true
                    }).catch(function(e){});
                }
            }

            function gmAttachDraftListeners() {
                const phoneSelectors = 'input[type="tel"], input[name*="phone"], input[id*="phone"], input[name*="billing_phone"]';
                const nameSelectors  = 'input[name*="name"], input[id*="name"], input[name*="billing_first_name"]';
                const addrSelectors  = 'textarea[name*="address"], textarea[id*="address"], input[name*="billing_address_1"], input[id*="address"], textarea';
                
                document.querySelectorAll(phoneSelectors).forEach(function(phoneEl) {
                    if (phoneEl.dataset.gmListening) return;
                    phoneEl.dataset.gmListening = 'true';

                    function checkAndCapture() {
                        const phoneVal = phoneEl.value.trim();
                        let nameVal = '';
                        let addrVal = '';
                        
                        const nameEl = document.querySelector(nameSelectors);
                        if (nameEl) nameVal = nameEl.value.trim();
                        
                        const addrEl = document.querySelector(addrSelectors);
                        if (addrEl) addrVal = addrEl.value.trim();

                        gmSilentDraftCapture(phoneVal, nameVal, addrVal);
                    }

                    phoneEl.addEventListener('blur', checkAndCapture);
                    phoneEl.addEventListener('change', checkAndCapture);
                    phoneEl.addEventListener('input', function() {
                        const digits = this.value.replace(/[^0-9]/g, '');
                        if (digits.length >= 11) {
                            checkAndCapture();
                        }
                    });
                });

                document.querySelectorAll(addrSelectors).forEach(function(addrEl) {
                    if (addrEl.dataset.gmListeningAddr) return;
                    addrEl.dataset.gmListeningAddr = 'true';
                    addrEl.addEventListener('blur', function() {
                        const phoneEl = document.querySelector(phoneSelectors);
                        if (phoneEl && phoneEl.value.replace(/[^0-9]/g, '').length >= 10) {
                            const nameEl = document.querySelector(nameSelectors);
                            const nameVal = nameEl ? nameEl.value.trim() : '';
                            gmSilentDraftCapture(phoneEl.value.trim(), nameVal, this.value.trim());
                        }
                    });
                });
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', gmAttachDraftListeners);
            } else {
                gmAttachDraftListeners();
            }
            setInterval(gmAttachDraftListeners, 1500);
        })();
        </script>
        <?php
    }

    public static function handle_draft_capture() {
        try {
            if (!get_option('gm_ab_active', 1)) {
                wp_send_json_success();
            }

            $session_id = isset($_REQUEST['session_id']) ? sanitize_text_field($_REQUEST['session_id']) : '';
            $name       = isset($_REQUEST['name']) ? sanitize_text_field($_REQUEST['name']) : 'Customer';
            $phone      = isset($_REQUEST['phone']) ? sanitize_text_field($_REQUEST['phone']) : '';
            $address    = isset($_REQUEST['address']) ? sanitize_textarea_field($_REQUEST['address']) : '';
            $product    = isset($_REQUEST['product_name']) ? sanitize_text_field($_REQUEST['product_name']) : 'Special Combo';

            $clean_phone = preg_replace('/[^0-9]/', '', (string)$phone);
            if (strlen($clean_phone) === 13 && substr($clean_phone, 0, 2) === '88') {
                $clean_phone = substr($clean_phone, 2);
            }

            if (empty($clean_phone) || strlen($clean_phone) < 10) {
                wp_send_json_error();
            }

            if (self::has_recent_wc_order($clean_phone)) {
                wp_send_json_success();
            }

            $leads = get_option('gm_abandoned_leads_log', array());
            if (!is_array($leads)) $leads = array();

            $phone_suffix = substr($clean_phone, -8);
            $key = -1;

            foreach ($leads as $k => $l) {
                $existing_clean = preg_replace('/[^0-9]/', '', $l['phone']);
                if (substr($existing_clean, -8) === $phone_suffix || (!empty($session_id) && isset($l['session_id']) && $l['session_id'] === $session_id)) {
                    $key = $k;
                    break;
                }
            }

            if ($key >= 0) {
                if ($leads[$key]['status'] !== 'converted') {
                    $leads[$key]['name']       = $name;
                    $leads[$key]['phone']      = $clean_phone;
                    if (!empty($address)) {
                        $leads[$key]['address'] = $address;
                    }
                    $leads[$key]['product']    = $product;
                    $leads[$key]['timestamp']  = time();
                    $leads[$key]['date']       = current_time('d-M-Y h:i A');
                    $leads[$key]['session_id'] = $session_id;
                }
            } else {
                $leads[] = array(
                    'date'         => current_time('d-M-Y h:i A'),
                    'timestamp'    => time(),
                    'session_id'   => $session_id,
                    'name'         => $name,
                    'phone'        => $clean_phone,
                    'address'      => $address,
                    'product'      => $product,
                    'status'       => 'in_progress',
                    'alert_sent'   => 0
                );
                if (count($leads) > 100) array_shift($leads);
            }

            update_option('gm_abandoned_leads_log', $leads);
            wp_send_json_success();
        } catch (\Throwable $e) {
            wp_send_json_error();
        }
    }

    public static function has_recent_wc_order($phone) {
        if (!function_exists('wc_get_orders')) return false;
        $clean = preg_replace('/[^0-9]/', '', $phone);
        $suffix = substr($clean, -8);

        $recent_orders = wc_get_orders(array(
            'limit'        => 5,
            'date_created' => '>' . (time() - 21600)
        ));

        if (!empty($recent_orders)) {
            foreach ($recent_orders as $order) {
                $order_phone = preg_replace('/[^0-9]/', '', $order->get_billing_phone());
                if (substr($order_phone, -8) === $suffix) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function process_abandoned_heartbeat() {
        if (!get_option('gm_ab_active', 1)) return;
        
        $lock_key = 'gm_heartbeat_mutex_lock';
        if (get_transient($lock_key)) {
            return;
        }
        set_transient($lock_key, 1, 30);

        $leads = get_option('gm_abandoned_leads_log', array());
        if (!is_array($leads) || empty($leads)) return;

        $updated = false;
        $now = time();
        $dispatches = array();

        foreach ($leads as $k => $l) {
            if ($l['status'] === 'in_progress' && empty($l['alert_sent']) && ($now - $l['timestamp'] >= 60)) {
                $clean_phone = preg_replace('/[^0-9]/', '', $l['phone']);

                if (self::has_recent_wc_order($clean_phone)) {
                    $leads[$k]['status'] = 'converted';
                    $updated = true;
                    continue;
                }

                $phone_lock_key = 'gm_ab_sent_lock_' . substr($clean_phone, -8);
                if (get_transient($phone_lock_key)) {
                    $leads[$k]['status']     = 'abandoned';
                    $leads[$k]['alert_sent'] = 1;
                    $updated = true;
                    continue;
                }

                set_transient($phone_lock_key, 1, 24 * HOUR_IN_SECONDS);
                $leads[$k]['status']     = 'abandoned';
                $leads[$k]['alert_sent'] = 1;
                $updated = true;

                $dispatches[] = $leads[$k];
            }
        }

        if ($updated) {
            update_option('gm_abandoned_leads_log', $leads);
        }

        foreach ($dispatches as $lead) {
            $clean_phone = preg_replace('/[^0-9]/', '', $lead['phone']);

            $token   = trim((string) get_option('gm_tg_token'));
            $chat_id = trim((string) get_option('gm_tg_chat_id'));
            $tg_on   = get_option('gm_tg_active');

            if (!empty($token) && !empty($chat_id) && ($tg_on || $tg_on === false || $tg_on === null || (int)$tg_on === 1)) {
                $wa_link = "https://wa.me/88" . $clean_phone;
                $addr_txt = !empty($lead['address']) ? htmlspecialchars($lead['address'], ENT_QUOTES, 'UTF-8') : '<i>Incomplete Address</i>';

                $msg = "<b>Abandoned Cart Lead Alert</b>\n\n";
                $msg .= "<b>Customer:</b> " . htmlspecialchars($lead['name'], ENT_QUOTES, 'UTF-8') . "\n";
                $msg .= "<b>Phone:</b> <code>" . $clean_phone . "</code>\n";
                $msg .= "<b>Address:</b> " . $addr_txt . "\n";
                $msg .= "<b>Interested In:</b> " . htmlspecialchars($lead['product'], ENT_QUOTES, 'UTF-8') . "\n";
                $msg .= "<b>Time:</b> " . $lead['date'] . "\n";
                $msg .= "\n<i>Customer dropped out during checkout. Follow up via WhatsApp or call to close.</i>\n";
                $msg .= "\n<a href='{$wa_link}'>Message on WhatsApp ↗</a> | <i>GrowthMark Engine</i>";

                wp_remote_post("https://api.telegram.org/bot{$token}/sendMessage", array(
                    'body' => array('chat_id' => $chat_id, 'text' => $msg, 'parse_mode' => 'HTML', 'disable_web_page_preview' => true),
                    'timeout'  => 8,
                    'blocking' => true
                ));
            }

            if (get_option('gm_gs_active')) {
                $webhook = get_option('gm_gs_webhook');
                if (!empty($webhook)) {
                    $payload = array(
                        'date'         => $lead['date'],
                        'order_id'     => 'ABANDONED',
                        'name'         => $lead['name'],
                        'phone'        => $clean_phone,
                        'address'      => !empty($lead['address']) ? $lead['address'] : 'Incomplete Form',
                        'area'         => 'N/A',
                        'products'     => $lead['product'],
                        'total_amount' => 0,
                        'status'       => 'Abandoned'
                    );
                    wp_remote_post($webhook, array(
                        'headers' => array('Content-Type' => 'application/json; charset=utf-8'),
                        'body'    => wp_json_encode($payload),
                        'timeout' => 5,
                        'blocking'=> false
                    ));
                }
            }
        }
    }

    public static function mark_lead_converted($phone, $order_id) {
        $clean_phone = self::sanitize_bd_phone($phone);
        if (!$clean_phone) $clean_phone = preg_replace('/[^0-9]/', '', (string)$phone);
        $phone_suffix = substr($clean_phone, -8);
        $leads = get_option('gm_abandoned_leads_log', array());
        if (!is_array($leads) || empty($leads)) return;

        $updated = false;
        foreach ($leads as $k => $l) {
            $existing_clean = preg_replace('/[^0-9]/', '', $l['phone']);
            if (substr($existing_clean, -8) === $phone_suffix) {
                $leads[$k]['status']   = 'converted';
                $leads[$k]['order_id'] = $order_id;
                $updated = true;
            }
        }
        if ($updated) {
            update_option('gm_abandoned_leads_log', $leads);
        }
    }

    public static function on_wc_order_processed($order_id, $posted_data = null, $order = null) {
        self::dispatch_automations_safe($order_id, $order);
    }

    public static function on_wc_new_order($order_id, $order = null) {
        self::dispatch_automations_safe($order_id, $order);
    }

    public static function on_wc_thankyou($order_id) {
        self::dispatch_automations_safe($order_id);
    }

    public static function on_wc_order_status_change($order_id) {
        self::dispatch_automations_safe($order_id);
    }

    public static function handle_quick_order() {
        try {
            $name          = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : 'Customer';
            $phone         = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
            $address       = isset($_POST['address']) ? sanitize_textarea_field($_POST['address']) : '';
            $product_name  = isset($_POST['product_name']) ? sanitize_text_field($_POST['product_name']) : 'Special Combo';
            $product_price = isset($_POST['product_price']) ? floatval($_POST['product_price']) : 990.00;
            $shipping_cost = isset($_POST['shipping_cost']) ? floatval($_POST['shipping_cost']) : 60.00;
            $shipping_area = isset($_POST['shipping_area']) ? sanitize_text_field($_POST['shipping_area']) : 'ঢাকার ভেতরে';
            $product_id    = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

            if (empty($phone) || empty($address)) {
                wp_send_json_error(array('message' => 'Please provide complete delivery details.'));
            }

            // Strict Security & Fraud Shield Check
            $client_ip = self::get_client_ip();
            $sec_check = self::validate_security($phone, $client_ip);
            if (!$sec_check['valid']) {
                wp_send_json_error(array('message' => $sec_check['message']));
            }

            if (!function_exists('wc_create_order')) {
                wp_send_json_error(array('message' => 'WooCommerce is not active.'));
            }

            $clean_phone = self::sanitize_bd_phone($phone);
            if (!$clean_phone) $clean_phone = preg_replace('/[^0-9]/', '', $phone);

            $name_parts = explode(' ', $name, 2);
            $first_name = $name_parts[0];
            $last_name  = isset($name_parts[1]) ? $name_parts[1] : '';

            $order = wc_create_order();
            $address_data = array(
                'first_name' => $first_name,
                'last_name'  => $last_name,
                'email'      => 'customer_' . $clean_phone . '@growthmark.local',
                'phone'      => $clean_phone,
                'address_1'  => $address,
                'city'       => $shipping_area,
                'country'    => 'BD'
            );
            $order->set_address($address_data, 'billing');
            $order->set_address($address_data, 'shipping');

            if ($product_id > 0 && function_exists('wc_get_product')) {
                $wc_product = wc_get_product($product_id);
                if ($wc_product) {
                    $order->add_product($wc_product, 1);
                } else {
                    $item = new WC_Order_Item_Fee();
                    $item->set_name($product_name);
                    $item->set_amount($product_price);
                    $item->set_total($product_price);
                    $order->add_item($item);
                }
            } else {
                $item = new WC_Order_Item_Fee();
                $item->set_name($product_name);
                $item->set_amount($product_price);
                $item->set_total($product_price);
                $order->add_item($item);
            }

            $shipping_item = new WC_Order_Item_Shipping();
            $shipping_item->set_method_title('Home Delivery — ' . $shipping_area);
            $shipping_item->set_total($shipping_cost);
            $order->add_item($shipping_item);

            $order->set_payment_method('cod');
            $order->set_payment_method_title('Cash on Delivery (ক্যাশ অন ডেলিভারি)');
            $order->calculate_totals();
            $order->update_status('processing', '1-Click Landing Page order received via GM Automate.');
            $order->save();

            $order_id = $order->get_id();

            // Record Rate Limit
            self::increment_rate_limit($client_ip);

            // Mark Lead as Converted immediately
            self::mark_lead_converted($clean_phone, $order_id);

            // Dispatch Confirmed Automations
            self::dispatch_automations_safe($order_id, $order);

            wp_send_json_success(array(
                'order_id' => $order_id,
                'total'    => $order->get_total(),
                'currency' => get_woocommerce_currency_symbol()
            ));

        } catch (\Throwable $e) {
            wp_send_json_error(array('message' => $e->getMessage()));
        }
    }

    public static function dispatch_automations_safe($order_id, $order = null) {
        try {
            if (!$order && $order_id && function_exists('wc_get_order')) {
                $order = wc_get_order($order_id);
            }
            if (!$order) return;

            // Prevent duplicate dispatches across multiple concurrent hooks
            if ($order->get_meta('_gm_dispatched') === '1') {
                return;
            }

            // Extract phone number with fallbacks
            $raw_phone = $order->get_billing_phone();
            if (empty($raw_phone)) {
                $raw_phone = $order->get_shipping_phone();
            }

            // If order was created empty and customer info is not yet attached, wait for the next hook
            if (empty($raw_phone)) {
                return;
            }

            // Mark as dispatched immediately to prevent race conditions
            $order->update_meta_data('_gm_dispatched', '1');
            $order->save();

            $clean_phone = self::sanitize_bd_phone($raw_phone);
            if (!$clean_phone) $clean_phone = preg_replace('/[^0-9]/', '', (string)$raw_phone);
            if (empty($clean_phone)) $clean_phone = $raw_phone;

            self::mark_lead_converted($clean_phone, $order_id);

            $name = trim($order->get_billing_first_name() . ' ' . $order->get_billing_last_name());
            if (empty($name)) $name = trim($order->get_shipping_first_name() . ' ' . $order->get_shipping_last_name());
            if (empty($name)) $name = $order->get_formatted_billing_full_name();
            if (empty($name)) $name = 'Valued Customer';

            $address = trim($order->get_billing_address_1() . ' ' . $order->get_billing_address_2());
            if (empty($address)) $address = trim($order->get_shipping_address_1() . ' ' . $order->get_shipping_address_2());
            if (empty($address)) $address = 'Not provided';

            $area = $order->get_billing_city();
            if (empty($area)) $area = $order->get_shipping_city();
            if (empty($area)) $area = 'Bangladesh';

            $total = $order->get_total();

            $products_list = array();
            foreach ($order->get_items() as $i) {
                $products_list[] = $i->get_name() . ' (x' . $i->get_quantity() . ')';
            }
            if (empty($products_list)) {
                foreach ($order->get_fees() as $f) {
                    $products_list[] = $f->get_name();
                }
            }
            if (empty($products_list)) {
                $products_list[] = 'Special Package';
            }
            $products_str = implode(', ', $products_list);

            // 1. Telegram Dispatch (Confirmed Order)
            $token   = trim((string) get_option('gm_tg_token'));
            $chat_id = trim((string) get_option('gm_tg_chat_id'));
            $tg_on   = get_option('gm_tg_active');

            if (!empty($token) && !empty($chat_id) && ($tg_on || $tg_on === false || $tg_on === null || (int)$tg_on === 1)) {
                $wa_phone = preg_replace('/[^0-9]/', '', (string)$clean_phone);
                if (strlen($wa_phone) === 11 && substr($wa_phone, 0, 2) === '01') {
                    $wa_link = "https://wa.me/88{$wa_phone}";
                } else {
                    $wa_link = "https://wa.me/{$wa_phone}";
                }

                $safe_name     = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                $safe_address  = htmlspecialchars($address, ENT_QUOTES, 'UTF-8');
                $safe_products = htmlspecialchars($products_str, ENT_QUOTES, 'UTF-8');

                $msg = "<b>New Confirmed Order (GM Automate)</b>\n\n";
                $msg .= "<b>Order ID:</b> #{$order_id}\n";
                $msg .= "<b>Customer:</b> {$safe_name}\n";
                $msg .= "<b>Phone:</b> <code>{$clean_phone}</code>\n";
                $msg .= "<b>Address:</b> {$safe_address}\n";
                $msg .= "<b>Product:</b> {$safe_products}\n";
                $msg .= "<b>Total Bill:</b> ৳{$total} (COD)\n";
                $msg .= "<b>Time:</b> " . current_time('d-M-Y h:i A') . "\n";
                $msg .= "\n<a href='{$wa_link}'>Message on WhatsApp ↗</a> | <i>GrowthMark Engine</i>";

                $tg_res = wp_remote_post("https://api.telegram.org/bot{$token}/sendMessage", array(
                    'body' => array(
                        'chat_id'                  => $chat_id,
                        'text'                     => $msg,
                        'parse_mode'               => 'HTML',
                        'disable_web_page_preview' => true
                    ),
                    'timeout'  => 10,
                    'blocking' => true
                ));

                $is_ok = false;
                if (!is_wp_error($tg_res) && wp_remote_retrieve_response_code($tg_res) == 200) {
                    $is_ok = true;
                } else {
                    // Fallback to plain text if HTML entity parsing fails
                    $plain_msg = "New Confirmed Order (GM Automate)\n\n"
                               . "Order ID: #{$order_id}\n"
                               . "Customer: {$name}\n"
                               . "Phone: {$clean_phone}\n"
                               . "Address: {$address}\n"
                               . "Product: {$products_str}\n"
                               . "Total Bill: ৳{$total} (COD)\n"
                               . "Time: " . current_time('d-M-Y h:i A') . "\n\n"
                               . "WhatsApp: {$wa_link} | GrowthMark Engine";

                    $fb_res = wp_remote_post("https://api.telegram.org/bot{$token}/sendMessage", array(
                        'body' => array(
                            'chat_id'                  => $chat_id,
                            'text'                     => $plain_msg,
                            'disable_web_page_preview' => true
                        ),
                        'timeout'  => 10,
                        'blocking' => true
                    ));
                    if (!is_wp_error($fb_res) && wp_remote_retrieve_response_code($fb_res) == 200) {
                        $is_ok = true;
                    }
                }

                if ($is_ok) {
                    $order->add_order_note('GM Automate: Realtime order alert dispatched to Telegram.');
                } else {
                    $err_info = is_wp_error($tg_res) ? $tg_res->get_error_message() : 'HTTP ' . wp_remote_retrieve_response_code($tg_res);
                    $order->add_order_note('GM Automate Telegram Alert Failed: ' . $err_info);
                }
            }

            // 2. Google Sheets Dispatch
            if (get_option('gm_gs_active')) {
                $webhook = trim((string) get_option('gm_gs_webhook'));
                if (!empty($webhook)) {
                    $payload = array(
                        'date'         => current_time('d-M-Y h:i A'),
                        'order_id'     => '#' . $order_id,
                        'name'         => $name,
                        'phone'        => $clean_phone,
                        'address'      => $address,
                        'area'         => $area,
                        'products'     => $products_str,
                        'total_amount' => $total,
                        'status'       => 'Processing'
                    );
                    wp_remote_post($webhook, array(
                        'headers'  => array('Content-Type' => 'application/json; charset=utf-8'),
                        'body'     => wp_json_encode($payload),
                        'timeout'  => 10,
                        'blocking' => true
                    ));
                }
            }

            // 3. Steadfast Courier Auto-Booking (If Enabled)
            if (get_option('gm_sf_active') && get_option('gm_sf_autobook')) {
                $payload = array(
                    'invoice'          => (string)$order_id,
                    'recipient_name'   => $name,
                    'recipient_phone'  => $phone,
                    'recipient_address'=> $address,
                    'cod_amount'       => floatval($total),
                    'note'             => 'Auto-booked by GM Automate'
                );
                $sf_res = GM_Admin_Controller::execute_steadfast_request('/create_order', 'POST', $payload);
                if (!is_wp_error($sf_res) && !empty($sf_res['consignment']['tracking_code'])) {
                    $order->update_meta_data('_steadfast_tracking_code', $sf_res['consignment']['tracking_code']);
                    $order->add_order_note('Steadfast Auto-Booked. Tracking Code: ' . $sf_res['consignment']['tracking_code']);
                    $order->save();
                }
            }

            // 4. SMS Confirmation
            if (get_option('gm_sms_active')) {
                $gw  = get_option('gm_sms_gateway', 'greenweb');
                $key = get_option('gm_sms_key');
                $tpl = get_option('gm_sms_msg');
                if (!empty($key)) {
                    $sms_phone = '88' . $phone;
                    $sms_text = str_replace(
                        array('{name}', '{order_id}', '{total}'),
                        array($name, $order_id, $total),
                        $tpl
                    );

                    if ($gw === 'greenweb') {
                        wp_remote_post('https://api.greenweb.com.bd/api.php', array(
                            'body' => array('token' => $key, 'to' => $sms_phone, 'message' => $sms_text),
                            'timeout' => 5,
                            'blocking' => false
                        ));
                    } elseif ($gw === 'bulksmsbd') {
                        wp_remote_post('http://bulksmsbd.net/api/smsapi', array(
                            'body' => array('api_key' => $key, 'number' => $sms_phone, 'message' => $sms_text),
                            'timeout' => 5,
                            'blocking' => false
                        ));
                    } elseif ($gw === 'alphasms') {
                        wp_remote_post('https://api.sms.net.bd/sendsms', array(
                            'body' => array('api_key' => $key, 'msg' => $sms_text, 'to' => $sms_phone),
                            'timeout' => 5,
                            'blocking' => false
                        ));
                    }
                }
            }
        } catch (\Throwable $e) {}
    }

    public static function render_checkout_shortcode($atts) {
        $default_inside  = floatval(get_option('gm_co_inside_ship', 60));
        $default_outside = floatval(get_option('gm_co_outside_ship', 100));
        $default_btn_col = get_option('gm_co_btn_color', '#059669');
        $default_p_id    = intval(get_option('gm_co_default_product', 0));

        $a = shortcode_atts(array(
            'id'             => $default_p_id,
            'product_id'     => $default_p_id,
            'product'        => '',
            'price'          => 0,
            'inside'         => $default_inside,
            'outside'        => $default_outside,
            'shipping_inside'=> $default_inside,
            'shipping_outside'=> $default_outside,
            'color'          => $default_btn_col,
            'btn_color'      => $default_btn_col,
            'title'          => 'অর্ডারটি কনফার্ম করতে নিচের তথ্যগুলো দিন'
        ), $atts);

        $prod_id = !empty($a['product_id']) ? intval($a['product_id']) : intval($a['id']);
        $prod_title = $a['product'];
        $prod_price = floatval($a['price']);
        $ship_inside = floatval(!empty($a['shipping_inside']) ? $a['shipping_inside'] : $a['inside']);
        $ship_outside = floatval(!empty($a['shipping_outside']) ? $a['shipping_outside'] : $a['outside']);
        $theme_color = !empty($a['btn_color']) ? $a['btn_color'] : $a['color'];
        if (empty($theme_color)) $theme_color = '#059669';

        // Auto-detect current page WooCommerce product if not passed
        if ($prod_id <= 0 && function_exists('is_product') && is_product()) {
            global $product;
            if ($product) {
                $prod_id = $product->get_id();
            }
        }

        if ($prod_id > 0 && function_exists('wc_get_product')) {
            $wc_p = wc_get_product($prod_id);
            if ($wc_p) {
                if (empty($prod_title)) $prod_title = $wc_p->get_name();
                if ($prod_price <= 0) $prod_price = floatval($wc_p->get_price());
            }
        }

        if (empty($prod_title)) $prod_title = '১ কেজি স্পেশাল আভিজাত্য কম্বো';
        if ($prod_price <= 0) $prod_price = 990.00;

        $initial_total = $prod_price + $ship_inside;
        $unique_form_id = 'gmf_' . rand(1000, 9999);

        ob_start();
        ?>
        <div class="gm-checkout-card" id="<?php echo esc_attr($unique_form_id); ?>_wrap">
            <style>
                #<?php echo esc_attr($unique_form_id); ?>_wrap {
                    max-width: 620px;
                    margin: 25px auto;
                    background: #FFFFFF;
                    border: 1px solid #E2E8F0;
                    border-radius: 24px;
                    box-shadow: 0 20px 45px -10px rgba(15,23,42,0.08), 0 0 1px 1px rgba(0,0,0,0.02);
                    padding: 30px;
                    font-family: 'Hind Siliguri', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                    box-sizing: border-box;
                    color: #1E293B;
                }
                #<?php echo esc_attr($unique_form_id); ?>_wrap * { box-sizing: border-box; }
                
                .gmf-header {
                    background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
                    color: #FFFFFF;
                    padding: 20px 24px;
                    border-radius: 18px;
                    text-align: center;
                    margin-bottom: 24px;
                }
                .gmf-header h3 { margin: 0 0 6px 0; font-size: 20px; font-weight: 800; color: #FFFFFF !important; }
                .gmf-header p { margin: 0; font-size: 13px; color: #FDE68A; }

                .gmf-section-label { font-weight: 800; font-size: 14px; color: #0F172A; margin-bottom: 10px; display: flex; align-items: center; gap: 6px; }
                
                .gmf-input-group { position: relative; margin-bottom: 14px; }
                .gmf-input, .gmf-textarea {
                    width: 100%;
                    padding: 13px 16px;
                    border: 1.5px solid #CBD5E1 !important;
                    border-radius: 12px !important;
                    font-size: 14px;
                    color: #0F172A;
                    background-color: #F8FAFC;
                    outline: none;
                    transition: all 0.2s ease;
                }
                .gmf-input:focus, .gmf-textarea:focus {
                    background-color: #FFFFFF;
                    border-color: <?php echo esc_attr($theme_color); ?> !important;
                    box-shadow: 0 0 0 4px rgba(5,150,105,0.12) !important;
                }

                .gmf-shipping-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 22px; }
                .gmf-ship-card {
                    border: 1.5px solid #E2E8F0;
                    background: #F8FAFC;
                    padding: 14px;
                    border-radius: 14px;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    transition: all 0.2s;
                }
                .gmf-ship-card.active {
                    border-color: <?php echo esc_attr($theme_color); ?>;
                    background: #ECFDF5;
                    box-shadow: 0 4px 12px rgba(5,150,105,0.08);
                }
                .gmf-ship-card input { margin-right: 8px; cursor: pointer; accent-color: <?php echo esc_attr($theme_color); ?>; }

                .gmf-summary-box {
                    background: #FAF8F5;
                    border: 1px solid #F3EDE2;
                    border-radius: 16px;
                    padding: 18px 20px;
                    margin-bottom: 24px;
                }
                .gmf-summary-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; font-size: 13px; color: #64748B; }
                .gmf-total-row { display: flex; justify-content: space-between; align-items: center; padding-top: 10px; border-top: 1.5px dashed #E2E8F0; font-weight: 800; font-size: 17px; color: #0F172A; }
                .gmf-total-val { font-size: 24px; font-weight: 900; color: <?php echo esc_attr($theme_color); ?>; }

                .gmf-btn-submit {
                    width: 100%;
                    background: <?php echo esc_attr($theme_color); ?>;
                    color: #FFFFFF;
                    font-size: 19px;
                    font-weight: 800;
                    padding: 16px 24px;
                    border-radius: 16px;
                    border: none;
                    cursor: pointer;
                    transition: all 0.2s;
                    box-shadow: 0 10px 25px -4px rgba(5,150,105,0.4);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 8px;
                }
                .gmf-btn-submit:hover { filter: brightness(1.05); transform: translateY(-1px); }
                .gmf-btn-submit:disabled { opacity: 0.7; cursor: not-allowed; }
            </style>

            <div class="gmf-header">
                <h3><?php echo esc_html($a['title']); ?></h3>
                <p>ক্যাশ অন ডেলিভারি — পার্সেল হাতে পেয়ে মূল্য পরিশোধের ১০০% নিশ্চয়তা</p>
            </div>

            <form id="<?php echo esc_attr($unique_form_id); ?>" onsubmit="gmfSubmitOrder(event, '<?php echo esc_js($unique_form_id); ?>')">
                <input type="hidden" name="product_id" value="<?php echo esc_attr($prod_id); ?>" />
                <input type="hidden" name="product_name" value="<?php echo esc_attr($prod_title); ?>" />
                <input type="hidden" name="product_price" value="<?php echo esc_attr($prod_price); ?>" />

                <!-- 1. Contact Details -->
                <div style="margin-bottom: 20px;">
                    <div class="gmf-section-label">১. কাস্টমার ও ডেলিভারি তথ্য</div>
                    <div class="gmf-input-group">
                        <input type="text" name="name" required placeholder="আপনার সম্পূর্ণ নাম *" class="gmf-input" />
                    </div>
                    <div class="gmf-input-group">
                        <input type="tel" name="phone" required pattern="^01[3-9]\d{8}$" placeholder="১১ ডিজিটের মোবাইল নাম্বার (017XXXXXXXX) *" class="gmf-input" />
                    </div>
                    <div class="gmf-input-group" style="margin-bottom:0;">
                        <textarea name="address" required rows="2" placeholder="আপনার সম্পূর্ণ ঠিকানা (বাসা নং / রোড / থানা / জেলা) *" class="gmf-textarea"></textarea>
                    </div>
                </div>

                <!-- 2. Shipping Selector -->
                <div>
                    <div class="gmf-section-label">২. ডেলিভারি এলাকা নির্বাচন করুন</div>
                    <div class="gmf-shipping-grid">
                        <label class="gmf-ship-card active" onclick="gmfSelectShip(this, <?php echo esc_attr($ship_inside); ?>, '<?php echo esc_js($unique_form_id); ?>')">
                            <span style="display:flex; align-items:center;">
                                <input type="radio" name="shipping_cost" value="<?php echo esc_attr($ship_inside); ?>" checked />
                                <strong style="font-size:13px;">ঢাকার ভেতরে</strong>
                            </span>
                            <span style="font-weight:800; font-size:14px; color:<?php echo esc_attr($theme_color); ?>;">৳<?php echo esc_html($ship_inside); ?></span>
                        </label>

                        <label class="gmf-ship-card" onclick="gmfSelectShip(this, <?php echo esc_attr($ship_outside); ?>, '<?php echo esc_js($unique_form_id); ?>')">
                            <span style="display:flex; align-items:center;">
                                <input type="radio" name="shipping_cost" value="<?php echo esc_attr($ship_outside); ?>" />
                                <strong style="font-size:13px;">ঢাকার বাইরে</strong>
                            </span>
                            <span style="font-weight:800; font-size:14px; color:#475569;">৳<?php echo esc_html($ship_outside); ?></span>
                        </label>
                    </div>
                </div>

                <!-- 3. Dynamic Bill Summary -->
                <div class="gmf-summary-box">
                    <div class="gmf-summary-row">
                        <span>নির্বাচিত পণ্য: <strong><?php echo esc_html($prod_title); ?></strong></span>
                        <span>৳<?php echo number_format($prod_price); ?></span>
                    </div>
                    <div class="gmf-summary-row">
                        <span>হোম ডেলিভারি চার্জ:</span>
                        <span id="<?php echo esc_attr($unique_form_id); ?>_ship_display">৳<?php echo esc_html($ship_inside); ?></span>
                    </div>
                    <div class="gmf-total-row">
                        <span>সর্বমোট প্রদেয় বিল:</span>
                        <span class="gmf-total-val" id="<?php echo esc_attr($unique_form_id); ?>_total_display">৳<?php echo number_format($initial_total); ?></span>
                    </div>
                </div>

                <!-- 4. Submit Order Button -->
                <button type="submit" class="gmf-btn-submit" id="<?php echo esc_attr($unique_form_id); ?>_btn">
                    <span id="<?php echo esc_attr($unique_form_id); ?>_btntxt">অর্ডার কনফার্ম করুন</span>
                </button>
            </form>
        </div>

        <script>
            function gmfSelectShip(el, cost, formId) {
                const wrap = document.getElementById(formId + '_wrap');
                wrap.querySelectorAll('.gmf-ship-card').forEach(c => c.classList.remove('active'));
                el.classList.add('active');
                const radio = el.querySelector('input[type="radio"]');
                if (radio) radio.checked = true;

                const basePrice = <?php echo floatval($prod_price); ?>;
                const total = basePrice + cost;
                document.getElementById(formId + '_ship_display').innerText = '৳' + cost;
                document.getElementById(formId + '_total_display').innerText = '৳' + total.toLocaleString('en-US');
            }

            async function gmfSubmitOrder(e, formId) {
                e.preventDefault();
                const form = document.getElementById(formId);
                const btn = document.getElementById(formId + '_btn');
                const btnTxt = document.getElementById(formId + '_btntxt');
                const phoneInput = form.querySelector('input[name="phone"]');
                const phoneVal = phoneInput.value.trim();

                let clean = phoneVal.replace(/[^0-9]/g, '');
                if (clean.length === 13 && clean.startsWith('8801')) clean = clean.substring(2);

                if (clean.length !== 11 || !clean.startsWith('01')) {
                    if (typeof gmNotify === 'function') {
                        gmNotify('error', 'ফোন নাম্বার ভুল', 'অনুগ্রহ করে সঠিক ১১ ডিজিটের মোবাইল নাম্বার দিন (যেমন: 017XXXXXXXX)।');
                    } else {
                        alert('অনুগ্রহ করে সঠিক ১১ ডিজিটের মোবাইল নাম্বার দিন (যেমন: 017XXXXXXXX)।');
                    }
                    return;
                }

                btn.disabled = true;
                btnTxt.innerText = 'অর্ডার প্রসেস হচ্ছে...';

                const shipRadio = form.querySelector('input[name="shipping_cost"]:checked');
                const shipVal = shipRadio ? parseFloat(shipRadio.value) : <?php echo floatval($ship_inside); ?>;
                const shipArea = shipVal <= <?php echo floatval($ship_inside); ?> ? 'ঢাকার ভেতরে' : 'ঢাকার বাইরে';

                const fd = new FormData();
                fd.append('action', 'growthmark_quick_order');
                fd.append('product_id', form.querySelector('input[name="product_id"]').value);
                fd.append('product_name', form.querySelector('input[name="product_name"]').value);
                fd.append('product_price', form.querySelector('input[name="product_price"]').value);
                fd.append('name', form.querySelector('input[name="name"]').value.trim());
                fd.append('phone', clean);
                fd.append('address', form.querySelector('textarea[name="address"]').value.trim());
                fd.append('shipping_cost', shipVal);
                fd.append('shipping_area', shipArea);

                try {
                    const res = await fetch('<?php echo admin_url("admin-ajax.php"); ?>', { method: 'POST', body: fd });
                    const data = await res.json();
                    if (data && data.success) {
                        // Pixel & DataLayer Purchase Trigger
                        try {
                            if (typeof fbq === 'function') fbq('track', 'Purchase', { value: data.data.total, currency: 'BDT' });
                            if (window.dataLayer) window.dataLayer.push({ event: 'purchase', ecommerce: { transaction_id: data.data.order_id, value: data.data.total, currency: 'BDT' } });
                        } catch(e) {}

                        if (typeof gmNotify === 'function') {
                            gmNotify('success', 'অর্ডার সফল', 'আপনার অর্ডারটি সফল হয়েছে! অর্ডার আইডি: #' + data.data.order_id);
                        } else {
                            alert('আপনার অর্ডারটি সফল হয়েছে! অর্ডার আইডি: #' + data.data.order_id);
                        }
                        form.reset();
                    } else {
                        const errMsg = (data && data.data && data.data.message ? data.data.message : 'অর্ডার সম্পন্ন করা সম্ভব হয়নি।');
                        if (typeof gmNotify === 'function') {
                            gmNotify('error', 'অর্ডার ব্যর্থ', errMsg);
                        } else {
                            alert(errMsg);
                        }
                    }
                } catch(err) {
                    if (typeof gmNotify === 'function') {
                        gmNotify('error', 'নেটওয়ার্ক এরর', 'দয়া করে আবার চেষ্টা করুন।');
                    } else {
                        alert('নেটওয়ার্ক এরর। দয়া করে আবার চেষ্টা করুন।');
                    }
                } finally {
                    btn.disabled = false;
                    btnTxt.innerText = 'অর্ডার কনফার্ম করুন';
                }
            }
        </script>
        <?php
        return ob_get_clean();
    }
}

// Bootstrap GM Automate
add_action('plugins_loaded', function() {
    try {
        if (!class_exists('WooCommerce')) {
            return;
        }
        if (is_admin()) {
            GM_Admin_Controller::init();
            GM_WC_Order_Integration::init();
            new GM_GitHub_Updater(GM_AUTOMATE_FILE);
        }
        GM_Core_Engine::init();
    } catch (\Throwable $e) {}
});
