<div class="main-wrapper">
    <?php
   require_once DIR_TMP.'themes/slider.php';
   ?>
  <section class="search-tour-section search-browser-web" id="sessionSearchWebTour">
      <div class="container">
          <div class="row">
              <!-- Search Form -->
              <form id="searchFormKiritmWebTour" method="get" role="form" action="">
                  <div class="col-xs-12">
                      <div class="row">
                          <div class="col-sm-4 col-xs-12">
                              <div class="searchFilterQuery search-box-web-tour">
                                  <input type="text" class="form-control" name="title" onkeyup="return showResultWebTour(event, this.value)" onkeypress="return checkSubmitSearchWebTour(event)" onkeydown="return onkeyDownSearchWebTour(event)" id="inputSearchWebTour" autocomplete="off" placeholder="Tìm tour : ..." value="">
                                  <div class="input-group-addon">
                                      <span class="fa fa-search"></span>
                                  </div>
                                  <div id="showSuggestionWebTour" class="suggestions hidden-cls">
                                      <ul id="suggestionSearchWebTour" class="ul-suggestion">
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6 col-xs-12">
                              <div class="row">
                                  <div class="col-sm-4 col-xs-12">
                                      <div id="fromDateSearchBoxWebTour" class="input-group date ed-datepicker filterDate">
                                          <input type="text" class="form-control" name="from" placeholder="Từ ngày" autocomplete="off" value="">
                                          <div class="input-group-addon">
                                              <span class="fa fa-calendar"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-4 col-xs-12">
                                      <div id="toDateSearchBoxWebTour" class="input-group date ed-datepicker filterDate">
                                          <input type="text" class="form-control" name="to" autocomplete="off" placeholder="Đến ngày" value="">
                                          <div class="input-group-addon">
                                              <span class="fa fa-calendar"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-4 col-xs-12">
                                      <div class="form-group tour-type">
                                          <div class="bookingDrop">
                                              <select name="type" class="form-control select-drop">
                                                  <option value="1" selected>Trong nước</option>
                                                  <option value="2">Ngoài nước</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-2 col-xs-12">
                              <button type="submit" class="btn btn-block buttonCustomPrimary">
                                  Tìm kiếm
                              </button>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </section>
  <section class="mark-close hidden-cls" id="markcloseWebTour"></section>
  <section class="mainContentSection packagesSection list-tour-section">
      <div class="container">
          <div class="row">
              <div class="col-sm-9 col-xs-8">
                  <div class="filter-list-tour" style="display: none">
                      <div class="filter-text">Sắp xếp :</div>
                      <div class="filter-tour" >
                          <a class="filter-div  active" href="#">
                              [ Ngày gần nhất ]
                          </a>
                          <a class="filter-div " href="">
                              [ Giá thấp nhất ]
                          </a>
                          <a class="filter-div " href="">
                              [ Hấp dẫn nhất ]
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <!-- Tour List -->
              <div class="col-sm-12 col-xs-12">
                 <?php
                    $date_tomorow = date('d-m-Y', strtotime("+1 days"));
                    $date_str     = strtotime($date_tomorow);
                    if ( !empty($this->data['all_tour']) ) {
                      foreach ($this->data['all_tour'] as $key => $value) {
                        ?>
                        <div class="row box-search-tour  ">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="box-search-tour-image">
                                    <a href="<?php echo base_url() .  $value['alias'] . "-" .  $value['id_product'] . ".htm"; ?>" class="isotopeSelector image-box-relative image-box-3x2">
                                        <img class="tour-image" src="<?php echo getImage($value['image'],370,247,1);?>" alt="<?php echo $value['name'] ?>">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="row box-search-tour-info">
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="title-tour">
                                            <a href="<?php echo base_url() .  $value['alias'] . "-" .  $value['id_product'] . ".htm"; ?>" data-url="" data-id="" data-name="" data-price="" data-category="" data-brand="" data-list="List" data-position="1" class="GAproductClick" title="<?php echo $value['name'] ?>">
                                               <?php echo $value['title'] ?>
                                            </a>
                                        </div>
                                        <div class="destination-tour">
                                           <?php 
                                             $diemden = json_decode($value['diadiem'] ,true);
                                              if (!empty($diemden)) {
                                                  foreach ($diemden as $key => $value1) {
                                                    echo $value1.' <span class="line-br"> - </span>';
                                                  }
                                              }
                                            ?> </div>
                                        <div class="detail-tour">
                                            Thời gian
                                            : <?php echo $value['thoigian'] ?><br>
                                            Phương tiện
                                            : <?php echo $value['phuong_tien'] ?> <br>
                                             <p class="list_des"><?php echo $value['descripton'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="row">
                                            <div class="row-box-price col-md-12 col-sm-12 col-xs-6">
                                                <a href="<?php echo base_url() .  $value['alias'] . "-" .  $value['id_product'] . ".htm"; ?>" data-url="" data-id="" data-name="" data-price="" data-category="" data-brand="" data-list="List" data-position="1" class="GAproductClick box-price-tour" title="<?php echo $value['name'] ?>">
                                                    <span class="text">Giá từ </span>
                                                    <span class="price"><?php echo number_format($value['prices'] )?></span>
                                                </a>
                                            </div>
                                            <div class="row-box-views  col-md-12 col-sm-12 col-xs-6" style="display: block">
                                                <div>
                                                    <ul class="list-inline detailsBtn" style="display:block;float: none;">
                                                        <li>
                                                            <span class="textInfo">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                <?php echo $value['date'] ?>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <a class="box-view-more select-tour-action">
                                                    <i class="fa fa-calendar"></i>
                                                    <span class="text text_m" data-id="<?php echo $value['id_product'] ?>" data-name="<?php echo $value['title'] ?>" data-day="<?php echo $value['thoigian'] ?>" data-img="<?php echo $value['image'] ?>">Xem thêm</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <?php
                      }
                    }
                  ?>
              </div>
          </div>
          <div class="row">
              <!-- Page -->
            <!--   <div class="col-xs-12">
                  <div class="paginationCenter">
                      <ul class="pagination">
                          <li>
                          </li>
                          <li class="active">
                              <a href="vi/tour-trong-nuoc91a8.html?limit=20&amp;page=1">
                                  1
                              </a>
                          </li>
                          <li class="">
                              <a href="vi/tour-trong-nuocfd88.html?limit=20&amp;page=2">
                                  2
                              </a>
                          </li>
                          <li class="">
                              <a href="vi/tour-trong-nuocb4e1.html?limit=20&amp;page=3">
                                  3
                              </a>
                          </li>
                          <li class="">
                              <a href="vi/tour-trong-nuoce797.html?limit=20&amp;page=4">
                                  4
                              </a>
                          </li>
                          <li>
                              <a href="vi/tour-trong-nuocfd88.html?limit=20&amp;page=2" aria-label="Next">
                                  <span aria-hidden="true">Tiếp
                                      <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                  </span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </div> -->
          </div>
      </div>
  </section>
</div>
 <div class="modal fade" id="selectTour" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-select-tour">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="font-family: 'Lato Light'; text-transform: none">
                    Chọn ngày khởi hành
                </h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body region" style="display: table; width: 100%">
                <div class="content-select-tour">
                  <div class="col-md-12 col-xs-12 tour-detail-title-information">
                      <div class="row">
                          <div class="col-md-2 col-xs-12">
                            <?php echo lang('p_kh') ?>
                          </div>
                          <div class="col-md-2 col-xs-12">
                             <?php echo lang('p_code') ?>
                          </div>
                          <div class="col-md-2 col-xs-12">
                              <?php echo lang('p_price') ?>
                          </div>
                          <div class="col-md-2 col-xs-12">
                              <?php echo lang('p_e') ?>
                          </div>
                          <div class="col-md-2 col-xs-12">
                             <?php echo lang('p_b') ?>
                          </div>
                          <div class="col-md-2 col-xs-12">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="list-inline lis_in">

                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>