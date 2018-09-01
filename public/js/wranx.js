(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
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
        console.log(data);
      });
      event.preventDefault();
    });
  }

  init();

});

},{}]},{},[1])