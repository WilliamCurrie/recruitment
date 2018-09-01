$(function(){

  function init() {
    addCustomer();
  }

  function addCustomer(){
    $('#add_customer_submit').on('click', function(event){
      var formData = {
        'unique_id': $('input[name=unique_id]').val(),
        'first_name': $('input[name=first_name]').val(),
        'last_name': $('input[name=last_name]').val()
      };

      $.ajax({
        type: 'POST',
        url: 'ajax/AddCustomer.ajax.php',
        data: formData, // our data object
        dataType: 'json', // what type of data do we expect back from the server
        encode: true
      }).done(function(data) {
        console.log(data);
      });
      event.preventDefault();
    });
  }

  init();

});
