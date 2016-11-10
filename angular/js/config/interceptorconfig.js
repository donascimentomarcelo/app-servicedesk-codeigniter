


            angular.module("hardware").config(function($httpProvider){
              //  $httpProvider.interceptors.push("timestampInterceptors");
                $httpProvider.interceptors.push("loadingInterceptors");
            });