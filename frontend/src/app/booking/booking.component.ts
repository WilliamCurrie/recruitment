import {Component, OnInit} from '@angular/core';
import {GetBookingInterface} from "../apiInterface/GetBookingInterface";
import {ApiClientService} from "../services/api-client.service";

@Component({
    selector: 'app-booking',
    templateUrl: './booking.component.html',
    styleUrls: ['./booking.component.css']
})
export class BookingComponent implements OnInit {

    public allBookings: GetBookingInterface[];

    constructor(private apiClientService: ApiClientService) {
    }

    ngOnInit() {
        this.apiClientService.getAllBookings().subscribe((bookings: GetBookingInterface[]) => {
            this.allBookings = bookings;
        });
    }

}
