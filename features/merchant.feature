# features/ls.feature
Feature: merchant
  In order to generate a transaction report
  By merchant id
  I need to be able to list the current transactions

Scenario: Display the transaction for a merchant id of 1
    Given I am in a directory "test"
    When I run "php report.php data.csv 1"