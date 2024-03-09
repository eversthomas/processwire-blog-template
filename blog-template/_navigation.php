<?php namespace ProcessWire; 

// Template file for pages using the “navigation” non-template
// -------------------------------------------------------
// The #content div in this file will replace the #content div in _main.php
// when the Markup Regions feature is enabled, as it is by default. 
// You can also append to (or prepend to) the #content div, and much more. 
// See the Markup Regions documentation:
// https://processwire.com/docs/front-end/output/markup-regions/

?>

<?php

    $options = array(
        'parent_class' => 'parent',
        'current_class' => 'current',
        'has_children_class' => 'has_children',
        'levels' => true,
        'levels_prefix' => 'level-',
        'max_levels' => 1,
        'firstlast' => false,
        'collapsed' => false,
        'show_root' => true,
        'selector' => '',
        'selector_field' => 'nav_selector',
        'outer_tpl' => '<ul>||</ul>',
        'inner_tpl' => '<ul>||</ul>',
        'list_tpl' => '<li%s>||</li>',
        'list_field_class' => '',
        'item_tpl' => '<a href="{url}">{title}</a>',
        'item_current_tpl' => '<a href="{url}">{title}</a>',
        'xtemplates' => '',
        'xitem_tpl' => '<a href="{url}">{title}</a>',
        'xitem_current_tpl' => '<span>{title}</span>',
        'date_format' => 'Y/m/d',
        'code_formatting' => false,
        'debug' => false
    );
    $treeMenu = $modules->get("MarkupSimpleNavigation"); // load the module
    echo $treeMenu->render($options);

?>
