import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';
import {AppRoutingModule} from "./app-routing.module";

import {AppComponent} from './app.component';
import {CustomerComponent} from './customer/customer.component';
import {ApiClientService} from "./services/api-client.service";
import {HttpClientModule} from "@angular/common/http";
import {BookingComponent} from './booking/booking.component';
import {CustomerFormComponent} from './customer-form/customer-form.component';
import {FormsModule} from "@angular/forms";
import { CustomerBookingComponent } from './customer-booking/customer-booking.component';


@NgModule({
    declarations: [
        AppComponent,
        CustomerComponent,
        BookingComponent,
        CustomerFormComponent,
        CustomerBookingComponent
    ],
    imports: [
        BrowserModule,
        AppRoutingModule,
        HttpClientModule,
        FormsModule
    ],
    providers: [
        ApiClientService,

    ],
    bootstrap: [AppComponent]
})

export class AppModule {
}
