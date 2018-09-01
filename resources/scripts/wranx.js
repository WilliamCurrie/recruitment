$(function(){

  function init() {
    addCustomer();
  }

  function addCustomer(){
    $('#add_customer_submit').on('click', function(event){
      var formData = {
        'unique_id': $('input[name=unique_id]').val(),
        'first_name': $('input[name=first_name]').val(),
        'second_name': $('input[name=second_name]').val(),
        'address': $('textarea[name=address]').val(),
        'twitter_alias': $('input[name=twitter_alias]').val()
      };

      $.ajax({
        type: 'POST',
        url: 'ajax/AddCustomer.ajax.php',
        data: formData, // our data object
        dataType: 'json', // what type of data do we expect back from the server
        encode: true
      }).done(function(data) {
        var $innerWrapH2 = $('.inner-wrapper h2');
        $innerWrapH2.text(data.message);
        if(data.result == 'success') {
          $innerWrapH2.css('color', 'green');
        } else {
          $innerWrapH2.css('color', 'red');
        }

        setTimeout(function() {
            $innerWrapH2.text('Add Customer').css('color', '#fff');
        }, 5000)

      });
      event.preventDefault();
    });
  }

  init();

});
