<?php
/*
----------------
Language: FRENCH
----------------
 */

$lang = array();

// TEMPLATE HEADER & MENU
define("SITE_TITLE", "VS OADE");

define("TEMP_LOGIN", "connexion");
define("TEMP_WELCOME", "Bienvenue");
define("TEMP_ACCOUNT", "mon compte");

define("TEMP_LOGOUT", utf8_encode("d�connexion"));

define("MENU_HOME", "Accueil");
define("MENU_PROJECT", "Projets");
define("MENU_MANUAL", utf8_encode("Mode d'emploi"));

define("MENU_ADMIN", "Administration");
define("FILTER", "Filtrer");
define("SEARCH", "Rechercher");

// MESSAGES
define("CONNECTION_FAIL", "Connection failed");
define("REQUIRED_FIELD", "Un champ obligatoire est vide!");
define("INCORRECT_UOP", "Email ou mot de passe incorrect!");
define("USER_EXIST", utf8_encode("L'adresse email existe d�j�!"));
define("REGISTER_SUCCESS", utf8_encode("Inscription r�ussie!"));
define("CREATE_SUCCESS", utf8_encode("Creation r�ussie!"));
define("PASSWORD_NOT_CORRESPOND", "Les mots de passe ne correspondent pas!");
define("UPDATE_SUCCESS", utf8_encode("Modification effectu�e!"));
define("UPDATE_FAIL", "Erreur de modification!");
define("MODIFICATION_IMPOSSIBLE", utf8_encode("Impossible de changer le type de randonn�e de r�servation en randonn�e"));  
define("NO_FILE", "Pas de fichier!");
define("UPLOAD_ERROR", utf8_encode("Erreur d'upload!"));
define("UPLOAD_TYPEFILE", "Type de fichier invalide");
define("UPLOAD_HEAVY", "trop lourd!");
define("DELETE_FAIL", "Echec de suppression!");
define("DELETE_SUCCESS", utf8_encode("Suppression effectu�e!"));
define("NO_INSCRIPTION", utf8_encode("Aucune inscription disponible!"));
define("NO_RATING", utf8_encode("Aucune �valuation disponible!"));
define("NO_FAVORITE", utf8_encode("Aucun favori disponible!"));
define("NO_HIKE", utf8_encode("Aucune randonn�e disponible!"));
define("NO_GUIDEDHIKE", utf8_encode("Aucune randonn�e guid�e disponible!"));

// HOME PAGE
define("HOME_TITLE", "VS-OADE Accueil");

// LOGIN PAGE
define("LOGIN_TITLE", "CAS Connexion");
define("LOGIN", "Connexion");
define("EMAIL", "Email");
define("PASSWORD", "Mot de passe");
define("REGISTER", "S'inscrire");

// REGISTER PAGE
define("REGISTER_TITLE", "CAS Inscription");
define("REGISTRATION", "Inscription");
define("FIRSTNAME", utf8_encode("Pr�nom"));
define("LASTNAME", "Nom");
define("POSTCODE", "NPA");
define("LOCALITY", utf8_encode("Localit�"));
define("REGION", "Canton");
define("ADDRESS", "Adresse");
define("TELEPHONE", utf8_encode("T�l�phone"));
define("GENDER", "Genre");
define("MAN", "Homme");
define("WOMAN", "Femme");
define("PREFLANG", utf8_encode("Langue souhait�e"));
define("TOLOGIN", "Se connecter");

// HIKES PAGE
define("HIKES_TITLE", utf8_encode("CAS Id�es de randonn�es"));

// HIKE PAGE
define("REG_FAILED", utf8_encode("Erreur d'inscription!"));
define("REG_SUCCESS", utf8_encode("Inscription r�ussie!"));
define("HIKE_PLACEAVAILABLE", utf8_encode("Place(s) restante(s)"));
define("HIKE_NOREGIST", utf8_encode("N� d'inscriptions"));
define("HIKE_REGIST", "Inscriptions");
define("HIKE_NBREGIST", utf8_encode("Nombre d'inscriptions"));
define("HIKE_TOTALPRICE", "Prix total");

// GUIDED HIKES PAGE
define("GUIDEDH_TITLE", utf8_encode("CAS Nos randonn�es guid�es"));

// ABOUT PAGE
define("ABOUT_TITLE", utf8_encode("Cas � propos"));
define("PAR1", utf8_encode("Bienvenue � la section Montana-Vermala du Club Alpin Suisse, le club qui regroupe les amateurs de montagne de tous �ges
		qui ont un lien avec la r�gion de Crans-Montana."));
define("PAR2", utf8_encode("La section organise des courses pour ses membres toute l'ann�e, couvrant un spectre tr�s large de disciplines alpines.
		Et avec les groupes sp�cialis�s pour les jeunes (ALFA, AJ/OJ), c'est toute la famille qui peut participer!"));
define("PAR3", utf8_encode("La section poss�de la Cabane des Violettes, situ�e au coeur du domaine skiable de Crans-Montana. En hiver l'endroit id�al
		pour une agr�able pause, en plein coeur du domaine skiable de Crans-Montana; en �t� une belle �tape de la Haute Route Bernoise."));
define("PAR4", utf8_encode("Elle est aussi l'organisatrice du D�fi des Faverges, la c�l�bre course de ski-alpinisme qui a lieu tous les deux ans �
		Crans-Montana et compte pr�s de 1'500 participants. Elle a f�t� en 2014 sa 10�me �dition."));
define("PAR5", utf8_encode("Si vous aimez la montagne et si vous avez un lien avec la r�gion de Crans-Montana, n'h�sitez pas � nous rejoindre."));

// CONTACT PAGE
define("CONTACT_TITLE", "Cas Contact");
define("CONTACTUS","Contactez-nous");
define("MESSAGE","Message");
define("SEND","Envoyer");
define("MESSAGE_SEND",utf8_encode("Le message a �t� envoy�!"));
define("MESSAGE_NOT_SEND",utf8_encode("Le message n'a pas �t� envoy�. Veuillez r�essayer plus tard!"));
define("MESSAGE_CONTACT_INVALIDATE", utf8_encode("V�rifiez que tous les champs soient remplis!"));
define("CONTACT_ERROR", "Erreur");
define("MESSAGE_ERROR", utf8_encode("Malheureusement, votre message n'a pas �t� envoy�."));
define("MESSAGE_ERROR2", utf8_encode("Veuillez r�essayer � nouveau!"));
define("RETRY", utf8_encode("R�essayer"));
define("MESSAGE_CONFIRMATION", "Merci pour votre message!");
define("MESSAGE_CONFIRMATION2", utf8_encode("Nous vous r�pondrons d�s que possible!"));
define("CONTACT_SEND", utf8_encode("Vous nous avez contact�!"));
define("COPY_MESSAGE", "Copie de CAS Montana");

// ADMINISTRATION PAGES
define("ADMIN_TITLE", "Cas Administration");
define("HIKENAME", "Nom");
define("DESCRIPTION" ,"Description");
define("DURATION", utf8_encode("Dur�e"));
define("PICTURE", "Photo");
define("DISTANCE", "Distance");
define("DIFFICULTY", utf8_encode("Difficult�"));
define("EASIER", utf8_encode("Tr�s facile"));
define("EASY", "Facile");
define("NORMAL", "Normal");
define("HARD", "Difficile");
define("HARDER", utf8_encode("Tr�s difficile"));
define("HEIGHTDIFFERENCE", utf8_encode("D�nivel�"));
define("DATE", "Date");
define("STARTDATE", utf8_encode("Date de d�but"));
define("ENDDATE", "Date de fin");
define("DEPARTTIME", utf8_encode("Heure de d�part"));
define("ARRIVETIME", utf8_encode("Heure d'arriv�e"));
define("PRICE", "Prix");
define("REGISTRATIONMAX", utf8_encode("Maximum d'inscription"));
define("TYPE", "Type");
define("HIKE", utf8_encode("Id�e"));
define("HIKEBT", utf8_encode("Id�es"));
define("REGIST", utf8_encode("Randonn�e"));
define("REGISTRATIONBT", utf8_encode("Randonn�es"));
define("ADMIN_REGISTRATION", "Inscription");
define("JOURNEY", utf8_encode("S�jour"));
define("JOURNEYBT", utf8_encode("S�jours"));
define("CREATE", utf8_encode("Cr�er"));
define("RESET", utf8_encode("R�initialiser"));
define("EDIT", "Modifier");
define("DELETE", "Supprimer");
define("HOUR", "Heures");
define("PEOPLE", "Personnes");
define("STARTLOCALITY", utf8_encode("Lieu de d�part"));
define("ENDLOCALITY", utf8_encode("Lieu d'arriv�e"));
define("LOCALADDRESS", utf8_encode("Localit�/Adresse"));
define("ADMIN_HIKE", utf8_encode("Randonn�es"));
define("MANAGE_HIKES", utf8_encode("Gestion des Randonn�es"));
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
define("MENU_MYNOTES", utf8_encode("Mes �valuations"));
define("NBREHIKERS", utf8_encode("Nombre de randonneurs"));
?>