<?php
/*
----------------
Language: GERMAN
----------------
 */

$lang = array();

// TEMPLATE HEADER & MENU
define("SITE_TITLE", "VS OADE");

define("TEMP_LOGIN", "VERBINDEN");
define("TEMP_CONNECT", "Verbunden auf");
define("TEMP_ACCOUNT", "mein Konto");

define("TEMP_LOGOUT", "Abschaltung");

define("MENU_HOME", "STARTSEITE");
define("MENU_PROJECT", "PROJEKTE");
define("MENU_MANUAL", "PROZESS");
define("MENU_FRENCH", "FRANZÖSISCH");
define("MENU_DEUTSCH", "DEUTSCH");
define("MENU_ADMIN", "ADMIN");

// MESSAGES
define("MSG_CONNECTION_FAIL", "Verbindung fehlgeschlagen");
define("MSG_SUCCESS", "Erfolg!");
define("MSG_MODIF", "Änderung korrekt.");
define("MSG_INSERT", "Projekt erfolgreich archiviert.");
define("MSG_DELETE", "Löschen erfolgreich.");
define("MSG_ERROR", "Fehler!");
define("MSG_INCORRECT_PWD", "Falsches Passwort.");
define("MSG_WARNING", "Warnung!");
define("MSG_PROJECT_EXIST", "Das Projekt existiert bereits.");
define("MSG_INFO", "Informationen!");
define("MSG_CONNECT_TO_SHOW_PROJECTS", "Bitte melden Sie sich an, um gemeinsame Projekte zugreifen.");
define("MSG_NO_PROJECT", "Es gibt kein existierendes Projekt in dieser Region.");
define("MSG_NO_ARCHIVES", "Es gibt kein bestehendes Archiv in dieser Region.");

// HOME PAGE
define("HOME_TITLE", "VS-OADE Startseite");
define("HOME_MANUAL", "Bewertungsprozess");
define("HOME_SURVEY", "Fragebogen");
define("HOME_CAPITAL_GAIN", "Wertzuwachs");
define("HOME_CONFLICT", "Potenzielle Konflikte");
define("HOME_WEIGHTING", "Gewichtung");
define("HOME_CONSISTENCY", "Kohärenz");
define("HOME_OPTIMIZATION", "Optimierung");
define("HOME_PROJECTS", "Projekte");
define("HOME_PROJECTS_LIST", "Liste der Projekte");
define("HOME_PROJECTS_DESC", "Erstellen Sie neue Projekte oder bestehende Projekte bearbeiten.");
define("HOME_PROJECTS_ACCESS", "Zugang zu Projekten");

// INITLOGIN PAGE
define("USER", "Projektleiter");
define("USER_TEXT", "Der Projektleiter absolvierte einen vorläufigen Fragebogen über das Projekt.");
define("USER_ELECTED", "Gewählt Gemeinschafts");
define("USER_ELECTED_TEXT", "Die kommunale gewählt analysiert das Projekt von Fragen mit Gewichtungskriterien zu beantworten.");
define("ADMIN", "Administrator");
define("ADMIN_TEXT", "Der Gemeinschafts Administrator verwaltet Einstellungen und Projekte seiner Stadt.");

// LOGIN PAGE
define("LOGIN_TITLE", "VS-OADE Verbindung");
define("LOGIN", "Verbindung");
define("TOWNNAME", "Stadt");
define("PASSWORD", "Passwort");

// LOGIN1 PAGE
define("LOGIN1_TITLE", "VS-OADE Verbindung");
define("LOGIN1", "Verbindung (Gewählte Gemeinde)");
define("LOGIN1_TOWNNAME", "Stadt");
define("LOGIN1_PASSWORD", "Passwort (Gewählte Gemeinde)");

// LOGIN2 PAGE
define("LOGIN2_TITLE", "VS-OADE Verbindung");
define("LOGIN2", "Verbindung (Verwalter)");
define("LOGIN2_TOWNNAME", "Stadt");
define("LOGIN2_PASSWORD", "Passwort (Verwalter)");

// MANUAL PAGE
define("MANUAL_TITLE", "VS-OADE Bewertungsprozess");
define("MANUAL_MANUAL", "Bewertungsprozess");
define("MANUAL_PHASES", "Phasen");
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
define("PROJECTS_TITLE", "VS-OADE Projekte");
define("PROJECTS_PROJECT", "Projekte");
define("PROJECTS_NEW_PROJECT", "Neues Projekt");
define("PROJECTS_READ_MORE", "Erfahren Sie mehr");
define("PROJECTS_DELETE", "Entfernen");
define("PROJECTS_SAVE", "Archivieren");
define("PROJECTS_SAVE_ACCESS", "Archiv");
define("PROJECTS_CONFIRM", "Bestätigen");
define("PROJECTS_CANCEL", "Stornieren");

// PROJECT PAGE
define("PROJECT_ACCESS", "Zugang");
define("PROJECT_PROJECT", "Projekt");
define("MSG_NO_RIGHTS", "Sie haben keine Berechtigung, um die gewünschte Seite zu gelangen.");

// PROJECTS PHASE 0
define("PHASE0_TITLE", "VS-OADE Phase 0");
define("PHASE0_PROJECT_INFO", "Projektinformationen");
define("PHASE0_PROJECT_NAME", "Name des Projekts");
define("PHASE0_PROJECT_DESCRIPTION", "Projektbeschreibung");
define("PHASE0_PROJECT_POLASTNAME", "Projektleiter Name");
define("PHASE0_PROJECT_POFIRSTNAME", "Projektleiter Vorname");
define("PHASE0_PROJECT_CREATE", "Projekt anlegen");
define("PHASE0_PROJECT_CANCEL", "Stornieren");
define("PROJECTS_DELETE_QUESTION", "Wollen Sie dieses Projekt endgültig löschen?");

// PROJECTS PHASE 1
define("PHASE1_SURVEY", "Vorläufiger Fragebogen");
define("PHASE1_VALIDATE", "Bestätigen");
define("PHASE1_QUESTION", "Frage");
define("PHASE1_ANSWER", "Antwort");
define("PHASE1_PROJECT", "Das Projekt...");

// PROJECTS PHASE 2
define("PHASE2_CAPITAL_GAIN", "Wertzuwachs");
define("PHASE2_STATE", "Zustand Erstprüfung");
define("PHASE2_GRADE", "Notiz");
define("PHASE2_0", "Das Projekt ist perfekt im Ziel");
define("PHASE2_1", "Das Projekt ist interessant und nähert sich das Ziel");
define("PHASE2_2", "Das Projekt zeigt Lücken zu verbessern");
define("PHASE2_3", "Das Projekt ist weit von dem Ziel oder wirken sich auf die Erreichung des erklärten Ziels");
define("PHASE2_4", "Das Projekt ist irrelevant");

// PROJECTS PHASE 3
define("PHASE3_CONFLICT", "Analyse potentieller Konflikte");

// PROJECTS PHASE 4
define("PHASE4_WEIGHTING", "Gewichtung");
define("PHASE4_ASSETS", "Haupt-Assets");
define("PHASE4_CONFLICTS", "Grosse Konflikte");
define("PHASE4_IMPORTANCE", "Bedeutung");
define("PHASE4_1", "sehr hohe Bedeutung");
define("PHASE4_2", "hohe Bedeutung");
define("PHASE4_3", "geringe Bedeutung");
define("PHASE4_4", "sehr geringe Bedeutung");
define("PHASE4_STATE", "Zustand, der durch die gemeinsame gewünschten");
define("PHASE4_COMPARISON", "Vergleich");

// PROJECTS PHASE 5
define("PHASE5_CONSISTENCY", "Kohärenz");
define("PHASE5_SOCIAL", "Unternehmen Projekt");
define("PHASE5_TERRITORY", "Projektgebiet");
define("PHASE5_ANSWER", "Antwork");
define("PHASE5_1", "Ja");
define("PHASE5_2", "Teilweise");
define("PHASE5_3", "Nein");

// PROJECTS PHASE 6
define("PHASE6_OPTIMIZATION_SUGGESTION", "Vorschläge, Optimierung");
define("PHASE6_SUGGESTION", "Verbesserungen, Anregungen");
define("PHASE6_OPTIMIZATION", "Optimierung");
define("PHASE6_OPENQUESTION", "offene Fragen");
define("PHASE6_COMMENT", "Kommentar");
define("PHASE6_QUESTION", "Frage");

// ADMIN
define("ADMIN_TITLE", "VS-OADE Admin");
define("ADMIN_ARCHIVES", "Archiv");
define("ADMIN_ACCESS", "Benutzerzugriff");
