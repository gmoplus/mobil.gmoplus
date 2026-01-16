<!-- listing item -->

{rlHook name='listingTop'}

{if $listing.Listing_type}
    {assign var='listing_type' value=$listing_types[$listing.Listing_type]}
{/if}

{if $listing_type.Photo || $pageInfo.Controller|in_array:$_mixedListingControllers || $smarty.request.mode == 'rvLoadListings'}
    {assign var='pictures_available' value=true}
{else}
    {assign var='pictures_available' value=false}
{/if}

<article class="item{if $listing.Featured} featured{/if}{if !$pictures_available} no-image{/if} two-inline col-sm-4{if !$side_bar_exists} col-md-3{/if} {rlHook name='tplListingItemClass'}">

    <div class="main-column">
        {if $pictures_available}
            <div class="picture{if !$listing.Main_photo} no-picture{/if}">
                <a title="{$listing.listing_title}" {if $config.view_details_new_window}target="_blank"{/if} href="{$listing.url}">
                    {if $listing.Photos_count > 1}
                    <div data-id="{$listing.ID}" class="listing-picture-slider">
                        <span class="listing-picture-slider__navbar d-flex h-100 relative">
                        {section start=0 loop=$listing.Photos_count step=1 max=5 name='pics'}
                            <span class="flex-fill">
                                {if $smarty.section.pics.first}
                                <img src="{if $listing.Main_photo}{$smarty.const.RL_FILES_URL}{$listing.Main_photo}{else}{$rlTplBase}img/blank_10x7.gif{/if}"
                                    {if $listing.Main_photo_x2}srcset="{$smarty.const.RL_FILES_URL}{$listing.Main_photo_x2} 2x"{/if}
                                    alt="{$listing.listing_title}"
                                    loading="lazy" />
                                {else}
                                    <img class="pic-empty-{$smarty.section.pics.iteration} d-none" src="{$rlTplBase}img/blank_10x7.gif" alt="{$listing.listing_title}" />
                                    {if $smarty.section.pics.last && $listing.Photos_count > 5}
                                    <span class="justify-content-center align-items-center text-center flex-column">
                                        <svg viewBox="0 0 54 46">
                                            <use xlink:href="#photo-cam-icon"></use>
                                        </svg>
                                        {math equation='count - 5' count=$listing.Photos_count assign='more_count'}
                                        {assign var='count_replace' value=`$smarty.ldelim`count`$smarty.rdelim`}
                                        {$lang.count_more_pictures|replace:$count_replace:$more_count}
                                    </span>
                                    {/if}
                                {/if}
                            </span>
                        {/section}
                        </span>
                    </div>
                    {else}
                        <img src="{if $listing.Main_photo}{$smarty.const.RL_FILES_URL}{$listing.Main_photo}{else}{$rlTplBase}img/blank_10x7.gif{/if}"
                        {if $listing.Main_photo_x2}srcset="{$smarty.const.RL_FILES_URL}{$listing.Main_photo_x2} 2x"{/if}
                        alt="{$listing.listing_title}" />
                    {/if}

                    {rlHook name='tplListingItemPhoto'}

                    {if $listing.Featured}<div class="label" title="{$lang.featured}">{$lang.featured}</div>{/if}
                </a>

                <span id="fav_{$listing.ID}" class="favorite add" title="{$lang.add_to_favorites}">
                    <svg viewBox="0 0 14 12" class="icon">
                        <use xlink:href="#favorite-icon"></use>
                    </svg>
                </span>
            </div>
        {/if}

        <ul class="card-info flex-fill{if $config.sf_display_fields} with-names{/if}">
            <li class="title">
                <a class="link-large"
                    title="{$listing.listing_title}"
                    {if $config.view_details_new_window}target="_blank"{/if}
                    href="{$listing.url}">
                    {$listing.listing_title}
                </a>
            </li>

            <li class="fields d-flex">
                <div class="field-values flex-fill shrink-fix">
                    {assign var='short_form_fields' value=0}
                    {foreach from=$listing.fields item='item' key='field' name='fListings'}
                        {if empty($item.value) || !$item.Details_page || ($item.Key == $config.price_tag_field || $item.Key|in_array:$tpl_settings.listing_grid_except_fields)}{continue}{/if}

                        {if $config.sf_display_fields}
                            <div class="table-cell small clearfix">
                                <div class="name">{$item.name}</div>
                                <div class="value">{$item.value}</div>
                            </div>
                        {else}
                        <span>{$item.value}</span>
                        {/if}

                        {assign var='short_form_fields' value=$short_form_fields+1}
                    {/foreach}

                    {rlHook name='listingAfterFields'}
                </div>

                {if !$config.sf_display_fields}
                    <div class="stat-line">{rlHook name='listingAfterStats'}</div>
                {/if}
            </li>

            <li class="system d-flex align-items-center">
                {if $listing.fields[$config.price_tag_field].value}
                    <span class="price-tag">
                        <span>{$listing.fields[$config.price_tag_field].value}</span>
                    </span>
                {/if}

                {if $listing.Listing_type == $config.service_package_type_task}
                    <span class="date">{toPrettyDateTime date=$listing.Date}</span>
                {elseif $config.sf_display_fields}
                    <div class="stat-line ml-auto">{rlHook name='listingAfterStats'}</div>
                {/if}
            </li>

            {if $config.messages_module}
                {if $listing.Listing_type == $config.service_package_type_service}
                    <li data-listing-id="{$listing.ID}" class="offer-task pt-2">
                        <input type="button" value="{$lang.service_offer_task}" class="w-100 button-transparent" />
                    </li>
                {elseif $pictures_available && $listing.Listing_type == $config.service_package_type_task}
                    <li data-listing-id="{$listing.ID}" class="offer-service pt-2">
                        <input type="button" value="{$lang.service_offer_service}" class="w-100 button-transparent" />
                    </li>
                {/if}
            {/if}
        </ul>

        <div class="navigation-column">
            {if $config.messages_module && !$pictures_available && $listing.Listing_type == $config.service_package_type_task}
                <div data-listing-id="{$listing.ID}" class="offer-service">
                    <input type="button" value="{$lang.service_offer_service}" class="w-100 button-transparent" />
                </div>
            {/if}

            <div class="before-nav">{rlHook name='listingBeforeStats'}</div>

            <ul class="nav-column d-flex justify-content-end">{strip}
                {rlHook name='listingNavIcons'}

                {if $listing.Listing_type != $config.service_package_type_service
                    && $listing.Listing_type != $config.service_package_type_task
                    && $config.show_call_owner_button
                    && $config.messages_module}
                <li data-listing-id="{$listing.ID}" class="call-owner">
                    <svg viewBox="0 0 14 14" class="icon grid-icon-fill">
                        <use xlink:href="#contact-icon"></use>
                    </svg>
                </li>
                {/if}
            {/strip}</ul>

            <span class="category-info hide">
                <a href="{$rlBase}{if $config.mod_rewrite}{$pages[$listing_type.Page_key]}/{$listing.Path}{if $listing_type.Cat_postfix}.html{else}/{/if}{else}?page={$pages[$listing_type.Page_key]}&category={$listing.Category_ID}{/if}">
                    {$listing.name}
                </a>
            </span>
        </div>
    </div>
</article>

<!-- listing item end -->
