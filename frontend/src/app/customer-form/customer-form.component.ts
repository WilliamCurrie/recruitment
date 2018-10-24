import {Component, OnInit} from '@angular/core';
import {PostCustomerInterface} from "../apiInterface/PostCustomerInterface";
import {ApiClientService} from "../services/api-client.service";
import {GetCustomerInterface} from "../apiInterface/GetCustomerInterface";

@Component({
    selector: 'app-customer-form',
    templateUrl: './customer-form.component.html',
    styleUrls: ['./customer-form.component.css']
})
export class CustomerFormComponent implements OnInit {

    public model: PostCustomerInterface = {
        customer_first_name: '',
        customer_second_name: ''
    };

    public submitted: boolean = false;
    public error: boolean = false;

    constructor(private apiClientService: ApiClientService) {
    }

    ngOnInit() {
    }

    onSubmit() {
        this.apiClientService.postNewCustomer(this.model).subscribe((newCustomer: GetCustomerInterface) => {
            this.submitted = true;
            this.error = false;
        }, () => {
            this.error = true;
        });
    };

    newCustomer() {
        this.model = {
            customer_first_name: '',
            customer_second_name: ''
        };

        this.submitted = false;
        this.error = false;
    }
}
