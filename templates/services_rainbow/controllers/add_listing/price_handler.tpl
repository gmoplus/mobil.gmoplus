<!-- Service price handler tpl -->

<script class="fl-js-dynamic">
var price_tag_field = '{$config.price_tag_field}';

{literal}

$(function(){
    var $bookingStateSwitcher = $('#sf_field_booking_module input[name="f[booking_module]"]');
    var $pricesCont = $('.rates-field-container');
    var $priceWrapper = $('#sf_field_' + price_tag_field);
    var $priceCell = $('#sf_field_' + price_tag_field).closest('.submit-cell');
    var $priceField = $priceWrapper.find('input[type=text]');
    var $currencyField = $priceWrapper.find('select');
    var currentCell = null;
    var $hiddenInput = null;

    if (!$pricesCont.length) {
        return;
    }

    var servicePriceHandler = function(){
        var $bookingState = $bookingStateSwitcher.filter(':checked').val();

        if (!$priceWrapper.length) {
            return;
        }

        if ($bookingState === '1') {
            $priceField.attr('disabled', 'disabled');

            if (!$hiddenInput) {
                $hiddenInput = $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', $priceField.attr('name'))
                    .val($priceField.val());
                $priceField.before($hiddenInput);
            }
        } else {
            $priceField.removeAttr('disabled');

            if ($hiddenInput) {
                $priceField.prev().remove();
            }
        }
    }

    var setServicePrice = function(){
        var minPrice = 0;
        var currency = '';

        $pricesCont.find('> .rates').each(function(){
            var price = $(this).find('input.numeric').val();

            if (!minPrice || parseInt(price) < minPrice) {
                minPrice = price;
                currentCell = this;
                currency = $(this).find('select[name*=currency]').val();
            }
        });

        $hiddenInput.val(minPrice);
        $priceField.val(minPrice).removeClass('error');
        $currencyField.val(currency);
    }

    var setServiceCurrency = function(currency){
        if (currentCell == $(currency).closest('.rates').get(0)) {
            $currencyField.val($(currency).val());
        }
    }

    servicePriceHandler();

    $bookingStateSwitcher.change(function(){
        servicePriceHandler();
    });

    $pricesCont.on('blur', 'input.numeric', function(){
        setServicePrice();
    })
    $pricesCont.on('change', 'select[name*=currency]', function(){
        setServiceCurrency(this);
    })
    $pricesCont.on('click', 'img.remove', function(){
        setTimeout(function(){
            setServicePrice();
        }, 400);
    })
});

{/literal}
</script>

<!-- Service price handler tpl -->
