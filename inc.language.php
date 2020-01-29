<?php

define('LANG_ENGLISH', 'en');
define('LANG_FRENCH', 'fr');
define('LANG_SPANISH', 'es');
//define('LANG_SPANISH', 'es');
define('LANG_HINDI', 'hindi');

// Look for l in query string and set as language.
$language = isset($_GET['l']) ? $_GET['l'] : LANG_SPANISH;

/**
 * Translate a string
 * Use the $translate variable to define your set of language translations.
 * Note: Based off of Drupal's t() function.
 *
 * @param $string
 *  The string that is to be translated.
 * @param $args
 *  An array of placeholders that will populate the translated string.
 * @param $langcode
 *  The language you wish to translate the string to.
 */
function t($string, $args = array(), $langcode = NULL) {
  global $language, $translation;
  
  // Set language code.
  $langcode = isset($langcode) ? $langcode : $language;
  
  // Search for a translated string.
  if ( isset($translation[$langcode][$string]) ) {
    $string = $translation[$langcode][$string];
  }
  
  // Replace arguments if present.
  if ( empty($args) ) {
    return $string;
  } else {
    foreach ( $args as $key => $value ) {
      switch ( $key[0] ) {
        case '!':
        case '@':
        case '%':
        default: $args[$key] = $value; break;
      }
    }
    
    return strtr($string, $args);
  }
}

/*

Example: "http://example.com/index.php?l=fr"
--------------------------------------------
include('inc.language.php');

// Set our translations.
$translation['fr'] = array(
  'Email' => 'Courriel',
  'Name' => 'Nom',
  'Organization' => 'Entreprise',
  'Phone Number' => 'Num&eacute;ro de t&eacute;l&eacute;phone',
  'Hello %name' => 'Bonjour %name',
);

print t('Name');
print t('Email');
print t('Organization');
print t('Phone Number');
print t('Hello %name', array('%name' => 'Mr. Anderson'));

Outputs:
--------------------------------------------
Nom
Courriel
Entreprise
Numéro de téléphone
Bonjour Mr. Anderson

*/