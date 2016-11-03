// public/scripts/authController.js

(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('AuthController', AuthController);


    function AuthController($auth, $state, $http, $rootScope,AuthService) {

        var vm = this;
        vm.login = function() {AuthService.login(vm.email,vm.password);};
      

    }

})();