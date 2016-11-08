

        angular.module("hardware").controller("hardwarecrtl", function($scope, hardwareAPI){
            
            $scope.dados = [];
            var carregaHardware = function(){
                hardwareAPI.getCarregaHardware().success(function(data, status){
                   $scope.dados = data;
                }).error(function(data){
                    $scope.message = "Aconteceu um erro:"+data;
                });
            };   
        
            $scope.marca = [
                {nome:"sony", codigo: 1},
                {nome:"sansung", codigo: 2},
                {nome:"LG", codigo:3}
            ];
            
            $scope.registraInventario = function(registro){
                hardwareAPI.getRegistraInventario(registro).success(function(data){
                delete $scope.registro;
                carregaHardware();
                //$scope.dados.unshift(angular.copy(registro));
                });
            };
            
            $scope.edit = function(dados){
                $scope.registro = dados;
                //console.log(dados);  
            };
            
            $scope.apagarRegistro = function(idinventario){
              hardwareAPI.getApagarRegistro(idinventario).success(function(data){
                  carregaHardware();
              }).error(function(data){
                  $scope.message = "Aconteceu um erro: "+data;
              });
              
            };
         
            $scope.ordenarPor = function(campo){
                $scope.criterioDeOrdenacao = campo;
                $scope.ordenacao = !$scope.ordenacao;
            };           
            
            $scope.registroSelecionado = function(dados){
                return dados.some(function(registro){
                    return registro.selecionado;
                });
            };

            
            $scope.datauser = [];

           var loaDdata = function(){
                hardwareAPI.getLoadData().success(function(data){
                    $scope.datauser = data;
                }).error(function(data){
                    $scope.message = "Aconteceu um erro ao carregar os dados: "+data;
                });

            };
            
            loaDdata();
            
            carregaHardware();
            
        });