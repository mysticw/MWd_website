<?php
/*
  Preprocess
*/

/*
function NEWTHEME_preprocess_html(&$vars) {
  //  kpr($vars['content']);
}

function NEWTHEME_preprocess_page(&$vars,$hook) {
  //typekit
  //drupal_add_js('http://use.typekit.com/XXX.js', 'external');
  //drupal_add_js('try{Typekit.load();}catch(e){}', array('type' => 'inline'));

  //webfont
  //drupal_add_css('http://cloud.webtype.com/css/CXXXX.css','external');
  
  //googlefont 
  //  drupal_add_css('http://fonts.googleapis.com/css?family=Bree+Serif','external');
 
}

function NEWTHEME_preprocess_region(&$vars,$hook) {
  //  kpr($vars['content']);
}

function NEWTHEME_preprocess_block(&$vars, $hook) {
  //  kpr($vars['content']);

  //lets look for unique block in a region $region-$blockcreator-$delta
   $block =  
   $vars['elements']['#block']->region .'-'. 
   $vars['elements']['#block']->module .'-'. 
   $vars['elements']['#block']->delta;
   
  // print $block .' ';
   switch ($block) {
     case 'header-menu_block-2':
       $vars['classes_array'][] = '';
       break;
     case 'sidebar-system-navigation':
       $vars['classes_array'][] = '';
       break;
    default:
    
    break;

   }


  switch ($vars['elements']['#block']->region) {
    case 'header':
      $vars['classes_array'][] = '';
      break;
    case 'sidebar':
      $vars['classes_array'][] = '';
      $vars['classes_array'][] = '';
      break;
    default:

      break;
  }

}

function NEWTHEME_preprocess_node(&$vars,$hook) {
  //  kpr($vars['content']);
}

function NEWTHEME_preprocess_comment(&$vars,$hook) {
  //  kpr($vars['content']);
}

function NEWTHEME_preprocess_field(&$vars,$hook) {
  //  kpr($vars['content']);
  //add class to a specific field
  switch ($vars['element']['#field_name']) {
    case 'field_ROCK':
      $vars['classes_array'][] = 'classname1';
    case 'field_ROLL':
      $vars['classes_array'][] = 'classname1';
      $vars['classes_array'][] = 'classname2';
      $vars['classes_array'][] = 'classname1';
    case 'field_FOO':
      $vars['classes_array'][] = 'classname1';
    case 'field_BAR':
      $vars['classes_array'][] = 'classname1';    
    default:
      break;
  }

}

function NEWTHEME_preprocess_maintenance_page(){
  //  kpr($vars['content']);
}
*/

/**
* Implements theme_menu_link().
* Adds menu description under main menu 
*/

function mystic_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  $element['#localized_options']['html'] = TRUE;


  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }

  if ($element['#original_link']['menu_name'] == "main-menu" && isset($element['#localized_options']['attributes']['title'])){
    $element['#title'] .= '<span class="description">' . $element['#localized_options']['attributes']['title'] . '</span>';
  }

  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}