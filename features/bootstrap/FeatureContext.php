<?php

//require_once "/home/shine/public_html/dcas/features/bootstrap/GeneralContext.php";

use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Driver\Selenium2Driver;
use Laracasts\Behat\Context\DatabaseTransactions;
use Laracasts\Behat\Context\Migrator;
//use Knp\FriendlyContexts\Context\MinkContext;
use PHPUnit_Framework_Assert as PHPUnit;
use Behat\MinkExtension\Context\MinkContext;


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

        return var_dump ([
            'env_file' => app()->environmentFile(),
            'env' => env('APP_ENV'),
            'env_debug' => env('APP_DEBUG')
        ]);
    }
}
