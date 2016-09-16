$(function() {

    $("#contactSection input,#contactSection textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {

        },
        submitSuccess: function($form, event) {

          $("#submit").attr("disabled", true);
          event.preventDefault();

          var name = $("input#name").val();
          var email = $("input#email").val();
          var subject = $("input#subject").val();
          var message = $("textarea#message").val();
          var firstName = name;

          if (firstName.indexOf(' ') >= 0) {
            firstName = name.split(' ').slice(0, -1).join(' ');
          }
          $.ajax({
            url: "././mail/contact_me.php",
            type: "POST",
            data: {
                name: name,
                phone: phone,
                email: email,
                message: message
            },
            cache: false,
            success: function() {

            }
          })
        }




    })


















})
