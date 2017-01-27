Feature: Login 
    In order to conduct safe business operations on a secure portal
    As an explicit system actor
    I want to gain the ability to login to a given dashboard

    Scenario: Home Page
        Given I am on the homepage
        Then I should see "Laravel"
    
    Scenario: Dashboard is locked to guests
        When I go to "home"
        Then the url should match "login"
        And I can do something with Laravel
