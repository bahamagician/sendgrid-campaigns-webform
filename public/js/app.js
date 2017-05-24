$(document).foundation();


// magic.js
$(document).ready(function() {

    // process the form
    $('form').submit(function(event) {
        $('#loading-msg').show();  // show the loading message.
        $('#mailing-list button').addClass('disabled');
        $('input').removeClass('is-invalid-input'); // remove the error class
        $('.help-block').remove(); // remove the error text


        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'first_name'              : $('input[name=name]').val(),
            'last_name'              : $('input[name=last-name]').val(),
            'email'             : $('input[name=email]').val(),
            'phone_number'             : $('input[name=phone-number]').val()
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : './process.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json' // what type of data do we expect back from the server
        })
        // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                //console.log(data);

                $('#loading-msg').hide(); // hide the loading message
                $('#mailing-list button').removeClass('disabled');
                // here we will handle errors and validation messages
                if ( ! data.success) {
                    // handle errors for first name ---------------
                    if (data.errors.name) {
                        $('#name-group input').addClass('is-invalid-input'); // add the error class to show red input
                        $('#name-group').append('<div class="help-block">' + data.errors.name + '</div>'); // add the actual error message under our input
                    }

                    // handle errors for last name ---------------
                    if (data.errors.lastName) {
                        $('#last-name-group input').addClass('is-invalid-input'); // add the error class to show red input
                        $('#last-name-group').append('<div class="help-block">' + data.errors.lastName + '</div>'); // add the actual error message under our input
                    }

                    // handle errors for email ---------------
                    if (data.errors.email) {
                        $('#email-group input').addClass('is-invalid-input'); // add the error class to show red input
                        $('#email-group').append('<div class="help-block">' + data.errors.email + '</div>'); // add the actual error message under our input
                    }

                } else {

                    // ALL GOOD! just show the success message!
                    $('#mailing-list alert').remove();
                    $('#mailing-list').prepend('<div class="callout success text-center" id="hooray">' + data.message + '</div>');
                    $('#email-group input').val('');
                    $('#name-group input').val('');
                    $('#phone-group input').val('');
                    $('#last-name-group input').val('');
                    $('#form-pre-text').hide();
                    $('.formHeader').hide();
                }

            })

            // using the fail promise callback
            .fail(function(data) {
                // show any errors
                // best to remove for production
                console.log(data);

                $('#mailing-list').prepend('<div id="form-error" class="alert callout" data-closable>We were unable to add this address.  Please check your name and email and try again.<button class="close-button" data-close  type="button"> <span aria-hidden="true">&times;</span></button></div>');
                $('#loading-msg').hide(); // hide the loading message
                $('#mailing-list button').removeClass('disabled');
            });


        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});