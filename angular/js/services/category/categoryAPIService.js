



         angular.module("category").factory("categoryAPI", function($http, config){
             
            var _getLoadCategory = function(){
                
                return $http.get(config.baseUrl+"LoadCategory");
                
            }; 
            
            var _getSaveOrEditCategory = function(action){
              
                return $http.post(config.baseUrl+"SaveOrEditCategory", action);
                
            };
            
            return{
                
                getLoadCategory : _getLoadCategory,
                
                getSaveOrEditCategory : _getSaveOrEditCategory
                
            };
             
         });
