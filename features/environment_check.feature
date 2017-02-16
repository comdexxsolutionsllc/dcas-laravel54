Feature: Environment
  In order to ensure that Behat is setup correctly
  As an explicit developer actor
  I want to verify that the acceptance environment is setup according to spec

  Scenario: Environment Check
    Given I am on the homepage
    Then I can confirm testing environment is setup
