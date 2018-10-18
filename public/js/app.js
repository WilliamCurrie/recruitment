let ajaxMixin = {
    methods: {
        callAJAX: async function (resource, data = {}, method = 'GET') {
            let type = ["GET","POST","DELETE"].indexOf(method.toUpperCase())? method : 'GET';
            return $.ajax({
                url: '/api/'+resource,
                type: type,
                data: data,
                contentType: 'application/json; charset=utf-8'
            });
        }
    }
};


var app = new Vue({
    el: '#app',
    data: {
        editOffset: -1,
        customerInEdit: {},
        bookings: [],
        customers: [],
    },
    mixins: [ ajaxMixin ],
    computed: {
        bookingReference: function() {
            return String.fromCharCode(Math.floor(Math.random() * 26) + 65) +
                String.fromCharCode(Math.floor(Math.random() * 26) + 65) +
                Math.random().toString(10).substring(2, 5);
        },
        dateTimeNow: function() {
            let now = new Date();
            return now.getFullYear().toString()+"-"+((now.getMonth()+1).toString().length==2?(now.getMonth()+1).toString():"0"+(now.getMonth()+1).toString())+"-"+(now.getDate().toString().length==2?now.getDate().toString():"0"+now.getDate().toString())+" "+(now.getHours().toString().length==2?now.getHours().toString():"0"+now.getHours().toString())+":"+((parseInt(now.getMinutes()/5)*5).toString().length==2?(parseInt(now.getMinutes()/5)*5).toString():"0"+(parseInt(now.getMinutes()/5)*5).toString())+":00";
        }
    },
    methods: {
        updateBookingList: function(array) {
            this.bookings = array;
        },
        updateCostumers: function(array) {
            this.customers = array;
        },
        showBookings: function(customerId) {
            let promise = this.callAJAX('customer/'+customerId+'/bookings');
            let vue = this;
            promise.then(function( data ) {
                vue.updateBookingList(JSON.parse(data.bookings));
            });
        },
        getCustomers: function() {
            let promise = this.callAJAX('customers');
            let vue = this;
            promise.then(function( data ) {
                vue.updateCostumers(JSON.parse(data.customers));
            }, (reason) =>{
                console.log(reason);
            });
        },
        editCustomer: function(offset) {
            if (this.editOffset != -1) {
                this.cancelEditing();
            }
            this.setInEdit(offset);
            this.customerInEdit = Object.assign({}, this.customers[offset]);
        },
        cancelEditing: function() {
            this.customers[this.editOffset] = this.customerInEdit;

            if (this.customers[this.editOffset].id == null) {
                this.customers.pop();
            }
            this.setInEdit(-1);
        },
        saveCustomer: function() {
            let customer = this.customers[this.editOffset];
            if(!this.validCustomer(customer)){
                alert("Customer details are not valid");
                return;
            }

            let data = JSON.stringify({"customer": customer});
            let promise = this.callAJAX('customer',  data,'POST');
            let vue = this;
            promise.then(function() {
                vue.setInEdit(-1);
                vue.getCustomers();
            }, (reason) =>{
                alert("An error has ocurred.");
                console.log(reason);
            });
        },
        deleteCustomer: function(customer) {
            let promise = this.callAJAX('customer/'+customer.id, {},'DELETE');
            let vue = this;
            promise.then(function( data ) {
                vue.getCustomers();
            }, (reason) =>{
                console.log(reason);
            });
        },
        validCustomer: function(customer) {
            return customer.first_name && customer.second_name;
        },
        newCustomer: function(r) {
            this.customers.push({});
            this.editCustomer(this.customers.length-1);
        },
        newBooking: function(customerId) {
            let booking = {
                'customer_id': customerId,
                'booking_reference': this.bookingReference, //Generate a random booking reference
                'booking_date': this.dateTimeNow
            };
            let data = JSON.stringify({ 'booking': booking });
            let promise = this.callAJAX('customer/'+customerId+'/booking',  data,'POST');
            let vue = this;
            promise.then(function() {
                vue.showBookings(customerId);
            }, (reason) =>{
                alert("An error has ocurred.");
                console.log(reason);
            });
        },
        deleteBooking: function(booking) {
            let customerId = booking.customer_id;
            let promise = this.callAJAX('booking/'+booking.id, {},'DELETE');
            let vue = this;
            promise.then(function( data ) {
                vue.showBookings(customerId);
            }, (reason) =>{
                console.log(reason);
            });
        },
        setInEdit: function(offset) {
            this.editOffset = offset;
        },
        isInEdit: function(offset) {
            return this.editOffset === offset;
        }
    },
    mounted: function(){
        this.getCustomers();
    }
});