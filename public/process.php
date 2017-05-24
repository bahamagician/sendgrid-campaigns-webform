<?php
// process.php
require '../vendor/autoload.php';
$dotenv = new Dotenv\Dotenv('../');
$dotenv->load();

$apiKey = $_ENV['SENDGRID_API_KEY'];
$sg = new \SendGrid($apiKey);

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
// if any of these variables don't exist, add an error to our $errors array

if (empty($_POST['first_name']))
    $errors['name'] = 'First name is required.';

if (empty($_POST['last_name']))
    $errors['lastName'] = 'Last name is required.';

if (empty($_POST['email']))
    $errors['email'] = 'Email is required.';

if(!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
    $errors['email'] = 'Please include a valid email address.';    
}

// return a response ===========================================================

// if there are any errors in our errors array, return a success boolean of false
if ( ! empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
} else {

    // if there are no errors process our form, then return a message

    // DO ALL YOUR FORM PROCESSING HERE
    // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)



    $request_body = json_decode('[
        {
            "first_name": "'.$_POST['first_name'].'",
            "last_name": "'.$_POST['last_name'].'",
            "email": "'.$_POST['email'].'",
            "phone_number": "'.$_POST['phone_number'].'"
                        
        }
    ]');
    $response = $sg->client->contactdb()->recipients()->post($request_body);

    $json = json_decode($response->body());
    $error_count = $json->error_count;
    $recipient_id = $json->persisted_recipients[0];
    $list_id = $_ENV['LIST_ID'];

    if( ($error_count <= 0) && ($response->statusCode() == 201)) {
        $list_response = $sg->client->contactdb()->lists()->_($list_id)->recipients()->_($recipient_id)->post();
    } else {
        $data['message'] = 'Sorry, we were unable to add this email.';
    }
    $data['whaps'] = $response->statusCode();
    if ($list_response->statusCode() == 201) {
        $data['message'] = "<h3>Hooray!</h3> You've successfully signed up.  Check your email on Friday to see if you've won. Best of luck :)";
    }

    // show a message of success and provide a true success variable
    $data['success'] = true;
}

// return all our data to an AJAX call
echo json_encode($data);
die(0);