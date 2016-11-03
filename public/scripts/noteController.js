// public/scripts/userController.js

(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('NoteController', NoteController);

    function NoteController($http, $auth, $rootScope,$scope,AuthService) {
    	var vm = this;
         vm.ncontent = '';
         vm.tagId = '';
         vm.userId = '';
         vm.categoryId = '';

        vm.getNotes = function() {
           $http.get('api/note').success(function(notes) {
               vm.notes = notes;
            }).error(function(error) {
                vm.error = error;

            });
        };
         
        vm.getNotes();

        vm.delete = function (id) {

            $http.delete('api/note/'+ id).success(function(text) {
               // var myEl = angular.element( document.querySelector( '#note'+id ) );
               // myEl.remove();
               vm.getNotes();
            }).error(function(error) {
               alert(error);

            });
        }
        
        vm.saveNote = function () {

            var data = {
                id:vm.id,
                content: vm.ncontent,
                tagId: vm.tagId,
                userId: vm.userId,
                categoryId: vm.categoryId
            };
         
            var config = {
                headers : {

                   // 'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            }
            if (vm.id == null) {
                    $http.post('/api/note', data, config)
                     .success(function (data, status, headers, config) {
                       vm.getNotes(); 
                    }).error(function(error) {
                          alert(error);
                     });
                
            }else{
                  $http.put('/api/note/'+vm.id, data, config)
                     .success(function (data, status, headers, config) {
                       vm.getNotes();
                    }).error(function(error) {
                          alert(error);
                    });
            }
            
        }
        
        vm.updateNote = function (id) {
           

            $http.get('/api/note/'+id)
            .success(function (data, status, headers, config) {
              
                vm.id = data.id;
                vm.ncontent = data .content;
                vm.tagId = data .tag_id;
                vm.userId = data.user_id;
                vm.categoryId = data.category_id;
            });
        }
 
	    

    }   

})();

