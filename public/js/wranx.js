(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
$(function(){

  function init() {
    addCustomer();
  }

  function addCustomer(){
    $('#add_customer_submit').on('click', function(event){
      var formData = {
        'unique_id': $('input[name=unique_id]').val(),
        'title': $('select[name=title]').val(),
        'first_name': $('input[name=first_name]').val(),
        'second_name': $('input[name=second_name]').val(),
        'address': $('textarea[name=address]').val(),
        'twitter_alias': $('input[name=twitter_alias]').val()
      };

      $.ajax({
        type: 'POST',
        url: 'ajax/AddCustomer.ajax.php',
        data: formData, // our data object
      }).done(function(json) {
        var data = JSON.parse(json) ;
        var $innerWrapH2 = $('.inner-wrapper h2');
        $innerWrapH2.text(data.message);
        if(data.result == 'success') {
          $innerWrapH2.css('color', 'green');
        } else {
          $innerWrapH2.css('color', 'red');
          if(data.message == 'No unique id.') {
            location.reload();
          }
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

},{}]},{},[1])