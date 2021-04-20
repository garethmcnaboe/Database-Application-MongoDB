<!--This file contains the navigation for the application-->
<!DOCTYPE html>
<html>
<!-- import angular in order to facilitate the routing -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>

<!--link to javascript file-->
<body ng-app="myApp">

<script src="./customer.js"></script>

<h1>Customer / Product Order Database</h1>

<div class="nav">
<!--list of links that can be used to navigate to the features-->
    <ul>
    <li><a href="#/!">Home</a></li>
    <li><a href="#!ccreate">Customer Create</a></li>
    <li><a href="#!cretrieve">Customer Retrieve</a></li>
    <li><a href="#!cupdate">Customer Update</a></li>
    <li><a href="#!cdelete">Customer Delete</a></li>
    <li><a href="#!screate">Stock Create</a></li>
    <li><a href="#!sretrieve">Stock Retrieve</a></li>
    <li><a href="#!supdate">Stock Update</a></li>
    <li><a href="#!sdelete">Stock Delete</a></li>
    <li><a href="#!ocreate">Order Create</a></li>
    <li><a href="#!oretrieve">Order Retrieve</a></li>
    <li><a href="#!oupdate">Order Update</a></li>
    <li><a href="#!odelete">Order Delete</a></li>
    <ul>
<div>

<div ng-view></div>

<script>
var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "main.html"
    })
    .when("/ccreate", {
        templateUrl : "./customercreate.html"
    })
    .when("/cretrieve", {
        templateUrl : "./customerretrieve.html"
    })
    .when("/cupdate", {
        templateUrl : "./customerupdate.html"
    })
    .when("/cdelete", {
        templateUrl: "./customerdelete.html"
    })
    .when("/screate", {
        templateUrl : "./stockcreate.html"
    })
    .when("/sretrieve", {
        templateUrl : "./stockretrieve.html"
    })
    .when("/supdate", {
        templateUrl : "./stockupdate.html"
    })
    .when("/sdelete", {
        templateUrl: "./stockdelete.html"
    })
    .when("/ocreate", {
        templateUrl : "./ordercreate.html"
    })
    .when("/oretrieve", {
        templateUrl : "./orderretrieve.html"
    })
    .when("/oupdate", {
        templateUrl : "./orderupdate.html"
    })
    .when("/odelete", {
        templateUrl: "./orderdelete.html"
    });
});
</script>

<p>Footnote</p>

</body>
</html>