<?php 

class HomeControllerTestCest
{

    public function viewCustomersOnHomePage(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Customer');
        $I->see('23 Where I live, Liverpool, L1 3TF');
        $I->see('24 My House, Manchester, M1 3TF');
        $I->see('26 Palm Avenue, Newcastle, N1 3TF');
        $I->see('26 Palm Avenue, Newcastle, N1 3TF');

    }

    public function viewBookingsOnHomePage(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Bookings');
        $I->see('Sun 01st Jan 2017');
        $I->see('Thu 02nd Mar 2017');
        $I->see('Wed 15th Feb 2017');
        $I->see('JE125');

    }


    public function errorPage(AcceptanceTester $I)
    {
        $I->amOnPage('/thisIsAnInvalidRoute');
        $I->see('Customer not found');
    }

    public function showCustomerDetailsWithBookings(AcceptanceTester $I)
    {
        $I->amOnPage('/1');
        $I->see('23 Where I live, Liverpool, L1 3TF');
        $I->see('JE122');
        $I->see('JE125');
        $I->cantSee('There is no bookings');
    }

    public function showCustomerDetailsWithoutBookings(AcceptanceTester $I)
    {
        $I->amOnPage('/2');
        $I->see('Maher');
        $I->see('Dave');
        $I->see('24 My House, Manchester, M1 3TF');
        $I->see('There is no bookings');
    }

    public function showCustomerDetailsWithBookingsbyName(AcceptanceTester $I)
    {
        $I->amOnPage('/Taylor');
        $I->see('26 Palm Avenue, Newcastle, N1 3TF');
        $I->see('LT478');
        $I->see('LT791');
        $I->see('Wed 15th Feb 2017');
        $I->cantSee('There is no bookings');
    }

}
