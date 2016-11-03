// public/scripts/userController.js

(function() {

    'use strict';

    angular
        .module('authApp')
        .service('menuService', MenuService);

    function MenuService($http,$state ,$auth, $rootScope,$scope,AuthService) {

        var vm = this;
        vm.users;
        vm.notes;
        vm.error;

        vm.getNotes = function() {

                $state.go('listNotes'); 
        }
        vm.getUsers = function() {
            
            //Grab the list of users from the API
            $http.get('api/authenticate').success(function(users) {
                vm.users = users;
            }).error(function(error) {
                vm.error = error;
            });
        }
        vm.logout =function() { AuthService.logout();}

      
    }

})();