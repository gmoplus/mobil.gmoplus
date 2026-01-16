<!-- listing details -->

{if !$errors}

{if $config.map_module && $location.direct}
    {mapsAPI assign='mapAPI'}

    <script>
    rlConfig['mapAPI'] = [];
    rlConfig['mapAPI']['css'] = JSON.parse('{$mapAPI.css|@json_encode}');
    rlConfig['mapAPI']['js']  = JSON.parse('{$mapAPI.js|@json_encode}');
    </script>
{/if}

<div class="listing-details details {if $config.map_module && $location.direct && $photos}loc-exists{/if}{if !$photos} no-listing-photos{/if}">
    {rlHook name='listingDetailsTopTpl'}

    <div class="top-navigation d-flex justify-content-between">
        {rlHook name='tplListingDetailsNavLeft'}
        {rlHook name='tplListingDetailsNavRight'}
    </div>
    
    {if $photos}
        <section class="main-section">
            {include file=$componentDir|cat:'listing-details-gallery/_listing-details-gallery.tpl'}
        </section>
    {/if}

    <section class="content-section clearfix">
        <!-- tabs -->
        {if $tabs|@count > 1}
            <ul class="tabs tabs-hash">
                {foreach from=$tabs item='tab' name='tabF'}{strip}
                    <li {if $smarty.foreach.tabF.first}class="active"{/if} id="tab_{$tab.key}">
                        <a href="#{$tab.key}" data-target="{$tab.key}">{$tab.name}</a>
                    </li>
                {/strip}{/foreach}
            </ul>
        {/if}
        <!-- tabs end -->

        <!-- listing details -->
        <div id="area_listing" class="tab_area">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                {if $price_tag_value}
                    <div class="price-tag mb-3" id="df_field_price">
                        <span>{$price_tag_value}</span>
                        {if $listing_data.sale_rent == 2 && $listing.common.Fields.time_frame.value}
                            / {$listing.common.Fields.time_frame.value}
                        {/if}
                    </div>
                {/if}

                <div class="mb-3">
                    {rlHook name='tplListingDetailsRating'}
                </div>
            </div>

            {rlHook name='listingDetailsPreFields'}

            <div class="listing-fields">
            {foreach from=$listing item='group'}
                <div class="{if $group.Key}{$group.Key}{else}no-group{/if}{if $group.Key == 'common'} row{/if}">
                    {if $group.Group_ID && $group.Key != 'common'}
                        {assign var='hide' value=false}
                        {if !$group.Display}
                            {assign var='hide' value=true}
                        {/if}

                        {assign var='value_counter' value='0'}
                        {foreach from=$group.Fields item='group_values' name='groupsF'}
                            {if $group_values.value == '' || !$group_values.Details_page}
                                {assign var='value_counter' value=$value_counter+1}
                            {/if}
                        {/foreach}

                        {if !empty($group.Fields) && ($smarty.foreach.groupsF.total != $value_counter)}
                            {include file='blocks'|cat:$smarty.const.RL_DS|cat:'fieldset_header.tpl' id=$group.ID name=$group.name hide=$hide}

                            {if $group.Key == 'location' && $config.map_module && $location.direct}
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12 fields">
                            {foreach from=$group.Fields item='item' key='field' name='fListings'}
                                {if !empty($item.value) && $item.Details_page}
                                    {include file='blocks'|cat:$smarty.const.RL_DS|cat:'field_out.tpl'}
                                {/if}
                            {/foreach}
                                    </div>
                                    <div class="col-sm-6 col-xs-12 map">
                                        <section title="{$lang.expand_map}" class="map-capture">
                                            <img alt="{$lang.expand_map}"
                                                 src="{staticMap location=$location.direct zoom=$config.map_default_zoom width=480 height=180}"
                                                 srcset="{staticMap location=$location.direct zoom=$config.map_default_zoom width=480 height=180 scale=2} 2x" />
                                            {if !$listing_type.Photo || !$photos}<span class="media-enlarge"><span></span></span>{/if}
                                        </section>
                                    </div>
                                </div>

                                {if !$listing_type.Photo || !$photos}
                                    {include file='blocks'|cat:$smarty.const.RL_DS|cat:'listing_details_static_map.tpl'}
                                {else}
                                    <script class="fl-js-dynamic">
                                    {literal}

                                    $(function(){
                                        $('.map .map-capture img').click(function(){
                                            flynax.slideTo('body');
                                            $('#media .nav-buttons .nav-button.map').trigger('click');
                                        });
                                    });

                                    {/literal}
                                    </script>
                                {/if}
                            {else}
                                {foreach from=$group.Fields item='item' key='field' name='fListings'}
                                    {if !empty($item.value) && $item.Details_page}
                                        {include file='blocks'|cat:$smarty.const.RL_DS|cat:'field_out.tpl'}
                                    {/if}
                                {/foreach}
                            {/if}

                            {include file='blocks'|cat:$smarty.const.RL_DS|cat:'fieldset_footer.tpl'}
                        {/if}

                        {assign var='main_section_no_group' value=false}
                    {else}
                        {if $group.Fields}
                            {foreach from=$group.Fields item='item'}
                                {if !empty($item.value) && $item.Details_page}
                                    {include file='blocks'|cat:$smarty.const.RL_DS|cat:'field_out.tpl'}
                                {/if}
                            {/foreach}
                        {/if}
                    {/if}
                </div>
            {/foreach}
            </div>

            <!-- statistics area -->
            <section class="statistics clearfix">
                <ul class="controls">
                    {rlHook name='listingDetailsAfterStats'}
                </ul>
                <ul class="counters">
                    {if $config.count_listing_visits}<li><span class="count">{$listing_data.Shows}</span> {$lang.shows}</li>{/if}
                    {rlHook name='listingDetailsCounters'}
                </ul>
            </section>
            <!-- statistics area end -->
        </div>
        <!-- listing details end -->

        {if $config.tell_a_friend_tab}
            <!-- tell a friend tab -->
            <div id="area_tell_friend" class="tab_area hide">
                <div class="content-padding">
                    <div class="submit-cell">
                        <div class="name">{$lang.friend_name} <span class="red">*</span></div>
                        <div class="field"><input class="wauto" type="text" id="friend_name" name="friend_name" maxlength="50" size="30" value="{$smarty.post.friend_name}" /></div>
                    </div>

                    <div class="submit-cell">
                        <div class="name">{$lang.friend_email} <span class="red">*</span></div>
                        <div class="field"><input class="wauto" type="text" id="friend_email" name="friend_email" maxlength="50" size="30" value="{$smarty.post.friend_email}" /></div>
                    </div>

                    <div class="submit-cell">
                        <div class="name">{$lang.your_name}</div>
                        <div class="field"><input class="wauto" type="text" id="your_name" name="your_name" maxlength="100" size="30" value="{$account_info.Full_name}" /></div>
                    </div>

                    <div class="submit-cell">
                        <div class="name">{$lang.your_email}</div>
                        <div class="field"><input class="wauto" type="text" id="your_email" name="your_email" maxlength="30" size="30" value="{$account_info.Mail}" /></div>
                    </div>

                    <div class="submit-cell">
                        <div class="name">{$lang.message}</div>
                        <div class="field"><textarea id="message" name="message" rows="6" cols="50">{$smarty.post.message}</textarea></div>
                    </div>

                    {if $config.security_img_tell_friend}
                    <div class="submit-cell">
                        <div class="name">{$lang.security_code} <span class="red">*</span></div>
                        <div class="field">
                            {include file='captcha.tpl' no_caption=true}
                        </div>
                    </div>
                    {/if}

                    <div class="submit-cell">
                        <div class="field">
                            <input type="submit" class="button" value="{$lang.send}" id="send_friend" name="send_friend" />
                            <input type="button" class="button" value="{$lang.reset}" id="reset_friend" name="reset_friend" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- tell a friend tab end -->
        {/if}

        <!-- send message tab -->
        {if $config.messages_module && $tabs.send_message}
            <div id="area_send_message" class="tab_area hide">
                <div class="submit-cell">
                    <div class="name">{$lang.name} <span class="red">*</span></div>
                    <div class="field"><input maxlength="30" class="wauto" type="text" name="name" value="{$smarty.post.name}" /></div>
                </div>

                <div class="submit-cell">
                    <div class="name">{$lang.mail} <span class="red">*</span></div>
                    <div class="field"><input maxlength="30" class="wauto" type="text" name="email" value="{$smarty.post.email}" /></div>
                </div>

                <div class="submit-cell">
                    <div class="name">{$lang.phone}</div>
                    <div class="field"><input maxlength="30" class="wauto" type="text" name="phone" value="{$smarty.post.phone}" /></div>
                </div>

                <div class="submit-cell">
                    <div class="name">{$lang.message} <span class="red">*</span></div>
                    <div class="field"><textarea rows="10" cols="50" class="wauto" name="message">{$smarty.post.message}</textarea></div>
                </div>

                {if $config.security_img_contact_owner}
                <div class="submit-cell">
                    <div class="name">{$lang.security_code} <span class="red">*</span></div>
                    <div class="field">
                        {include file='captcha.tpl' no_caption=true}
                    </div>
                </div>
                {/if}

                <div class="submit-cell">
                    <div class="field">
                        <input type="submit" class="button" value="{$lang.send}" />
                        <input type="button" class="button" value="{$lang.reset}" />
                    </div>
                </div>
            </div>
        {/if}
        <!-- send message tab end -->

        {if $tabs|@count > 1}
            {rlHook name='listingDetailsTab'}
        {/if}
    </section>
</div>

    <script class="fl-js-dynamic">
    {if isset($smarty.get.highlight)}
        flynaxTpl.highlightResults("{$smarty.session.keyword_search_data.keyword_search}", true);
    {/if}

    var ld_inactive = {if $pageInfo.Listing_details_inactive}'{$lang.ld_inactive_notice}'{else}false{/if};

    {literal}
        if ($('#df_field_vin .value').length > 0) {
            var html = '<a style="font-size: 14px;" href="javascript:void(0);">{/literal}{if $lang.check_vin}{$lang.check_vin}{else}Check Vin{/if}{literal}</a>';
            var vin = trim( $('#df_field_vin .value').text() );
            var frame = '<iframe scrolling="auto" height="600" frameborder="0" width="100%" src="https://www.carfax.com/cfm/check_order.cfm?vin='+vin+'" style="border: 0pt none;overflow-x: hidden; overflow-y: auto;background: white;"></iframe>';
            var source = '';
        }
    {/literal}
    </script>

    {rlHook name='listingDetailsBottomJs'}

    <script class="fl-js-dynamic">
    {literal}
    $(document).ready(function(){
        if (ld_inactive) {
            printMessage('warning', ld_inactive, false, true);
        }

        $('#df_field_vin .value').append(html);

        $('#df_field_vin .value a').flModal({
            content: frame,
            source: source,
            width: 900,
            height: 640
        });

        flynaxTpl.setupTextarea();
    });
    {/literal}
    </script>

</div>
{else}
    {include file='errors.tpl'}
{/if}

<!-- listing details end -->

