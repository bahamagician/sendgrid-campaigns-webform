<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SendGrid Campaigns Web Form</title>
    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">

</head>
<body>

<div class="row column expanded" id="wrapper">

    <div class="row">

        <div class="column medium-8 medium-offset-2 large-4 large-offset-4" id="logo">
            <div class="row column">
                <!-- <img src="./img/logo.png" alt="Logo Alt Text"> -->
                Logo Goes Here
            </div>
        </div>

        <div class="row">

            <div class="column medium-8 medium-offset-2 large-4 large-offset-4" id="wrapper-block">

                <div class="row column text-center" id="title-text">
                    Hey You...
                    <div id="large-text">
                        Wanna Sign Up
                    </div>
                    To the Coolest List Ever?
                </div>

                <div class="row column" id="subscribe-button">
                    <button class="button expanded large" data-open="sign-up-form">Yes! Sign Me Up <span class="fa fa-arrow-right"></span></button>
                </div>

            </div>
        </div>

    </div>

</div>

<div class="reveal" id="sign-up-form" data-reveal>
    <div id="emailForm" class="white-popup">
        <div class="progress show-for-medium formHeader" role="progressbar" tabindex="0" aria-valuenow="50" aria-valuemin="0" aria-valuetext="50 percent" aria-valuemax="100">
            <div class="progress-meter" style="width: 50%"></div>
        </div>
        <div id="form-pre-text" class="text-center">
            Almost there: Please enter your name and email address below and hit the "Yes! Sign Me Up" button and you'll instantly be added to our notifications list...
        </div>
        <form method="POST" id="mailing-list">


            <div id="name-group">
                <label for="name">First Name:</label>
                <input type="text" name="name" class="name-field" placeholder="First Name">
            </div>

            <div id="last-name-group">
                <label for="last-name">Last Name:</label>
                <input type="text" name="last-name" class="last-name-field" placeholder="Last Name">
            </div>

            <div id="phone-group">
                <label for="phone-number">Phone Number:</label>
                <input type="text" name="phone-number" class="phone-number-field" placeholder="Your Phone Number">
            </div>

            <div id="email-group">
                <label for="email">Email Address:</label>
                <input type="text" name="email" class="email-field" placeholder="Email Address">
            </div>

            <button type="submit" class="button" id="sign-up-button">Sign Me Up <span class="fa fa-arrow-right"></span></button>
            <div id="loading-msg" style="display:none">
                <img src="img/ajax-loader.gif" alt="loading">
            </div>
        </form>
        <div id="form-post-text" class="text-center"><i class="fa fa-lock"></i> We hate SPAM and promise to keep your email address safe.</div>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<script src="https://use.fontawesome.com/caa7e4820b.js"></script>
<script src="js/bundle.min.js"></script>
</body>
</html>
