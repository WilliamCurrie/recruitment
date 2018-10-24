import {Component, OnInit} from '@angular/core';
import {GetCustomerInterface} from "../apiInterface/GetCustomerInterface";
import {ApiClientService} from "../services/api-client.service";

@Component({
    selector: 'app-customer',
    templateUrl: './customer.component.html',
    styleUrls: ['./customer.component.css']
})
export class CustomerComponent implements OnInit {

    public allCustomers: GetCustomerInterface[];


    constructor(private apiClientService: ApiClientService) {

    }

    ngOnInit() {
        this.apiClientService.getAllCustomers().subscribe((customers:GetCustomerInterface[]) => {
            this.allCustomers = customers;
        })
    }
}
