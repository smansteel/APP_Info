
      
    // When DOM is loaded this 
    // function will get executed
    $(() => {
        // function will get executed 
        // on click of submit button
        $("#submitButton").click(function(ev) {
            var form = $("#formId");
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data) {
                      
                    // Ajax call completed successfully
                    alert("Form Submited Successfully");
                },
                error: function(data) {
                      
                    // Some error in ajax call
                    alert("some Error");
                }
            });
        });
    });