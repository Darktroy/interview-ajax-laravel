<!DOCTYPE html>
<!--@if(session('name1')!== null)-->
<!--<h1>is not equal null</h1>-->
<!--@else-->
<!--<h1>is null</h1>-->
<!--@endif-->
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('fashi/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('fashi/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('fashi/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('fashi/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('fashi/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('fashi/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('fashi/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('fashi/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('fashi/css/style.css') }}" type="text/css">
    <script>
            function showEditBox(editobj, id) {
                $('#frmAdd').hide();
                $(editobj).prop('disabled', 'true');
                var currentMessage = $("#message_" + id + " .message-content").html();
                var editMarkUp = '<textarea rows="5" cols="80" id="txtmessage_' + id + '">' + currentMessage + '</textarea><button name="ok" onClick="callCrudAction(\'edit\',' + id + ')">Save</button><button name="cancel" onClick="cancelEdit(\'' + currentMessage + '\',' + id + ')">Cancel</button>';
                $("#message_" + id + " .message-content").html(editMarkUp);
            }
            function cancelEdit(message, id) {
                $("#message_" + id + " .message-content").html(message);
                $('#frmAdd').show();
            }
            function cartAction(action, p_id,p_title,p_image,p_price) {
                var queryString = "";
                if (action != "") {
                    switch (action) {
                        case "add":
                             var item = {id:p_id, title:p_title,image:p_image,price:p_price}; 
                             console.log(item);
                            break;
                        case "remove":
                            queryString = 'action=' + action + '&code=' + product_code;
                            break;
                        case "empty":
                            queryString = 'action=' + action;
                            break;
                    }
                }
                  $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                jQuery.ajax({
                    url:  "{{ url('/jssession') }}",
                      data: {
                     id:p_id, 
                     title:p_title,
                     image:p_image,
                     price:p_price,
                     qut: jQuery('#quantity_'+p_id).val()
                  },
                    type: "POST",
                    success: function (data) {
                        $("#cart-item").html(data);
                        if (action != "") {
                            switch (action) {
                                case "add":
                                    $("#add_" + product_code).hide();
                                    $("#added_" + product_code).show();
                                    break;
                                case "remove":
                                    $("#add_" + product_code).show();
                                    $("#added_" + product_code).hide();
                                    break;
                                case "empty":
                                    $(".btnAddAction").show();
                                    $(".btnAdded").hide();
                                    break;
                            }
                        }
                    },
                    error: function () {}
                });
            }
        </script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <!--<div class="header-top">-->
            <div class="container">
                   <?php $url  = \URL::current();

                    print_r($url);
                ?>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <form action="#" class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon"><a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon"><a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>3</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-pic"><img src="img/select-product-1.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="si-pic"><img src="img/select-product-2.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>$120.00</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">$150.00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Women’s Clothing</a></li>
                            <li><a href="#">Men’s Clothing</a></li>
                            <li><a href="#">Underwear</a></li>
                            <li><a href="#">Kid's Clothing</a></li>
                            <li><a href="#">Brand Fashion</a></li>
                            <li><a href="#">Accessories/Shoes</a></li>
                            <li><a href="#">Luxury Brands</a></li>
                            <li><a href="#">Brand Outdoor Apparel</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="./index.html">Home</a></li>
                        <li><a href="./shop.html">Shop</a></li>
                        <li><a href="#">Collection</a>
                            <ul class="dropdown">
                                <li><a href="#">Men's</a></li>
                                <li><a href="#">Women's</a></li>
                                <li><a href="#">Kid's</a></li>
                            </ul>
                        </li>
                        <li class="active"><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./blog-details.html">Blog Details</a></li>
                                <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                <li><a href="./check-out.html">Checkout</a></li>
                                <li><a href="./faq.html">Faq</a></li>
                                <li><a href="./register.html">Register</a></li>
                                <li><a href="./login.html">Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="search-form">
                            <h4>Search</h4>
                            <form action="#">
                                <input type="text" placeholder="Search . . .  ">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="blog-catagory">
                            
                            @foreach ($categories as $category)

                            <h4>{{$category['name']}}</h4>
                            <!--<ul>-->
<!--                            @if (count($category['items'])>0)
                                 @foreach ($category['items'] as $item)  
                                 <li><a >{{$item['title']}}</a></li>
                                 @endforeach
                            @endif-->
                            <!--</ul>-->
                                
                            @endforeach
                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="row">
                        @foreach ($items as $item)
                            <div class="col-lg-4 col-sm-4">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{ asset('pics/'.$item['image'])}}" alt="">
                                    <div class="sale">Sale</div>
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active">
                                            <a >
                                                
                                                <i class="icon_bag_alt" onClick = "cartAction('add',
                                                   '{{$item["id"]}}','{{$item["title"]}}', 
                                                   '{{$item["image"]}}', 
                                                  {{$item["price_per_one"]}})" ></i>
                                            </a>
                                        </li>
                                        <li class="cart-price"><input type="number" id='quantity_{{$item["id"]}}'></li>
                                    </ul>
                                </div>
                               
                            </div>
                        
                        </div>
                        @endforeach
                        
                    </div>
                </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
               
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('fashi/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('fashi/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('fashi/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('fashi/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('fashi/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('fashi/js/jquery.zoom.min.js')}}"></script>
    <script src="{{ asset('fashi/js/jquery.dd.min.js')}}"></script>
    <script src="{{ asset('fashi/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('fashi/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('fashi/js/main.js')}}"></script>
</body>

</html>