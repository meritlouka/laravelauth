(function() {

    'use strict';

    angular
        .module('authApp')
        .service('AuthService', AuthService);

    function AuthService($auth, $state, $http, $rootScope) {
        var vm = this;

        vm.loginError = false;
        vm.loginErrorText;




        // We would normally put the logout method in the same
        // spot as the login method, ideally extracted out into
        // a service. For this simpler example we'll leave it here
        vm.logout = function() {
            $auth.logout().then(function() {

                // Remove the authenticated user from local storage
                localStorage.removeItem('user');

                // Flip authenticated to false so that we no longer
                // show UI elements dependant on the user being logged in
                $rootScope.authenticated = false;

                // Remove the current user info from rootscope
                $rootScope.currentUser = null;
                
                // Send the user to the auth state so they can login
                $state.go('auth');
            });
        }

        vm.login = function(email,password) {

            var credentials = {
                email: email,
                password: password
            }

            $auth.login(credentials).then(function() {
                // Return an $http request for the now authenticated
                // user so that we can flatten the promise chain
                return $http.get('api/authenticate/user');

            // Handle errors
            }, function(error) {
            	
                vm.loginError = true;
                vm.loginErrorText = error.data.error;
            // Because we returned the $http.get request in the $auth.login
            // promise, we can chain the next promise to the end here
            }).then(function(response) {
            	
                // Stringify the returned data to prepare it
                // to go into local storage
                var user = JSON.stringify(response.data.user);

                // Set the stringified user data into local storage
                localStorage.setItem('user', user);

                // The user's authenticated state gets flipped to
                // true so we can now show parts of the UI that rely
                // on the user being logged in
                $rootScope.authenticated = true;

                // Putting the user's data on $rootScope allows
                // us to access it anywhere across the app
                $rootScope.currentUser = response.data.user;

                // Everything worked out so we can now redirect to
                // the users state to view the data
                $state.go('listNotes');

            });
        }
    }



})();