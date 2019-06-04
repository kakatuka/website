 //Product

 /*slidebar*/
 $(document).ready(function() {
     $('.navbar-search-toggler').click(function() {
         if ($(".navbar-search").hasClass("navbar-search-collapsed")) {
             $('.navbar-search').removeClass('navbar-search-collapsed');
             $('.navbar-search-toggler').addClass('collapsed');
         } else {
             $('.navbar-search').addClass('navbar-search-collapsed');
             $('.navbar-search-toggler').removeClass('collapsed');
         }
     });
     $("#user_click").click(function() {
         $(this).find("i").toggleClass("rotate_icon");
     });
     $(".link_description_short").click(function() {
         $(".hide_description_short").css("display", "block");
         $(this).css("display", "none");
     });
 });
 /*end slidebar*/
 /*datetimepicker*/
 var currentDate = new Date();
 setInterval(function() {
     currentDate.setMinutes(currentDate.getMinutes() + 1);
 }, 60000);

 function addDOMLoadedEvent(func) {
     if (document.readyState === 'complete') {
         func();
     } else {
         if (document.addEventListener) {
             document.addEventListener("DOMContentLoaded", func, false);
         } else {
             document.attachEvent("onDOMContentLoaded", func);
         }
     }
 }

 function addLoadEvent(func) {
     if (document.readyState === 'complete') {
         func();
     } else {
         var oldonload = window.onload;
         if (typeof window.onload != 'function') {
             window.onload = func;
         } else {
             window.onload = function() {
                 if (oldonload) {
                     oldonload();
                 }
                 func();
             }
         }
     }
 }
 /*end datetimepicker*/
 /*choose weight*/
 $(document).ready(function() {
     $(".inventory-management").on("change", function() {
         var value = $(".inventory-management").val();
         if (value == "") {
             $(".quantity,.inventory-policy").addClass("hide");
         } else {
             $(".quantity,.inventory-policy").removeClass("hide");
         }
     });

     $('.weight-unit-select li').click(function(e) {
         e.preventDefault();
         var selected = $(this).text();
         $(".weight-unit").html(selected);
         $("[name$='WeightUnit' ]").val(selected);
     });
     $("#ht-cre-product-seo").click(function() {
         $(this).css("display", "none");
         $(".seo-section").fadeIn(500);
     });
 });
 /*end choose weight*/
 //end product
 //setting
 $(document).ready(function() {

     $(".onchange_money1").click(function() {
         $(".content-currency1").toggle();
     });

     var pre_val = 1001;
     var next_val = 1002;
     $(".example-order-code1").text(pre_val + "," + next_val);
     $("#OrderPrefix,#OrderSuffix").keyup(function() {
         var orderprefix = $("#OrderPrefix").val();
         var ordersuffix = $("#OrderSuffix").val();
         $(".example-order-code1").text(orderprefix + pre_val + ordersuffix + "," + orderprefix + next_val + ordersuffix);
     });
 });
 //end setting
 //list_product
 $(document).ready(function(){
     
     $(".btn-apply-shipping").click(function(){
        var price_ship=$("#customShippingName2").val();
        var name_ship=$("#customShippingName").val();
        $("#output_price_ship").text(price_ship);
        $("#name_ship").text(name_ship);

     });
       $("#add_transform_2").click(function(){
            $(".dropdown-menu69").toggle();
        });
       $("#close_add_transofrm_2,#close_add_transofrm_22").click(function(){
         $(".dropdown-menu69").css("display","none");
       });
       $(".radio>label>input").change(function() {
            if ($(".radio1>label>input").prop("checked")) {
                $(".show_radio1").attr("style", "display:block");
                $("#menu_normal").text("Danh mục thông minh");
                $("#menu_normal1").text("Những sản phẩm thỏa mãn điều kiện sẽ được tự động thêm vào danh mục.");
            } else {
                $(".show_radio1").attr("style", "display:none");
                $("#menu_normal").text("Danh mục thường");
                $("#menu_normal1").text("Bạn sẽ thêm sản phẩm vào danh mục 1 cách thủ công.");
            }
        });
        $("#create-new-collection-rule").click(function() {
            var div = $("<tr class='collection-rule show_list_radio1' id='collection-rule-0'>");
            div.html(GetDynamicTextBox(""));
            $("#TextBoxContainer").append(div);
        });
      
        $("body").on("click", ".remove", function() {
            $(this).closest("tr").remove();
        });

        function GetDynamicTextBox() {
            return '<td class="form-inline"><select class="va-m rule-field inline form-control"><option value="title">Tên sản phẩm</option><option value="type">Loại sản phẩm</option><option value="vendor">Nhà sản xuất</option><option value="variant_price">Giá sản phẩm</option><option value="tag">Tag sản phẩm</option></select><select class="va-m rule-relation inline form-control"><option selected="" value="equals">bằng</option><option value="starts_with">Bắt đầu với</option></select><div class="input-group"><span class="input-group-addon hide"></span><input type="text" class="form-control rule-condition"><span class="input-group-addon hide"></span></div></td><td><button type="button" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove-sign"></i></button></td>';
        }
        function GetDynamicTextBox1() {
            return '<td><input name="" value="Title" class="form-control" type="text"></td><td><input type="text" value="" data-role="tagsinput" size="12" id="tags" placeholder="Nhập giá trị"></td><td><button type="button" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove-sign"></i></button></td>';
        }
        $("#discount_next_code").keyup(function() {
            var value_macode = $(this).val();
            $("#macode_auto").text(value_macode);
            if (value_macode != "") {
                $("#dangapdung").css("display", "block");
                $("#display_info").css("display", "none");
            } else {
                $("#dangapdung").css("display", "none");
                $("#display_info").css("display", "block");
            }
        });
        $("#discount_next_requires_minimum_purchase").change(function() {
            var checkdiscount = $(this).prop("checked");
            if (checkdiscount) {
                $(".next-input--align-with-radio9").css("display", "block");
            } else {
                $(".next-input--align-with-radio9").css("display", "none");
            }
        });
        $("#discount_next_requires_minimum_purchase21").change(function() {
            var checkdiscount = $(this).prop("checked");
            if (checkdiscount) {
                $(".next-input--align-with-radio21").css("display", "block");
            } else {
                $(".next-input--align-with-radio21").css("display", "none");
            }
        });
        $(".inventory-management9").change(function() {
            if ($("#theophantram").prop("selected")) {
                $("#change_money").text("%");
               
            }
            if ($("#theosotien").prop("selected")) {
                $("#change_money").text("₫");
             
            }
            if ($("#free_transport").prop("selected")) {
                $(".col_right_transport").attr("style", "display:none");
                $(".col_left_transport").attr("style", "width:100%");
                $(".content_list_product_22").css("display", "block");
                $(".content_list_product23").css("display", "none");
            } else {
                $(".content_list_product_22").css("display", "none");
                $(".content_list_product23").css("display", "block");
                $(".col_right_transport").removeAttr("style", "display:none");
                $(".col_left_transport").removeAttr("style", "width:100%");
            }
            
        });
        $("#discount_next_applies_to_cart2,#discount_next_applies_to_cart3,#discount_next_applies_to_cart10").change(function() {
            var check1 = $("#discount_next_applies_to_cart2");
            var check2 = $("#discount_next_applies_to_cart3");
            var check3 = $("#discount_next_applies_to_cart10");
            var change_vl = "Tìm kiếm sản phẩm";
            var change_vl_danhmuc = "Tìm kiếm danh mục";
            if (check1.prop("checked")) {
                $("#search_change_vl").attr("placeholder", change_vl_danhmuc);
            }
            if (check2.prop("checked")) {
                $("#search_change_vl").attr("placeholder", change_vl);
            }
            if (check3.prop("checked")) {
                $(".content_searchapdungvoi").css("display", "none");
            } else {
                $(".content_searchapdungvoi").css("display", "block");
            }
        });
        $("input").change(function() {
            if ($('#discount_next_applies_to_cart12').is(":checked")) {
                $(".content_searchapdungvoi11").css("display", "block");
            } else {
                $(".content_searchapdungvoi11").css("display", "none");
            }
            if ($('#discount_next_applies_to_cart26').is(":checked")) {
                $('.content_searchapdungvoi26').css("display", "block");
            } else {
                $('.content_searchapdungvoi26').css("display", "none");
            }
            if ($('#discount_next_applies_to_cart27').is(":checked")) {
                $('.check_deadline1').css("display", "block");
            } else {
                $('.check_deadline1').css("display", "none");
            }
            if ($('#discount_next_applies_to_cart28').is(":checked")) {
                $('#check_deadline2').css("display", "block");
                 $("#row_output2").html("&#9679;&nbsp;Mỗi khách hàng được sử dụng 1 lần");
            } else {
                $('#check_deadline2').css("display", "none");
            }
            if ($('#discount_next_applies_to_cart29').is(":checked")) {
                $('.publish-date30').css("display", "block");
            } else {
                $('.publish-date30').css("display", "none");
            }
            if($("#bulk-action-0").is(":checked")){
                $("#delete_img").css("visibility","visible");
            }
            else{
                $("#delete_img").css("visibility","hidden");

            }
        });
        $(".show_detail_variants").click(function(){
            $("#ht-cre-product-variant").toggle();
            $(".cancel-option").toggle();
            $(".variants-option").toggle();
        });
        $("#ht-cre-product-add-to-cate").click(function(){
            $(".dropdown-menu6969").toggle();
          
        });
        
    function sinhma_random() {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for (var i = 0; i < 13; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));
        document.getElementById("discount_next_code").value = text.toUpperCase();
        document.getElementById("macode_auto").innerHTML = text.toUpperCase();
        document.getElementById("dangapdung").style.display = "block";
        document.getElementById("display_info").style.display = "none";
    }

 });
     $(document).click(function(event) {
    if (!$(event.target).closest("#ht-cre-product-add-to-cate,.dropdown-menu6969").length) {
        $(".dropdown-menu6969").hide();
    }
});
     $(document).click(function(event) {
    if (!$(event.target).closest("#add_transform_2,.dropdown-menu69").length) {
        $(".dropdown-menu69").hide();
    }
});


 //end list_product
