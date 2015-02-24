<?php

require 'lib/Stripe.php';

if ($_POST) {
    Stripe::setApiKey("sk_test_R6QudjkDVwAUL0RhmV0MfbiR");
    $error = '';
    $success = '';

    try {
        if (empty($_POST['street']) || empty($_POST['city']) || empty($_POST['zip']))
            throw new Exception("Fill out all required fields.");
        if (!isset($_POST['stripeToken']))
            throw new Exception("The Stripe Token was not generated correctly");
        Stripe_Charge::create(array("amount" => 4000,
            "currency" => "usd",
            "card" => $_POST['stripeToken'],
            "description" => $_POST['email']));

        //flag change in db 
        qu("customer", array('is_stripe_payment' => 1), "email='{$_POST['email']}'");

//        $email = 'admin@admin.com';
//        if ($_SESSION['user']['user_name'] == $email) {
//            qu("admin_users", array('is_stripe_payment' => 1), "user_name='{$email}'");
//        } else {
//                               qu("salesperson", array('is_stripe_payment' => 1), "email='{$_SESSION['user']['email']}'");
//        }


        $success = '<div class="alert alert-success">
                <strong>Success!</strong> Your payment was successful.
				</div>';
    } catch (Exception $e) {
        $error = '<div class="alert alert-danger">
			  <strong>Error!</strong> ' . $e->getMessage() . '
			  </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Secure Payment Form</title>
        <link rel="stylesheet" href="css/bootstrap-min.css">
        <link rel="stylesheet" href="css/bootstrap-formhelpers-min.css" media="screen">
        <link rel="stylesheet" href="css/bootstrapValidator-min.css"/>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
        <link rel="stylesheet" href="css/bootstrap-side-notes.css" />
        <style type="text/css">
            .col-centered {
                display:inline-block;
                float:none;
                text-align:left;
                margin-right:-4px;
            }
            .row-centered {
                margin-left: 9px;
                margin-right: 9px;
            }
        </style>

    </head>
    <body>
        <div class="addAffiliates actionItem ">
            <div class="panel panel-default">
                <div class="panel-heading">Secure Payment</div>
                <div class="panel-body">
                    <form action="" method="POST" id="payment-form" class="form-horizontal"  role="form" >
                        <!--  <div class="row row-centered">-->
                        <!--<div class="col-md-4 col-md-offset-4">-->

                        <noscript>
                        <div class="bs-callout bs-callout-danger">
                            <h4>JavaScript is not enabled!</h4>
                            <p>This payment form requires your browser to have JavaScript enabled. Please activate JavaScript and reload this page. Check <a href="http://enable-javascript.com" target="_blank">enable-javascript.com</a> for more informations.</p>
                        </div>
                        </noscript>


                        <div class="alert alert-danger" id="a_x200" style="display: none;"> <strong>Error!</strong> <span class="payment-errors"></span> </div>
                        <span class="payment-success">
                            <?= $success ?>
                            <?= $error ?>
                        </span>
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Billing Details</legend>

                            <!-- Street -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="textinput">Street</label>
                                <div class="col-sm-3">
                                    <input type="text" name="street" placeholder="Street" class="address form-control">
                                </div>
                            </div>

                            <!-- City -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="textinput">City</label>
                                <div class="col-sm-3">
                                    <input type="text" name="city" placeholder="City" class="city form-control">
                                </div>
                            </div>

                            <!-- State -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="textinput">State</label>
                                <div class="col-sm-3">
                                    <input type="text" name="state" maxlength="65" placeholder="State" class="state form-control">
                                </div>
                            </div>

                            <!-- Postcal Code -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="textinput">Postal Code</label>
                                <div class="col-sm-3">
                                    <input type="text" name="zip" maxlength="9" placeholder="Postal Code" class="zip form-control">
                                </div>
                            </div>

                            <!-- Country -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="textinput">Country</label>
                                <div class="col-sm-3"> 
                                    <!--input type="text" name="country" placeholder="Country" class="country form-control"-->
                                    <div class="country bfh-selectbox bfh-countries" name="country" placeholder="Select Country" data-flags="true" data-filter="true"> </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="textinput">Email</label>
                                <div class="col-sm-3">
                                    <input type="text" name="email" maxlength="65" placeholder="Email" class="email form-control">
                                </div>
                            </div>
                            <fieldset>
                                <legend>Card Details</legend>

                                <!-- Card Holder Name -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"  for="textinput">Card Holder's Name</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="cardholdername" maxlength="70" placeholder="Card Holder Name" class="card-holder-name form-control">
                                    </div>
                                </div>

                                <!-- Card Number -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="textinput">Card Number</label>
                                    <div class="col-sm-3">
                                        <input type="text" id="cardnumber" maxlength="19" placeholder="Card Number" class="card-number form-control">
                                    </div>
                                </div>

                                <!-- Expiry-->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="textinput">Card Expiry Date</label>
                                    <div class="col-sm-3">
                                        <div class="form-inline">
                                            <select name="select2" data-stripe="exp-month" class="card-expiry-month stripe-sensitive required form-control">
                                                <option value="01" selected="selected">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                            <span> / </span>
                                            <select name="select2" data-stripe="exp-year" class="card-expiry-year stripe-sensitive required form-control">
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <!-- CVV -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="textinput">CVV/CVV2</label>
                                    <div class="col-sm-3">
                                        <input type="text" id="cvv" placeholder="CVV" maxlength="4" class="card-cvc form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-10">

                                        <button class="btn btn-success" type="submit">Pay Now</button>
                                    </div>
                                </div>
                                <!-- Important notice -->
                                <div class="form-group">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Important notice</h3>
                                        </div>
                                        <div class="panel-body">
                                            <p>Your card will be charged 40 $ after submit.</p>

                                        </div>
                                    </div>
                                </div>
                                <!-- Submit -->

                            </fieldset>
                    </form>
                </div></div></div>

    </body>
</html>
