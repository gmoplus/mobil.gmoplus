<!-- Call buttons in sidebar -->

<input type="button" class="w-100 contact-owner" value="{phrase key='contact_owner'}" accesskey="{phrase key='contact_owner'}" />
<input class="w-100 mt-3 call-owner" data-listing-id="{$listing_data.ID}" type="button" value="{phrase key='call_owner'}" accesskey="{phrase key='call_owner'}" />

<!-- Quote Request Button -->
<input type="button" class="w-100 mt-3" id="quote-request-btn" value="Teklif Al" 
       data-listing-id="{$listing_data.ID}" 
       data-category-id="{$listing_data.Category_ID}"
       style="display: none; background-color: #28a745; border-color: #28a745; color: white;" />

<!-- Call buttons in sidebar end -->
