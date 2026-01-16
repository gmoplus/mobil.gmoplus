<!-- listing details with quote system -->

{addCSS file=$rlTplBase|cat:'css/quote-system.css'}

{if !$errors}

{if $config.map_module && $location.direct}
    {mapsAPI assign='mapAPI'}

    <script>
    rlConfig['mapAPI'] = [];
    rlConfig['mapAPI']['css'] = JSON.parse('{$mapAPI.css|@json_encode}');
    rlConfig['mapAPI']['js']  = JSON.parse('{$mapAPI.js|@json_encode}');
    </script>
{/if}

<div class="listing-details details{if $config.map_module && $location.direct} loc-exists{/if}">
    {rlHook name='listingDetailsTopTpl'}

    <section class="main-section">
        <!-- Quote Button Area -->
        <div class="quote-system-container">
            <button id="quote-request-btn" class="btn btn-primary btn-lg" 
                    data-listing-id="{$listing_data.ID}" 
                    data-category-id="{$listing_data.Category_ID}" 
                    style="display: none;">
                <i class="fa fa-envelope"></i> Teklif Al
            </button>
        </div>

        <div class="d-flex top-navigation mb-3">
            {if $listing_data.Account_ID != $account_info.ID}
            <div class="icons">
                  <span id="fav_{$listing_data.ID}" class="favorite add" title="{$lang.add_to_favorites}"><span class="icon"></span></span>
            </div>
            {/if}
            <div class="d-flex flex-wrap">
                <h1>{$pageInfo.name}</h1>

                {if $listing.common.Fields.bedrooms.value || $listing.common.Fields.bathrooms.value || $listing.common.Fields.square_feet.value}
                <ul class="card-info services w-100">
                    <li>
                        {strip}
                        {if $listing.common.Fields.bedrooms.value}
                            <span title="{$listing.fields.bedrooms.name}" class="badrooms">{$listing.common.Fields.bedrooms.value}</span>
                        {/if}
                        {if $listing.common.Fields.bathrooms.value}
                            <span title="{$listing.fields.bathrooms.name}" class="bathrooms">{$listing.common.Fields.bathrooms.value}</span>
                        {/if}
                        {if $listing.common.Fields.square_feet.value}
                            <span title="{$listing.fields.square_feet.name}" class="square_feet">{$listing.common.Fields.square_feet.value}</span>
                        {/if}
                        {/strip}
                    </li>
                </ul>
                {/if}
            </div>
        </div>

        <!-- listing details -->
        <div id="area_listing" class="tab_area clearfix {if !$listing_type.Photo || !$photos}no-pictures{/if}">
            <section class="main-section">

                <!-- price tag -->
                {if $price_tag.value}
                    <div class="price-tag mb-3" id="df_field_price">
                        {if $price_tag.Options.from}{$lang.price_from}{/if}
                        <span>
                            {if $price_contact_form}
                                <a href="javascript://"
                                    class="contact-owner price-contact-form"
                                    data-listing-id="{$listing_data.ID}"
                                    data-account-id="{$listing_data.Account_ID}"
                                >
                            {/if}
                            {$price_tag.value}
                            {if $price_contact_form}</a>{/if}
                        </span>
                        {if $listing_data.sale_rent == 2 && $listing.common.Fields.time_frame.value}
                            / {$listing.common.Fields.time_frame.value}
                        {/if}
                    </div>
                {/if}
                <!-- price tag end -->

                <div class="mb-3">
                    {rlHook name='tplListingDetailsRating'}
                </div>
            </section>

            {rlHook name='listingDetailsPreFields'}

            {include file=$controllerDir|cat:'listing_details/details.tpl'}

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
    </section>
</div>

<!-- Quote Form Modal -->
<div id="quote-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Teklif Al</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="quote-form-container">
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Yükleniyor...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quote Form Template -->
<script type="text/x-template" id="quote-form-template">
{literal}
<div class="quote-form">
    <div class="quote-description mb-3">
        <h5>{{form.title}}</h5>
        <p>{{form.description}}</p>
    </div>
    
    <form id="quote-submission-form">
        <input type="hidden" name="form_id" value="{{form.id}}">
        <input type="hidden" name="listing_id" value="{{listing_id}}">
        <input type="hidden" name="category_id" value="{{category_id}}">
        
        <!-- Basic Contact Information -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="requester_name">Ad Soyad *</label>
                    <input type="text" class="form-control" id="requester_name" name="requester_name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="requester_email">Email *</label>
                    <input type="email" class="form-control" id="requester_email" name="requester_email" required>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="requester_phone">Telefon</label>
            <input type="tel" class="form-control" id="requester_phone" name="requester_phone">
        </div>
        
        <!-- Dynamic Form Fields -->
        <hr>
        <div id="dynamic-fields">
            {{#each form.fields}}
            <div class="form-group">
                <label for="field_{{field_key}}">
                    {{field_name}}
                    {{#if is_required}}<span class="text-danger">*</span>{{/if}}
                </label>
                
                {{#if (eq field_type 'text')}}
                    <input type="text" class="form-control" id="field_{{field_key}}" 
                           name="form_data[{{field_key}}]" placeholder="{{placeholder}}"
                           {{#if is_required}}required{{/if}}>
                           
                {{else if (eq field_type 'textarea')}}
                    <textarea class="form-control" id="field_{{field_key}}" 
                              name="form_data[{{field_key}}]" placeholder="{{placeholder}}" rows="3"
                              {{#if is_required}}required{{/if}}></textarea>
                              
                {{else if (eq field_type 'select')}}
                    <select class="form-control" id="field_{{field_key}}" 
                            name="form_data[{{field_key}}]" {{#if is_required}}required{{/if}}>
                        <option value="">Seçiniz...</option>
                        {{#each options}}
                        <option value="{{this}}">{{this}}</option>
                        {{/each}}
                    </select>
                    
                {{else if (eq field_type 'number')}}
                    <input type="number" class="form-control" id="field_{{field_key}}" 
                           name="form_data[{{field_key}}]" placeholder="{{placeholder}}"
                           {{#if is_required}}required{{/if}}>
                           
                {{else if (eq field_type 'email')}}
                    <input type="email" class="form-control" id="field_{{field_key}}" 
                           name="form_data[{{field_key}}]" placeholder="{{placeholder}}"
                           {{#if is_required}}required{{/if}}>
                           
                {{else if (eq field_type 'phone')}}
                    <input type="tel" class="form-control" id="field_{{field_key}}" 
                           name="form_data[{{field_key}}]" placeholder="{{placeholder}}"
                           {{#if is_required}}required{{/if}}>
                           
                {{else if (eq field_type 'date')}}
                    <input type="date" class="form-control" id="field_{{field_key}}" 
                           name="form_data[{{field_key}}]" {{#if is_required}}required{{/if}}>
                           
                {{else if (eq field_type 'time')}}
                    <input type="time" class="form-control" id="field_{{field_key}}" 
                           name="form_data[{{field_key}}]" {{#if is_required}}required{{/if}}>
                           
                {{else if (eq field_type 'radio')}}
                    {{#each options}}
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="{{../field_key}}_{{@index}}" 
                               name="form_data[{{../field_key}}]" value="{{this}}" {{#if ../is_required}}required{{/if}}>
                        <label class="form-check-label" for="{{../field_key}}_{{@index}}">{{this}}</label>
                    </div>
                    {{/each}}
                    
                {{else if (eq field_type 'checkbox')}}
                    {{#each options}}
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="{{../field_key}}_{{@index}}" 
                               name="form_data[{{../field_key}}][]" value="{{this}}">
                        <label class="form-check-label" for="{{../field_key}}_{{@index}}">{{this}}</label>
                    </div>
                    {{/each}}
                {{/if}}
            </div>
            {{/each}}
        </div>
        
        <!-- Captcha -->
        <div class="form-group">
            <label for="captcha">Güvenlik Kodu *</label>
            <div class="row">
                <div class="col-6">
                    <img id="captcha-image" src="{/literal}{$rlBase}{literal}quote_ajax.php?captcha=1&t=" + Math.random() 
                         class="border" alt="Captcha" style="cursor: pointer;">
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" id="captcha" name="captcha" required>
                    <small class="form-text text-muted">Yukarıdaki kodu girin</small>
                </div>
            </div>
        </div>
        
        <div class="text-right">
            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">İptal</button>
            <button type="submit" class="btn btn-primary">Teklif Gönder</button>
        </div>
    </form>
</div>
{/literal}
</script>

<script class="fl-js-dynamic">
{literal}
// Quote System JavaScript
var QuoteSystem = {
    listingId: {/literal}{$listing_data.ID}{literal},
    categoryId: {/literal}{$listing_data.Category_ID}{literal},
    baseUrl: '{/literal}{$rlBase}{literal}',
    
    init: function() {
        this.checkAvailability();
        this.bindEvents();
    },
    
    checkAvailability: function() {
        var self = this;
        
        // Debug için butonu her zaman göster
        $('#quote-request-btn').show();
        console.log('Quote button shown for listing:', this.listingId);
        
        $.ajax({
            url: this.baseUrl + 'quote_ajax.php',
            method: 'POST',
            data: {
                action: 'check_availability',
                listing_id: this.listingId,
                category_key: 'nakliyat'  // Test için
            },
            success: function(response) {
                if (response.success && response.available) {
                    $('#quote-request-btn').show();
                }
            },
            error: function() {
                console.log('Quote availability check failed');
            }
        });
    },
    
    bindEvents: function() {
        var self = this;
        
        // Quote button click
        $('#quote-request-btn').click(function() {
            self.showQuoteForm();
        });
        
        // Captcha refresh
        $(document).on('click', '#captcha-image', function() {
            $(this).attr('src', self.baseUrl + 'quote_ajax.php?captcha=1&t=' + Math.random());
        });
        
        // Form submission
        $(document).on('submit', '#quote-submission-form', function(e) {
            e.preventDefault();
            self.submitQuote($(this));
        });
    },
    
    showQuoteForm: function() {
        var self = this;
        
        $.ajax({
            url: this.baseUrl + 'quote_ajax.php',
            method: 'POST',
            data: {
                action: 'get_form',
                listing_id: this.listingId
            },
            success: function(response) {
                if (response.success) {
                    self.renderForm(response.form, response.category);
                    $('#quote-modal').modal('show');
                } else {
                    alert(response.error || 'Form yüklenemedi');
                }
            },
            error: function() {
                alert('Bir hata oluştu, lütfen tekrar deneyin');
            }
        });
    },
    
    renderForm: function(form, category) {
        var template = $('#quote-form-template').html();
        
        // Register Handlebars helpers
        if (typeof Handlebars !== 'undefined') {
            Handlebars.registerHelper('eq', function(a, b) {
                return a === b;
            });
        }
        
        var compiledTemplate = Handlebars ? Handlebars.compile(template) : function() { return template; };
        
        var html = compiledTemplate({
            form: form,
            listing_id: this.listingId,
            category_id: this.categoryId
        });
        
        $('#quote-form-container').html(html);
    },
    
    submitQuote: function($form) {
        var self = this;
        var formData = $form.serialize() + '&action=submit_quote';
        
        $.ajax({
            url: this.baseUrl + 'quote_ajax.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    alert('Teklif talebiniz başarıyla gönderildi!');
                    $('#quote-modal').modal('hide');
                } else {
                    var errorMsg = response.errors ? response.errors.join('\n') : (response.error || 'Bir hata oluştu');
                    alert(errorMsg);
                    // Refresh captcha on error
                    $('#captcha-image').trigger('click');
                }
            },
            error: function() {
                alert('Bağlantı hatası, lütfen tekrar deneyin');
                $('#captcha-image').trigger('click');
            }
        });
    }
};

// Initialize when document is ready
$(document).ready(function() {
    QuoteSystem.init();
});
{/literal}
</script>

<!-- Load Handlebars if not already loaded -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>

{else}
    {include file='errors.tpl'}
{/if}

<!-- listing details end --> 