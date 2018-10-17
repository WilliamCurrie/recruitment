Feature: Main Page
  I should be able to see a list of bookings

  Scenario: Make sure that available bookings are visible on the home page
      Given I am on homepage
       Then I should see "JE122"
        And I should see "01 Jan 2017"
        And I should see "Jim Edwards"
        And I should see "23 Where I live, Liverpool, L1 3TF"

  Scenario: Make sure that when I click on "Create new customer" I will arrive on "/customer/create"
      Given I am on homepage
       When I follow "Create new customer"
       Then I should be on "/customer/create"
