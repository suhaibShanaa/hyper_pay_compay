<!--cdn JQuery-->

<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>



<script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$one->id}}?"></script>

<script>
    var wpwlOptions = {
        onReady: function() {
            var createRegistrationHtml = '<div class="customLabel">Store payment details?</div>' +
                '<div class="customInput"><input type="checkbox" name="createRegistration" value="true" />' +
                '</div>';
            $('form.wpwl-form-card').find('.wpwl-button').before(createRegistrationHtml);
        },
        registrations: {
            requireCvv: false,
            hideInitialPaymentForms: true
        }
    }
</script>


<form action="{{ URL::to('/status') }}"
      class="paymentWidgets"
      data-brands="VISA MASTER AMEX">

</form>

<!--
 fore ach
 ($data as $prin)
    <li>$prin->reg_id</li>
 end for each
-->
