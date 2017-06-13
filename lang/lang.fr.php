<?php
/*
----------------
Language: FRENCH
----------------
 */

$lang = array();

// TEMPLATE HEADER & MENU
define("SITE_TITLE", "Club Alpin Suisse");
define("TEMP_LOGIN", "connexion");
define("TEMP_REGISTER", "s'inscrire");
define("TEMP_WELCOME", "Bienvenue");
define("TEMP_ACCOUNT", "mon compte");
define("TEMP_LOGOUT", utf8_encode("déconnexion"));
define("MENU_HOME", "Accueil");
define("MENU_HIKESIDEAS", utf8_encode("Idées de randonnées"));
define("MENU_GUIDEDHIKES", utf8_encode("Nos randonnées guidées"));
define("MENU_ABOUT", utf8_encode("À propos"));
define("MENU_CONTACT", "Contact");
define("MENU_ADMIN", "Administration");
define("FILTER", "Filtrer");
define("SEARCH", "Rechercher");

// MESSAGES
define("CONNECTION_FAIL", "Connection failed");
define("REQUIRED_FIELD", "Un champ obligatoire est vide!");
define("INCORRECT_UOP", "Email ou mot de passe incorrect!");
define("USER_EXIST", utf8_encode("L'adresse email existe déjà!"));
define("REGISTER_SUCCESS", utf8_encode("Inscription réussie!"));
define("CREATE_SUCCESS", utf8_encode("Creation réussie!"));
define("PASSWORD_NOT_CORRESPOND", "Les mots de passe ne correspondent pas!");
define("UPDATE_SUCCESS", utf8_encode("Modification effectuée!"));
define("UPDATE_FAIL", "Erreur de modification!");
define("MODIFICATION_IMPOSSIBLE", utf8_encode("Impossible de changer le type de randonnée de réservation en randonnée"));  
define("NO_FILE", "Pas de fichier!");
define("UPLOAD_ERROR", utf8_encode("Erreur d'upload!"));
define("UPLOAD_TYPEFILE", "Type de fichier invalide");
define("UPLOAD_HEAVY", "trop lourd!");
define("DELETE_FAIL", "Echec de suppression!");
define("DELETE_SUCCESS", utf8_encode("Suppression effectuée!"));
define("NO_INSCRIPTION", utf8_encode("Aucune inscription disponible!"));
define("NO_RATING", utf8_encode("Aucune évaluation disponible!"));
define("NO_FAVORITE", utf8_encode("Aucun favori disponible!"));
define("NO_HIKE", utf8_encode("Aucune randonnée disponible!"));
define("NO_GUIDEDHIKE", utf8_encode("Aucune randonnée guidée disponible!"));

// HOME PAGE
define("HOME_TITLE", "CAS Accueil");

// LOGIN PAGE
define("LOGIN_TITLE", "CAS Connexion");
define("LOGIN", "Connexion");
define("EMAIL", "Email");
define("PASSWORD", "Mot de passe");
define("REGISTER", "S'inscrire");

// REGISTER PAGE
define("REGISTER_TITLE", "CAS Inscription");
define("REGISTRATION", "Inscription");
define("FIRSTNAME", utf8_encode("Prénom"));
define("LASTNAME", "Nom");
define("POSTCODE", "NPA");
define("LOCALITY", utf8_encode("Localité"));
define("REGION", "Canton");
define("ADDRESS", "Adresse");
define("TELEPHONE", utf8_encode("Téléphone"));
define("GENDER", "Genre");
define("MAN", "Homme");
define("WOMAN", "Femme");
define("PREFLANG", utf8_encode("Langue souhaitée"));
define("TOLOGIN", "Se connecter");

// HIKES PAGE
define("HIKES_TITLE", utf8_encode("CAS Idées de randonnées"));

// HIKE PAGE
define("REG_FAILED", utf8_encode("Erreur d'inscription!"));
define("REG_SUCCESS", utf8_encode("Inscription réussie!"));
define("HIKE_PLACEAVAILABLE", utf8_encode("Place(s) restante(s)"));
define("HIKE_NOREGIST", utf8_encode("N° d'inscriptions"));
define("HIKE_REGIST", "Inscriptions");
define("HIKE_NBREGIST", utf8_encode("Nombre d'inscriptions"));
define("HIKE_TOTALPRICE", "Prix total");

// GUIDED HIKES PAGE
define("GUIDEDH_TITLE", utf8_encode("CAS Nos randonnées guidées"));

// ABOUT PAGE
define("ABOUT_TITLE", utf8_encode("Cas À propos"));
define("PAR1", utf8_encode("Bienvenue à la section Montana-Vermala du Club Alpin Suisse, le club qui regroupe les amateurs de montagne de tous âges
		qui ont un lien avec la région de Crans-Montana."));
define("PAR2", utf8_encode("La section organise des courses pour ses membres toute l'année, couvrant un spectre très large de disciplines alpines.
		Et avec les groupes spécialisés pour les jeunes (ALFA, AJ/OJ), c'est toute la famille qui peut participer!"));
define("PAR3", utf8_encode("La section possède la Cabane des Violettes, située au coeur du domaine skiable de Crans-Montana. En hiver l'endroit idéal
		pour une agréable pause, en plein coeur du domaine skiable de Crans-Montana; en été une belle étape de la Haute Route Bernoise."));
define("PAR4", utf8_encode("Elle est aussi l'organisatrice du Défi des Faverges, la célèbre course de ski-alpinisme qui a lieu tous les deux ans à
		Crans-Montana et compte près de 1'500 participants. Elle a fêté en 2014 sa 10ème édition."));
define("PAR5", utf8_encode("Si vous aimez la montagne et si vous avez un lien avec la région de Crans-Montana, n'hésitez pas à nous rejoindre."));

// CONTACT PAGE
define("CONTACT_TITLE", "Cas Contact");
define("CONTACTUS","Contactez-nous");
define("MESSAGE","Message");
define("SEND","Envoyer");
define("MESSAGE_SEND",utf8_encode("Le message a été envoyé!"));
define("MESSAGE_NOT_SEND",utf8_encode("Le message n'a pas été envoyé. Veuillez réessayer plus tard!"));
define("MESSAGE_CONTACT_INVALIDATE", utf8_encode("Vérifiez que tous les champs soient remplis!"));
define("CONTACT_ERROR", "Erreur");
define("MESSAGE_ERROR", utf8_encode("Malheureusement, votre message n'a pas été envoyé."));
define("MESSAGE_ERROR2", utf8_encode("Veuillez réessayer à nouveau!"));
define("RETRY", utf8_encode("Réessayer"));
define("MESSAGE_CONFIRMATION", "Merci pour votre message!");
define("MESSAGE_CONFIRMATION2", utf8_encode("Nous vous répondrons dès que possible!"));
define("CONTACT_SEND", utf8_encode("Vous nous avez contacté!"));
define("COPY_MESSAGE", "Copie de CAS Montana");

// ADMINISTRATION PAGES
define("ADMIN_TITLE", "Cas Administration");
define("HIKENAME", "Nom");
define("DESCRIPTION" ,"Description");
define("DURATION", utf8_encode("Durée"));
define("PICTURE", "Photo");
define("DISTANCE", "Distance");
define("DIFFICULTY", utf8_encode("Difficulté"));
define("EASIER", utf8_encode("Très facile"));
define("EASY", "Facile");
define("NORMAL", "Normal");
define("HARD", "Difficile");
define("HARDER", utf8_encode("Très difficile"));
define("HEIGHTDIFFERENCE", utf8_encode("Dénivelé"));
define("DATE", "Date");
define("STARTDATE", utf8_encode("Date de début"));
define("ENDDATE", "Date de fin");
define("DEPARTTIME", utf8_encode("Heure de départ"));
define("ARRIVETIME", utf8_encode("Heure d'arrivée"));
define("PRICE", "Prix");
define("REGISTRATIONMAX", utf8_encode("Maximum d'inscription"));
define("TYPE", "Type");
define("HIKE", utf8_encode("Idée"));
define("HIKEBT", utf8_encode("Idées"));
define("REGIST", utf8_encode("Randonnée"));
define("REGISTRATIONBT", utf8_encode("Randonnées"));
define("ADMIN_REGISTRATION", "Inscription");
define("JOURNEY", utf8_encode("Séjour"));
define("JOURNEYBT", utf8_encode("Séjours"));
define("CREATE", utf8_encode("Créer"));
define("RESET", utf8_encode("Réinitialiser"));
define("EDIT", "Modifier");
define("DELETE", "Supprimer");
define("HOUR", "Heures");
define("PEOPLE", "Personnes");
define("STARTLOCALITY", utf8_encode("Lieu de départ"));
define("ENDLOCALITY", utf8_encode("Lieu d'arrivée"));
define("LOCALADDRESS", utf8_encode("Localité/Adresse"));
define("ADMIN_HIKE", utf8_encode("Randonnées"));
define("MANAGE_HIKES", utf8_encode("Gestion des Randonnées"));
define("PERMISSION", "Permission");
define("ADMIN_PERMISSION", "Permissions");
define("MANAGE_PERMISSION", "Gestion des Permissions");
define("DESC_PERMISSION", utf8_encode("Droits d'administration"));

// ACCOUNT PAGE
define("ACCOUNT_TITLE", "CAS Mon Compte");
define("FAVORITE_TITLE", "CAS Mes Favoris");
define("BOOKING_TITLE", "CAS Mes Inscriptions");
define("RATING_TITLE", "CAS Mes Evaluations");
define("INFORMATION", "Mes informations");
define("CONFIRMPW", "Confirmer mot de passe");
define("MODIFY", "Modifier");
define("CANCEL", "Annuler");
define("MENU_MYACCOUNT", "Mon Compte");
define("MENU_FAVORITES", "Favoris");
define("MENU_MYFAVORITES", "Mes Favoris");
define("MENU_MYBOOKING", utf8_encode("Inscriptions"));
define("MENU_MYINSCRIPTION", utf8_encode("Mes inscriptions"));
define("MENU_MYRATING", "Evaluations");
define("MENU_MYNOTES", utf8_encode("Mes évaluations"));
define("NBREHIKERS", utf8_encode("Nombre de randonneurs"));
?>