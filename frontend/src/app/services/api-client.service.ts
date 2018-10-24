import {Injectable} from '@angular/core';
import {HttpClient, HttpHeaders} from "@angular/common/http";
import {GetCustomerInterface} from "../apiInterface/GetCustomerInterface";
import {Observable} from "rxjs/Observable";
import {GetBookingInterface} from "../apiInterface/GetBookingInterface";
import {PostCustomerInterface} from "../apiInterface/PostCustomerInterface";

@Injectable()
export class ApiClientService {

    // Api Routings.
    // ToDo: Make these all routes environment aware. Assumed Dev Env
    // ToDo: All of this requests should be authenticated
    private getCustomersApiEndpoint = 'http://localhost:8080/customer';
    private getBookingsApiEndpoint = 'http://localhost:8080/booking';
    private postCustomerApiEndpoint = 'http://localhost:8080/customer';

    constructor(private httpClient: HttpClient) {
    }

    getAllCustomers(): Observable<GetCustomerInterface[]> {
        let header = new HttpHeaders();
        header.append('cookie', 'XDEBUG_SESSION=PHPSTORM');
        return this.httpClient.get<GetCustomerInterface[]>(this.getCustomersApiEndpoint, {headers: header});
    }

    getAllBookings(): Observable<GetBookingInterface[]> {
        let header = new HttpHeaders();
        header.append('cookie', 'XDEBUG_SESSION=PHPSTORM');
        return this.httpClient.get<GetBookingInterface[]>(this.getBookingsApiEndpoint, {headers: header});
    }

    postNewCustomer(newCustomer: PostCustomerInterface): Observable<GetCustomerInterface> {
        let header = new HttpHeaders();
        header.append('cookie', 'XDEBUG_SESSION=PHPSTORM');
        return this.httpClient.post<GetCustomerInterface>(this.postCustomerApiEndpoint, newCustomer, {headers: header});
    }

    getCustomerBookings(customerId: number): Observable<GetBookingInterface[]> {
        const urlAux: string = this.getCustomersApiEndpoint + "/" + customerId + "/booking";
        let header = new HttpHeaders();
        header.append('cookie', 'XDEBUG_SESSION=PHPSTORM');
        return this.httpClient.get<GetBookingInterface[]>(urlAux, {headers: header});
    }
}
