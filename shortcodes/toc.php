<?php

  $content = get_the_content();
    
  // Regex to match all HTML heading elements 2-6
  $regex = "~(<h([2-6])(?:\s+class=\"[^\"]+\")?>(.*?)<\/h[2-6]>)~";
  preg_match_all($regex, $content, $heading_results);

  // Return $content if less than 3 heading exist in the $content
  $num_match = count($heading_results[0]);
  if($num_match < 1) {
    return $content;
  }

  $link_list = "";
  for ($i = 0; $i < $num_match; ++$i) {
    // Generate links for each heading element
    $link_list .= "<li class='heading-level-" . $heading_results[2][$i] .
      "'><a href='#" . sanitize_title($heading_results[3][$i]) . "'>" . $heading_results[3][$i] . "</a></li>";
  }
  
  $toc_headline = get_theme_mod( 'toc_sett' );
  $position_toc = get_theme_mod('set_position_toc');
  $c_collapsible = get_theme_mod('c_collapsible');
  $heading_toc = get_theme_mod('heading_toc');
  if($heading_toc){ $h_toc=$heading_toc; } else { $h_toc='Table of Contents'; }
  if($c_collapsible){ $c_collapsible='collaps'; }
  if($c_collapsible){ $collapsicon='+'; } else { $collapsicon='−'; }
  if($position_toc){ $position_toc='after_paragraph'; }

  $start_nav = "<nav class='table-of-contents $position_toc $c_collapsible-true'>";
  $end_nav = "</nav>";
  $title = "<span class='toc-headline'>" . $h_toc . "</span><span class='toggle-toc custom-setting' title='close'>" . $collapsicon . "</span>";
  $link_list = "<ul class='$c_collapsible'>" . $link_list . "</ul>";

  // Piece together the table of contents
  $table_of_contents  = $start_nav . $title . $link_list . $end_nav;
  echo $table_of_contents ;
