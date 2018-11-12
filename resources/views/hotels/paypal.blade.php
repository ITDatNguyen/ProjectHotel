@extends('layouts.app') 
@section('content')
<script src="{{URL::asset('http://code.jquery.com/jquery-1.10.2.js')}}"></script>
<script src="{{URL::asset('http://code.jquery.com/ui/1.11.2/jquery-ui.js')}}"></script>
<script src="{{URL::asset('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js')}}"></script>
<style>
    .StripeElement {
        background-color: white;
        height: 40px;
        padding: 10px 12px;
        border-radius: 4px;
        border: 1px solid transparent;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
<div class="row">
    <div class="row">
        <div style="width: 50%; margin-left: 15%">
            <div class="small-6 small-centered columns">
            <form action="/api/payment/{{$tien}}" style="margin:  69px 0px 10px 5%" method="POST" id="payment-form">
                    <div class="form-row">
                        <label for="card-element">
                                Thẻ tín dụng hoặc thẻ ghi nợ
                    </label>
                    <h2 name="tien">Tiền {{$tien}}</h2>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <input type="submit" class="Submit button success" value="Thanh toán">
                </form>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('pk_test_eCX9wg6qMxiNtIYTQioK7JJX');
            var elements = stripe.elements();
            var style = {
        base: {
        // Add your base input styles here. For example:
        fontSize: '16px',
        color: "#32325d",
      }
    };
    
    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});
    
    // Add an instance of the card Element into the card-element <div>.
    card.mount('#card-element');
    card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        console.log("99");
        
      event.preventDefault();
    
      stripe.createToken(card).then(function(result) {
        if (result.error) {
          // Inform the customer that there was an error.
          var errorElement = document.getElementById('card-errors');
          errorElement.textContent = result.error.message;
        } else {
            console.log("222");
            
          // Send the token to your server.
          stripeTokenHandler(result.token);
        }
      });
    });
    function stripeTokenHandler(token) {
        console.log('2',token);
        
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);
    
      // Submit the form
      form.submit();
    }
    </script>
</div>
@endsection