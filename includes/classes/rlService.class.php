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

use Flynax\Utils\Util;
use Flynax\Utils\Valid;
use Flynax\Utils\Category;

/**
 * @since 4.9.3
 */
class rlService
{
    public const OFFER_TASK = 'task';
    public const OFFER_SERVICE = 'service';

    /**
     * Display additional buttons above the categories on the home page
     *
     * @hook tplBlocksManagerContentBottom
     */
    public function hookTplBlocksManagerContentBottom(): void
    {
        global $rlSmarty;

        if ($GLOBALS['page_info']['Controller'] != 'home') {
            return;
        }

        if ($GLOBALS['config']['service_package_type_service'] &&
            $rlSmarty->_tpl_vars['block']['Key'] != sprintf('ltcb_%s', $GLOBALS['config']['service_package_type_service'])
        ) {
            return;
        }

        $rlSmarty->display('blocks' . RL_DS . 'categories_buttons.tpl');
    }

    /**
     * Redefine coordinates in fields select
     *
     * @hook listingsModifyFieldSearch
     * @param string $sql  - SQL query
     * @param array  $data - Form data
     * @param string $type - Listing type key
     * @param array  $form - Form fields information
     */
    public function hookListingsModifyFieldSearch(&$sql, &$data, &$type, &$form): void
    {
        global $coordinates, $tpl_settings, $group_search;

        // Keyword search statement
        if ($_POST['form'] == 'keyword_search') {
            // add keyword search field to the list array to allow keyword search form work out properly
            if (!$form['keyword_search']) {
                $form['keyword_search'] = array(
                    'Key' => 'keyword_search',
                    'Type' => 'text'
                );
            }
        }

        // Search on map statement
        if (!defined('RL_SEARCH_ON_MAP')) {
            return;
        }

        $sql .= "ROUND(`T1`.`Loc_latitude`, 5) AS `Loc_latitude`, ROUND(`T1`.`Loc_longitude`, 5) AS `Loc_longitude`, ";

        if ($group_search) {
            return;
        }

        $sql .= "COUNT(*) AS `Group_count`, ";
    }

    /**
     * Add coordinates condition the "where" statement in the sql query
     *
     * @hook listingsModifyWhereSearch
     * @param string $sql - SQL query
     */
    public function hookListingsModifyWhereSearch(&$sql): void
    {
        global $coordinates, $tpl_settings, $group_search, $group_lat, $group_lng;

        if (!defined('RL_SEARCH_ON_MAP')) return;

        if ($group_search) {
            $sql .= "AND (ROUND(`T1`.`Loc_latitude`, 5) = {$group_lat} AND ROUND(`T1`.`Loc_longitude`, 5) = {$group_lng})";
        } else {
            $sql .= "AND `T1`.`Loc_latitude` != 0 AND `T1`.`Loc_longitude` != 0 AND (`T1`.`Loc_latitude` BETWEEN {$coordinates['southWestLat']} AND {$coordinates['northEastLat']})";
            if ($coordinates['northEastLng'] < $coordinates['southWestLng']) {
                $sql .= "AND (`T1`.`Loc_longitude` BETWEEN {$coordinates['southWestLng']} AND 180 OR `T1`.`Loc_longitude` BETWEEN -180 AND {$coordinates['northEastLng']}) ";
            } else {
                $sql .= "AND (`T1`.`Loc_longitude` BETWEEN {$coordinates['southWestLng']} AND {$coordinates['northEastLng']}) ";
            }
        }
    }

    /**
     * Add "group" statement in the sql query
     *
     * @hook listingsModifyGroupSearch
     */
    public function hookListingsModifyGroupSearch(): void
    {
        global $sql, $group_search;

        if (!defined('RL_SEARCH_ON_MAP')) return;

        if ($group_search) return;

        if (false === strpos($sql, 'GROUP BY')) {
            $sql .= " GROUP BY `Loc_latitude`, `Loc_longitude` ";
        } else {
            $sql = str_replace("COUNT(*) AS `Group_count`, ", '', $sql);
        }
    }

    /**
     * Add new option to the manage listing type form
     *
     * @hook apTplListingTypesFormSearch
     */
    public function hookApTplListingTypesFormSearch(): void
    {
        if ($GLOBALS['tpl_settings']['category_dropdown_search']) {
            $GLOBALS['rlSmarty']->display(RL_ADMIN . 'tpl' . RL_DS . 'blocks' . RL_DS . 'lt_category_search_option.tpl');
        }
    }

    /**
     * Listing type option support
     *
     * @hook apPhpListingTypesPost
     */
    public function hookApPhpListingTypesPost(): void
    {
        $_POST['category_search_dropdown'] = $GLOBALS['type_info']['Category_search_dropdown'];
    }

    /**
     * Listing type option support
     *
     * @hook apPhpListingTypesBeforeAdd
     */
    public function hookApPhpListingTypesBeforeAdd(): void
    {
        $GLOBALS['data']['Category_search_dropdown'] = (int) $_POST['category_search_dropdown'];
    }

    /**
     * Listing type option support
     *
     * @hook apPhpListingTypesBeforeEdit
     */
    public function hookApPhpListingTypesBeforeEdit(): void
    {
        $GLOBALS['update_date']['fields']['Category_search_dropdown'] = (int) $_POST['category_search_dropdown'];
    }

    /**
     * Collect listing types allowed for category search dropdown
     * Assign data to smarty
     *
     * @hook pageinfoArea
     */
    public function hookPageinfoArea(): void
    {
        global $pages, $rlSmarty, $config, $rlListingStatus;

        foreach ($GLOBALS['rlListingTypes']->types as &$type) {
            if ($type['Category_search_dropdown']) {
                $category_dropdown[] = $type['Key'];
            }
        }

        $GLOBALS['rlSmarty']->assign_by_ref('category_dropdown_types', $category_dropdown);

        if ($config['service_package_type_task']) {
            $post_task_page_key = 'al_' . $config['service_package_type_task'];

            if ($pages[$post_task_page_key]) {
                $rlSmarty->assign('post_task_page_key', $post_task_page_key);
            }
        }

        $this->searchOnMapSection();

        if (is_object($rlListingStatus)) {
            $listing_id = intval($config['mod_rewrite'] ? $_GET['listing_id'] : $_GET['id']);
            $hash = Valid::escape($_GET['hash']);

            if ($hash && $GLOBALS['page_info']['Controller_alt'] == 'listing_details' && $listing_id) {
                if ($GLOBALS['rlDb']->getOne('ID', "`Hash` = '{$hash}' AND `Offer_ID` = {$listing_id}", 'service_offers')) {
                    $rlListingStatus->allowInvisibleListingDetailsAccess = true;
                }
            }
        }
    }

    /**
     * Add javascript handler which synchronize the minimal booking services price with the main listing price
     *
     * @hook tplStepFormAfterForm
     */
    public function hookTplStepFormAfterForm(): void
    {
        global $config;

        if ($GLOBALS['config']['price_tag_field']) {
            $listing_type = $GLOBALS['rlSmarty']->_tpl_vars['manageListing']->listingType;

            if ($GLOBALS['plugins']['shoppingCart'] && ($listing_type['shc_module'] || $listing_type['shc_auction'])) { 
                return;
            }

            if ($listing_type['Key'] == $config['service_package_type_service']
                && $listing_type['Booking_type'] == 'time_range'
            ) {
                $GLOBALS['rlSmarty']->display(FL_TPL_CONTROLLER_DIR . 'add_listing/price_handler.tpl');
            }
        }
    }

    public function searchOnMapSection(): void
    {
        global $tpl_settings, $reefless, $rlSmarty, $rlListingTypes;

        if (!$GLOBALS['blocks']['search_on_map_section']) {
            return;
        }

        $reefless->loadClass('Search');

        $search_forms = [];

        foreach ($rlListingTypes->types as $type) {
            if ($type['On_map_search']) {
                $form_key = $type['Key'] . '_on_map';

                if ($form_data = $GLOBALS['rlSearch']->buildSearch($form_key)) {
                    $search_forms[$form_key] = array(
                        'data' => $form_data,
                        'name' => $GLOBALS['lang']['search_forms+name+' . $form_key],
                        'listing_type' => $type['Key']
                    );
                }
            }
        }

        $GLOBALS['rlSearch']->defaultMapAddressAssign();

        $rlSmarty->assign_by_ref('map_search_forms', $search_forms);
    }

    public function hookApMixConfigItem(&$value, &$systemSelects)
    {
        global $rlListingTypes;

        if (!in_array($value['Key'], ['service_package_type_service', 'service_package_type_task'])) {
            return;
        }

        $value['Values'] = [];

        foreach ($rlListingTypes->types as $type) {
            $value['Values'][] = [
                'ID' => $type['Key'],
                'name' => $type['name'],
            ];
        }
    }

    /**
     * Handle ajax requests
     *
     * @hook ajaxRequest
     */
    public function hookAjaxRequest(&$out, &$mode, $item, $langCode)
    {
        global $rlListings, $account_info, $config, $rlMembershipPlan, $rlLang;

        if (!in_array($mode, [
            'serviceGetOfferTaskData',
            'serviceOfferTask',
            'serviceGetOfferServiceData',
            'serviceOfferService',
            'serviceAddListingSaveIsVisible'
        ])) {
            return;
        }

        switch ($mode) {
            case 'serviceGetOfferTaskData':
            case 'serviceGetOfferServiceData':
                $offer_key = $mode == 'serviceGetOfferTaskData' ? self::OFFER_TASK : self::OFFER_SERVICE;

                define('SEND_OFFER_REQUEST', true);

                if ($listingID = (int) $_REQUEST['listingID']) {
                    if ($config['membership_module']) {
                        $rlMembershipPlan->isContactsAllow();
                    }

                    if ($config['membership_module'] && !$rlMembershipPlan->is_contact_allowed) {
                        $phrase_key = $account_info ? 'contacts_not_available' : 'call_owner_forbidden_login_hint';
                        $out = [
                            'status' => 'FORBIDDEN',
                            'phrases' => [
                                $phrase_key => $rlLang->getSystem($phrase_key),
                                'change_plan' => $rlLang->getPhrase('change_plan')
                            ]
                        ];
                    } elseif ($contact = $rlListings->getContactPopupDetails($listingID)) {
                        $contact['listing_id'] = $listingID;

                        $option_key = sprintf('service_package_type_%s', $offer_key);
                        if ($config[$option_key] && $account_info && $account_info['ID'] > 0) {
                            if ($listings = $rlListings->getMyListings($config[$option_key], 'ID', 'desc', 0, 100)) {
                                // Remove useless fields
                                foreach ($listings as &$listing) {
                                    foreach ($listing as $field => $value) {
                                        if (!in_array($field, ['ID', 'listing_title'])) {
                                            unset($listing[$field]);
                                        }
                                    }
                                }

                                $contact['listings'] = $listings;
                            }
                        }

                        if ($offer_key == self::OFFER_TASK) {
                            $contact['add_listing_url'] = $this->buildAddListingLink($listingID, $langCode);
                        }

                        $out = [
                            'status' => 'OK',
                            'results' => $contact
                        ];
                    } else {
                        $out['status'] = 'ERROR';
                    }
                } else {
                    $out['status'] = 'ERROR';
                }
                break;

            case 'serviceOfferTask':
            case 'serviceOfferService':
                $offer_key = $mode == 'serviceOfferTask' ? self::OFFER_TASK : self::OFFER_SERVICE;
                $offer_id = (int) $_REQUEST[sprintf('%sID', $offer_key)];
                $listing_id = (int) $_REQUEST['listingID'];

                if ($offer_id && $listing_id && $account_info) {
                    if ($GLOBALS['rlDb']->getOne(
                        'ID',
                        "`Listing_ID` = {$listing_id} AND `Offer_ID` = {$offer_id} AND `Account_ID` = {$account_info['ID']}",
                        'service_offers')
                    ) {
                        $out = [
                            'status' => 'ALERT',
                            'message' => $GLOBALS['rlLang']->getSystem('service_offer_already_sent_to_user')
                        ];
                    } elseif ($this->sendOffer($offer_id, $listing_id, $account_info, false, $offer_key)) {
                        $out = [
                            'status' => 'OK',
                            'message' => $GLOBALS['rlLang']->getSystem(sprintf('service_message_%s_offer_sent', $offer_key))
                        ];
                    } else {
                        $out['status'] = 'ERROR';
                    }
                } else {
                    $out['status'] = 'ERROR';
                }
                break;

            case 'serviceAddListingSaveIsVisible':
                if ($_SESSION['add_listing']['notify_id']) {
                    $_SESSION['add_listing']['notify_make_visible'] = $_REQUEST['isVisible'];
                }
                break;
        }
    }

    /**
     * Build mirror "post the task" link by the service license ID
     *
     * @param  int    $listingID - Requested listing ID
     * @param  string $langCode  - Lang code
     * @return string            - Add listing URL
     */
    public function buildAddListingLink(int $listingID, string $langCode): string
    {
        global $rlDb, $config, $reefless;

        $url = '';
        $vars = sprintf('notify=%s', $listingID);

        if ($config['service_package_type_task']) {
            $category_id = $rlDb->getOne('Category_ID', "`ID` = {$listingID}", 'listings');
            $category_key = $rlDb->getOne('Key', "`ID` = {$category_id}", 'categories');
            $post_task_page_key = 'al_' . $config['service_package_type_task'];

            if ($category_key) {
                $mirror_category_key = preg_replace('/^services_/', 'tasks_', $category_key);
                $mirror_category_id = $rlDb->getOne('ID', "`Key` = '{$mirror_category_key}' AND `Type` = '{$config['service_package_type_task']}'", 'categories');

                if (!$mirror_category_id) {
                    $phrase_key = 'categories+name+' . $category_key;
                    $category_name = $GLOBALS['rlLang']->getPhrase($phrase_key, null, null, true);

                    $sql = "
                        SELECT `T2`.`ID` FROM `{db_prefix}lang_keys` AS `T1`
                        LEFT JOIN `{db_prefix}categories` AS `T2` ON CONCAT('categories+name+', `T2`.`Key`) = `T1`.`Key`
                        WHERE `T1`.`Value` = '{$category_name}' AND `T1`.`Module` = 'category'
                        AND `T1`.`Code` = '" . RL_LANG_CODE . "' AND `T2`.`Type` = '{$config['service_package_type_task']}'
                    ";
                    $mirror_category_id = $rlDb->getRow($sql, 'ID');
                }

                if ($mirror_category_id) {
                    $category = Category::getCategory((int) $mirror_category_id);

                    if ($category) {
                        $path = $config['mod_rewrite'] ? [$category['Path']] : ['id' => $mirror_category_id];
                        $path['step'] = $GLOBALS['steps']['plan']['path'];
                        $url = $reefless->getPageUrl($post_task_page_key, $path, $langCode, $vars);
                    }
                }
            }

            if (!$url) {
                $url = $reefless->getPageUrl($post_task_page_key, null, $langCode, $vars);
            }
        }

        if (!$url) {
            $url = $reefless->getPageUrl('add_listing', null, $langCode, $vars);
        }

        return $url;
    }

    /**
     * Send task/service offer
     *
     * @param  int    $offerListingID - Listing ID we make an offer to
     * @param  int    $listingID      - Offer listing ID
     * @param  array  $accountInfo    - Sender account data
     * @param  bool   $addLinkHash    - Add hash to link flag
     * @param  string $offerType      - Offer type, 'task' or 'service'
     * @return bool                   - Success status
     */
    public function sendOffer(int $offerListingID, int $listingID, array $accountInfo, bool $addLinkHash = false, string $offerType = self::OFFER_TASK): bool
    {
        global $reefless, $config;

        if (!$config['messages_module']) {
            return false;
        }

        $reefless->loadClass('Listings');
        $reefless->loadClass('Account');
        $reefless->loadClass('Mail');

        $hash = '';
        $offerListing = $GLOBALS['rlListings']->getListing($offerListingID, true);

        if (!$offerListing) {
            return false;
        }

        $listing = $GLOBALS['rlListings']->getListing($listingID, true);

        if (!$listing) {
            return false;
        }

        $recipient = $GLOBALS['rlAccount']->getProfile((int) $listing['Account_ID']);

        if (!$recipient) {
            return false;
        }

        if ($addLinkHash) {
            $hash = $reefless->generateHash(16, 'hex');
            $sign = false === strpos($offerListing['listing_link'], '?') ? '?' : '&';
            $offerListing['listing_link'] .= sprintf('%shash=%s', $sign, $hash);
        }

        $offer_listing_link = sprintf('<a href="%s">%s</a>', $offerListing['listing_link'], $offerListing['listing_title']);
        $listing_link = sprintf('<a href="%s">%s</a>', $listing['listing_link'], $listing['listing_title']);

        $find = array(
            sprintf('{%s_title}', $offerType),
            '{owner_name}',
            '{visitor_name}',
            '{professional_name}',
            sprintf('{%s_link}', $offerType),
            '{listing_link}',
            '{listing_title}'
        );
        $replace = array(
            $offerListing['listing_title'],
            $recipient['Full_name'],
            $accountInfo['Full_name'],
            $accountInfo['Full_name'],
            $offer_listing_link,
            $listing_link,
            $listing['listing_title']
        );

        // Send email
        $GLOBALS['rlMail']->sendTemplate($recipient['Mail'], sprintf('offer_%s', $offerType), $find, $replace, null, null, $recipient['Lang']);

        // Send internal message
        if ($GLOBALS['rlAccount']->isLogin() || $config['messages_save_visitor_message']) {
            $message = str_replace($find, $replace, $GLOBALS['rlLang']->getSystem(sprintf('service_message_offer_%s', $offerType)));

            $insert = [
                'From'       => $accountInfo['ID'],
                'To'         => $recipient['ID'],
                'Message'    => $message,
                'Date'       => 'NOW()',
                'Listing_ID' => $listingID,
                'System'     => '1'
            ];

            $GLOBALS['rlDb']->insertOne($insert, 'messages');
        }

        // Save offer
        $insert = [
            'Listing_ID' => $listingID,
            'Offer_ID'   => $offerListingID,
            'Account_ID' => $accountInfo['ID'],
            'Date'       => 'NOW()',
            'Hash'       => $hash,
            'IP'         => Util::getClientIP()
        ];
        $GLOBALS['rlDb']->insertOne($insert, 'service_offers');

        return true;
    }

    /**
     * Filter my listings in offer service/task popup
     *
     * @hook myListingsSqlWhere
     *
     * @param  string &$sql - SQL query
     * @param  string $type - Filter type
     */
    public function hookMyListingsSqlWhere(&$sql, $type)
    {
        if (!defined('SEND_OFFER_REQUEST')) {
            return;
        }

        $sql .= "AND `T1`.`Status` = 'active' ";

        if ($GLOBALS['plugins']['listing_status']) {
            $sql .= "AND `T1`.`Sub_status` <> 'invisible' ";
        }
    }

    /**
     * Save recipient data in session
     *
     * @hook addListingTop
     */
    public function hookAddListingTop(&$steps, &$errors, &$noAccess, &$planType)
    {
        global $page_info, $config, $blocks, $rlSmarty, $account_info;

        // Unset notify_id if the user leaved the previous task positing process
        if ($_SESSION['add_listing']['notify_id'] && $page_info['prev'] && $page_info['prev'] != $page_info['Key']) {
            unset($_SESSION['add_listing']['notify_id']);
        }

        if (!$config['service_package_type_task'] || $page_info['Key'] != 'al_' . $config['service_package_type_task']) {
            unset($blocks['notify_pro']);
            $GLOBALS['rlCommon']->defineBlocksExist($blocks);
            return;
        }

        if ($_GET['notify'] && $notify_id = (int) $_GET['notify']) {
            $notify_owner_id = $GLOBALS['rlDb']->getOne('Account_ID', "`ID` = {$notify_id}", 'listings');

            if ($account_info && $account_info['ID'] == $notify_owner_id) {
                unset($_SESSION['add_listing']['notify_id']);
                unset($blocks['notify_pro']);
                $GLOBALS['rlCommon']->defineBlocksExist($blocks);
            } else {
                $_SESSION['add_listing']['notify_id'] = $notify_id;
            }
        }

        if ($_SESSION['add_listing']['notify_id']) {
            $GLOBALS['reefless']->loadClass('Listings');
            $listing_data = $GLOBALS['rlListings']->getListing($_SESSION['add_listing']['notify_id'], true);
            $rlSmarty->assign_by_ref('listing_data', $listing_data);

            $GLOBALS['reefless']->loadClass('Account');
            $seller_info = $GLOBALS['rlAccount']->getProfile((int) $listing_data['Account_ID']);

            $seller_info['Listings_count'] = 0; // Hide "Other pro. listings" button
            $seller_info['Own_page'] = false; // Disable pro. details page links
            $seller_info['Full_name'] = $listing_data['listing_title']; // Re-assign listing title
            $seller_info['Photo'] = $listing_data['Main_photo'];
            $seller_info['Photo_x2'] = $listing_data['Main_photo_x2'];

            $rlSmarty->assign_by_ref('seller_info', $seller_info);

            $GLOBALS['reefless']->loadClass('MembershipPlan');
            $owner_short_details = $GLOBALS['rlAccount']->getShortDetails($seller_info, $seller_info['Account_type_ID'], true);
            $GLOBALS['rlMembershipPlan']->fakeValues($owner_short_details);
            $rlSmarty->assign_by_ref('owner_short_details', $owner_short_details);

            if ($config['show_call_owner_button']) {
                $GLOBALS['rlStatic']->addHeaderCss(RL_TPL_BASE . 'components/call-owner/call-owner-buttons.css');
            }

            $GLOBALS['_hiddenContactFormControllers'][] = $page_info['Controller'];
        } else {
            unset($blocks['notify_pro']);
            $GLOBALS['rlCommon']->defineBlocksExist($blocks);
        }
    }

    /**
     * Remove the notify_pro box from the unnecessary steps
     *
     * @hook addListingBottom
     */
    public function hookAddListingBottom($manageListing)
    {
        global $blocks;

        if (!$blocks['notify_pro']) {
            return;
        }

        if (!in_array($manageListing->step, ['category', 'plan', 'form', 'photo', 'done'])) {
            unset($blocks['notify_pro']);
            $GLOBALS['rlCommon']->defineBlocksExist($blocks);
        }
    }

    /**
     * Send task notification
     *
     * @hook afterListingDone
     */
    public function hookAfterListingDone(&$manageListing, &$update, &$isFree)
    {
        global $account_info, $rlListingStatus;

        if (!$_SESSION['add_listing']['notify_id'] || !$account_info || !$manageListing->listingID) {
            return;
        }

        $this->sendOffer(
            $manageListing->listingID,
            $_SESSION['add_listing']['notify_id'],
            $account_info,
            !$_SESSION['add_listing']['notify_make_visible']
        );

        if (is_object($rlListingStatus) && !$_SESSION['add_listing']['notify_make_visible']) {
            $update['fields'] = [
                'Sub_status' => 'invisible',
                'Sub_status_data' => 'invisible'
            ];
            $GLOBALS['rlDb']->update($update, 'listings');
        }
    }

    /**
     * Disable listings increase if the task posted for certain service provider
     *
     * @hook phpAddListingRecountListings
     */
    public function hookPhpAddListingRecountListings(&$manageListing, &$allowListingsRecount, &$planInfo, &$accountInfo)
    {
        global $rlListingStatus;

        if ($_SESSION['add_listing']['notify_id']
            && is_object($rlListingStatus)
            && !$_SESSION['add_listing']['notify_make_visible']
        ) {
            $allowListingsRecount = false;
        }
    }

    /**
     * Change phrases
     *
     * @hook getPhrase
     */
    public function hookGetPhrase(&$params, &$phrase)
    {
        global $lang, $page_info, $config, $rlSmarty, $rlDb;

        switch ($params['key']) {
            case 'notice_after_listing_adding_auto':
            case 'notice_after_listing_adding':
                if ($_SESSION['add_listing']['notify_id']) {
                    $phrase .= $lang['service_offer_task_after_listing_done'];
                    unset($_SESSION['add_listing']['notify_id']);
                }
                break;
        }

        if ($page_info['Controller'] == 'listing_details' && $config['messages_module']) {
            if (($listing_id = (int) $_SESSION['add_listing']['notify_id']) && isset($rlSmarty->_tpl_vars['manageListing'])) {
                $category_id = $rlDb->getOne('Category_ID', "`ID` = {$listing_id}", 'listings');
                $listing_type = $rlDb->getOne('Type', "`ID` = {$category_id}", 'categories');
            } else {
                $listing_type = $GLOBALS['listing_data']['Listing_type'];
            }

            if ($listing_type == $config['service_package_type_service']) {
                switch ($params['key']) {
                    case 'call_owner':
                        $phrase = sprintf('%s" data-action="offer-task', $lang['service_offer_task']);
                        break;

                    case 'contact_owner':
                        $phrase = $lang['service_contact_service_provider'];
                        break;

                    case 'account_listings':
                        $phrase = $lang['service_service_provider_listings'];
                        break;
                }
            } elseif ($listing_type == $config['service_package_type_task']) {
                if ($params['key'] == 'call_owner') {
                    $phrase = sprintf('%s" data-action="offer-service', $lang['service_offer_service']);
                }
            }
        }
    }
}
