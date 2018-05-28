<?php

class AnnoncesController {

    public static function index() {
      
        $listAnnonce = Annonces::all();
        $listCat = Categories::allCat();
        $listreg = Regions::allReg();

        foreach ($listCat as $cati) {

            $catArray[$cati->id] = $cati->name;
        }
        foreach ($listreg as $regi) {

            $regArray[$regi->id] = $regi->name;
        }
        require_once('./vue/annonces/index.php');
    }

    public static function show() {
        if (!isset($_GET['id'])) {
            return call('page', 'error');
        } else {
            $post = Annonces::find($_GET['id']);
//          $cat = Categories::findCategorie($id);
            require_once('./vue/annonces/show.php');
        }
    }

    public static function insert() {
        $listcat = Categories::allCat();
        $listreg = Regions::allReg();
        require_once('./vue/annonces/insert.php');
    }

    public static function create() {

        $createAnnonce = Annonces::create(array(
                    'titre' => $_POST['titre'],
                    'description' => $_POST['description'],
                    'categories' => $_POST['categories'],
                    'images' => $_POST['images'],
                    'localisation' => $_POST['localisation'],
                    'tel' => $_POST['tel'],
                    'auteur' => $_POST['auteur'],
                    'id_user' => $_SESSION['id']
        ));
        $listAnnonce = Annonces::all();
        $listReg = Regions::allReg();
        $listCat = Categories::allCat();
        require_once('./Vue/annonces/index.php');
    }

    public static function edit() {
        if (!isset($_GET['id'])) {
            return call('page', 'error');
        } else {
            $post = annonces::find($_GET['id']);
            $reg = Regions::findRegion($_GET['id']);
            $cat = Categories::allCat();
            require_once('./vue/annonces/edit.php');
        }
    }

    public static function update() {
        $post = Annonces::update(array(
                    'id' => $_GET['id'],
                    'titre' => $_POST['titre'],
                    'description' => $_POST['description'],
                    'categories' => $_POST['categories'],
                    'images' => $_POST['images'],
                    'localisation' => $_POST['localisation'],
                    'tel' => $_POST['tel'],
                    'auteur' => $_POST['auteur']
        ));
        $listAnnonce = Annonces::all();
//        $listreg = Regions::allReg();
//        $listCat = Categories::allCat();

        header('Location: http://localhost/TPblogPHP/index.php?controller=annonces&action=index');
        require_once('./Vue/annonces/index.php');
    }

    public static function viewUpdate() {
        $listannonces = Annonces::find($_GET['id']);
        $detailCat = Categories::findCategorie($_GET['categories']);
        $detailreg = Regions::findRegion($_GET['localisation']);
        $listreg = Regions::allReg();
        $listCat = Categories::allCat();




        foreach ($listreg as $reg) {

            if ($reg->id === $listannonces->categories) {
                $regview = $reg->name;
            }
        }
        foreach ($listCat as $cat) {

            if ($cat->id === $listannonces->localisation) {
                $catview = $cat->name;
            }
        }

        require_once('./vue/annonces/update.php');
    }

    public static function supp() {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        } else {
            $post = Annonces::find($_GET['id']);
            require_once('./Vue/annonces/delete.php');
        }
    }

    public function delete() {
        $post = Annonces::delete(array(
                    'id' => $_GET['id'],
        ));
        self::index();
    }

    public function commentaire() {
        $comments = Annonces::viewCommentaire($_GET['id']);

        require_once('./Vue/annonces/show.php');
    }

    public function ajouterFav() {

        $favoris = Favoris::addFav(array(
                    'id_user' => $_SESSION['id'],
                    'id_annonces' => $_GET['id_annonces']));
        require_once('./Vue/annonces/show.php');
    }

    public function vueFav() {
        $favannonces = Annonces::allFav($_SESSION['id']);
        require_once('./Vue/annonces/fav.php');
    }

    public function delFav() {
        $delfavo = Favoris::deleteFav(array(
                    'id' => $_GET['id'],
        ));
       

        $this->vueFav();
    }

}
