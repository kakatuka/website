<div class="page-cart" style="padding-top: 50px">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Trang chủ</a></li>
                    <li class="active">Giỏ hàng</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h3 class="title-cart">Giỏ hàng của bạn</h3>
            </div>
            <div class="col-xs-12">
                <table class="table table-hover table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th width="10%">Ảnh sản phẩm</th>
                            <th>Tên sản phẩm</th>
                             <th>Giá</th>
                            <th width="3%">Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if (!empty($this->data['cart'])) {
                                foreach ($this->data['cart'] as $key => $cart) {
                                    ?>
                                        <tr data-identifier="<?php echo $cart->identifier;?>" data-id="<?php echo $cart->id;?>">
                                            <td>
                                                <a href="detail.html">
                                                    <img src="<?php echo getImage($cart->options['image'],97,64,1);?>" title="<?php echo stripcslashes($cart->name); ?>" alt="<?php echo stripcslashes($cart->name); ?>">
                                                </a>
                                            </td>
                                            <td><?php echo stripcslashes($cart->name); ?></td>
                                            <td>
                                                <span>
                                                    <?php 
                                                        if($cart->price > 0){ 
                                                            echo number_format($cart->price)." VNĐ";
                                                        }else{
                                                            echo "Liên hệ";
                                                        }
                                                    ?>
                                                </span>
                                            </td>
                                            <td>
                                                <input type="number" class="product_quantity" id="product-quantity" value="<?php echo $cart->quantity;?>" min="1">
                                            </td>
                                            <td>
                                                <span class="goods-page-total">
                                                    <?php 
                                                        if($cart->price > 0){ 
                                                            echo number_format($cart->total)." VNĐ";
                                                        }else{
                                                            echo "Liên hệ";
                                                        }
                                                    ?>
                                                </span>
                                            </td>
                                            <td >
                                                <a href="javascript:void(0)" title="Xóa" class="btn btn-danger del-cart-checkout" data-id="<?php echo $cart->id;?>" data-identifier="<?php echo $cart->identifier;?>">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                         ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <div class="navbar-right">
                                    <p>Tổng tiền: 
                                        <b id="total_view_cart">
                                            <?php 
                                                if ($_web['total_cart'] > 0){
                                                    echo number_format($_web['total_cart']).'VNĐ';
                                                }else{
                                                    echo "Liên hệ";
                                                }
                                            ?>
                                        </b>
                                    </p>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="colx-s12">
                <div class="navbar-right cart-pr">
                    <a href="<?php echo base_url();?>" class="btn btn-default btn-sm">Tiếp tục mua hàng</a>
                    <a href="<?php echo base_url().'checkout';?>" class="btn btn-danger btn-sm">Thực hiện thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>