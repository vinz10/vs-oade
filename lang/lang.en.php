<?php
/*
-----------------
Language: ENGLISH
-----------------
 */

$lang = array();

// TEMPLATE HEADER & MENU
define("SITE_TITLE", "VS OADE");
define("TEMP_LOGIN", "login");

define("TEMP_WELCOME", "Welcome");
define("TEMP_ACCOUNT", "my account");
define("TEMP_LOGOUT", "logout");

define("MENU_HOME", "Home");
define("MENU_PROJECT", "Projects");
define("MENU_MANUAL", "Manual");

define("MENU_ADMIN", "Administration");
define("FILTER", "Filter");
define("SEARCH", "Search");

// MESSAGES
define("CONNECTION_FAIL", "Connection failed");
define("REQUIRED_FIELD", "A required field is empty!");
define("INCORRECT_UOP", "Email or password incorrect!");
define("USER_EXIST", "Email exists already!");
define("REGISTER_SUCCESS", "Registration successful!");
define("CREATE_SUCCESS", "Creation successful!");
define("PASSWORD_NOT_CORRESPOND", "Password are not corresponding!");
define("UPDATE_SUCCESS", "Modification done!");
define("UPDATE_FAIL", "Modification fail!");
define("MODIFICATION_IMPOSSIBLE", "Impossible to switch the type from registration to hike !");  
define("NO_FILE", "No file!");
define("UPLOAD_ERROR", "Upload Error!");
define("UPLOAD_TYPEFILE", "Type of file invalid !");
define("UPLOAD_HEAVY", "too heavy!");
define("DELETE_FAIL", "Delete fail!");
define("DELETE_SUCCESS", "Delete done!");
define("NO_INSCRIPTION", "No registration available!");
define("NO_RATING", "No rating available!");
define("NO_FAVORITE", "No favorite available!");
define("NO_HIKE", "No hike available!");
define("NO_GUIDEDHIKE", "No guided hike available");

// HOME PAGE
define("HOME_TITLE", "VS-OADE Home");

// LOGIN PAGE
define("LOGIN_TITLE", "CAS Login");
define("LOGIN", "Login");
define("EMAIL", "Email");
define("PASSWORD", "Password");
define("REGISTER", "Register");

// REGISTER PAGE
define("REGISTER_TITLE", "CAS Register");
define("REGISTRATION", "Register");
define("FIRSTNAME", "Firstname");
define("LASTNAME", "Lastname");
define("POSTCODE", "Postcode");
define("LOCALITY", "Locality");
define("REGION", "Region");
define("ADDRESS", "Address");
define("TELEPHONE", "Phone");
define("GENDER", "Gender");
define("MAN", "Man");
define("WOMAN", "Woman");
define("PREFLANG", "Preferred langage");
define("TOLOGIN", "Login");

// HIKES PAGE
define("HIKES_TITLE", "CAS Hikes Ideas");

// HIKE PAGE
define("REG_FAILED", "Error of registration!");
define("REG_SUCCESS", "Successful registration!");
define("HIKE_PLACEAVAILABLE", "Remaining place(s)");
define("HIKE_NOREGIST", "No. of registration");
define("HIKE_REGIST", "Registrations");
define("HIKE_NBREGIST", "Number of registrations");
define("HIKE_TOTALPRICE", "Total price");

// GUIDED HIKES PAGE
define("GUIDEDH_TITLE", "CAS Our Guided Hikes");

// ABOUT PAGE
define("ABOUT_TITLE", "Cas About us");
define("PAR1", "Welcome to the Montana-Vermala section of the Swiss Alpine Club, the club which includes mountain lovers 
		of any ages which have a link with the region of Crans-Montana.");
define("PAR2", "The section organizes races for his members throughout the year, covering a very wide spectre of alpine disciplines. And with the 
		groups specialized for the young people (ALFA, AJ/OJ), it is all the family that can participate!");
define("PAR3", "The section has the \"Cabane des Violettes\", situated at the heart of the ski slopes of Crans-Montana. In winter it is the ideal place 
		for a pleasant break, right in the heart of the ski slopes of Crans-Montana; in summer it is a beautiful stage of the \"Haute Route Bernoise\".");
define("PAR4", utf8_encode("This section is also the organizer of the \"D�fi des Faverges\", the famous race of ski-mountain climbing which takes place 
		every two years in Crans-Montana and counts 1'500 participants. It celebrated in 2014 its 10th edition."));
define("PAR5", "If you like the mountain and if you have a link with the region of Crans-Montana, do not hesitate to join us.");

// CONTACT PAGE
define("CONTACT_TITLE", "Cas Contact");
define("CONTACTUS","Contact Us!");
define("MESSAGE","Message");
define("SEND","Send");
define("MESSAGE_SEND","The message was sent!");
define("MESSAGE_NOT_SEND","The message was not sent. Please try again later!");
define("MESSAGE_CONTACT_INVALIDATE", "Verify that all the fields are filled!");
define("CONTACT_ERROR", "Error");
define("MESSAGE_ERROR", "Unfortunately, your message was not sent.");
define("MESSAGE_ERROR2", "Please try again!");
define("RETRY", "Retry");
define("MESSAGE_CONFIRMATION", "Thank your for your message!");
define("MESSAGE_CONFIRMATION2", "We'll answer you as soon as possible!");
define("CONTACT_SEND", "You contacted us!");
define("COPY_MESSAGE", "Copy From CAS Montana");

// ADMINISTRATION PAGES
define("ADMIN_TITLE", "Cas Administration");
define("HIKENAME", "Name");
define("DESCRIPTION" ,"Description");
define("DURATION", "Duration");
define("PICTURE", "Picture");
define("DISTANCE", "Distance");
define("DIFFICULTY", "Difficulty");
define("EASIER", "Easier");
define("EASY", "Easy");
define("NORMAL", "Normal");
define("HARD", "Hard");
define("HARDER", "Harder");
define("HEIGHTDIFFERENCE", "Height Difference");
define("DATE", "Date");
define("STARTDATE", "Start Date");
define("ENDDATE", "End Date");
define("DEPARTTIME", "Departure Time");
define("ARRIVETIME", "Arrival Time");
define("PRICE", "Price");
define("REGISTRATIONMAX", "Maximum Registration");
define("TYPE", "Type");
define("HIKE", "Idea");
define("HIKEBT", "Ideas");
define("REGIST", "Hike");
define("REGISTRATIONBT", "Hikes");
define("ADMIN_REGISTRATION", "Registration");
define("JOURNEY", "Stay");
define("JOURNEYBT", "Stay");
define("CREATE", "Create");
define("RESET", "Reset");
define("EDIT", "Edit");
define("DELETE", "Delete");
define("HOUR", "Hours");
define("PEOPLE", "People");
define("STARTLOCALITY", "Start Place");
define("ENDLOCALITY", "End Place");
define("LOCALADDRESS", "Locality/Address");
define("ADMIN_HIKE", "Hikes");
define("MANAGE_HIKES", "Hikes Management");
define("PERMISSION", "Permission");
define("ADMIN_PERMISSION", "Permission");
define("MANAGE_PERMISSION", "Permission Management");
define("DESC_PERMISSION", "Administrative rights");

// ACCOUNT PAGE
define("ACCOUNT_TITLE", "CAS My Account");
define("FAVORITE_TITLE", "CAS My Favorites");
define("BOOKING_TITLE", "CAS My Registration");
define("RATING_TITLE", "CAS My Ratings");
define("INFORMATION", "My information");
define("CONFIRMPW", "Confirm Password");
define("MODIFY", "Modify");
define("CANCEL", "Cancel");
define("MENU_MYACCOUNT", "My Account");
define("MENU_FAVORITES", "Favorites");
define("MENU_MYFAVORITES", "My Favorites");
define("MENU_MYBOOKING", "Registration");
define("MENU_MYINSCRIPTION", "My registration");
define("MENU_MYRATING", "Ratings");
define("MENU_MYNOTES", "My Ratings");
define("NBREHIKERS", "Number of hikers");
?>