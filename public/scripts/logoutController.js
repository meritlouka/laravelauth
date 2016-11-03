// public/scripts/userController.js

(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('LogoutController', LogoutController);

    function LogoutController($http,$state ,$auth, $rootScope,$scope,AuthService) {

        var vm = this;

        vm.error;

        vm.logout =function() { AuthService.logout();}();

      
    }

})();