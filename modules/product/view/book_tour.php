  <?php require_once DIR_TMP.'themes/slider.php'; ?> 
 <section class="book_tour">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-4">
                <div class="bnt">
                   <?php 
                    if ($_web['lang']=='en') {
                        ?>
                         <span class="bt_next btn_1 active"> 1.choose service</span>
                        <?php
                    }else{
                        ?>
                        <span class="bt_next btn_1 active"> 1.chọn dịch vụ</span>
                        <?php
                    }
                   ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-4">
                <div class="bnt">
                    <?php 
                    if ($_web['lang']=='en') {
                        ?>
                              <span class="bt_next btn_2"> 2.Enter passenger information</span>
                        <?php
                    }else{
                        ?>
                             <span class="bt_next btn_2"> 2.nhập thông tin hành khách</span>
                        <?php
                    }
                   ?>    
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-4">
                <div class="bnt">
                    <?php 
                    if ($_web['lang']=='en') {
                        ?>
                              <span class="bt_next btn_3"> 3.Reservations</span>
                        <?php
                    }else{
                        ?>
                             <span class="bt_next btn_3"> 3.Giữ chỗ</span>
                        <?php
                    }
                   ?>    
                     
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8">
            <form id="subForm" method="POST" action="order.htm">
                <div class="book_one">
                    <?php 
                    if ($_web['lang']=='en') {
                        ?>
                             <h3 class="title_book"> number of passengers</h3>
                        <?php
                    }else{
                        ?>
                             <h3 class="title_book"> số lượng hành khách</h3>
                        <?php
                    }
                   ?>    
                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5">
                            <div class="form-group">
                                 <?php 
                                    if ($_web['lang']=='en') {
                                        ?>
                                            <label>Adults (10 years and older <span style="color:red">*</span>)</label>
                                        <?php
                                    }else{
                                        ?>
                                            <label>Người lớn (10 tuổi trở lên <span style="color:red">*</span>)</label>
                                        <?php
                                    }
                                   ?>    
                                <input type="number" name="adult" value="1" class="form-control  " required="required" min="1" pattern="^\d+$" id="adult" price-adult="<?php echo $_SESSION["cart_book"]['price_men'] ?>">
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12 no-padding">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12 no-padding">
                            <div class="form-group">
                                 <?php 
                                    if ($_web['lang']=='en') {
                                        ?>
                                            <label>Children (From 2 to 9 years old)</label>
                                        <?php
                                    }else{
                                        ?>
                                             <label>Trẻ em (Từ 2 đến 9 tuổi)</label>
                                        <?php
                                    }
                                   ?>    
                               
                                <input type="number" name="child" value="0" class="form-control  " min="0" pattern="^\d+$" id="child" price-chil="<?php echo $_SESSION["cart_book"]['price_child'] ?>">
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12 no-padding">
                            <ul class="highlight-text">
                                <?php 
                                    if ($_web['lang']=='en') {
                                        ?>
                                            <li>Overseas tour: apply from 2 to under 12 years old</li>
                                            <li>Inbound tour and Cambodia tour: apply from 6 to 11 years old</li>
                                        <?php
                                    }else{
                                        ?>
                                            <li>Tour nước ngoài: áp dùng từ 2 đến dưới 12 tuổi</li>
                                            <li>Tour trong nước và tour Campuchia: áp dụng từ 6 đến 11 tuổi</li>
                                        <?php
                                    }
                                ?>    
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12 no-padding">
                            <div class="form-group">
                                <?php 
                                    if ($_web['lang']=='en') {
                                        ?>
                                            <label>Baby (Under 2 years old)</label>
                                        <?php
                                    }else{
                                        ?>
                                             <label>Em bé (Dưới 2 tuổi)</label>
                                        <?php
                                    }
                                ?>    
                                <input type="number" name="infant" value="0" class="form-control  " min="0" pattern="^\d+$" id="infant" pirce-infant='<?php echo $_SESSION["cart_book"]['price_baby'] ?>'>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12 no-padding">
                            <ul class="highlight-text">
                                 <?php 
                                    if ($_web['lang']=='en') {
                                        ?>
                                            <li>Overseas tour: apply from Under 2 years old</li>
                                            <li>Inbound tour and Cambodia tour: apply from 2 to 5 years old</li>
                                        <?php
                                    }else{
                                        ?>
                                            <li>Tour nước ngoài: áp dụng từ Dưới 2 tuổi</li>
                                            <li>Tour trong nước và tour Campuchia: áp dụng từ 2 đến 5 tuổi</li>
                                        <?php
                                    }
                                ?>    
                            </ul>
                        </div>
                    </div>
                    <div class="methods">
                         <?php 
                            if ($_web['lang']=='en') {
                                ?>
                                    <h3 class="title_methor">payment method </h3>
                                    <p>Select 1 of the following 2 methods:</p>
                                <?php
                            }else{
                                ?>
                                    <h3 class="title_methor"> phương thức thanh toán</h3>
                                    <p>Chọn 1 Trong 2 phương thức sau:</p>
                                <?php
                            }
                        ?>    
                        <div class="metho">
                            <input value="1" style="display: none" type="radio" id="pament-method-bank" class="payment-method" name="method">
                            <div class="method-content">
                                <label class="title" for="pament-method0" id="pay_bank">
                                    <?php 
                                        if ($_web['lang']=='en') {
                                            ?>
                                                <h4 style="margin: 0 0 10px;">Paying through bank</h4>
                                                <div class="description">After booking tickets and paying successfully, Hungvuongtravel will contact you again</div>
                                            <?php
                                        }else{
                                            ?>
                                                <h4 style="margin: 0 0 10px;">Thanh toán qua ngân hàng</h4>
                                                <div class="description">Sau khi đặt vé và thanh toán thành công, Hungvuongtravel sẽ liên hệ lại với Quý khách</div>
                                            <?php
                                        }
                                    ?>    
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-check"></i>
                                </label>
                                <div class="content" id="metho_1">
                                     <?php 
                                        if ($_web['lang']=='en') {
                                            ?>
                                                <h5>Bank account of Hungvuongtravel</h5>
                                                <h5>Note when transferring funds:</h5>
                                                <p style="color:red">Please contact the counselor, to confirm the number of seats before payment via bank</p>
                                                <p>When transferring funds, please enter the transfer details as:</p>
                                                <p style="font-weight: 600;font-size: 16px">"MDH madonhang, Full name, Content payment"</p>
                                                <p>Example: "MDH 0000001, Nguyen Phi Hung, TT tour ticket"</p>
                                                <p>To make payment accurate. Thank you!</p>
                                                <p>Information of bank's account</p>
                                            <?php
                                        }else{
                                            ?>
                                                <h5>tài khoản ngân hàng của Hungvuongtravel</h5>
                                                <h5>Lưu ý khi chuyển khoản:</h5>
                                                <p style="color:red">Quý khách vui lòng liên hệ nhân viên tư vấn, để xác nhận số chỗ trước khi thanh toán qua ngân hàng</p>
                                                <p>Khi chuyển khoản, quý khách vui lòng nhập nội dung chuyển khoản là:</p>
                                                <p style="font-weight: 600;font-size: 16px">"MDH madonhang, Họ tên, Noi dung thanh toan"</p>
                                                <p>VD: "MDH 0000001, Nguyen Phi Hung, TT vé tour"</p>
                                                <p>Ðể việc thanh toán được chính xác. Xin cảm ơn quý khách!</p>
                                                <p>Thông tin tài khoản Ngân Hàng</p>
                                            <?php
                                        }
                                    ?>    
                             
                                     <?php 
                                     echo html_entity_decode($_web['settings']['conten']);
                                     ?>
                                </div>
                            </div>
                        </div>
                        <div class="metho">
                            <input value="2" style="display: none" type="radio" id="pament-method-2" class="payment-method" name="method">
                            <div class="method-content">
                                <label class="title" for="pament-method0" id="pay_off">
                                    <?php 
                                        if ($_web['lang']=='en') {
                                            ?>
                                                <h4 style="margin: 0 0 10px;">PAY BY CASH IN OFFICE Hungvuongtravel</h4>
                                                <div class="description">Please come to Hungvuongtravel offices to pay and receive tickets</div>
                                            <?php
                                        }else{
                                            ?>
                                                <h4 style="margin: 0 0 10px;">THANH TOÁN BẰNG TIỀN MẶT TẠI VĂN PHÒNG Hungvuongtravel</h4>
                                                <div class="description">Quý khách vui lòng đến các văn phòng Hungvuongtravel để thanh toán và nhận vé.</div>
                                            <?php
                                        }
                                    ?>    
                                    
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-check"></i>
                                </label>
                                <div class="content" id="metho_2">
                                    <?php 
                                        if ($_web['lang']=='en') {
                                            ?>
                                                <p>Hungvuongtravel OFFICE</p>
                                                <p style="font-weight: 600"> Hanoi Transaction Office</p>
                                                <p>Address: <?php echo $_web['settings']['address'] ?></p>
                                            <?php
                                        }else{
                                            ?>
                                                <p>VĂN PHÒNG Hungvuongtravel</p>
                                                <p style="font-weight: 600"> Phòng giao dịch Hà Nội</p>
                                                <p>Địa chỉ:<?php echo $_web['settings']['address'] ?></p> 
                                            <?php
                                        }
                                    ?>      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="book_tow">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                             <?php 
                                if ($_web['lang']=='en') {
                                    ?>
                                        <h3 class="title_book"> Contact information</h3>
                                    <?php
                                }else{
                                    ?>
                                         <h3 class="title_book"> Thông tin liên hệ</h3>
                                    <?php
                                }
                            ?>      
                        </div>
                        <div class="col-xs-12 col-sm-6 col-sm-6">
                            <div class="form-group">
                                <?php 
                                    if ($_web['lang']=='en') {
                                        ?>
                                          <label for="exampleFormControlInput1">First and last name(*)</label>
                                        <?php
                                    }else{
                                        ?>
                                            <label for="exampleFormControlInput1">Họ và tên(*)</label>
                                        <?php
                                    }
                                ?>      
                                
                                <input type="text" name="name" class="form-control name" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-sm-6">
                            <div class="form-group">
                                <?php 
                                    if ($_web['lang']=='en') {
                                        ?>
                                         <label for="exampleFormControlInput1">Phone number (*)</label>
                                        <?php
                                    }else{
                                        ?>
                                           <label for="exampleFormControlInput1">Số điện thoại(*)</label>
                                        <?php
                                    }
                                ?>      
                                
                                <input type="text" name="phone" class="form-control phone" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-sm-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email(*)</label>
                               <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-sm-6">
                            <div class="form-group">
                                 <?php 
                                    if ($_web['lang']=='en') {
                                        ?>
                                         <label for="exampleFormControlInput1">Address(*)</label>
                                        <?php
                                    }else{
                                        ?>
                                           <label for="exampleFormControlInput1">Địa chỉ(*)</label>
                                        <?php
                                    }
                                ?>      
                                <input type="text" name="address" class="form-control" id="diachi" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-sm-6">
                            <div class="form-group">
                                <?php 
                                    if ($_web['lang']=='en') {
                                        ?>
                                         <label for="exampleFormControlTextarea1">Content</label>
                                        <?php
                                    }else{
                                        ?>
                                        <label for="exampleFormControlTextarea1">Nội dung</label>
                                        <?php
                                    }
                                ?>      
                                <textarea class="form-control" name="content" id="noidung" rows="5" style="height: 120px"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <input type="hidden"  name="title" value="<?php echo $_SESSION["cart_book"]['title'] ?>">
                <input type="hidden"  name="code_tour"  value="<?php echo $_SESSION["cart_book"]['code'] ?>">
                <input type="hidden"  name="day"   value="<?php echo$_SESSION["cart_book"]['day'] ?>">
                <input type="hidden"  name="date"  value="<?php echo$_SESSION["cart_book"]['date'] ?>">
                <input type="hidden" id="price_lon" name="price-adult" value="<?php echo $_SESSION["cart_book"]['price_men']?>">
                <input type="hidden" id="price_em" name="price-child">
                <input type="hidden" id="price_be" name="price-baby" >
                <input type="hidden" id="price_total" name="price-total" value="<?php echo $_SESSION["cart_book"]['price_men']?>">
                <div class="nex">
                    <?php 
                        if ($_web['lang']=='en') {
                            ?>
                                <span class="btn-back" style="float: left;">Return</span>
                                <span class="btn-prev" style="float: left;">Continue</span>
                                <button type="submit" class="btn bn_success" >Completed</button>
                            <?php
                        }else{
                            ?>
                                <span class="btn-back" style="float: left;">Trở về</span>
                                <span class="btn-prev" style="float: left;">Tiếp tục</span>
                                <button type="submit" class="btn bn_success" >Hoàn tất</button>
                            <?php
                        }
                    ?>      
                </div>
            </form>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <?php if (!empty($_SESSION["cart_book"])): ?>
                        <div class="book_img">
                           <img src="<?php echo getImage($_SESSION["cart_book"]['img'],360,240,1);?>">
                            <div class="info_book">
                                <h4><?php echo $_SESSION["cart_book"]['title'] ?></h4>
                                <p><i class="fa fa-barcode" aria-hidden="true"></i> Code: <span class="colo"><?php echo $_SESSION["cart_book"]['code'] ?></span></p>
                                <p><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> <?php echo lang('p_kh') ?>:  <span class="colo"><?php echo$_SESSION["cart_book"]['date'] ?></span></p>
                               <!--  <p><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Ngày về: <span class="colo">08-01-2019</span></p> -->
                                <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo lang('p_time') ?>: <span class="colo"><?php echo$_SESSION["cart_book"]['day'] ?></span></p>
                                <div class="change_book">
                                    <p style="font-weight: 600">
                                        <?php
                                            if ($_web['lang']=='en') {
                                                ?> 
                                                    Adult price
                                                <?php
                                            }else{
                                                echo " Giá người lớn";
                                            }
                                        ?>
                                        : <?php echo number_format($_SESSION["cart_book"]['price_men'])  ?> x 1</p>
                                </div>
                                <h5>
                                    <?php
                                        if ($_web['lang']=='en') {
                                            ?> 
                                               Total
                                            <?php
                                        }else{
                                            echo "Tổng";
                                        }
                                    ?>
                                    : <span class="total_price"><?php echo number_format($_SESSION["cart_book"]['price_men']) ?></span> đ</h5>
                            </div>
                        </div>
                <?php endif ?>  
            </div>
        </div>
    </div>
</section>