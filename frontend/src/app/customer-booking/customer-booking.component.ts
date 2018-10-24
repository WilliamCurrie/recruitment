import {Component, OnInit} from '@angular/core';
import {GetCustomerInterface} from "../apiInterface/GetCustomerInterface";
import {ApiClientService} from "../services/api-client.service";
import {GetBookingInterface} from "../apiInterface/GetBookingInterface";
import {HttpErrorResponse} from "@angular/common/http";

@Component({
    selector: 'app-customer-booking',
    templateUrl: './customer-booking.component.html',
    styleUrls: ['./customer-booking.component.css']
})
export class CustomerBookingComponent implements OnInit {

    public allCustomers: GetCustomerInterface[];

    public allBookings: GetBookingInterface[];

    public error: boolean = false;

    constructor(private apiClientService: ApiClientService) {
    }

    ngOnInit() {
        this.apiClientService.getAllCustomers().subscribe((allCustomers: GetCustomerInterface[]) => {
            this.allCustomers = allCustomers
        });
    }

    getBookingsForClient(customerId: string) {

        this.apiClientService.getCustomerBookings(Number(customerId)).subscribe((allClientBookings: GetBookingInterface[]) => {
            this.allBookings = allClientBookings;
            this.error = false;
        }, (error: HttpErrorResponse) => {
            if (error.status !== 404) {
                // If not found, then chances are this customer has no bookings, which is a legitimate error and should
                // not cause any issue. However, if the error is different, then notify the user
                console.log('da error: ', error.status);
                this.error = true;
            }
            this.allBookings = null;
        });

    }
}
