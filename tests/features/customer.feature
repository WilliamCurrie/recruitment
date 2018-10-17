Feature: Customer Create Page
  I should be able to create new customer

  Scenario: Make sure that the "surname" field is required
     Given I am on "/customer/create"
      When I fill in "title" with "Mr."
       And I fill in "name" with "Pinocchio"
       And I press "Submit"
      Then I should see "\"surname\" is not presented"

  Scenario: Make sure that I can submit the creation form and create a new customer
      Given I am on "/customer/create"
       When I fill in "title" with "Sir"
        And I fill in "name" with "Elton"
        And I fill in "surname" with "John"
        And I press "Submit"
       Then I should see "Customer successfully created!"
