<!-- site guide box -->

{addCSS file=$rlTplBase|cat:'components/site-guide-box/site-guide-box.css'}

<section class="row">
    <div class="col-md-4">
        <div class="site-guide-card w-100 position-relative overflow-hidden mb-4 mb-md-0">
            <div class="position-absolute w-100 h-100">
                {if $post_task_page_key}
                <a href="{pageUrl key=$post_task_page_key}" class="text-reset">
                {/if}
                    <div class="pt-4 pl-4 pr-4 pt-md-2 pl-md-2 pr-md-2 pt-xl-4 pl-xl-4 pr-xl-4 text-center">
                        <h3 class="mt-2 font-weight-bold mb-3">{$lang.site_guide_card_title_1}</h3>
                        <p class="font-weight-light">{$lang.site_guide_card_text_1}</p>
                        {fetch file=$componentDir|cat:'site-guide-box/image1.svg'}
                    </div>
                {if $post_task_page_key}
                </a>
                {/if}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="site-guide-card w-100 position-relative overflow-hidden mb-4 mb-md-0">
            <div class="position-absolute w-100 h-100">
                <div class="pt-4 pl-4 pr-4 pt-md-2 pl-md-2 pr-md-2 pt-xl-4 pl-xl-4 pr-xl-4 text-center">
                    <h3 class="mt-2 font-weight-bold mb-3">{$lang.site_guide_card_title_2}</h3>
                    <p class="font-weight-light">{$lang.site_guide_card_text_2}</p>
                    {fetch file=$componentDir|cat:'site-guide-box/image2.svg'}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="site-guide-card w-100 position-relative overflow-hidden">
            <div class="position-absolute w-100 h-100">
                <div class="pt-4 pl-4 pr-4 pt-md-2 pl-md-2 pr-md-2 pt-xl-4 pl-xl-4 pr-xl-4 text-center">
                    <h3 class="mt-2 font-weight-bold mb-3">{$lang.site_guide_card_title_3}</h3>
                    <p class="font-weight-light">{$lang.site_guide_card_text_3}</p>
                    {fetch file=$componentDir|cat:'site-guide-box/image3.svg'}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- site guide box end -->
