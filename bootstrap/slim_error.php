<?php

/**
 * Configura a exibição de erros no Slim Framework
 */

if (DEBUG) {
	$errorPage = new Whoops\Handler\PrettyPageHandler();
 	$errorPage->setPageTitle("WebDevBr Erro!");
	$errorPage->setEditor("sublime");
	$errorPage->addDataTable("Documentação", array(
      "Url"     => "http://docs.slimframework.com/"
	));

	$whoops = new Whoops\Run;
	$whoops->pushHandler($errorPage);
	$whoops->register();
} else {
	echo '{message: error}';
}