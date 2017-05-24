<?php require_once("../includes/braintree_init.php"); ?>

<html>
<?php require_once("../includes/head.php"); ?>
<body>
<h1>Hosted Fields</h1>

<form id="cardForm" action="checkout_hosted.php">
  <div class="panel">
    <header class="panel__header">
    </header>

    <div class="panel__content">
      <div class="textfield--float-label">


        <label class="hosted-field--label" for="card-number"><span class="icon">
         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg></span> Card Number 
        </label>
        <div id="card-number" class="hosted-field"></div>
      </div>

      <div class="textfield--float-label">

        <label class="hosted-field--label" for="expiration-date">
           <span class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/></svg>
         </span> 
          Expiration Date</label>
        <div id="expiration-date" class="hosted-field"></div>
      </div>


      <div class="textfield--float-label">
        <label class="hosted-field--label" for="cvv">
          <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
            </span>
            CVV</label>
        <div id="cvv" class="hosted-field"></div>
      </div>

      <div class="textfield--float-label">

        <label class="hosted-field--label" for="postal-code">
           <span class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
         </span> 
          Postal Code</label>
        <div id="postal-code" class="hosted-field"></div>
      </div>
    </div>

    <footer class="panel__footer">
      <button class="pay-button">Pay</button>
    </footer>
  </div>
</form>

<!-- Load the required client component. -->
<script src="https://js.braintreegateway.com/web/3.16.0/js/client.min.js"></script>

<!-- Load Hosted Fields component. -->
<script src="https://js.braintreegateway.com/web/3.16.0/js/hosted-fields.min.js"></script>
    <script>
      braintree.client.create({
        authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b'
      }, function(err, clientInstance) {
        if (err) {
          console.error(err);
          return;
        }

        braintree.hostedFields.create({
          client: clientInstance,
          styles: {
            'input': {
              'font-size': '16px',
              'font-family': 'roboto, verdana, sans-serif',
              'font-weight': 'lighter',
              'color': 'black'
            },
            ':focus': {
              'color': 'black'
            },
            '.valid': {
              'color': 'black'
            },
            '.invalid': {
              'color': 'black'
            }
          },
          fields: {
            number: {
              selector: '#card-number',
              placeholder: '1111 1111 1111 1111'
            },
            cvv: {
              selector: '#cvv',
              placeholder: '111'
            },
            expirationDate: {
              selector: '#expiration-date',
              placeholder: 'MM/YY'
            },
            postalCode: {
              selector: '#postal-code',
              placeholder: '11111'
            }
          }
        }, function(err, hostedFieldsInstance) {
          if (err) {
            console.error(err);
            return;
          }

          hostedFieldsInstance.on('focus', function (event) {
            var field = event.fields[event.emittedBy];
            $(field.container).next('.hosted-field--label').addClass('label-float').removeClass('filled');
          });
          // Emulates floating label pattern
          hostedFieldsInstance.on('blur', function (event) {
            var field = event.fields[event.emittedBy];

            if (field.isEmpty) {
              $(field.container).next('.hosted-field--label').removeClass('label-float');
            } else if (event.isValid) {
              $(field.container).next('.hosted-field--label').addClass('filled');
            } else {
              $(field.container).next('.hosted-field--label').addClass('invalid');
            }
          });

          hostedFieldsInstance.on('empty', function (event) {
            var field = event.fields[event.emittedBy];

            $(field.container).next('.hosted-field--label').removeClass('filled').removeClass('invalid');
          });

          hostedFieldsInstance.on('validityChange', function (event) {
            var field = event.fields[event.emittedBy];

            if (field.isPotentiallyValid) {
              $(field.container).next('.hosted-field--label').removeClass('invalid');
            } else {
              $(field.container).next('.hosted-field--label').addClass('invalid');  
            }
          });

          $('#cardForm').submit(function (event) {
            event.preventDefault();

            hostedFieldsInstance.tokenize(function (err, payload) {
              if (err) {
                console.error(err);
                return;
              }

              payload.nonce;
            });
          });
        });
      });
    </script>
  </body>
</html>