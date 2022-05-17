<?php
session_start();

require("./models/Manager.php");
$manager = new \sycatle\beblio\models\Manager();

function toSlug($str){
    $slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), '-'));
    return $slug;
}

$allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
$allowedMaxSize =  0.5*1000000; // Taille maximum du fichier: 0.5Mega-octets/500Kilo-octets

if (isset($_POST['post_book'])) {
    $bookManager = $manager->getBookManager();
	if (isset($_POST['book_name'])) {
        if (isset($_POST['book_author'])) {
            if (isset($_POST['book_parution'])) {
                if (isset($_POST['book_gender'])) {
                    if (isset($_POST['book_pages'])) {
                        if (isset($_POST['book_description'])) {
                            if (isset($_POST['book_summary'])) {
                                if (isset($_FILES['book_cover'])) {
                                    $book_name = htmlspecialchars(stripslashes(($_POST['book_name'])));
                                    $book_name_slug = toSlug($book_name);
                                    $book_author = htmlspecialchars(stripslashes(($_POST['book_author'])));
                                    $book_parution = $_POST['book_parution'];
                                    $book_gender = $_POST['book_gender'];
                                    $book_pages = $_POST['book_pages'];
                                    $book_description = htmlspecialchars(stripslashes(($_POST['book_description'])));
                                    $book_summary = htmlspecialchars(stripslashes(($_POST['book_summary'])));
                                    $book_cover = $_FILES['book_cover'];

                                    $fileInfo = pathinfo($book_cover['name']);
                                    $extension = $fileInfo['extension'];
                                    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
                                    $allowedMaxSize =  0.5*1000000; // Taille maximum du fichier: 0.5Mega-octets/500Kilo-octets

                                    if ($book_cover['error'] == 0) {
                                        if (in_array($extension, $allowedExtensions)) { 
                                            if ($book_cover['size'] <= $allowedMaxSize) { 
                                                $bookManager->registerBook($book_name, $book_name_slug, $book_author, $book_description, $book_summary, $book_parution, $book_gender, $book_cover);
                                                header("Location: ./?book=".$book_name_slug);
                                            } else {
                                                echo("La taille de votre image ne doit pas dépasser " . $allowedMaxSize/1000000 . "Mo.");
                                            }
                                        } else {
                                            echo("Le format doit respecter le suivant: 'jpg', 'jpeg', 'png', 'webp'.");
                                        }
                                    } else {
                                        echo("Erreur lors de l'importation du livre.");
                                    }
                                } else {
                                    echo("Le livre doit avoir une couverture.");
                                }
                            } else {
                                echo("Le livre doit avoir un résumé.");
                            }
                        } else {
                            echo("Le livre doit avoir une description.");
                        }
                    } else {
                        echo("Le livre doit avoir des pages.");
                    }
                } else {
                    echo("Le livre doit avoir un genre.");
                }
            } else {
                echo("Le livre doit avoir une date de parution.");
            }
        } else {
            echo("Le livre doit contenir un auteur.");
        }
    } else {
        echo("Le livre doit contenir un nom.");
    }
} else if (isset($_POST['post_author'])) {
    $authorManager = $manager->getAuthorManager();
	if (isset($_POST['author_name'])) {
        if (isset($_POST['author_birth'])) {
            if (isset($_POST['author_gender'])) {
                if (isset($_POST['author_description'])) {
                    if (isset($_POST['author_biography'])) {
                        if (isset($_FILES['author_picture'])) {
                            $author_name = htmlspecialchars(stripslashes(($_POST['author_name'])));
                            $author_name_slug = toSlug($author_name);
                            $author_birth = $_POST['author_birth'];
                            $author_gender = $_POST['author_gender'];
                            $author_description = htmlspecialchars(stripslashes(($_POST['author_description'])));
                            $author_biography = htmlspecialchars(stripslashes(($_POST['author_biography'])));
                            $author_picture = $_FILES['author_picture'];

                            $fileInfo = pathinfo($author_picture['name']);
                            $extension = $fileInfo['extension'];

                            if ($author_picture['error'] == 0) {
                                if (in_array($extension, $allowedExtensions)) {
                                    if ($author_picture['size'] <= $allowedMaxSize) {
                                        $authorManager->registerAuthor($author_name, $author_name_slug, $author_birth, $author_gender, $author_description, $author_biography, $author_picture);
                                        header("Location: ./?author=".$author_name_slug);
                                    } else {
                                        echo("La taille de votre image ne doit pas dépasser " . $allowedMaxSize/1000000 . "Mo.");
                                    }
                                } else {
                                    echo("Le format doit respecter le suivant: 'jpg', 'jpeg', 'png', 'webp'.");
                                }
                            } else {
                                echo("Erreur lors de l'importation de l'image de l'auteur.");
                            }
                        } else {
                            echo("L'auteur doit avoir une image.");
                        }
                    } else {
                        echo("L'auteur doit avoir une biographie.");
                    }
                } else {
                    echo("L'auteur doit avoir une description.");
                }
            } else {
                echo("L'auteur doit avoir un genre.");
            }
        } else {
            echo("L'auteur doit avoir une date de naissance.");
        }
    } else {
        echo("L'auteur doit avoir un nom.");
    }
}

/* Si l'utilisateur est connecté, afficher le formulaire de post de contenu. Sinon, demander à l'utilisateur de se connecter
puis de rediriger l'utilisateur vers le formulaire de post. */
if(isset($_SESSION["user"])) {
	require("./views/pages/post.php");
} else {
	header("Location: ./?r=connect&&a=post");
}
	