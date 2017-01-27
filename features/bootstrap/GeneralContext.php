<?php

use Knp\FriendlyContexts\Context\AliceContext;
use Knp\FriendlyContexts\Context\ApiContext;
use Knp\FriendlyContexts\Context\EntityContext;
use Behat\MinkExtension\Context\MinkContext;
use Knp\FriendlyContexts\Context\PageContext;
use Knp\FriendlyContexts\Context\TableContext;

interface iAliceContext extends AliceContext {

}

interface iApiContext extends ApiContext {

}

interface iEntityContext extends EntityContext {

}

interface iMinkContext extends MinkContext {

}

interface iPageContext extends PageContext {

}

interface iTableContext extends TableContext {

}

class GeneralContext implements iAliceContext, iApiContext, iEntityContext, iMinkContext, iPageContext, iTableContext {

}
