    
    
    angular.module("user").config(function ($routeProvider){
        $routeProvider.when("/usuario",{
            templateURL: "usuario/user.html"
        });
        console.log($routeProvider);
    });