<!DOCTYPE html>
<html>
<head>
<title>Funk In Style</title>
    <!--mobile redirect-->
    <script src="http://static.dudamobile.com/DM_redirect.js" type="text/javascript"></script>
    <script type="text/javascript">DM_redirect("http://mobile.dudamobile.com/site/fis");</script>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.currentPage.js"></script>
    
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/lightbox.js"></script>
    <link href="css/lightbox.css" rel="stylesheet" />
    
    <link rel="shortcut icon" type="image/x-icon" href="images/newfavicon.png">
    
    <link rel="stylesheet" type="text/css" href="header.css" />
    <link rel="stylesheet" type="text/css" href="product_page.css" />
    <link rel="stylesheet" type="text/css" href="bottomfooter.css" />

    
    
    
    <script>
        $(document).delay(800).ready(function() {
            
            setTimeout(swapp,1000);
            
             var $others ="test";
            $('.item_thumbnail').click(function () {
               
                $others = $(this).attr('alt');
                
                if($others != 'a' && $others !="color") $('select').val(this.alt);
            });
             
            $('.item_thumbnail').click(function() {
                $('.item_thumbnail').removeClass('thumb_on');
                $(this).addClass('thumb_on'); 
            });
             
             
           
             
            $('.item_thumbnail').hover(function(){
               
                
                $('.imageToSwap').attr('src', "images/ties/" + $(this).attr('alt').toLowerCase() + ".png")
            },          
             function(){
               
                if ($others != "a" && $others !="color") {
             
                $(".imageToSwap").attr('src', 'images/ties/' + $("option:selected").val() + '.png')
                
                $(".imageToSwap").attr('href', 'images/ties/' + $("option:selected").val() + '.png')
                }
                
                else { $(".imageToSwap").attr('src', 'images/ties/' + $others + '.png') }
             });
            
            $('.each_more').hover(function(){
                $(this).css("line-height","2");
            },
                function(){$(this).css("line-height","1");
            });

            function swapp(){
                //alert('hghy');
             $("select").on("change", function() {
              $(".imageToSwap").attr('href',"images/ties/" + $(this).val().toLowerCase() + ".png");
            }).change();
            
            $("select").on("change", function() {
              $(".imageToSwap").attr('src',"images/ties/" + $(this).val().toLowerCase() + ".png");
            }).change();

            }
            
        });
    </script>
    
    <style>
    </style>
    
</head>
<body>
    <div id="wrap">
        
    <?php include_once('header.php'); ?>
        <div id="content">
            
            <h1>The Slim Shine Tie</h1>
            
            <div id="main_img">
                <a id="swap_l" class="imageToSwap" href="images/ties/main_tie.png" rel="lightbox[tie-color]">
                    <img id="swap_img" class="imageToSwap" src="images/ties/main_tie.png" width="578" height="478" />
                </a>
                


            </div>
           
                
                <div id="add_to_cart">
<a class="wepay-widget-button wepay-green" id="wepay_widget_anchor_51b0ba006397c" href="https://www.wepay.com/stores/339111/item/326011">Add to cart</a><script type="text/javascript">var WePay = WePay || {};WePay.load_widgets = WePay.load_widgets || function() { };WePay.widgets = WePay.widgets || [];WePay.widgets.push( {object_id: 326011,widget_type: "store_item_add_to_cart",anchor_id: "wepay_widget_anchor_51b0ba006397c",widget_options: {store_id: 339111,show_item_price: true,show_item_images: false,button_text_sold_out: "Sold Out",show_item_custom_options: true,button_text: "Add to cart"}});if (!WePay.script) {WePay.script = document.createElement('script');WePay.script.type = 'text/javascript';WePay.script.async = true;WePay.script.src = 'https://static.wepay.com/min/js/widgets.v2.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(WePay.script, s);} else if (WePay.load_widgets) {WePay.load_widgets();}</script>                
               
                <div id="freeship"><span id="free"><strong>+FREE </strong></span>SHIPPING</div>
			              
                        <a href="images/ties/main_tie.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/white_silver_1.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/black_2.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/light_purple_3.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/white_4.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/maroon_5.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/hard_navy_6.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/silver_grey_7.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/green_grass_8.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/hot_pink_shimmer_9.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/red_orange_10.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/dark_navy_11.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/nude_pink_12.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/gold_13.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/blue_14.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/brown_15.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/sky_blue_16.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/soft_gold_17.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/light_olive_18.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/turquoise_19.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/campagne_20.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/teal_21.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/chocolate_brown_22.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/lime_23.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/red_24.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/navy_blue_25.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/light_navy_blue_26.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/pink_27.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/orange_28.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/light_pink_29.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/indigo_30.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/hard_purple_31.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/purple_32.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/bright_gold_33.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/beige_ponza_34.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/light_green_35.png" rel="lightbox[tie-color]"></a>
                        <a href="images/ties/silver_36.png" rel="lightbox[tie-color]"></a>
                         
                
                    <div id="thumbnail_div">
                        <img class="item_thumbnail vip_img" src="images/ties/thumb/random.png" alt="random" />
                        <img class="item_thumbnail vip_img" src="images/ties/thumb/a.png" alt="a" />
                        <img class="item_thumbnail" src="images/ties/thumb/color.png" alt="color" />
                        <img class="item_thumbnail" src="images/ties/thumb/white_silver_1.png" alt="white_silver_1" />
                        <img class="item_thumbnail" src="images/ties/thumb/black_2.png" alt="black_2" />
                        <img class="item_thumbnail" src="images/ties/thumb/light_purple_3.png" alt="light_purple_3" />
                        <img class="item_thumbnail" src="images/ties/thumb/white_4.png" alt="white_4" />
                        <img class="item_thumbnail" src="images/ties/thumb/maroon_5.png" alt="maroon_5" />
                        <img class="item_thumbnail" src="images/ties/thumb/hard_navy_6.png" alt="hard_navy_6" />
                        <img class="item_thumbnail" src="images/ties/thumb/silver_grey_7.png" alt="silver_grey_7" />
                        <img class="item_thumbnail" src="images/ties/thumb/green_grass_8.png" alt="green_grass_8" />
                        <img class="item_thumbnail" src="images/ties/thumb/hot_pink_shimmer_9.png" alt="hot_pink_shimmer_9" />
                        <img class="item_thumbnail" src="images/ties/thumb/red_orange_10.png" alt="red_orange_10" />
                        <img class="item_thumbnail" src="images/ties/thumb/dark_navy_11.png" alt="dark_navy_11" />
                        <img class="item_thumbnail" src="images/ties/thumb/nude_pink_12.png" alt="nude_pink_12" />
                        <img class="item_thumbnail" src="images/ties/thumb/gold_13.png" alt="gold_13" />
                        <img class="item_thumbnail" src="images/ties/thumb/blue_14.png" alt="blue_14" />
                        <img class="item_thumbnail" src="images/ties/thumb/brown_15.png" alt="brown_15" />
                        <img class="item_thumbnail" src="images/ties/thumb/sky_blue_16.png" alt="sky_blue_16" />
                        <img class="item_thumbnail" src="images/ties/thumb/soft_gold_17.png" alt="soft_gold_17" />
                        <img class="item_thumbnail" src="images/ties/thumb/light_olive_18.png" alt="light_olive_18" />
                        <img class="item_thumbnail" src="images/ties/thumb/turquoise_19.png" alt="turquoise_19" />
                        <img class="item_thumbnail" src="images/ties/thumb/campagne_20.png" alt="campagne_20" />
                        <img class="item_thumbnail" src="images/ties/thumb/teal_21.png" alt="teal_21" />
                        <img class="item_thumbnail" src="images/ties/thumb/chocolate_brown_22.png" alt="chocolate_brown_22" />
                        <img class="item_thumbnail" src="images/ties/thumb/lime_23.png" alt="lime_23" />
                        <img class="item_thumbnail" src="images/ties/thumb/red_24.png" alt="red_24" />
                        <img class="item_thumbnail" src="images/ties/thumb/navy_blue_25.png" alt="navy_blue_25" />
                        <img class="item_thumbnail" src="images/ties/thumb/light_navy_blue_26.png" alt="light_navy_blue_26" />
                        <img class="item_thumbnail" src="images/ties/thumb/pink_27.png" alt="pink_27" />
                        <img class="item_thumbnail" src="images/ties/thumb/orange_28.png" alt="orange_28" />
                        <img class="item_thumbnail" src="images/ties/thumb/light_pink_29.png" alt="light_pink_29" />
                        <img class="item_thumbnail" src="images/ties/thumb/indigo_30.png" alt="indigo_30" />
                        <img class="item_thumbnail" src="images/ties/thumb/hard_purple_31.png" alt="hard_purple_31" />
                        <img class="item_thumbnail" src="images/ties/thumb/purple_32.png" alt="purple_32" />
                        <img class="item_thumbnail" src="images/ties/thumb/bright_gold_33.png" alt="bright_gold_33" />
                        <img class="item_thumbnail" src="images/ties/thumb/beige_ponza_34.png" alt="beige_ponza_34" />
                        <img class="item_thumbnail" src="images/ties/thumb/light_green_35.png" alt="light_green_35" />
                        <img class="item_thumbnail" src="images/ties/thumb/silver_36.png" alt="silver_36" />
                        
                    </div>
                </div>
                
                  
           <!-- </div>-->
            
            <div class="clear"></div>
            <div id="bottom_content">
                <div id="right_side">
                    <span class="other_products"><h2>Other Products</h2></span><br />
                    <div id="right_inside_div">
                        <div class="each_more">
                            <a href="#">
                            <img class="right_img" src="images/ring/ring_on.png" />
                                <span class="more_pro_buy">  View Item </a> </span>
                        </div>
                        <div class="each_more">
                            <a href="#"> 
                            <img class="right_img" src="images/cuffs/cuffs.png" />
                                <span class="more_pro_buy"> View Item </a> </span>
                        </div>
                        <div class="each_more">
                            <a href="#">
                            <img class="right_img" src="images/skull_belts/skull_circle.png" />
                                <span class="more_pro_buy">  View Item </a> </span>
                        </div>
                        <div class="each_more">
                            <a href="#">
                            <img class="right_img" src="images/belts/belts.png" />
                                <span class="more_pro_buy">  View Item </a> </span>
                        </div>
                        <div class="each_more">
                            <a href="#">
                            <img class="right_img" src="images/watch/watch_pile.png" />
                                <span class="more_pro_buy">  View Item </a> </span>
                        </div>

                    </div>
                </div>
                
                <div id="left_side">
                    <span class="other_products"><h2>Description</h2></span><br />

                       <div id="first_lines">
                        The Slim Shine Ties. 100% Polyester (Hand Made).<br />
                        
                        Hottest Look, Sleek Style, Dress & Impress. Guaranteed :-)
                       </div> 
                    <ul>
                       <li> Beautiful 36 COLORS!!!</li>
                        
                        <li>Material: 100% Poly</li>
                        
                        <li>Size: Men/Women/Teens </li>
                        
                        <li>Width: 2 inch wide</li>
                        
                        <li>Shipping: FREE IN THE US!!</li>
                    </ul>    
                       <span class="other_products"><h2> About this product</h2></span><br />
                        
                        <div id="last_lines">
                            This product is for 2 inc Slim Tie in the color of your choice.<br />
                            
                            **SHIPS WITHIN 24 HOURS OF CLEARED PAYMENT**<br />
                            
                            ***Special!!! Need Bulk Order? <br />
                            
                            Match The Family For A Wedding?<br />
                            
                            Or Just a Few For Any Occasion?<br />
                            
                            Whatever You Need, Message Me About Discounting Pricing!<br />
                        </div>     
                </div>
            </div>
            
            <div class="clear"></div>
        </div>

    </div>
    
    <div class="clear"></div>
    <?php include_once('bottomfooter.php'); ?>
</body>
</html>