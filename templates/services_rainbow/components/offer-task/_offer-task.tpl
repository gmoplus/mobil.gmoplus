<!-- Popup interface -->

<script id="offer_task_popup_content" type="text/x-jsrender">
<div class="d-flex flex-column">
    <div class="pb-3">
        [%if main_phone%]
            <a href="tel:[%:main_phone%]" style="font-size: 1.750em;">[%:main_phone%]</a>
        [%else%]
            {$lang.not_available}
        [%/if%]
    </div>

    [%if main_phone_messengers%]
        <span class="messenger-icons d-inline-flex flex-nowrap pb-3">
            [%props main_phone_messengers%]
                <a href="[%:prop.url%]"
                   target="_blank"
                   class="[%if #index < 2%]mr-2 [%/if%]hover-brightness-affect messenger-icons__[%:key%]"
                >
                    <img src="[%:prop.icon%]" alt="">
                </a>
            [%/props%]
        </span>
    [%/if%]
    
    <div class="pb-1">[%:full_name%]</div>
    <div class="date">[%:seller_data%]</div>

    [%if phones%]
    <div class="mt-4">
        <h4>[%:phrases.call_owner_additional_numbers%]</h4>
        [%for phones%]
            <div class="pt-1">
                <a href="tel:[%:%]">[%:%]</a>
            </div>
        [%/for%]
    </div>
    [%/if%]

    <div class="mt-4">
        [%if listings%]
            <select class="w-100 offer-tasks-selector">
                <option value="">{$lang.service_select_from_my_tasks}</option>
                [%for listings%]
                    <option value="[%:ID%]">[%:listing_title%]</option>
                [%/for%]
            </select>
            <input type="button" class="offer-task-button w-100 mt-2" value="{$lang.service_offer_selected_task}" />

            {if $post_task_page_key}
                <div class="text-center mt-3 mb-3">{$lang.or}</div>
            {/if}
        [%/if%]

        {if $post_task_page_key}
            <a class="button button-transparent w-100" target="_blank" href="[%:add_listing_url%]">{$lang.service_offer_new_task}</a>
        {/if}
    </div>
</div>
</script>

<script id="call_owner_no_available" type="text/x-jsrender">
<div class="d-flex flex-column">
    <div class="attention">[%:phrases.contacts_not_available%]</div>
    <a href="{pageUrl key='my_profile' add_url='step=purchase'}" class="button w-100">[%:phrases.change_plan%]</a>
</div>
</script>

<script>
rlConfig['show_call_owner_button'] = {$config.show_call_owner_button};
{literal}

if (!rlConfig['show_call_owner_button']) {
    flUtil.loadStyle(rlConfig['tpl_base'] + 'components/popup/popup.css');
}
flUtil.loadScript([
        rlConfig['tpl_base'] + 'components/popup/_popup.js',
        rlConfig['libs_url'] + 'javascript/jsRender.js'
    ], function(){
        $('body').off('click', '.call-owner');
        $('body').on('click', '.offer-task, [data-action=offer-task]', function(){
            $(this).popup({
                click: false,
                width: 320,
                caption: lang['service_offer_task'],
                content: $('<div>').css('height', '90px').text(lang['loading']),
                onShow: function($interface){
                    var popupClass = this;
                    var listingID = this.$element.data('listing-id');
                    var data = {
                        mode: 'serviceGetOfferTaskData',
                        listingID: listingID
                    };
                    flUtil.ajax(data, function(response, status){
                        if (status == 'success') {
                            var $content = $interface.find('.body');

                            $content.empty();

                            if (response.status == 'OK') {
                                $content.addClass('flex-column');
                                $content.append($('#offer_task_popup_content').render(response.results));
                                popupClass.setPosition();

                                flUtil.ajax({mode: 'savePhoneClick', listingID: listingID}, function () {});

                                // Task selection handler
                                var $tasksSelector = $interface.find('.offer-tasks-selector');
                                $tasksSelector.change(function(){
                                    $(this).removeClass('error');
                                });
                                $interface.find('.offer-task-button').click(function(){
                                    var taskID = $tasksSelector.val();
                                    if (taskID) {
                                        $(this)
                                            .val(lang['loading'])
                                            .attr('disabled', true)
                                            .addClass('disabled');
                                        var data = {
                                            mode: 'serviceOfferTask',
                                            taskID: taskID,
                                            listingID: listingID
                                        };
                                        flUtil.ajax(data, function(response, status){
                                            if (status == 'success') {
                                                printMessage(response.status == 'OK' ? 'notice' : 'warning', response.message);
                                                popupClass.close();
                                            } else {
                                                printMessage('error', lang['system_error']);
                                            }
                                        });
                                    } else {
                                        $tasksSelector.addClass('error');
                                    }
                                });
                            } else if (response.status == 'FORBIDDEN') {
                                if (isLogin) {
                                    var $html = $('#call_owner_no_available').render(response)
                                } else {
                                    var $html = $('#login_modal_source > .tmp-dom').clone(true, true);
                                    $html.prepend('<div class="attention">' + response.phrases.call_owner_forbidden_login_hint + '</div>');
                                }
                                $content.append($html);

                                popupClass.setPosition();
                            }
                        } else {
                            printMessage('error', lang['system_error']);
                        }
                    }, true);
                }
            });
        });
    }
);

{/literal}
</script>

<!-- Popup interface end -->
