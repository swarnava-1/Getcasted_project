
<script src="https://js.stripe.com/v3/"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
  .from-sec{
      display:inline-block;
      width:100%;
  }  
  .mn-dv{
    float: none;
    margin: 0 auto;
    border: 1px solid #ccc;
    text-align: left;
    margin-top: 50px;
    padding: 25px 15px;
  }
  .mn-dv .panel,.mn-dv .panel form{
      margin-bottom: 0;
  }
  .mn-dv .panel-title{
    font-size: 22px;
    font-weight: 600;
    text-transform: uppercase;
  }
  .mn-dv select{
    display: inline-block;
    width: 100%;
    margin-top: 10px;
    border: 1px solid #000;
    padding: 6px;
    border-radius: 4px;
  }
  .mn-dv .panel-heading{
    padding-bottom:0;
  }
  .mn-dv button{
    width: 100%;
    padding: 10px 0;
    font-size: 18px;
    margin-top: 18px;
  }
  .mn-dv .panel-heading p{
    display: inline-block;
    width: 100%;
    margin-top: 15px;
    text-transform: uppercase;
    margin-bottom: 0;
  }
  .mn-dv .panel-body .form-group input,.mn-dv .panel-body .form-group div.field{
    display: inline-block;
    width: 100%;
    border: 1px solid #000;
    border-radius: 4px;
    padding: 6px;
  }
</style>
<div class="from-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mn-dv">
                <div class="panel">
                    <form action="" method="POST" id="paymentFrm">
                        <div class="panel-heading">
                            <h3 class="panel-title">Plan Subscription with Stripe</h3>
                            <!-- Plan Info -->
                            <p>
                                <b>Select Plan:</b>
                                <select name="subscr_plan" id="subscr_plan">
                                    <?php foreach($plans as $plan){ ?>
                                    <option value="<?php echo $plan['id']; ?>"><?php echo $plan['name'].' [$'.$plan['price'].'/'.$plan['interval'].']'; ?></option>
                                    <?php } ?>
                                </select>
                            </p>
                        </div>
                        <div class="panel-body">
                <!-- Display errors returned by createToken -->
                <div id="paymentResponse"></div>
    			
                <!-- Payment form -->
                <div class="form-group">
                    <label>NAME</label>
                    <input type="text" name="name" id="name" class="field" placeholder="Enter name" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label>EMAIL</label>
                    <input type="email" name="email" id="email" class="field" placeholder="Enter email" required="">
                </div>
                <div class="form-group">
                    <label>CARD NUMBER</label>
                    <div id="card_number" class="field"></div>
                </div>
                <div class="">
                    <div class="left">
                        <div class="form-group">
                            <label>EXPIRY DATE</label>
                            <div id="card_expiry" class="field"></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="form-group">
                            <label>CVC CODE</label>
                            <div id="card_cvc" class="field"></div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="payBtn">Submit Payment</button>
            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('<?php echo $this->config->item('stripe_publishable_key'); ?>');

// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
        fontWeight: 400,
        fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
        fontSize: '16px',
        lineHeight: '1.4',
        color: '#555',
        backgroundColor: '#fff',
        '::placeholder': {
            color: '#888',
        },
    },
    invalid: {
        color: '#eb1c26',
    }
};

var cardElement = elements.create('cardNumber', {
    style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
    'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
    'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('paymentFrm');

// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
    e.preventDefault();
    createToken();
});

// Create single-use token to charge the user
function createToken() {
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
	
    // Submit the form
    form.submit();
}
</script>