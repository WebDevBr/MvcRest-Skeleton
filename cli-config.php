<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use WebDevBr\Mvc\Models\Doctrine;

include __DIR__.'/config/config.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = Doctrine::getInstance();

return ConsoleRunner::createHelperSet($entityManager);