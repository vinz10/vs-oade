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
define("MENU_MANUAL", "PROCESSUS");
define("MENU_FRENCH", "FRANCAIS");
define("MENU_DEUTSCH", "ALLEMAND");
define("MENU_ADMIN", "ADMIN");

// MESSAGES
define("MSG_CONNECTION_FAIL", "Connection failed");
define("MSG_SUCCESS", "Succès!");
define("MSG_MODIF", "Modification effectuée correctement.");
define("MSG_INSERT", "Project archivé correctement.");
define("MSG_DELETE", "Suppression effectuée correctement.");
define("MSG_ERROR", "Erreur!");
define("MSG_INCORRECT_PWD", "Mot de passe incorrect.");
define("MSG_WARNING", "Attention!");
define("MSG_PROJECT_EXIST", "Le projet existe déjà.");
define("MSG_NO_RIGHTS", "Vous n'avez pas les droits pour accéder à la page souhaitée.");
define("MSG_INFO", "Information!");
define("MSG_CONNECT_TO_SHOW_PROJECTS", "Veuillez vous connecter sur une commune pour accéder à ses projets.");
define("MSG_NO_PROJECT", "Il n'y a aucun projet existant sur cette commune.");
define("MSG_NO_ARCHIVES", "Il n'y a aucune archive existante sur cette commune.");

// HOME PAGE
define("HOME_TITLE", "VS-OADE Accueil");
define("HOME_MANUAL", "Processus d'évaluation");
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

// INITLOGIN PAGE
define("USER", "Porteur de Projet");
define("USER_TEXT", "Le porteur de projet rempli un questionnaire préalable sur le projet.");
define("USER_ELECTED", "Élu Communal");
define("USER_ELECTED_TEXT", "L'élu communal analyse le projet en répondant à des questions avec des critères de pondération.");
define("ADMIN", "Administrateur");
define("ADMIN_TEXT", "L'administrateur communal gère les paramètres et les projets de sa commune.");

// LOGIN PAGE
define("LOGIN_TITLE", "VS-OADE Connexion");
define("LOGIN", "Connexion");
define("TOWNNAME", "Commune");
define("PASSWORD", "Mot de passe");

// LOGIN1 PAGE
define("LOGIN1_TITLE", "VS-OADE Connexion");
define("LOGIN1", "Connexion (Élu Communal)");
define("LOGIN1_TOWNNAME", "Commune");
define("LOGIN1_PASSWORD", "Mot de passe (Élu Communal)");

// LOGIN2 PAGE
define("LOGIN2_TITLE", "VS-OADE Connexion");
define("LOGIN2", "Connexion (Administrateur)");
define("LOGIN2_TOWNNAME", "Commune");
define("LOGIN2_PASSWORD", "Mot de passe (Administrateur)");

// MANUAL PAGE
define("MANUAL_TITLE", "VS-OADE Processus d'évalutation");
define("MANUAL_MANUAL", "Processus d'évalutation");
define("MANUAL_PHASES", "Phases");
define("MANUAL_P1", "Chaque projet soumis au Conseil communal passe par la \"machine développement durable\". Il s'agit de parcourir le processus indiqué ci-dessou de gauche à droite. Quatre phases et deux acteurs sont distingués:");
define("MANUAL_P2", "1.) Phase de préparation par le porteur du projet");
define("MANUAL_P3", "2.) Phase d'analyse critique en vue d'un développement durable par le Conseil communal (1 séance de discussion)");
define("MANUAL_P4", "3.) Phase d'examen d'adéquation du projet quant aux lignes directrices de la commune (Conseil communal)");
define("MANUAL_P5", "4.) Phase de mise en application (Porteur du projet, éventuellement par l'intermédiaire d'un expert développement durable)");
define("MANUAL_REMARK", "Remarque préalable: Ces évaluations ne permettent pas de dire si nous sommes dans une situation durable ou non, mais de nous indiquer si le projet nous mène dans la bonne direction. ");
define("MANUAL_PHASE1", "Après avoir créé un projet, le porteur de projet remplit un questionnaire préalable sur l’idée de projet qu’il va ensuite remettre au conseil communal.");
define("MANUAL_PHASE2", "Le conseil communal analyse ces questions sous un point de vue « développement durable » et exécute une pondération sur ces questions à l’aide d’une grille prédéterminée pour arriver sur une première évaluation nommée analyse initiale (radar sur un schéma).");
define("MANUAL_PHASE3", "Un deuxième filtre est présenté au conseil avec des questions principalement axées sur l’analyse des conflits potentiels.");
define("MANUAL_PHASE4", "Un troisième filtre est présenté au conseil pour pouvoir évaluer le projet en fonction de la politique communale toujours en mettant des pondérations sur les différents critères.");
define("MANUAL_PHASE5", "Ces pondérations vont nous permettre de comparer une analyse initiale et un état souhaité par la commune en fonction des pondérations qu’ils ont effectuées.");
define("MANUAL_PHASE6", "Une partie annexe est proposée au conseil sous forme de questions ouvertes afin de suggérer des améliorations et optimisations au porteur de projet et une autre partie est également disponible pour avoir un filtre sur la cohérence du projet.");

// PROJECTS PAGE
define("PROJECTS_TITLE", "VS-OADE Projets");
define("PROJECTS_PROJECT", "Projets");
define("PROJECTS_GRAPH", "Politique communale actuelle");
define("PROJECTS_NEW_PROJECT", "Nouveau Projet");
define("PROJECTS_READ_MORE", "En Savoir Plus");
define("PROJECTS_DELETE", "Supprimer");
define("PROJECTS_SAVE", "Archiver");
define("PROJECTS_SAVE_ACCESS", "Archives");
define("PROJECTS_CONFIRM", "Confirmer");
define("PROJECTS_CANCEL", "Annuler");
define("PROJECTS_DELETE_QUESTION", "Voulez-vous supprimer définitivement ce projet?");

// PROJECT PAGE
define("PROJECT_ACCESS", "Accéder");
define("PROJECT_PROJECT", "Projet");
define("PROJECT_FILE_DOWNLOAD", "Télécharger fichier complémentaire");

// PROJECTS PHASE 0
define("PHASE0_TITLE", "VS-OADE Phase 0");
define("PHASE0_PROJECT_INFO", "Informations sur le projet");
define("PHASE0_PROJECT_NAME", "Nom du projet");
define("PHASE0_PROJECT_DESCRIPTION", "Description du projet");
define("PHASE0_PROJECT_POLASTNAME", "Nom du porteur de projet");
define("PHASE0_PROJECT_POFIRSTNAME", "Prénom du porteur de projet");
define("PHASE0_PROJECT_CREATE", "Créer projet");
define("PHASE0_PROJECT_CANCEL", "Annuler");

// PROJECTS PHASE 1
define("PHASE1_SURVEY", "Questionnaire préalable");
define("PHASE1_VALIDATE", "Valider");
define("PHASE1_QUESTION", "Question");
define("PHASE1_FILE", "Fichier complémentaire");
define("PHASE1_MSG", "Si la question n'est pas pertinente pour ce projet, veuillez répondre: Non pertinente!");
define("PHASE1_ANSWER", "Réponse");
define("PHASE1_PROJECT", "Le projet...");

// PROJECTS PHASE 2
define("PHASE2_CAPITAL_GAIN", "Plus-value");
define("PHASE2_STATE", "état d'analyse initial");
define("PHASE2_GRADE", "Note");
define("PHASE2_0", "le projet est parfaitement dans la cible");
define("PHASE2_1", "le projet est intéressant et s'approche de la cible");
define("PHASE2_2", "le projet montre des lacunes à améliorer");
define("PHASE2_3", "le projet est loin de la cible ou compromet la réalisation de l'objectif indiqué");
define("PHASE2_4", "le projet est hors sujet");

// PROJECTS PHASE 3
define("PHASE3_CONFLICT", "Analyse des conflits potentiels");

// PROJECTS PHASE 4
define("PHASE4_WEIGHTING", "Pondération");
define("PHASE4_ASSETS", "Principaux atouts");
define("PHASE4_CONFLICTS", "Principaux conflits");
define("PHASE4_IMPORTANCE", "Importance");
define("PHASE4_1", "importance très élevée");
define("PHASE4_2", "importance élevée");
define("PHASE4_3", "faible importance");
define("PHASE4_4", "très faible importance");
define("PHASE4_STATE", "état souhaité par la commune");
define("PHASE4_COMPARISON", "Comparaison");

// PROJECTS PHASE 5
define("PHASE5_CONSISTENCY", "Cohérence");
define("PHASE5_SOCIAL", "Projet de société");
define("PHASE5_TERRITORY", "Projet de territoire");
define("PHASE5_ANSWER", "Réponse");
define("PHASE5_1", "Oui");
define("PHASE5_2", "Partiellement");
define("PHASE5_3", "Non");

// PROJECTS PHASE 6
define("PHASE6_OPTIMIZATION_SUGGESTION", "Suggestions, Optimisation");
define("PHASE6_SUGGESTION", "Améliorations, suggestions");
define("PHASE6_OPTIMIZATION", "Optimisation");
define("PHASE6_OPENQUESTION", "Questions ouvertes");
define("PHASE6_COMMENT", "Commentaire");
define("PHASE6_QUESTION", "Question");

// ADMIN
define("ADMIN_TITLE", "VS-OADE Admin");
define("ADMIN_ARCHIVES", "Archives");
define("ADMIN_ACCESS", "Accès utilisateur");
define("ADMIN_ARCHIVE", "Archive");
define("ADMIN_PO", "Porteur de projet");
define("ADMIN_QUESTIONCOMMENT", "Commentaire de la question");