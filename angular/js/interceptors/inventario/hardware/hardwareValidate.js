


                 angular.module('hardware').factory('hardwareValidate', function(toastr){
                     
                    return {
                        messageHardware : _messageHardware,
                        deleteHardware : _deleteHardware
                    };

                    function _messageHardware(data){

                         if(data === '    1')
                         {
                         toastr.success('Operação realizada com sucesso!');
                         }
                         else if(data === '    1146')
                         {
                            toastr.error('Erro :'+data+' Houve um erro na base de dados!');
                         }
                         else if(data === '    1062')
                         {
                            toastr.error('Erro :'+data+' Esse e-mail já está sendo usado!');
                         }
                         else if(data === 'validate')
                         {
                            toastr.error('Preencha todos os campos!');
                         }
                         else if(data === '    0')
                         {
                            toastr.error('Os dados não foram inseridos corretamente!');
                         }
                         else
                         {
                            toastr.error(data);
                         }
                    }
                    
                    function _deleteHardware(data){
                        
                        if(data === '    1')
                         {
                         toastr.success('Registro excluido com sucesso!');
                         }else{
                         toastr.error('Erro ao deletar:'+data);    
                         }
                    };

                });