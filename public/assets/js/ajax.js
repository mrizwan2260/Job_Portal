      //Error handel function
      function handle_error(data) {
        var ids = get_all_ids();

        //Remove error calss from all fields
        for (var k in ids)
            $('#' + k).removeClass('is-invalid')
            .siblings('p')
            .removeClass('invalid-feedback')
            .html('');

        //Add error class all fields
        for (var key in data.responseJSON.errors)
            $('#' + key).addClass('is-invalid')
            .siblings('p')
            .addClass('invalid-feedback')
            .html(data.responseJSON.errors[key]);
    }

    //Get all fields ids
    function get_all_ids() {
        // Get all the inputs into an array...
        var $inputs = $('#form :input');

        // An array of just the ids...
        var ids = {};

        $inputs.each(function(index) {
            ids[$(this).attr('name')] = $(this).attr('id');
        });

        return ids;
    }

    //Ajax code
    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();

            let method = form.method;
            let url = form.action;

            $('button[type="submit"]').prop('disabled', true);
            $.ajax({
                url: url,
                type: method,
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        $('button[type="submit"]').prop('disabled', true);
                        window.location.href = response.redirect;
                    } else {
                        window.location.href = response.redirect;
                    }
                },
                error: function(err) {
                    handle_error(err);
                    $('button[type="submit"]').prop('disabled', false);
                }
            });
        });
    });
