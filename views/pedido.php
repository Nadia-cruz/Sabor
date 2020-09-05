


<?php

include("../managers/basedados.php");
include("../managers/man_menu.php");
include("../managers/session.php");

if (isset($_POST['Validar'])) {
    
    $bd = new BD(); 
    $link = $bd->abreLigacao();
    $menus = new Menu();

    if ($menus->setMenu($link, $id_session)) {
        header('location: home.php');
    } else {
        print ("<div class='alert alert-danger'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                  <strong>Erro de criação!</strong> Verifique se os dados estão corretos.
                  </div>");
    }

    $bd->fechaLigacao($link);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sabor de nos Terra</title>
<!--
Neaty HTML Template
http://www.templatemo.com/tm-501-neaty
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/magnific-popup.css">                                <!-- Magnific pop up style, http://dimsemenov.com/plugins/magnific-popup/ -->
    <link rel="stylesheet" href="css/templatemo-style.css"> 
    <link rel="stylesheet" href="../css/shop.css">                                   <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->

          <!-- faz parte do template -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->     
</head>
<div id="app">
  <div id="product">
    <item v-for="item in items" v-bind:item_data="item"></item>
  </div>
  <div id="cart">
    <div id="head">
      <h3>Shopping Cart</h3>
      <div id="price">Price</div>
      <div id="quantity">Quantity</div>
      <div id="total">Total</div>
    </div>
    <buyitem v-for="buyitem in buyitems" v-bind:buy_data="buyitem"></buyitem>
    <h5 v-if="total()">Sum: $ {{total()}}</h5>
  </div>
</div>


<template id="product-box">
  <div class="box">
    <img :src="item_data.img"/>
    <i class="fa fa-plus" v-on:click="addItem(item_data)"></i>
    <h2>{{item_data.title}}</h2>
    <p>$ {{item_data.price}}</p>
  </div>
</template>

<template id="buy-box">
  <div class="row">
    <img :src="buy_data.img"/>
    <h4>{{buy_data.title}}</h4>
    <p>$ {{buy_data.price}}</p>
    <div class="qty-minus" v-on:click="minusQty(buy_data)">-</div>
    <div class="qty">{{buy_data.qty}}</div>
    <div class="qty-plus" v-on:click="plusQty(buy_data)">+</div>
    <div class="del" v-on:click="removeItem(buy_data)">Remove</div>
    <div class="totalprice">{{buy_data.total}}</div>
  </div>
</template>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js'></script>
<script >var beerClick = 0;
var ecoClick = 0;
var paperClick = 0;

Vue.component("item", {
  template: "#product-box",
  props: ["item_data", "buyitems"],
  methods: {
    addItem: function(item_data) {
      if (item_data.id == "beer") {
        beerClick += 1;
        if (beerClick <= 1) {
          this.pushData();
        } else {
          var i = this.findIndex(this.$parent.buyitems, "id", "beer");
          this.$parent.buyitems[i].qty += 1;
          this.$parent.buyitems[i].total = this.$parent.buyitems[i].qty*this.$parent.buyitems[i].price;
          console.log(i);
        }
      } else if (item_data.id == "eco-bag") {
        ecoClick += 1;
        if (ecoClick <= 1) {
          this.pushData();
        } else {
          var i = this.findIndex(this.$parent.buyitems, "id", "eco-bag");
          this.$parent.buyitems[i].qty += 1;
          this.$parent.buyitems[i].total =this.$parent.buyitems[i].qty*this.$parent.buyitems[i].price;
        }
      } else {
        paperClick += 1;
        if (paperClick <= 1) {
          this.pushData();
        } else {
          var i = this.findIndex(this.$parent.buyitems, "id", "paper-bag");
          this.$parent.buyitems[i].qty += 1;
          this.$parent.buyitems[i].total = this.$parent.buyitems[i].qty*this.$parent.buyitems[i].price;
        }
      }
      console.log(beerClick, ecoClick, paperClick);
    },
    pushData: function() {
      this.$parent.buyitems.push({
        img: this.item_data.img,
        title: this.item_data.title,
        price: this.item_data.price,
        qty: 1,
        total: this.item_data.price,
        id: this.item_data.id
      });
    },
    findIndex: function(array, attr, value) {
      for (var i = 0; i < array.length; i += 1) {if (window.CP.shouldStopExecution(1)){break;}
        if (array[i][attr] === value) {
          return i;
        }
      }
window.CP.exitedLoop(1);

      return -1;
    },
  }
});
Vue.component("buyitem", {
  template: "#buy-box",
  props: ["buy_data", "buyitems"],
  methods: {
    removeItem: function(buy_data) {
      var index = this.$parent.buyitems.indexOf(buy_data);
      this.$parent.buyitems.splice(index, 1);
      if (buy_data.id == "beer") {
        beerClick = 0;
      } else if (buy_data.id == "eco-bag") {
        ecoClick = 0;
      } else {
        paperClick = 0;
      }
    },
    plusQty: function(buy_data){
      buy_data.qty += 1;
      buy_data.total = buy_data.qty*buy_data.price;
    },
    minusQty: function(buy_data){
      buy_data.qty -= 1;
      if (buy_data.qty < 0){
        buy_data.qty = 0;
      }
      buy_data.total = buy_data.qty*buy_data.price;
    }
    
  }
});

var app = new Vue({
  el: "#app",
  data: {
    items: [
      {
        img: "http://chenyiya.com/codepen/product-1.jpg",
        title: "Beer Bottle",
        price: "25",
        id: "beer"
      },
      {
        img: "http://chenyiya.com/codepen/product-2.jpg",
        title: "Eco Bag",
        price: "73",
        id: "eco-bag"
      },
      {
        img: "http://chenyiya.com/codepen/product-3.jpg",
        title: "Paper Bag",
        price: "35",
        id: "paper-bag"
      },
      {
        img: "http://chenyiya.com/codepen/product-3.jpg",
        title: "Paper Bag",
        price: "35",
        id: "paper-bag"
      }
    ],
    buyitems: []
  },
  methods: {
    total: function(){
      var sum = 0;
      this.buyitems.forEach(function(buyitem){
            sum += parseInt(buyitem.total);
      });
      return sum;
    }
  }
});

//# sourceURL=pen.js
</script>

<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Cotato &copy; 23030330 </p>
                </div>
                <div class="col-md-4">
                    <ul class="social-icons">
                        <li><a  href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        
                    </ul>
                </div>
                <div class="col-md-4">
                    <p>Sabor de nos Terra <em>Cozinha Cabo-verdiana</em></p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>


