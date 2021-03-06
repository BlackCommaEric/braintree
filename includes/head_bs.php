<head>
    <title>Braintree Integration!</title>
    <style type="text/css">
/*--------------------
SHARED VARIABLES
--------------------*/
$red: #E91E63;
$blue: #3F51B5;
$grey: #EAE8E9;
$grey2: #f3f3f3;
$white: #FFF;

/*--------------------
GENERAL
--------------------*/

*,
*:before,
*:after {
  box-sizing: inherit;
}

html {
  box-sizing: border-box;
  height: 100%;
  overflow: hidden;
}

body {
  background: #f2f2f2;
  font-family: 'Roboto', verdana, sans-serif;
  height: 100%;
}

h1 {
  font-size: 1.5em;
  font-weight: 100;
}

#cardForm {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}


/*--------------------
PANEL FORM
--------------------*/

.panel {
  background: $white;
  width: 80%;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .16), 0 0 2px 0 rgba(0, 0, 0, .12);
}

.panel__header {
  background: $blue;
  color: $white;
}

.panel__header,
.panel__footer {
  padding: 1em 2em;
}

.panel__footer {
  background: $grey2;
}

.panel__content {
  padding: 1em 2em;
  overflow: hidden;
}

.textfield--float-label {
  width: 50%;
  float: left;
  display: inline-block;
  padding-right: 5px;
}

.hosted-field--label {
  transform: translateY(0.4em);
  font-size: 1.125em;
  line-height: 32px;
  transition: all .15s ease-out;
  display: block;
  width: 100%;
  font-weight: 400;
  overflow: hidden;
  margin-bottom: 0.5em;
  &.label-float {
    text-overflow: ellipsis;
    color: #2196F3;
    transition: all .15s ease-out
  }
  &.filled {
    @extend .label-float;
    color: rgba(0, 0, 0, .54);
  }
  &.invalid {
    @extend .label-float;
    color: #F44336;
  }
}

span.icon {
  position: relative;
  top: 0.2em;
  margin-right: 0.2em;
}

svg {
  fill: #333;
}

.hosted-field {
  height: 32px;
  margin-bottom: 1em;
  display: block;
  background-color: transparent;
  color: rgba(0, 0, 0, .87);
  border: none;
  border-bottom: 1px solid rgba(0, 0, 0, .26);
  outline: 0;
  width: 100%;
  font-size: 16px;
  padding: 0;
  box-shadow: none;
  border-radius: 0;
  position: relative;
}

.pay-button {
  background: #E91E63;
  color: #fff;
  margin: 0 auto;
  border: 0;
  border-radius: 3px;
  padding: 1em 3em;
  font-size: 1em;
  text-transform: uppercase;
  box-shadow: 0 0 2px rgba(0, 0, 0, .12), 0 2px 2px rgba(0, 0, 0, .2);
}


/*--------------------
BT HOSTED FIELDS SPECIFIC 
--------------------*/

.braintree-hosted-fields-focused {
  border-bottom: 2px solid $blue;
  transition: all 200ms ease;
}

.braintree-hosted-fields-invalid {
  border-bottom: 2px solid $red;
  transition: all 200ms ease;
}




/* Uses Bootstrap stylesheets for styling, see linked CSS*/
body {
  background-color: #fff;
}

.panel {
  width: 80%;
  margin: 2em auto;
}

.bootstrap-basic {
  background: white;
}

.panel-body {
  width: 90%;
  margin: 2em auto;
}

.helper-text {
  color: #8A6D3B;
  font-size: 12px;
  margin-top: 5px;
  height: 12px;
  display: block;
}

/* Braintree Hosted Fields styling classes*/
.braintree-hosted-fields-focused { 
  border: 1px solid #0275d8;
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
}

.braintree-hosted-fields-focused.focused-invalid {
  border: 1px solid #ebcccc;
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(100,100,0,.6);
}

@media (max-width: 670px) {
  .btn {
    white-space: normal;
  }
}

    </style>
    <link rel=stylesheet type=text/css href="css/app.css">
    <link rel=stylesheet type=text/css href="css/overrides.css">
    <script src="javascript/vendor/jquery-2.1.4.min.js"></script>
    <script src="javascript/vendor/jquery.lettering-0.6.1.min.js"></script>
    <script src="javascript/demo.js"></script>
</head>
