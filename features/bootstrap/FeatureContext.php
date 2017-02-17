<?php
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\MinkExtension\Context\MinkContext;
use Laracasts\Behat\Context\DatabaseTransactions;
use Laracasts\Behat\Context\Migrator;
use PHPUnit_Framework_Assert as PHPUnit;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext {

    use DatabaseTransactions, Migrator;


    /**
     * Initializes context
     */
    public function __construct()
    {

    }


    /**
     * @Given I am on the home page
     */
    public function iAmOnTheHomePage()
    {
        return $this->visit('/');
    }


    /**
     * @Then I can confirm testing environment is setup
     */
    public function iCanConfirmTestingEnvironmentIsSetup()
    {
        PHPUnit::assertEquals('.env.behat', app()->environmentFile());
        PHPUnit::assertEquals('acceptance', env('APP_ENV'));
        PHPUnit::assertEquals(true, env('APP_DEBUG'));
    }
}
