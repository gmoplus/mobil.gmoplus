<!-- Notify professional tpl -->

{php}
$GLOBALS['page_info']['Controller_real'] = $GLOBALS['page_info']['Controller'];
$this->_tpl_vars['pageInfo']['Controller'] = 'listing_details';
{/php}

{include file='blocks/listing_details_seller.tpl' sidebar=true listings_count_exists=false}

{if $manageListing->step != 'done'}
    <div class="mt-4">
        <label>
            <input type="checkbox" name="public_visible" value="1" {if $smarty.session.add_listing.notify_make_visible}checked="checked"{/if} />
            {$lang.service_offer_task_make_visible}
        </label>
    </div>

    <script class="fl-js-dynamic">
    {literal}

    $(function(){
        $('input[name=public_visible]').change(function(){
            var is_visible = $(this).is(':checked') ? 1 : 0;

            var data = {
                mode: 'serviceAddListingSaveIsVisible',
                isVisible: is_visible
            };
            flUtil.ajax(data, function(response, status){});
        });
    });

    {/literal}
    </script>
{/if}

{php}
$this->_tpl_vars['pageInfo']['Controller'] = $GLOBALS['page_info']['Controller_real'];
{/php}

<!-- Notify professional tpl end -->
