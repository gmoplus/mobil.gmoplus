<!-- quote submission view -->
<div style="background: yellow; padding: 10px; margin: 10px 0;">
    <strong>DEBUG:</strong> quote_view_submission.tpl template yüklendi
    {if $submission}
        Submission ID: {$submission.id}
    {else}
        Submission değişkeni boş
    {/if}
</div>

<div id="nav_bar">
    <a href="{$rlBaseC}" class="button_bar">
        <span class="left"></span>
        <span class="center_back">Teklif Listesine Dön</span>
        <span class="right"></span>
    </a>
</div>

<div class="content-padding">
    {if $error_message}
    <div class="error" style="background:#ffe6e6;border:1px solid #ff9999;padding:10px;margin:10px 0;color:#cc0000;">
        <strong>Hata:</strong> {$error_message}
    </div>
    {else}
    <div class="table">
        <div class="header">
            <div class="left">Teklif Detayları - #{$submission.id}</div>
        </div>
        
        <div style="padding: 20px;">
            <h3>Genel Bilgiler</h3>
            <table class="sTable" style="width: 100%;">
                <tr>
                    <td><strong>Teklif ID:</strong></td>
                    <td>{$submission.id}</td>
                </tr>
                <tr>
                    <td><strong>Form Türü:</strong></td>
                    <td>{$form.form_name|default:'Bilinmiyor'}</td>
                </tr>
                <tr>
                    <td><strong>İlan:</strong></td>
                    <td>
                        {if $submission.listing_id}
                            <a href="{$rlBase}listing/{$submission.listing_id}" target="_blank">
                                {$submission.listing_title}
                            </a>
                        {else}
                            -
                        {/if}
                    </td>
                </tr>
                <tr>
                    <td><strong>Talep Eden:</strong></td>
                    <td>{$submission.requester_name}</td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td><a href="mailto:{$submission.requester_email}">{$submission.requester_email}</a></td>
                </tr>
                <tr>
                    <td><strong>Telefon:</strong></td>
                    <td>{$submission.requester_phone}</td>
                </tr>
                <tr>
                    <td><strong>Tarih:</strong></td>
                    <td>{$submission.created_date|date_format:"%d.%m.%Y %H:%M"}</td>
                </tr>
                <tr>
                    <td><strong>Durum:</strong></td>
                    <td>
                        <span class="status-{$submission.status}">
                            {if $submission.status == 'new'}Yeni{/if}
                            {if $submission.status == 'read'}Okundu{/if}
                            {if $submission.status == 'replied'}Yanıtlandı{/if}
                        </span>
                    </td>
                </tr>
            </table>
            
            {if $form_data}
            <h3>Teklif Detayları</h3>
            <table class="sTable" style="width: 100%;">
                {foreach from=$form_data key=field_key item=field_value}
                <tr>
                    <td style="width: 30%;"><strong>{$field_key}:</strong></td>
                    <td>{$field_value}</td>
                </tr>
                {/foreach}
            </table>
            {/if}
            
            {if $submission.quote_message}
            <h3>Ek Mesaj</h3>
            <div style="background: #f5f5f5; padding: 15px; border: 1px solid #ddd; border-radius: 4px;">
                {$submission.quote_message|nl2br}
            </div>
            {/if}
        </div>
    </div>
    {/if}
</div>

<style>
.status-new { color: #ff6600; font-weight: bold; }
.status-read { color: #0066cc; }
.status-replied { color: #009900; }
.sTable td { padding: 8px; border-bottom: 1px solid #eee; }
</style> 