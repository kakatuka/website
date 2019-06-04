<?php
  $newArrayMenu = array();
  foreach ($_web['menu'] as $value) {
    $parent = $value['parent_id'];
    $newArrayMenu[$parent][] = $value;
  }
  menuMobile($newArrayMenu);
?>
