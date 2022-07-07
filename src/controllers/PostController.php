<?php
if (!isset($_SESSION)) session_start();

require("./src/Manager.php");
$manager = new \sycatle\beblio\Manager();
$formManager = $manager->getFormManager();
$bookManager = $manager->getBookManager();
$authorManager = $manager->getAuthorManager();

$allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
$allowedMaxSize =  0.5*1000000; // Taille maximum du fichier: 0.5Mega-octets/500Kilo-octets

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entities\User($_SESSION['id']) : null;

if ($user != null) {
    if (isset($_POST['post_book'])) {
        if (isset($_POST['book_name'])) {
            if (isset($_POST['book_author'])) {
                if (isset($_POST['book_parution'])) {
                    if (isset($_POST['book_gender'])) {
                        if (isset($_POST['book_pages'])) {
                            if (isset($_POST['book_description'])) {
                                if (isset($_POST['book_summary'])) {
                                    if (isset($_FILES['book_cover'])) {
                                        $book_name = $formManager->safeFormat($_POST['book_name']);
                                        $book_name_slug = $formManager->toSlug($book_name);
                                        $book_author = $formManager->safeFormat($_POST['book_author']);
                                        $book_parution = $formManager->safeFormat($_POST['book_parution']);
                                        $book_gender = $formManager->safeFormat($_POST['book_gender']);
                                        $book_pages = $formManager->safeFormat($_POST['book_pages']);
                                        $book_description = $formManager->safeFormat($_POST['book_description']);
                                        $book_summary = $formManager->safeFormat($_POST['book_summary']);
                                        $book_cover = $_FILES['book_cover'];

                                        $fileInfo = pathinfo($book_cover['name']);
                                        $extension = $fileInfo['extension'];
                                        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
                                        $allowedMaxSize =  0.5*1000000; // Taille maximum du fichier: 0.5Mega-octets/500Kilo-octets

                                        if ($book_cover['error'] == 0) {
                                            if (in_array($extension, $allowedExtensions)) { 
                                                if ($book_cover['size'] <= $allowedMaxSize) { 
                                                    $bookManager->registerBook($book_name, $book_name_slug, $book_author, $book_description, $book_summary, $book_parution, $book_gender, $book_cover);
                                                    header("Location: ./?r=book&slug=".$book_name_slug);
                                                } else {
                                                    $errorMessage = "La taille de votre image ne doit pas dépasser " . $allowedMaxSize/1000000 . "mégaoctets.";
                                                }
                                            } else {
                                                $errorMessage = "Le format doit respecter le suivant: \'jpg\', \'jpeg\', \'png'\, \'webp\'.";
                                            }
                                        } else {
                                            $errorMessage = "Erreur lors de l'importation du livre.";
                                        }
                                    } else {
                                        $errorMessage = "Le livre doit avoir une couverture.";
                                    }
                                } else {
                                    $errorMessage = 'Le livre doit avoir un résumé.';
                                }
                            } else {
                                $errorMessage = 'Le livre doit avoir une description.';
                            }
                        } else {
                            $errorMessage = 'Le livre doit avoir des pages.';
                        }
                    } else {
                        $errorMessage = 'Le livre doit avoir un genre.';
                    }
                } else {
                    $errorMessage = 'Le livre doit avoir une date de parution.';
                }
            } else {
                $errorMessage = 'Le livre doit contenir un auteur.';
            }
        } else {
            $errorMessage = 'Le livre doit contenir un nom.';
        }
    } else if (isset($_POST['post_author'])) {
        if (isset($_POST['author_name'])) {
            if (isset($_POST['author_birth'])) {
                if (isset($_POST['author_gender'])) {
                    if (isset($_POST['author_description'])) {
                        if (isset($_POST['author_biography'])) {
                            if (isset($_FILES['author_picture'])) {
                                $author_name = $formManager->safeFormat($_POST['author_name']);
                                $author_name_slug = $formManager->toSlug($author_name);
                                $author_birth = $formManager->safeFormat($_POST['author_birth']);
                                $author_gender = $formManager->safeFormat($_POST['author_gender']);
                                $author_description = $formManager->safeFormat($_POST['author_description']);
                                $author_biography = $formManager->safeFormat($_POST['author_biography']);
                                $author_picture = $_FILES['author_picture'];

                                $fileInfo = pathinfo($author_picture['name']);
                                $extension = $fileInfo['extension'];

                                if ($author_picture['error'] == 0) {
                                    if (in_array($extension, $allowedExtensions)) {
                                        if ($author_picture['size'] <= $allowedMaxSize) {
                                            $authorManager->registerAuthor($author_name, $author_name_slug, $author_birth, $author_gender, $author_description, $author_biography, $author_picture);
                                            header("Location: ./?author=".$author_name_slug);
                                        } else {
                                            $errorMessage = 'La taille de votre image ne doit pas dépasser " . $allowedMaxSize/1000000 . "Mo';
                                        }
                                    } else {
                                        $errorMessage = "Le format doit respecter le suivant: \'jpg\', \'jpeg\', \'png'\, \'webp\'.";
                                    }
                                } else {
                                    $errorMessage = 'Erreur lors de l\'importation de l\'image de l\'auteur';
                                }
                            } else {
                                $errorMessage = 'L\'auteur doit avoir une image.';
                            }
                        } else {
                            $errorMessage = 'L\'auteur doit avoir une biographie.';
                        }
                    } else {
                        $errorMessage = 'L\'auteur doit avoir une description.';
                    }
                } else {
                    $errorMessage = 'L\'auteur doit avoir un genre';
                }
            } else {
                $errorMessage = 'L\'auteur doit avoir une date de naissance.';
            }
        } else {
            $errorMessage = 'L\'auteur doit avoir un nom.';
        }
    }
} else {
    $errorMessage = "Vous devez être connecté pour réaliser cette action.";
    header('Location: ./?r=connect');
}

/* Si l'utilisateur est connecté, afficher le formulaire de post de contenu. Sinon, demander à l'utilisateur de se connecter
puis de rediriger l'utilisateur vers le formulaire de post. */
if ($user != null) {
	require("./src/templates/pages/post.php");
} else {
	header("Location: ./?r=connect&&a=post");
}
	
?>