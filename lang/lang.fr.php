<?php
/*
----------------
Language: FRENCH
----------------
 */

$lang = array();

// TEMPLATE HEADER & MENU
define("SITE_TITLE", "VS OADE");

define("TEMP_LOGIN", "CONNEXION");
define("TEMP_CONNECT", "Connecté sur");
define("TEMP_ACCOUNT", "mon compte");

define("TEMP_LOGOUT", "déconnexion");

define("MENU_HOME", "ACCUEIL");
define("MENU_PROJECT", "PROJETS");
define("MENU_MANUAL", utf8_encode("MODE D'EMPLOI"));
define("MENU_FRENCH", "FRANCAIS");
define("MENU_ENGLISH", "ANGLAIS");

define("MENU_ADMIN", "Administration");
define("FILTER", "Filtrer");
define("SEARCH", "Rechercher");

// MESSAGES
define("CONNECTION_FAIL", "Connection failed");
define("INCORRECT_PWD", "Mot de passe incorrect!");
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
define("MSG_CONNECT_TO_SHOW_PROJECTS", "Veuillez vous connecter sur une commune pour accéder à ses projets!");

// HOME PAGE
define("HOME_TITLE", "VS-OADE Accueil");
define("HOME_MANUAL", "Mode d'emploi");
define("HOME_SURVEY", "Questionnaire");
define("HOME_CAPITAL_GAIN", "Plus-value");
define("HOME_CONFLICT", "Conflits potentiels");
define("HOME_WEIGHTING", "Pondération");
define("HOME_CONSISTENCY", "Cohérence");
define("HOME_OPTIMIZATION", "Optimisation");
define("HOME_PROJECTS", "Projets");
define("HOME_PROJECTS_LIST", "Liste des projets");
define("HOME_PROJECTS_DESC", "Créer de nouveaux projets ou modifier des projets en cours.");
define("HOME_PROJECTS_ACCESS", "Accéder aux projets");

// LOGIN PAGE
define("LOGIN_TITLE", "VS-OADE Connexion");
define("LOGIN", "Connexion");
define("TOWNNAME", "Commune");
define("PASSWORD", "Mot de passe");

// PROJECTS PAGE
define("PROJECTS_TITLE", "VS-OADE Projets");
define("PROJECTS_PROJECT", "Projets");
define("PROJECTS_NEW_PROJECT", "Nouveau Projet");

// PROJECTS PHASE 0
define("PHASE0_TITLE", "VS-OADE Phase 0");
define("PHASE0_PROJECT_INFO", "Informations sur le projet");
define("PHASE0_PROJECT_NAME", "Nom du projet");
define("PHASE0_PROJECT_POLASTNAME", "Nom du porteur de projet");
define("PHASE0_PROJECT_POFIRSTNAME", "Prénom du porteur de projet");
define("PHASE0_PROJECT_CREATE", "Créer projet");
define("PHASE0_PROJECT_CANCEL", "Annuler");

































define("GUIDEDH_TITLE", utf8_encode("CAS Nos randonn�es guid�es"));

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
