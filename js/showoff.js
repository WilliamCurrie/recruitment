/* Written using ES6 classes for consistency */

class Bookings {
    
    constructor() {

        this.ulList = document.querySelectorAll('ul.customers li button');
        this.bookingTriggers();

    }
    
    
    bookingTriggers() {
        let str = "";
        /* iterate the "View Bookings" buttons and create a clickable action and response */
        this.ulList.forEach((b) => {
            let userid = b.dataset.userid;
            b.addEventListener('click',(e)=> {
                e.preventDefault();
                let f = new FormData();
                f.append('action','CustomerBookings');
                f.append('userid',userid);
                
                fetch('/',{
                    method:'POST',
                    body:f
                    
                })
                .then(response => response.json())
                .then(response => {
                    if (response.length) {
                        str = '<ol class="bookingslist">';
                        
                    response.forEach((r)=> {
                        
                        str += `<li><span>${r.booking_reference}</span><span>${r.booked_date}</span>`;
                        
                    });
                    
                    str += '</ol>';
                  
                    
                    } else {
                        
                        str = '<p class="bookinglist"><strong>Sorry, there are currently no booking for this customer.</strong></p>';                        
                        
                    }
                    
                      
                    if (!e.target.parentNode.querySelector('.bookingslist')) {
                        
                        e.target.parentNode.insertAdjacentHTML('beforeend',str);
                        
                    }
                });
                
                
                
                
                
            });
            
            
            
            
        });
        
        
        
        
        
        
    }
    
    
    }
    
    window.addEventListener('DOMContentLoaded',()=>{
        
        new Bookings();
        
    });