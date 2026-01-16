<!-- buttons below categories -->

{assign var='box_listing_type' value=$block.Key|replace:'ltcb_':''}
{assign var='type_page_key' value=$listing_types.$box_listing_type.Page_key}

<div class="align-center mt-5 d-flex flex-column d-md-block align-items-sm-center">
    <a href="{pageUrl key=$type_page_key}" class="button add-property button-transparent">{$lang.browse_categories}</a>
    {if $post_task_page_key}
    <span class="ml-4 mr-4 mt-2 mb-2 mt-md-0 mb-md-0">{$lang.or}</span>
    <a href="{pageUrl key=$post_task_page_key}" class="button add-property">{phrase key='pages+name+al_'|cat:$config.service_package_type_task}</a>
    {/if}
</div>

<!-- buttons below categories end -->
