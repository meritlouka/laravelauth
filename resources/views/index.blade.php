<!-- resources/views/index.php -->

<!doctype html>
<html ng-app="authApp" >
    <head>
        <meta charset="utf-8">
        <title>Angular-Laravel Authentication</title>
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
        <h5 ng-if="authenticated"><span ng-include="'views/menuView.html'"></span></h5>
    </head>
    <body >

        <div class="container">
            <div ui-view></div>
        </div>        

    </body>

    <!-- Application Dependencies -->
    <script src="node_modules/angular/angular.js"></script>
    <script src="node_modules/angular-ui-router/release/angular-ui-router.js"></script>
    <script src="node_modules/satellizer/dist/satellizer.js"></script>

    <!-- Application Scripts -->
    <script src="scripts/app.js"></script>
    <script src="scripts/authSerivce.js"></script>
    <script src="scripts/authController.js"></script>
    <script src="scripts/userController.js"></script>
    <script src="scripts/homeController.js"></script>
    <script src="scripts/noteController.js"></script>
    <script src="scripts/logoutController.js"></script>
 
</html>