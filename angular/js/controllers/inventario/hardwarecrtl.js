

        angular.module("hardware").controller("hardwarecrtl", function($scope, hardwareAPI){
            
            $scope.dados = [];
            var carregaHardware = function(){
                hardwareAPI.getCarregaHardware().success(function(data, status){
                   $scope.dados = data;
                }).error(function(data){
                    $scope.error = "Aconteceu um erro:"+data;
                });
            };   
        
            $scope.marca = [
                {nome:"sony", codigo: 1},
                {nome:"sansung", codigo: 2},
                {nome:"LG", codigo:3},
                {nome:"lenovo", codigo:4}
            ];
            
            $scope.registraInventario = function(registro){
                hardwareAPI.getRegistraInventario(registro).success(function(data){
                delete $scope.registro;
                delete $scope.selectedIndex;
                carregaHardware();
                //$scope.dados.unshift(angular.copy(registro));
                });
            };
            
            $scope.edit = function(dados){
               $scope.registro = dados;
            };
            
            $scope.new = function(){
                delete $scope.registro;
                delete $scope.selectedIndex;
            };
            
            //$scope.selectedIndex = 0;
            $scope.itemClicked = function($index){
                $scope.selectedIndex = $index;
            };
            
            $scope.apagarRegistro = function(idinventario){
              hardwareAPI.getApagarRegistro(idinventario).success(function(data){
                  carregaHardware();
              }).error(function(data){
                  $scope.error = "Aconteceu um erro: "+data;
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
                    $scope.error = "Aconteceu um erro ao carregar os dados: "+data;
                });

            };
            
            var LoadConfig =  function(){
              hardwareAPI.getLoadConfig().success(function(data){
                  $scope.dataconfig = data;
              }).error(function(data){
                  $scope.error = "Aconteceu um erro ao carregar as marcar:"+data;
              });
            };
            
            //loaDdata();
            
            LoadConfig();
            
            carregaHardware();
            
        });