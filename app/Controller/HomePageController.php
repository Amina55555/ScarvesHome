<?php
//Donne un nom à notre classe, car il se peut qu'une bibliothèque ait le meme nom... c'est pour éviter les conflits:
namespace App\Controller;

use App\Model\ArticleManager;
use Carbon\Carbon;

// Liste des articles


class HomePageController{

public static function listArticles()
{
	$articleManager = new ArticleManager();
    $articles = $articleManager->readAll();

    require('view/homepage/index.php');
}

public static function getArticleById($idArticle) 
{
	//$articleManager = new \Blogz\Model\ArticleManager();
	$articleManager = new ArticleManager();
    $article = $articleManager->readArticle($idArticle);

    //ICI le controle et création des variables a envoyer à la vue
    if( $article->rowCount() == 1 ){
		// on va chercher le data
		$data = $article->fetch();
		
		// on écrase nos variables à afficher dasn le form
		$nom 			= $data['article_nom'];
		$contributeur 	= $data['article_contributeur'];
		$texte 			= $data['article_texte'];
		$date 			= $data['article_date'];
		
		// on modifie le titre
		$titre = 'Modification';
		$today = Carbon::now()->isoFormat('LLLL');
	}    

    require('view/formpage/index.php');
}
}
