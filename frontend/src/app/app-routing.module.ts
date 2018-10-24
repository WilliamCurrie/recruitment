import {RouterModule, Routes} from "@angular/router";
import {NgModule} from "@angular/core";
import {CustomerComponent} from "./customer/customer.component";
import {BookingComponent} from "./booking/booking.component";
import {CustomerFormComponent} from "./customer-form/customer-form.component";
import {CustomerBookingComponent} from "./customer-booking/customer-booking.component";

const routes: Routes = [
    {path: 'customer/get/all', component: CustomerComponent},
    {path: 'booking/get/all', component: BookingComponent},
    {path: 'customer/new', component: CustomerFormComponent},
    {path: 'customer/booking', component: CustomerBookingComponent},
    {path: '', redirectTo: '/', pathMatch: 'full'}
];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule]
})

export class AppRoutingModule{}
