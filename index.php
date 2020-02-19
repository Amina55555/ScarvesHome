<?php
// require_once('Controller/HomepageController.php');
require 'vendor/autoload.php';

use App\Controller\HomePageController;

try {
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'listPosts') {
            HomePageController::listArticles();
        }
        elseif ($_GET['page'] == 'article') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                HomePageController::getArticleById($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }
    else {
        HomepageController::listArticles();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}