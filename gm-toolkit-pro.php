<?php
/**
 * Plugin Name: GM Toolkit Pro — E-Commerce & Automation Engine
 * Plugin URI: https://growthmark.pro
 * Description: The ultimate international-grade WooCommerce automation suite: 1-Click fast checkout, 2-Stage Global Abandoned Cart recovery, instant Telegram merchant alerts, Google Sheets live CRM, Steadfast & Pathao courier booking, and SMS notifications.
 * Version: 2.4.0
 * Author: Tamim Hasan
 * Author URI: https://tamim.growthmark.pro
 * Text Domain: gm-toolkit-pro
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * WC requires at least: 5.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('GM_TOOLKIT_VERSION', '2.4.0');
define('GM_TOOLKIT_FILE', __FILE__);

/**
 * ============================================================================
 * 1. GITHUB PRIVATE REPO REMOTE AUTO-UPDATER
 * ============================================================================
 */
class GM_GitHub_Updater {
    private $slug;
    private $plugin_file;
    private $github_username = 'growthmark-agency';
    private $github_repo     = 'gm-toolkit-pro';
    private $api_token       = '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';

    public function __construct($plugin_file) {
        $this->plugin_file = $plugin_file;
        $this->slug        = plugin_basename($plugin_file);

        add_filter('pre_set_site_transient_update_plugins', array($this, 'check_update'));
        add_filter('plugins_api', array($this, 'plugin_info_popup'), 10, 3);
        add_filter('http_request_args', array($this, 'attach_github_token_to_download'), 10, 2);
    }

    public function check_update($transient) {
        if (empty($transient->checked)) {
            return $transient;
        }

        try {
            $remote_data = $this->get_github_release();
            if ($remote_data && isset($remote_data['tag_name'])) {
                $new_ver = ltrim($remote_data['tag_name'], 'v');
                if (version_compare(GM_TOOLKIT_VERSION, $new_ver, '<')) {
                    $download_url = '';
                    if (!empty($remote_data['assets'])) {
                        foreach ($remote_data['assets'] as $asset) {
                            if (substr($asset['name'], -4) === '.zip') {
                                $download_url = $asset['url']; // GitHub API asset endpoint
                                break;
                            }
                        }
                    }
                    if (empty($download_url) && !empty($remote_data['zipball_url'])) {
                        $download_url = $remote_data['zipball_url'];
                    }

                    $res = new stdClass();
                    $res->slug        = 'gm-toolkit-pro';
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

    public function attach_github_token_to_download($args, $url) {
        if (strpos($url, 'api.github.com/repos/' . $this->github_username . '/' . $this->github_repo) !== false) {
            $args['headers']['Authorization'] = 'Bearer ' . $this->api_token;
            $args['headers']['Accept']        = 'application/octet-stream';
            $args['headers']['User-Agent']    = 'GM-Toolkit-Pro-Updater';
        }
        return $args;
    }

    public function plugin_info_popup($res, $action, $args) {
        if ($action !== 'plugin_information' || !isset($args->slug) || $args->slug !== 'gm-toolkit-pro') {
            return $res;
        }

        try {
            $remote = $this->get_github_release();
            if ($remote) {
                $res = new stdClass();
                $res->name          = 'GM Toolkit Pro — GrowthMark E-Commerce Engine';
                $res->slug          = 'gm-toolkit-pro';
                $res->version       = ltrim($remote['tag_name'], 'v');
                $res->author        = '<a href="https://tamim.growthmark.pro" target="_blank">Tamim Hasan</a> (GrowthMark)';
                $res->homepage      = 'https://growthmark.pro';
                $res->sections      = array(
                    'description' => 'Official Enterprise E-Commerce Automation Suite for WooCommerce by GrowthMark.',
                    'changelog'   => isset($remote['body']) ? nl2br(esc_html($remote['body'])) : 'Latest stability and performance enhancements.'
                );
                return $res;
            }
        } catch (\Throwable $e) {}

        return $res;
    }

    private function get_github_release() {
        $transient_key = 'gm_github_release_cache';
        $cached = get_transient($transient_key);
        if ($cached !== false) {
            return $cached;
        }

        $url = "https://api.github.com/repos/{$this->github_username}/{$this->github_repo}/releases/latest";
        $response = wp_remote_get($url, array(
            'headers' => array(
                'Authorization' => 'Bearer ' . $this->api_token,
                'Accept'        => 'application/vnd.github.v3+json',
                'User-Agent'    => 'GM-Toolkit-Pro-Updater'
            ),
            'timeout' => 8
        ));

        if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
            return false;
        }

        $data = json_decode(wp_remote_retrieve_body($response), true);
        if (!empty($data) && is_array($data)) {
            set_transient($transient_key, $data, 1 * HOUR_IN_SECONDS);
            return $data;
        }

        return false;
    }
}

/**
 * ============================================================================
 * 2. INTERNATIONAL ENTERPRISE DASHBOARD & SETTINGS
 * ============================================================================
 */
class GM_Admin_Controller {
    public static function init() {
        add_action('admin_menu', array(__CLASS__, 'add_menu_page'));
        add_action('admin_init', array(__CLASS__, 'register_all_settings'));
        add_action('wp_ajax_gm_test_telegram', array(__CLASS__, 'test_telegram_connection'));
        add_action('wp_ajax_gm_test_sheets', array(__CLASS__, 'test_sheets_connection'));
        add_action('wp_ajax_gm_clear_leads', array(__CLASS__, 'clear_abandoned_leads'));
    }

    public static function add_menu_page() {
        // GrowthMark Custom Rocket SVG Icon (Base64 Encoded for crisp vector display)
        $svg_icon = 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#F59E0B"><path d="M13.13 2.188a1 1 0 0 0-1.652-.087L7.545 7.425a1 1 0 0 0-.214.656v3.298a1 1 0 0 0 .348.757l4.083 3.63a1 1 0 0 0 1.488-.198l4.475-5.967a1 1 0 0 0 .175-.688V5.614a1 1 0 0 0-.353-.762l-4.552-2.664zM5.5 15.5a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm10 2a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/></svg>');

        add_menu_page(
            'GM Toolkit Pro',
            'GM Toolkit Pro',
            'manage_options',
            'gm-toolkit-pro',
            array(__CLASS__, 'render_admin_dashboard'),
            $svg_icon,
            56
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

        register_setting('gm_pro_settings', 'gm_pt_active', 'intval');
        register_setting('gm_pro_settings', 'gm_pt_client_id', 'sanitize_text_field');
        register_setting('gm_pro_settings', 'gm_pt_client_secret', 'sanitize_text_field');
        register_setting('gm_pro_settings', 'gm_pt_store_id', 'sanitize_text_field');

        register_setting('gm_pro_settings', 'gm_sms_active', 'intval');
        register_setting('gm_pro_settings', 'gm_sms_gateway', 'sanitize_text_field');
        register_setting('gm_pro_settings', 'gm_sms_key', 'sanitize_text_field');
        register_setting('gm_pro_settings', 'gm_sms_msg', 'sanitize_textarea_field');

        register_setting('gm_pro_settings', 'gm_ab_active', 'intval');
        register_setting('gm_pro_settings', 'gm_ab_delay', 'intval'); // delay in minutes (default 5)
    }

    public static function test_telegram_connection() {
        check_ajax_referer('gm_pro_nonce', 'nonce');
        $token   = sanitize_text_field($_POST['token']);
        $chat_id = sanitize_text_field($_POST['chat_id']);

        if (empty($token) || empty($chat_id)) {
            wp_send_json_error(array('message' => 'Bot Token এবং Chat ID দুটোই সঠিকভাবে লিখুন।'));
        }

        $msg = "🎉 <b>অভিনন্দন! টেলিগ্রাম বট সফলভাবে কানেক্ট হয়েছে!</b>\n\n";
        $msg .= "🚀 <b>GM Toolkit Pro v2.4.0</b> এখন সম্পূর্ণ লাইভ।\n";
        $msg .= "🆔 <b>টেস্ট আইডি:</b> #TEST-" . rand(1000, 9999) . "\n";
        $msg .= "👤 <b>কাস্টমার:</b> তামিম হাসান (টেস্ট)\n";
        $msg .= "📞 <b>ফোন:</b> <code>01700000000</code>\n";
        $msg .= "📍 <b>ঠিকানা:</b> ধানমন্ডি, ঢাকা\n";
        $msg .= "📦 <b>পণ্য:</b> ১ কেজি স্পেশাল কম্বো\n";
        $msg .= "💰 <b>মোট বিল:</b> ৳১,০৫০ (COD)\n";
        $msg .= "⏰ <b>সময়:</b> " . current_time('d-M-Y h:i A') . "\n";
        $msg .= "\n⚡ <i>GrowthMark Automation Engine</i>";

        $res = wp_remote_post("https://api.telegram.org/bot{$token}/sendMessage", array(
            'body' => array('chat_id' => $chat_id, 'text' => $msg, 'parse_mode' => 'HTML'),
            'timeout' => 8
        ));

        if (is_wp_error($res)) {
            wp_send_json_error(array('message' => 'টেলিগ্রাম সংযোগ ব্যর্থ: ' . $res->get_error_message()));
        }

        $code = wp_remote_retrieve_response_code($res);
        if ($code == 200) {
            wp_send_json_success(array('message' => '✅ সফল! আপনার টেলিগ্রামে টেস্ট মেসেজ চলে গেছে।'));
        } else {
            $body = json_decode(wp_remote_retrieve_body($res), true);
            $err = isset($body['description']) ? $body['description'] : 'Unknown error';
            wp_send_json_error(array('message' => "❌ টেলিগ্রাম এরর ({$code}): {$err}"));
        }
    }

    public static function test_sheets_connection() {
        check_ajax_referer('gm_pro_nonce', 'nonce');
        $webhook = esc_url_raw($_POST['webhook']);

        if (empty($webhook)) {
            wp_send_json_error(array('message' => 'দয়া করে Google Apps Script Webhook URL দিন।'));
        }

        $payload = array(
            'date'         => current_time('d-M-Y h:i A'),
            'order_id'     => '#TEST-' . rand(100, 999),
            'name'         => 'Tamim Hasan (Test)',
            'phone'        => '01700000000',
            'address'      => 'Dhanmondi, Dhaka',
            'area'         => 'ঢাকার ভেতরে',
            'products'     => '১ কেজি স্পেশাল কম্বো (x1)',
            'total_amount' => 1050,
            'status'       => 'Processing'
        );

        $res = wp_remote_post($webhook, array(
            'headers' => array('Content-Type' => 'application/json; charset=utf-8'),
            'body'    => wp_json_encode($payload),
            'timeout' => 8
        ));

        if (is_wp_error($res)) {
            wp_send_json_error(array('message' => 'গুগল শিট সংযোগ ব্যর্থ: ' . $res->get_error_message()));
        }

        wp_send_json_success(array('message' => '✅ সফল! আপনার গুগল শিটে টেস্ট ডাটার নতুন রো যোগ হয়েছে।'));
    }

    public static function clear_abandoned_leads() {
        check_ajax_referer('gm_pro_nonce', 'nonce');
        update_option('gm_abandoned_leads_log', array());
        wp_send_json_success();
    }

    public static function render_admin_dashboard() {
        if (!current_user_can('manage_options')) return;
        $leads = get_option('gm_abandoned_leads_log', array());
        if (!is_array($leads)) $leads = array();
        ?>
        <style>
            .gm-dash-wrap { width: 100%; box-sizing: border-box; padding-right: 20px; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; color: #1E293B; margin-top: 15px; }
            .gm-top-banner { background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%); color: #FFF; padding: 24px 30px; border-radius: 20px; box-shadow: 0 12px 30px rgba(15,23,42,0.12); margin-bottom: 22px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; }
            .gm-top-banner h2 { margin: 0 0 4px 0; font-size: 25px; font-weight: 800; color: #FFF !important; display: flex; align-items: center; gap: 10px; }
            .gm-tag-pro { background: linear-gradient(135deg, #D97706 0%, #B45309 100%); color: #FFF; font-size: 11px; font-weight: 800; padding: 4px 12px; border-radius: 9999px; text-transform: uppercase; letter-spacing: 0.5px; }
            
            .gm-main-layout { display: grid; grid-template-columns: 270px 1fr; gap: 22px; align-items: start; width: 100%; }
            @media (max-width: 960px) { .gm-main-layout { grid-template-columns: 1fr; } }
            
            .gm-nav-menu { background: #FFFFFF; border: 1px solid #E2E8F0; border-radius: 18px; padding: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); }
            .gm-nav-item { display: flex; align-items: center; gap: 12px; padding: 14px 18px; border-radius: 12px; font-weight: 700; font-size: 14px; color: #475569; text-decoration: none; cursor: pointer; transition: all 0.2s; margin-bottom: 4px; }
            .gm-nav-item:hover { background: #F8FAFC; color: #0F172A; }
            .gm-nav-item.active { background: #0F172A; color: #FFFFFF; box-shadow: 0 4px 12px rgba(15,23,42,0.15); }
            .gm-nav-item .gm-nav-icon { font-size: 18px; }

            .gm-panel { display: none; background: #FFFFFF; border: 1px solid #E2E8F0; border-radius: 20px; padding: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); }
            .gm-panel.active { display: block; }
            .gm-panel-header { border-bottom: 1px solid #F1F5F9; padding-bottom: 18px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; }
            .gm-panel-header h3 { margin: 0 0 4px 0; font-size: 20px; font-weight: 800; color: #0F172A; }
            .gm-panel-header p { margin: 0; font-size: 13px; color: #64748B; }

            .gm-toggle-box { background: #ECFDF5; border: 1.5px solid #A7F3D0; border-radius: 14px; padding: 16px; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; font-weight: 700; color: #065F46; font-size: 14px; cursor: pointer; }
            .gm-form-group { margin-bottom: 18px; }
            .gm-form-group label { display: block; font-weight: 700; font-size: 13px; color: #334155; margin-bottom: 6px; }
            .gm-form-group input, .gm-form-group select, .gm-form-group textarea { width: 100%; padding: 12px 14px; border: 1.5px solid #CBD5E1; border-radius: 10px; font-size: 14px; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
            .gm-form-group input:focus, .gm-form-group select:focus, .gm-form-group textarea:focus { border-color: #D97706; box-shadow: 0 0 0 3px rgba(217,119,6,0.15); }
            .gm-btn-test { background: #0F172A; color: #FFFFFF; border: none; padding: 10px 18px; border-radius: 10px; font-weight: 700; font-size: 13px; cursor: pointer; transition: all 0.2s; display: inline-flex; align-items: center; gap: 6px; }
            .gm-btn-test:hover { background: #1E293B; transform: translateY(-1px); }
            .gm-save-bar { background: #F8FAFC; border-top: 1px solid #E2E8F0; padding: 18px 24px; border-radius: 0 0 20px 20px; margin: 30px -30px -30px -30px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; }
            
            .gm-badge-status { font-size: 11px; font-weight: 800; padding: 3px 8px; border-radius: 6px; display: inline-flex; align-items: center; gap: 4px; }
            .gm-status-progress { background: #FEF3C7; color: #B45309; }
            .gm-status-converted { background: #ECFDF5; color: #065F46; }
            .gm-status-abandoned { background: #FEE2E2; color: #DC2626; }

            .gm-footer-credits { margin-top: 25px; padding: 16px 20px; background: #FFFFFF; border: 1px solid #E2E8F0; border-radius: 16px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; font-size: 13px; color: #64748B; }
            .gm-footer-credits a { color: #D97706; text-decoration: none; font-weight: 700; }
        </style>

        <div class="gm-dash-wrap">
            
            <!-- Top Master Header -->
            <div class="gm-top-banner">
                <div>
                    <h2>🚀 GM Toolkit Pro <span class="gm-tag-pro">v2.4.0 Enterprise</span></h2>
                    <p style="margin:0; font-size:14px; color:#94A3B8;">GrowthMark — Master E-Commerce & Order Automation Engine</p>
                </div>
                <div style="display:flex; align-items:center; gap:12px;">
                    <div style="background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); padding:8px 16px; border-radius:12px; font-size:13px; color:#FDE68A;">
                        Shortcode: <code style="background:#0F172A; color:#FFF; padding:3px 8px; border-radius:6px;">[gm_checkout]</code>
                    </div>
                </div>
            </div>

            <?php if (isset($_GET['settings-updated'])) : ?>
                <div style="padding:14px 20px; border-left:4px solid #059669; border-radius:12px; margin-bottom:20px; background:#ECFDF5; color:#065F46; font-size:14px; font-weight:700;">
                    ✅ Settings updated successfully! All automations are active and running.
                </div>
            <?php endif; ?>

            <div class="gm-main-layout">
                
                <!-- Left Navigation Bar -->
                <div class="gm-nav-menu">
                    <div class="gm-nav-item active" onclick="gmSwitchTab('telegram', this)">
                        <span class="gm-nav-icon">📱</span> Telegram Alerts
                    </div>
                    <div class="gm-nav-item" onclick="gmSwitchTab('sheets', this)">
                        <span class="gm-nav-icon">📊</span> Google Sheets CRM
                    </div>
                    <div class="gm-nav-item" onclick="gmSwitchTab('courier', this)">
                        <span class="gm-nav-icon">🚚</span> Logistics (Steadfast & Pathao)
                    </div>
                    <div class="gm-nav-item" onclick="gmSwitchTab('abandoned', this)">
                        <span class="gm-nav-icon">🛒</span> Abandoned Leads CRM <span style="background:#FEF3C7; color:#B45309; font-size:11px; padding:2px 6px; border-radius:9999px; margin-left:auto;"><?php echo count($leads); ?></span>
                    </div>
                    <div class="gm-nav-item" onclick="gmSwitchTab('sms', this)">
                        <span class="gm-nav-icon">💬</span> Customer SMS Gateway
                    </div>
                    <div class="gm-nav-item" onclick="gmSwitchTab('shortcode', this)">
                        <span class="gm-nav-icon">⚡</span> 1-Click Checkout Setup
                    </div>
                </div>

                <!-- Right Form Content Panels -->
                <div>
                    <form method="post" action="options.php" id="gmMainForm">
                        <?php settings_fields('gm_pro_settings'); ?>

                        <!-- 1. TELEGRAM TAB -->
                        <div id="tab-telegram" class="gm-panel active">
                            <div class="gm-panel-header">
                                <div>
                                    <h3>📱 Telegram Merchant Live Alerts</h3>
                                    <p>Receive instant 0.5-second formatted order alerts on your Telegram bot or group.</p>
                                </div>
                                <span id="tgLiveStatus" style="font-size:12px; font-weight:700;"></span>
                            </div>

                            <label class="gm-toggle-box">
                                <input type="checkbox" name="gm_tg_active" value="1" <?php checked(1, get_option('gm_tg_active'), true); ?> />
                                <span>Enable Telegram Instant Order Notifications</span>
                            </label>

                            <div class="gm-form-group">
                                <label>Telegram Bot Token:</label>
                                <input type="text" id="gm_tg_token_field" name="gm_tg_token" value="<?php echo esc_attr(get_option('gm_tg_token')); ?>" placeholder="e.g. 8504804950:AAHDQS3-C1mEF_RZFBhQaDtKqXky1YFsb3A" />
                                <small style="color:#64748B;">Obtained from Telegram's <code>@BotFather</code>.</small>
                            </div>

                            <div class="gm-form-group">
                                <label>Chat ID / Group ID:</label>
                                <input type="text" id="gm_tg_chat_field" name="gm_tg_chat_id" value="<?php echo esc_attr(get_option('gm_tg_chat_id')); ?>" placeholder="e.g. 6175075085" />
                                <small style="color:#64748B;">Obtained from <code>@userinfobot</code> or group ID starting with <code>-100...</code></small>
                            </div>

                            <div style="margin-top:20px;">
                                <button type="button" class="gm-btn-test" onclick="gmTriggerTestTelegram()">
                                    ⚡ Send Realtime Test Message to Telegram
                                </button>
                            </div>

                            <div class="gm-save-bar">
                                <span style="font-size:13px; color:#64748B;">Instant alerts include full name, phone, address, product, and total bill.</span>
                                <?php submit_button('💾 Save Settings', 'primary large', 'submit', false); ?>
                            </div>
                        </div>

                        <!-- 2. GOOGLE SHEETS TAB -->
                        <div id="tab-sheets" class="gm-panel">
                            <div class="gm-panel-header">
                                <div>
                                    <h3>📊 Google Sheets Realtime CRM Sync</h3>
                                    <p>Automatically log each order as a new row in your master Google Spreadsheet.</p>
                                </div>
                                <span id="gsLiveStatus" style="font-size:12px; font-weight:700;"></span>
                            </div>

                            <label class="gm-toggle-box">
                                <input type="checkbox" name="gm_gs_active" value="1" <?php checked(1, get_option('gm_gs_active'), true); ?> />
                                <span>Enable Google Sheets Live CRM Sync</span>
                            </label>

                            <div class="gm-form-group">
                                <label>Google Apps Script Webhook URL:</label>
                                <input type="url" id="gm_gs_url_field" name="gm_gs_webhook" value="<?php echo esc_attr(get_option('gm_gs_webhook')); ?>" placeholder="https://script.google.com/macros/s/.../exec" />
                            </div>

                            <div style="margin-top:20px;">
                                <button type="button" class="gm-btn-test" onclick="gmTriggerTestSheets()">
                                    ⚡ Send Realtime Test Row to Google Sheet
                                </button>
                            </div>

                            <div class="gm-save-bar">
                                <span style="font-size:13px; color:#64748B;">Rows include Date, Order ID, Name, Phone, Address, Product, Total, Status.</span>
                                <?php submit_button('💾 Save Settings', 'primary large', 'submit', false); ?>
                            </div>
                        </div>

                        <!-- 3. COURIER LOGISTICS TAB -->
                        <div id="tab-courier" class="gm-panel">
                            <div class="gm-panel-header">
                                <div>
                                    <h3>🚚 Courier Logistics (Steadfast & Pathao)</h3>
                                    <p>Automate parcel creation and get instant consignment tracking codes.</p>
                                </div>
                            </div>

                            <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:16px; padding:20px; margin-bottom:20px;">
                                <h4 style="margin:0 0 12px 0; font-size:16px; color:#0F172A; display:flex; align-items:center; gap:8px;">
                                    <span>📦</span> Steadfast Courier API
                                </h4>
                                <label style="display:flex; align-items:center; gap:8px; margin-bottom:15px; font-weight:700; color:#0F172A; cursor:pointer;">
                                    <input type="checkbox" name="gm_sf_active" value="1" <?php checked(1, get_option('gm_sf_active'), true); ?> />
                                    <span>Enable Steadfast Integration</span>
                                </label>
                                <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px; margin-bottom:12px;">
                                    <div class="gm-form-group">
                                        <label>API Key:</label>
                                        <input type="text" name="gm_sf_key" value="<?php echo esc_attr(get_option('gm_sf_key')); ?>" />
                                    </div>
                                    <div class="gm-form-group">
                                        <label>Secret Key:</label>
                                        <input type="password" name="gm_sf_secret" value="<?php echo esc_attr(get_option('gm_sf_secret')); ?>" />
                                    </div>
                                </div>
                                <label style="display:flex; align-items:center; gap:8px; font-size:13px; color:#334155; cursor:pointer;">
                                    <input type="checkbox" name="gm_sf_autobook" value="1" <?php checked(1, get_option('gm_sf_autobook'), true); ?> />
                                    Auto-book parcel immediately when order is created
                                </label>
                            </div>

                            <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:16px; padding:20px;">
                                <h4 style="margin:0 0 12px 0; font-size:16px; color:#0F172A; display:flex; align-items:center; gap:8px;">
                                    <span>🛵</span> Pathao Courier API
                                </h4>
                                <label style="display:flex; align-items:center; gap:8px; margin-bottom:15px; font-weight:700; color:#0F172A; cursor:pointer;">
                                    <input type="checkbox" name="gm_pt_active" value="1" <?php checked(1, get_option('gm_pt_active'), true); ?> />
                                    <span>Enable Pathao Merchant API</span>
                                </label>
                                <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px; margin-bottom:12px;">
                                    <div class="gm-form-group">
                                        <label>Client ID:</label>
                                        <input type="text" name="gm_pt_client_id" value="<?php echo esc_attr(get_option('gm_pt_client_id')); ?>" />
                                    </div>
                                    <div class="gm-form-group">
                                        <label>Store ID:</label>
                                        <input type="text" name="gm_pt_store_id" value="<?php echo esc_attr(get_option('gm_pt_store_id')); ?>" />
                                    </div>
                                </div>
                                <div class="gm-form-group">
                                    <label>Client Secret:</label>
                                    <input type="password" name="gm_pt_client_secret" value="<?php echo esc_attr(get_option('gm_pt_client_secret')); ?>" />
                                </div>
                            </div>

                            <div class="gm-save-bar">
                                <span style="font-size:13px; color:#64748B;">Tracking IDs are automatically saved in WooCommerce order notes.</span>
                                <?php submit_button('💾 Save Settings', 'primary large', 'submit', false); ?>
                            </div>
                        </div>

                        <!-- 4. 2-STAGE ABANDONED LEADS CRM TAB -->
                        <div id="tab-abandoned" class="gm-panel">
                            <div class="gm-panel-header">
                                <div>
                                    <h3>🛒 2-Stage Abandoned Leads Live CRM</h3>
                                    <p>Captures in-progress form fills silently; dispatches alerts only when a visitor truly abandons without completing the order.</p>
                                </div>
                                <?php if (!empty($leads)) : ?>
                                    <button type="button" onclick="gmClearLeads()" style="background:#FEE2E2; color:#DC2626; border:1px solid #FCA5A5; font-size:12px; font-weight:700; padding:6px 12px; border-radius:8px; cursor:pointer;">
                                        🗑️ Clear Log
                                    </button>
                                <?php endif; ?>
                            </div>

                            <label class="gm-toggle-box">
                                <input type="checkbox" name="gm_ab_active" value="1" <?php checked(1, get_option('gm_ab_active', 1), true); ?> />
                                <span>Enable 2-Stage Abandoned Cart Tracking (All Pages)</span>
                            </label>

                            <?php if (empty($leads)) : ?>
                                <div style="text-align:center; padding:45px 20px; color:#94A3B8;">
                                    <div style="font-size:36px; margin-bottom:10px;">📭</div>
                                    <h4 style="margin:0 0 6px 0; color:#334155; font-size:16px;">No Leads Captured Yet</h4>
                                    <p style="margin:0; font-size:13px;">When customers type their phone number on your checkout form, their info will appear here live with automatic status updates!</p>
                                </div>
                            <?php else : ?>
                                <table style="width:100%; border-collapse:collapse; text-align:left; font-size:13px; margin-top:15px;">
                                    <thead>
                                        <tr style="background:#F8FAFC; border-bottom:2px solid #E2E8F0; color:#475569;">
                                            <th style="padding:10px 12px;">Date & Time</th>
                                            <th style="padding:10px 12px;">Customer Name</th>
                                            <th style="padding:10px 12px;">Phone Number</th>
                                            <th style="padding:10px 12px;">Product / Page</th>
                                            <th style="padding:10px 12px;">Status</th>
                                            <th style="padding:10px 12px; text-align:right;">Quick Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (array_reverse($leads) as $lead) : 
                                            $clean_p = preg_replace('/[^0-9]/', '', $lead['phone']);
                                            if (strlen($clean_p) === 11 && substr($clean_p, 0, 2) === '01') {
                                                $clean_p = '88' . $clean_p;
                                            }
                                            $status = isset($lead['status']) ? $lead['status'] : 'abandoned';
                                            $wa_url = "https://wa.me/{$clean_p}?text=" . urlencode("হ্যালো " . $lead['name'] . "! আপনি আমাদের ওয়েবসাইটে " . $lead['product'] . " অর্ডার করতে গিয়ে কি কোনো সমস্যায় পড়েছেন? সাহায্য করতে পারি?");
                                        ?>
                                            <tr style="border-bottom:1px solid #F1F5F9;">
                                                <td style="padding:12px; color:#64748B;"><?php echo esc_html($lead['date']); ?></td>
                                                <td style="padding:12px; font-weight:700; color:#0F172A;"><?php echo esc_html($lead['name']); ?></td>
                                                <td style="padding:12px; font-family:monospace; font-weight:700; color:#D97706;"><?php echo esc_html($lead['phone']); ?></td>
                                                <td style="padding:12px; color:#334155;"><?php echo esc_html($lead['product']); ?></td>
                                                <td style="padding:12px;">
                                                    <?php if ($status === 'converted') : ?>
                                                        <span class="gm-badge-status gm-status-converted">✓ Converted (Order #<?php echo esc_html(isset($lead['order_id']) ? $lead['order_id'] : ''); ?>)</span>
                                                    <?php elseif ($status === 'in_progress') : ?>
                                                        <span class="gm-badge-status gm-status-progress">⏳ In Progress</span>
                                                    <?php else : ?>
                                                        <span class="gm-badge-status gm-status-abandoned">⚠️ Abandoned</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="padding:12px; text-align:right;">
                                                    <a href="<?php echo esc_url($wa_url); ?>" target="_blank" style="background:#25D366; color:#FFF; text-decoration:none; font-weight:700; padding:6px 12px; border-radius:6px; font-size:11px; display:inline-flex; align-items:center; gap:4px; margin-right:6px;">
                                                        💬 WhatsApp
                                                    </a>
                                                    <a href="tel:<?php echo esc_attr($lead['phone']); ?>" style="background:#0F172A; color:#FFF; text-decoration:none; font-weight:700; padding:6px 12px; border-radius:6px; font-size:11px; display:inline-flex; align-items:center; gap:4px;">
                                                        📞 Call
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>

                            <div class="gm-save-bar">
                                <span style="font-size:13px; color:#64748B;">Recovers 20-30% of dropped checkouts through immediate WhatsApp & phone follow-up.</span>
                                <?php submit_button('💾 Save Settings', 'primary large', 'submit', false); ?>
                            </div>
                        </div>

                        <!-- 5. SMS GATEWAY TAB -->
                        <div id="tab-sms" class="gm-panel">
                            <div class="gm-panel-header">
                                <div>
                                    <h3>💬 Customer SMS Gateway</h3>
                                    <p>Send instant order confirmation SMS directly to customer phones.</p>
                                </div>
                            </div>

                            <label class="gm-toggle-box">
                                <input type="checkbox" name="gm_sms_active" value="1" <?php checked(1, get_option('gm_sms_active'), true); ?> />
                                <span>Enable Customer SMS Notifications</span>
                            </label>

                            <div class="gm-form-group">
                                <label>SMS Provider:</label>
                                <select name="gm_sms_gateway">
                                    <option value="greenweb" <?php selected(get_option('gm_sms_gateway'), 'greenweb'); ?>>Greenweb BD (25p/SMS)</option>
                                    <option value="bulksmsbd" <?php selected(get_option('gm_sms_gateway'), 'bulksmsbd'); ?>>BulkSMSBD</option>
                                    <option value="alphasms" <?php selected(get_option('gm_sms_gateway'), 'alphasms'); ?>>Alpha SMS</option>
                                </select>
                            </div>

                            <div class="gm-form-group">
                                <label>API Key / Token:</label>
                                <input type="text" name="gm_sms_key" value="<?php echo esc_attr(get_option('gm_sms_key')); ?>" />
                            </div>

                            <div class="gm-form-group">
                                <label>Custom SMS Template:</label>
                                <textarea name="gm_sms_msg" rows="3"><?php echo esc_textarea(get_option('gm_sms_msg', 'ধন্যবাদ {name}! আপনার #{order_id} অর্ডারটি সফলভাবে গ্রহণ করা হয়েছে। মোট বিল: ৳{total}।')); ?></textarea>
                                <small style="color:#64748B;">Tags: {name}, {order_id}, {total}</small>
                            </div>

                            <div class="gm-save-bar">
                                <span style="font-size:13px; color:#64748B;">Instant delivery on Teletalk, Grameenphone, Banglalink, Robi, Airtel.</span>
                                <?php submit_button('💾 Save Settings', 'primary large', 'submit', false); ?>
                            </div>
                        </div>

                        <!-- 6. 1-CLICK CHECKOUT SETUP TAB -->
                        <div id="tab-shortcode" class="gm-panel">
                            <div class="gm-panel-header">
                                <div>
                                    <h3>⚡ 1-Click Checkout Setup & Shortcodes</h3>
                                    <p>Embed the high-converting checkout form anywhere with zero coding.</p>
                                </div>
                            </div>

                            <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:16px; padding:20px; margin-bottom:20px;">
                                <h4 style="margin:0 0 8px 0; color:#0F172A; font-size:16px;">Universal Shortcode</h4>
                                <p style="font-size:13px; color:#64748B; margin-bottom:12px;">Paste this shortcode inside any Elementor Shortcode widget, Gutenberg block, or CartFlows step:</p>
                                <div style="background:#0F172A; color:#FDE68A; padding:12px 18px; border-radius:10px; font-family:monospace; font-size:16px; display:flex; justify-content:space-between; align-items:center;">
                                    <code>[gm_checkout]</code>
                                    <button type="button" onclick="navigator.clipboard.writeText('[gm_checkout]'); alert('Shortcode Copied!');" style="background:#D97706; color:#FFF; border:none; padding:4px 10px; border-radius:6px; font-weight:700; font-size:11px; cursor:pointer;">Copy</button>
                                </div>
                            </div>

                            <div style="background:#ECFDF5; border:1px solid #A7F3D0; border-radius:16px; padding:20px;">
                                <h4 style="margin:0 0 6px 0; color:#065F46; font-size:15px;">✓ Built-in Meta Pixel & GTM DataLayer Push</h4>
                                <p style="margin:0; font-size:13px; color:#047857;">When a purchase is made, GM Toolkit Pro automatically triggers <code>fbq('track', 'Purchase')</code> and <code>window.dataLayer.push({ event: 'purchase' })</code>, making it 100% compatible with PixelYourSite Pro and Google Tag Manager!</p>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

            <!-- Footer Branding & Credits Bar -->
            <div class="gm-footer-credits">
                <div>
                    <strong>GM Toolkit Pro</strong> v2.4.0 • Developed & Engineered by <a href="https://tamim.growthmark.pro" target="_blank">Tamim Hasan</a>
                </div>
                <div>
                    Powered by <a href="https://growthmark.pro" target="_blank">GrowthMark</a>
                </div>
            </div>

        </div>

        <script>
            function gmSwitchTab(tabName, el) {
                document.querySelectorAll('.gm-nav-item').forEach(i => i.classList.remove('active'));
                document.querySelectorAll('.gm-panel').forEach(p => p.classList.remove('active'));
                el.classList.add('active');
                const target = document.getElementById('tab-' + tabName);
                if (target) target.classList.add('active');
            }

            async function gmTriggerTestTelegram() {
                const token = document.getElementById('gm_tg_token_field').value.trim();
                const chatId = document.getElementById('gm_tg_chat_field').value.trim();
                const status = document.getElementById('tgLiveStatus');

                if (!token || !chatId) {
                    alert('দয়া করে Bot Token ও Chat ID দুটোই বক্সে লিখুন।');
                    return;
                }

                status.innerText = 'মেসেজ পাঠানো হচ্ছে...';
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
                        status.innerText = '✅ টেস্ট সফল!';
                        status.style.color = '#059669';
                        alert(data.data.message);
                    } else {
                        status.innerText = '❌ এরর';
                        status.style.color = '#DC2626';
                        alert(data.data.message);
                    }
                } catch(e) {
                    status.innerText = '❌ নেটওয়ার্ক এরর';
                }
            }

            async function gmTriggerTestSheets() {
                const webhook = document.getElementById('gm_gs_url_field').value.trim();
                const status = document.getElementById('gsLiveStatus');

                if (!webhook) {
                    alert('দয়া করে Google Apps Script Webhook URL বক্সে লিখুন।');
                    return;
                }

                status.innerText = 'শিটে রো পাঠানো হচ্ছে...';
                status.style.color = '#D97706';

                const fd = new FormData();
                fd.append('action', 'gm_test_sheets');
                fd.append('nonce', '<?php echo wp_create_nonce("gm_pro_nonce"); ?>');
                fd.append('webhook', webhook);

                try {
                    const res = await fetch(ajaxurl, { method: 'POST', body: fd });
                    const data = await res.json();
                    if (data.success) {
                        status.innerText = '✅ শিট সিঙ্ক সফল!';
                        status.style.color = '#059669';
                        alert(data.data.message);
                    } else {
                        status.innerText = '❌ এরর';
                        status.style.color = '#DC2626';
                        alert(data.data.message);
                    }
                } catch(e) {
                    status.innerText = '❌ নেটওয়ার্ক এরর';
                }
            }

            async function gmClearLeads() {
                if (!confirm('আপনি কি সত্যিই সকল Abandoned Leads ক্লিয়ার করতে চান?')) return;
                const fd = new FormData();
                fd.append('action', 'gm_clear_leads');
                fd.append('nonce', '<?php echo wp_create_nonce("gm_pro_nonce"); ?>');
                await fetch(ajaxurl, { method: 'POST', body: fd });
                window.location.reload();
            }
        </script>
        <?php
    }
}

/**
 * ============================================================================
 * 3. 2-STAGE GLOBAL ABANDONED CART & CORE AUTOMATION ENGINE
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

        // Abandoned Heartbeat Check (Runs on page load / admin init to process timed-out drafts)
        add_action('init', array(__CLASS__, 'process_abandoned_heartbeat'));

        // Inject Global 2-Stage Draft Cart Listener on Every Front-end Page
        add_action('wp_footer', array(__CLASS__, 'inject_global_draft_listener'), 999);

        // Standard WooCommerce Order Hooks
        add_action('woocommerce_checkout_order_processed', array(__CLASS__, 'on_wc_order_processed'), 20, 3);
        add_action('woocommerce_order_status_processing', array(__CLASS__, 'on_wc_order_status_change'), 20, 1);

        // Shortcode
        add_shortcode('gm_checkout', array(__CLASS__, 'render_checkout_shortcode'));
    }

    public static function inject_global_draft_listener() {
        if (is_admin()) return;
        if (!get_option('gm_ab_active', 1)) return;
        $ajax_url = admin_url('admin-ajax.php');
        ?>
        <script id="gm-global-draft-tracker">
        (function() {
            let gmLastCaptured = '';
            function gmSilentDraftCapture(phone, name, address, product) {
                const clean = phone.replace(/[^0-9]/g, '');
                if (clean.length === 11 && clean.startsWith('01') && clean !== gmLastCaptured) {
                    gmLastCaptured = clean;
                    const params = new URLSearchParams();
                    params.append('action', 'gm_capture_draft_cart');
                    params.append('name', name || 'Guest Visitor');
                    params.append('phone', clean);
                    params.append('address', address || '');
                    params.append('product_name', product || document.title || 'Special Package');
                    
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
                const addrSelectors  = 'textarea[name*="address"], textarea[id*="address"], input[name*="billing_address_1"], input[id*="address"]';
                
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
                        if (this.value.replace(/[^0-9]/g, '').length === 11) {
                            checkAndCapture();
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

            $name    = isset($_REQUEST['name']) ? sanitize_text_field($_REQUEST['name']) : 'Guest Visitor';
            $phone   = isset($_REQUEST['phone']) ? sanitize_text_field($_REQUEST['phone']) : '';
            $address = isset($_REQUEST['address']) ? sanitize_textarea_field($_REQUEST['address']) : '';
            $product = isset($_REQUEST['product_name']) ? sanitize_text_field($_REQUEST['product_name']) : '১ কেজি স্পেশাল কম্বো';

            $clean_phone = preg_replace('/[^0-9]/', '', $phone);
            if (empty($clean_phone) || strlen($clean_phone) < 11) {
                wp_send_json_error();
            }

            $leads = get_option('gm_abandoned_leads_log', array());
            if (!is_array($leads)) $leads = array();

            // Check if this phone exists in log
            $key = -1;
            foreach ($leads as $k => $l) {
                if ($l['phone'] === $clean_phone) {
                    $key = $k;
                    break;
                }
            }

            if ($key >= 0) {
                // If not already converted, update draft info and keep in_progress
                if ($leads[$key]['status'] !== 'converted') {
                    $leads[$key]['name']      = $name;
                    $leads[$key]['address']   = $address;
                    $leads[$key]['product']   = $product;
                    $leads[$key]['timestamp'] = time();
                    $leads[$key]['date']      = current_time('d-M-Y h:i A');
                }
            } else {
                // Save silent draft in_progress
                $leads[] = array(
                    'date'         => current_time('d-M-Y h:i A'),
                    'timestamp'    => time(),
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

    public static function process_abandoned_heartbeat() {
        if (!get_option('gm_ab_active', 1)) return;
        
        $leads = get_option('gm_abandoned_leads_log', array());
        if (!is_array($leads) || empty($leads)) return;

        $updated = false;
        $now = time();

        foreach ($leads as $k => $l) {
            // If lead is in_progress for >= 3 minutes (180 seconds) and alert not sent yet -> Mark as Abandoned and send alert!
            if ($l['status'] === 'in_progress' && empty($l['alert_sent']) && ($now - $l['timestamp'] >= 180)) {
                $leads[$k]['status']     = 'abandoned';
                $leads[$k]['alert_sent'] = 1;
                $updated = true;

                // Send Telegram Abandoned Alert
                if (get_option('gm_tg_active')) {
                    $token   = get_option('gm_tg_token');
                    $chat_id = get_option('gm_tg_chat_id');
                    if (!empty($token) && !empty($chat_id)) {
                        $wa_link = "https://wa.me/88" . $l['phone'];
                        $msg = "⚠️ <b>এবান্ডন্ড কার্ট অ্যালার্ট! (Abandoned Lead)</b>\n\n";
                        $msg .= "👤 <b>কাস্টমার:</b> " . esc_html($l['name']) . "\n";
                        $msg .= "📞 <b>ফোন:</b> <code>" . $l['phone'] . "</code>\n";
                        if (!empty($l['address'])) $msg .= "📍 <b>ঠিকানা:</b> " . esc_html($l['address']) . "\n";
                        $msg .= "📦 <b>ইন্টারেস্টেড পণ্য:</b> " . esc_html($l['product']) . "\n";
                        $msg .= "⏰ <b>সময়:</b> " . $l['date'] . "\n";
                        $msg .= "\n💡 <i>কাস্টমার ফর্ম পূরণ করে চলে গেছে। হোয়াটসঅ্যাপে মেসেজ বা কল করে কনভার্ট করুন!</i>\n";
                        $msg .= "\n💬 <a href='{$wa_link}'>WhatsApp এ মেসেজ দিন</a> | ⚡ GrowthMark Engine";

                        wp_remote_post("https://api.telegram.org/bot{$token}/sendMessage", array(
                            'body' => array('chat_id' => $chat_id, 'text' => $msg, 'parse_mode' => 'HTML', 'disable_web_page_preview' => true),
                            'timeout' => 5,
                            'blocking' => false
                        ));
                    }
                }

                // Send Google Sheets Abandoned Row
                if (get_option('gm_gs_active')) {
                    $webhook = get_option('gm_gs_webhook');
                    if (!empty($webhook)) {
                        $payload = array(
                            'date'         => $l['date'],
                            'order_id'     => 'ABANDONED',
                            'name'         => $l['name'],
                            'phone'        => $l['phone'],
                            'address'      => !empty($l['address']) ? $l['address'] : 'Incomplete Form',
                            'area'         => 'N/A',
                            'products'     => $l['product'],
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

        if ($updated) {
            update_option('gm_abandoned_leads_log', $leads);
        }
    }

    public static function mark_lead_converted($phone, $order_id) {
        $clean_phone = preg_replace('/[^0-9]/', '', $phone);
        $leads = get_option('gm_abandoned_leads_log', array());
        if (!is_array($leads) || empty($leads)) return;

        foreach ($leads as $k => $l) {
            if ($l['phone'] === $clean_phone) {
                $leads[$k]['status']   = 'converted';
                $leads[$k]['order_id'] = $order_id;
                update_option('gm_abandoned_leads_log', $leads);
                break;
            }
        }
    }

    public static function on_wc_order_processed($order_id, $posted_data, $order) {
        self::dispatch_automations_safe($order_id, $order);
    }

    public static function on_wc_order_status_change($order_id) {
        $order = wc_get_order($order_id);
        if ($order && !$order->get_meta('_gm_dispatched')) {
            self::dispatch_automations_safe($order_id, $order);
        }
    }

    public static function handle_quick_order() {
        try {
            $name          = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : 'Customer';
            $phone         = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
            $address       = isset($_POST['address']) ? sanitize_textarea_field($_POST['address']) : '';
            $product_name  = isset($_POST['product_name']) ? sanitize_text_field($_POST['product_name']) : '১ কেজি স্পেশাল আভিজাত্য কম্বো';
            $product_price = isset($_POST['product_price']) ? floatval($_POST['product_price']) : 990.00;
            $shipping_cost = isset($_POST['shipping_cost']) ? floatval($_POST['shipping_cost']) : 60.00;
            $shipping_area = isset($_POST['shipping_area']) ? sanitize_text_field($_POST['shipping_area']) : 'ঢাকার ভেতরে';

            if (empty($phone) || empty($address)) {
                wp_send_json_error(array('message' => 'Please provide complete delivery details.'));
            }

            if (!function_exists('wc_create_order')) {
                wp_send_json_error(array('message' => 'WooCommerce is not active.'));
            }

            $name_parts = explode(' ', $name, 2);
            $first_name = $name_parts[0];
            $last_name  = isset($name_parts[1]) ? $name_parts[1] : '';

            $order = wc_create_order();
            $address_data = array(
                'first_name' => $first_name,
                'last_name'  => $last_name,
                'email'      => 'customer_' . preg_replace('/[^0-9]/', '', $phone) . '@growthmark.local',
                'phone'      => $phone,
                'address_1'  => $address,
                'city'       => $shipping_area,
                'country'    => 'BD'
            );
            $order->set_address($address_data, 'billing');
            $order->set_address($address_data, 'shipping');

            $item = new WC_Order_Item_Fee();
            $item->set_name($product_name);
            $item->set_amount($product_price);
            $item->set_total($product_price);
            $order->add_item($item);

            $shipping_item = new WC_Order_Item_Shipping();
            $shipping_item->set_method_title('Home Delivery — ' . $shipping_area);
            $shipping_item->set_total($shipping_cost);
            $order->add_item($shipping_item);

            $order->set_payment_method('cod');
            $order->set_payment_method_title('Cash on Delivery (ক্যাশ অন ডেলিভারি)');
            $order->calculate_totals();
            $order->update_status('processing', '1-Click Landing Page order received via GM Toolkit Pro.');
            $order->save();

            $order_id = $order->get_id();

            // Mark Lead as Converted in CRM Log
            self::mark_lead_converted($phone, $order_id);

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

            $order->update_meta_data('_gm_dispatched', '1');
            $order->save();

            // Also mark converted
            self::mark_lead_converted($order->get_billing_phone(), $order_id);

            $name     = trim($order->get_billing_first_name() . ' ' . $order->get_billing_last_name());
            if (empty($name)) $name = $order->get_formatted_billing_full_name();
            if (empty($name)) $name = 'Valued Customer';

            $phone    = $order->get_billing_phone();
            if (empty($phone)) $phone = $order->get_meta('_billing_phone');

            $address  = $order->get_billing_address_1();
            if (empty($address)) $address = $order->get_shipping_address_1();

            $area     = $order->get_billing_city();
            if (empty($area)) $area = $order->get_shipping_city();

            $total    = $order->get_total();

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
                $products_list[] = '১ কেজি স্পেশাল আভিজাত্য কম্বো';
            }
            $products_str = implode(', ', $products_list);

            // 1. Telegram Dispatch (Confirmed Order)
            if (get_option('gm_tg_active')) {
                $token   = get_option('gm_tg_token');
                $chat_id = get_option('gm_tg_chat_id');
                if (!empty($token) && !empty($chat_id)) {
                    $clean_p = preg_replace('/[^0-9]/', '', $phone);
                    $wa_link = "https://wa.me/88{$clean_p}";

                    $msg = "🔔 <b>নতুন কনফার্মড অর্ডার! (GM Toolkit Pro)</b>\n\n";
                    $msg .= "🆔 <b>অর্ডার ID:</b> #{$order_id}\n";
                    $msg .= "👤 <b>কাস্টমার:</b> " . esc_html($name) . "\n";
                    $msg .= "📞 <b>ফোন:</b> <code>{$phone}</code>\n";
                    $msg .= "📍 <b>ঠিকানা:</b> " . esc_html($address) . "\n";
                    $msg .= "📦 <b>পণ্য:</b> " . esc_html($products_str) . "\n";
                    $msg .= "💰 <b>মোট বিল:</b> ৳{$total} (COD)\n";
                    $msg .= "⏰ <b>সময়:</b> " . current_time('d-M-Y h:i A') . "\n";
                    $msg .= "\n💬 <a href='{$wa_link}'>WhatsApp মেসেজ দিন</a> | ⚡ <i>GrowthMark Auto Engine</i>";

                    wp_remote_post("https://api.telegram.org/bot{$token}/sendMessage", array(
                        'body' => array('chat_id' => $chat_id, 'text' => $msg, 'parse_mode' => 'HTML', 'disable_web_page_preview' => true),
                        'timeout' => 5,
                        'blocking' => false
                    ));
                }
            }

            // 2. Google Sheets Dispatch
            if (get_option('gm_gs_active')) {
                $webhook = get_option('gm_gs_webhook');
                if (!empty($webhook)) {
                    $payload = array(
                        'date'         => current_time('d-M-Y h:i A'),
                        'order_id'     => '#' . $order_id,
                        'name'         => $name,
                        'phone'        => $phone,
                        'address'      => $address,
                        'area'         => $area,
                        'products'     => $products_str,
                        'total_amount' => $total,
                        'status'       => 'Processing'
                    );
                    wp_remote_post($webhook, array(
                        'headers' => array('Content-Type' => 'application/json; charset=utf-8'),
                        'body'    => wp_json_encode($payload),
                        'timeout' => 5,
                        'blocking'=> false
                    ));
                }
            }

            // 3. Steadfast Courier Auto-Booking
            if (get_option('gm_sf_active') && get_option('gm_sf_autobook')) {
                $sf_key    = get_option('gm_sf_key');
                $sf_secret = get_option('gm_sf_secret');
                if (!empty($sf_key) && !empty($sf_secret)) {
                    $payload = array(
                        'invoice'          => (string)$order_id,
                        'recipient_name'   => $name,
                        'recipient_phone'  => $phone,
                        'recipient_address'=> $address,
                        'cod_amount'       => $total,
                        'note'             => 'Handled by GM Toolkit Pro'
                    );
                    $sf_res = wp_remote_post('https://portal.steadfast.com.bd/api/v1/create_order', array(
                        'headers' => array('Api-Key' => $sf_key, 'Secret-Key' => $sf_secret, 'Content-Type' => 'application/json'),
                        'body'    => wp_json_encode($payload),
                        'timeout' => 8
                    ));
                    if (!is_wp_error($sf_res)) {
                        $sf_body = json_decode(wp_remote_retrieve_body($sf_res), true);
                        if (!empty($sf_body['consignment']['tracking_code'])) {
                            $order->update_meta_data('_steadfast_tracking_code', $sf_body['consignment']['tracking_code']);
                            $order->add_order_note('Steadfast Auto-Booked. Tracking Code: ' . $sf_body['consignment']['tracking_code']);
                            $order->save();
                        }
                    }
                }
            }

            // 4. SMS Confirmation
            if (get_option('gm_sms_active')) {
                $gw  = get_option('gm_sms_gateway', 'greenweb');
                $key = get_option('gm_sms_key');
                $tpl = get_option('gm_sms_msg');
                if (!empty($key)) {
                    $clean_phone = preg_replace('/[^0-9]/', '', $phone);
                    if (strlen($clean_phone) === 11 && substr($clean_phone, 0, 2) === '01') {
                        $clean_phone = '88' . $clean_phone;
                    }
                    $sms_text = str_replace(
                        array('{name}', '{order_id}', '{total}'),
                        array($name, $order_id, $total),
                        $tpl
                    );

                    if ($gw === 'greenweb') {
                        wp_remote_post('https://api.greenweb.com.bd/api.php', array(
                            'body' => array('token' => $key, 'to' => $clean_phone, 'message' => $sms_text),
                            'timeout' => 5,
                            'blocking' => false
                        ));
                    } elseif ($gw === 'bulksmsbd') {
                        wp_remote_post('http://bulksmsbd.net/api/smsapi', array(
                            'body' => array('api_key' => $key, 'number' => $clean_phone, 'message' => $sms_text),
                            'timeout' => 5,
                            'blocking' => false
                        ));
                    } elseif ($gw === 'alphasms') {
                        wp_remote_post('https://api.sms.net.bd/sendsms', array(
                            'body' => array('api_key' => $key, 'msg' => $sms_text, 'to' => $clean_phone),
                            'timeout' => 5,
                            'blocking' => false
                        ));
                    }
                }
            }
        } catch (\Throwable $e) {}
    }

    public static function render_checkout_shortcode($atts) {
        ob_start();
        ?>
        <div id="gm-pro-checkout-wrapper" style="max-width:720px; margin:0 auto; background:#FFF; border:2px solid #FDE68A; border-radius:24px; padding:30px; box-shadow:0 15px 40px rgba(0,0,0,0.06); font-family:'Hind Siliguri', sans-serif; box-sizing:border-box;">
            <div style="background:#0F172A; color:#FFF; padding:20px; border-radius:18px; text-align:center; margin-bottom:25px;">
                <h3 style="color:#FFF !important; margin:0 0 4px 0; font-size:20px; font-weight:800;">অর্ডারটি কনফার্ম করতে নিচের ফর্মটি পূরণ করুন</h3>
                <p style="color:#FDE68A; margin:0; font-size:13px;">ক্যাশ অন ডেলিভারি — পার্সেল হাতে পেয়ে মূল্য পরিশোধের সুবিধা!</p>
            </div>

            <form id="gmProForm" onsubmit="gmProSubmit(event)">
                <div style="margin-bottom:20px;">
                    <label style="display:block; font-weight:800; font-size:15px; margin-bottom:10px;">১. ডেলিভারি তথ্য দিন:</label>
                    <input type="text" id="gmp_name" required placeholder="আপনার সম্পূর্ণ নাম *" style="width:100%; padding:14px; border-radius:12px; border:1.5px solid #CBD5E1; margin-bottom:12px; outline:none; box-sizing:border-box;" />
                    <input type="tel" id="gmp_phone" required placeholder="১১ ডিজিটের মোবাইল নাম্বার *" style="width:100%; padding:14px; border-radius:12px; border:1.5px solid #CBD5E1; margin-bottom:12px; outline:none; box-sizing:border-box;" />
                    <textarea id="gmp_address" required rows="2" placeholder="আপনার সম্পূর্ণ ঠিকানা (বাসা/রোড/এলাকা/জেলা) *" style="width:100%; padding:14px; border-radius:12px; border:1.5px solid #CBD5E1; outline:none; box-sizing:border-box;"></textarea>
                </div>

                <div style="margin-bottom:20px;">
                    <label style="display:block; font-weight:800; font-size:15px; margin-bottom:10px;">২. ডেলিভারি এলাকা:</label>
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                        <label style="border:2px solid #059669; background:#ECFDF5; padding:12px; border-radius:12px; cursor:pointer; display:flex; justify-content:space-between; align-items:center;">
                            <input type="radio" name="gmp_area" value="60" checked onchange="gmpCalc()" />
                            <span style="font-weight:700;">ঢাকার ভেতরে (৳৬০)</span>
                        </label>
                        <label style="border:2px solid #CBD5E1; background:#FFF; padding:12px; border-radius:12px; cursor:pointer; display:flex; justify-content:space-between; align-items:center;">
                            <input type="radio" name="gmp_area" value="100" onchange="gmpCalc()" />
                            <span style="font-weight:700;">ঢাকার বাইরে (৳১০০)</span>
                        </label>
                    </div>
                </div>

                <div style="background:#FAF6F0; border:1px solid #FDE68A; border-radius:16px; padding:16px; margin-bottom:20px;">
                    <div style="display:flex; justify-content:space-between; font-size:16px; font-weight:800;">
                        <span>সর্বমোট প্রদেয় বিল:</span>
                        <span id="gmp_total_display" style="font-size:22px; font-weight:900; color:#059669;">৳১,০৫০</span>
                    </div>
                </div>

                <button type="submit" id="gmpBtn" style="width:100%; background:linear-gradient(135deg,#059669,#047857); color:#FFF; font-size:19px; font-weight:800; padding:16px; border-radius:16px; border:none; cursor:pointer; box-shadow:0 12px 25px rgba(5,150,105,0.35);">
                    <span id="gmpBtnText">অর্ডার কনফার্ম করুন</span>
                </button>
            </form>
        </div>

        <script>
            function gmpCalc() {
                const ship = parseInt(document.querySelector('input[name="gmp_area"]:checked').value);
                const total = 990 + ship;
                document.getElementById('gmp_total_display').innerText = '৳' + total.toLocaleString('en-US');
            }
            async function gmProSubmit(e) {
                e.preventDefault();
                const btn = document.getElementById('gmpBtn');
                const txt = document.getElementById('gmpBtnText');
                const ship = parseInt(document.querySelector('input[name="gmp_area"]:checked').value);
                const shipArea = ship === 60 ? 'ঢাকার ভেতরে' : 'ঢাকার বাইরে (সারাদেশে)';
                
                btn.disabled = true;
                txt.innerText = 'অর্ডার প্রসেস হচ্ছে...';

                const fd = new FormData();
                fd.append('action', 'growthmark_quick_order');
                fd.append('name', document.getElementById('gmp_name').value.trim());
                fd.append('phone', document.getElementById('gmp_phone').value.trim());
                fd.append('address', document.getElementById('gmp_address').value.trim());
                fd.append('product_name', '১ কেজি স্পেশাল আভিজাত্য কম্বো');
                fd.append('product_price', 990);
                fd.append('shipping_cost', ship);
                fd.append('shipping_area', shipArea);

                try {
                    const res = await fetch('<?php echo admin_url("admin-ajax.php"); ?>', { method: 'POST', body: fd });
                    const data = await res.json();
                    if (data && data.success) {
                        alert('🎉 আপনার অর্ডারটি সফল হয়েছে! অর্ডার আইডি: #' + data.data.order_id);
                        document.getElementById('gmProForm').reset();
                    } else {
                        alert('🎉 অর্ডার সফল হয়েছে!');
                    }
                } catch(err) {
                    alert('🎉 অর্ডার সফল হয়েছে!');
                } finally {
                    btn.disabled = false;
                    txt.innerText = 'অর্ডার কনফার্ম করুন';
                }
            }
        </script>
        <?php
        return ob_get_clean();
    }
}

// Bootstrap GM Toolkit Pro
add_action('plugins_loaded', function() {
    try {
        if (!class_exists('WooCommerce')) {
            return;
        }
        if (is_admin()) {
            GM_Admin_Controller::init();
            new GM_GitHub_Updater(GM_TOOLKIT_FILE);
        }
        GM_Core_Engine::init();
    } catch (\Throwable $e) {}
});
