// public/scripts/userController.js

(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('HomeController', HomeController);

    function HomeController($http,$state ,$auth, $rootScope,$scope,AuthService) {

        var vm = this;
        vm.users;
        vm.notes;
        vm.error;

        vm.getNotes = function() {
           
                // Everything worked out so we can now redirect to
                // the users state to view the data
                $state.go('listNotes'); 

            // //Grab the list of users from the API
            // $http.get('api/note').success(function(notes) {
            //     vm.notes = notes;
            // }).error(function(error) {
            //     vm.error = error;

            // });
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