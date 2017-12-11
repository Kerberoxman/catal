$(document).ready(function () {

    
//ALTA TIENDA
    var $form = $("#form");
    $form.validate({
        rules: {
            nombre: {
                required: true,
                rangelength: [3, 40]
            },
            persona: {
                required: true,
                rangelength: [3, 110],
                email: true
            },
            telefono: {
                required: true,
                rangelength: [8, 13],
            }, 
            mensaje: {
                required: true,
                rangelength: [5, 300]
            }
        },
        messages: {
            nombre: { required: "Por favor ingresa tu Nombre." },
            persona: { required: "Por favor ingresa tu correo electrÃ³nico." },
            telefono: { required: "Por favor ingresa tu telÃ©fono." },
            mensaje: { required: "Por favor ingresa un mensaje." },
            
        },
        invalidHandler: function(event, validator) {
            // 'this' refers to the form
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = errors === 1
                  ? 'You missed 1 field. It has been highlighted'
                  : 'You missed ' + errors + ' fields. They have been highlighted';  
            }
        },
        submitHandler: function (form) {

            var $form = $(form);
            var urlaction = $(form).attr('action');
        
            $.ajax({
                url: urlaction,
                type: 'POST',
                dataType: 'json',
                cache: false,
                data: $form.serialize(),
                success: function ( respuesta ){
                    // show some message, etc...
                    if(respuesta.bandera == false){
                            if( typeof respuesta.errores !== 'undefined'){
                                   //toastr.warning('Verica los datos capturados','Datos Incompletos!');
                                    
                                     $('#myTabs a[href="#tab-' + respuesta.tab + '"]').tab('show')
                                     
                                    

                                    var objErrMsg = {};
                         
                                    for(datos in respuesta.errores){
//                                        campo = datos.toString();                                        
//                                        msjcampo = respuesta.errores[datos];              
                                        objErrMsg[datos] = respuesta.errores[datos];
                                    }
                                    
                                    
                                    var Myform = $("#form").validate();
                                    Myform.showErrors(objErrMsg);                                     
                                          
                                    
                            }else{
                                swal({
                                        title: "Error!",
                                        text: respuesta.mensaje,
                                        type: "error"
                                    
                                    });
                                
                            }
                    }else{
                        if( respuesta.bandera == true){
                            setTimeout (function(){
                                    //simple mensage
                                    //toastr.success('La tienda se ingreso correctamente','InformaciÃ³n Registrada!');
                                    swal({
                                        title: "InserciÃ³n correcta!",
                                        text: respuesta.mensaje,
                                        type: "success"
                                    }
                                    , function () {
                                        $('#form')[0].reset();
                                        $(".floating-label-form-group").removeClass("floating-label-form-group-with-value");
                                    });
                            return false;
                            },200);
                        }
                    }

                    return false; // blocks redirect after submission via ajax
                }
                
            });//finAjax
        }//submit handler
    });
    

///form_log

    $('#uUsuario').val(localStorage.usrname);
        
    var $form = $("#form_log");
    
    $form.validate({
        rules: {
                     uUsuario: {
                         required: true,
                         minlength: 3
                     },
                     uClave: {
                         required: true,
                         minlength: 3
                     }
        },
        invalidHandler: function(event, validator) {
            // 'this' refers to the form
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = errors === 1
                  ? 'You missed 1 field. It has been highlighted'
                  : 'You missed ' + errors + ' fields. They have been highlighted';  
            }
        },
        submitHandler: function (form) {
            var chaque = false;
            if($('#remember').is(':checked')){
               chaque = true;
            }
            
            var $form = $(form);
            var urlaction = $(form).attr('action');
            var md5 = $.md5($('#uClave').val());

            var data_x = {'usuario': $('#uUsuario').val(), 'clave': md5};
            alert('hello');
            
            $('#mensaje').hide();
            //procesando();
            $.ajax({
                url: urlaction,
                type: 'POST',
                dataType: 'json',
                cache: false,
                data: data_x,
                success: function ( respuesta ){
                    // show some message, etc...
                    if(respuesta.bandera == false){
                            if( typeof respuesta.errores !== 'undefined'){
                                    //toastr.warning('Verica los datos capturados','Datos Incompletos!');
                                    var objErrMsg = {};
                                    for(datos in respuesta.errores){           
                                        objErrMsg[datos] = respuesta.errores[datos];
                                    }
                                       var Myform = $("#form_log").validate();
                                       Myform.showErrors(objErrMsg);
                                       //procesandoend();
                                    
                            }else{
                                procesandoend();
                                $('#mensaje').show();
                                $('#mensaje').addClass('animated shake');
                                
                            }
                    }else{
                        if( respuesta.bandera == true){
                            localStorage.usrname = $('#uUsuario').val();
                            var uunombre= respuesta.nomget;           
                            swal({
                                    title: "Bienvenido!",
                                    text: uunombre,
                                    type: "success"
                            },
                            function(){
                              
                              window.location.href = respuesta.url;
                              
                            });
                        }
                    }

                    return false; // blocks redirect after submission via ajax
                }
                
            });//finAjax
        }//submit handler
    });









});