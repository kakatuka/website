 <!-- <?php
  if (isset($_web['widgets'])) {
    foreach ($_web['widgets'] as $key => $value) {
      switch ($value['type']) {
        case '1':
          echo "<div class='well'>";
          echo "<h3 style='color:#000;' class='header01 category-parent'>".$value['title']."</h3>";
          echo '<div class="fb-page" data-href="'.$_web['settings']['link_facebook'].'" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>';
          echo '</div>';
          break;
        case '2':
          switch ($value['options']) {
            case 'new':
              if (isset($_web['post'])) {
                echo "<div class='well'><h3 class='header01'>
                  <a href='' class='category-parent'>".$value['title']."</a>
                </h3>";
                getNewpost($_web['post'],$value['number']);
                echo '</div>';
            }
            break;
            case 'old':
              if (isset($_web['post'])) {
                echo "<div class='well'><h3 class='header01'>
                  <a href='' class='category-parent'>".$value['title']."</a>
                </h3>";
                getOldpost($_web['post'],$value['number']);
                echo '</div>';
              }
              break;
          }
          break;
      case '3':
        echo '<!-- Blog Search Well -->
            <div class="well">
                <h4>'.$value['title'].'</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div>
            </div><!-- Blog Search Well -->';
        break;
      case '4':
        echo '<div class="well"><h4>'.$value['title'].'</h4>';
        $newArrayMenu = array();
        foreach ($_web['category_post'] as $value) {
          $parent = $value['parent_id'];
          $newArrayMenu[$parent][] = $value;
        }
        categoryindexpost($newArrayMenu);
        echo '</div>';
        break;
      }
    }
  }
?> -->