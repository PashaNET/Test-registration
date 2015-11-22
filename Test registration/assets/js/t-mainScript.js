$(document).ready(function(){
// main Object
    var app = {

        initialize: function(){
            this.setUpListeners();
        },
        setUpListeners: function(){
            $(window).load(this.setDate);
            //listeners on main form
            $('#t-signIn').on('click', this.signIn);// 'this' - app
            $('#t-signIn-form').on('keydown', 'input',  this.deleteErrors);
            $('#t-regButton').on('click', this.changeForm);
            //listeners on registration form
            $('#t-back-button').on('click', this.backToMain);
            $('#t-submit').on('click', this.submitForm);
            $('#t-reg-form').on('keydown', 'input',  this.deleteErrors);
            $('#t-foto').on('change', this.sendFoto);
            $('#t-modal-button').on('click', this.backToMain);
        },
        //entrance after checking email and password
        signIn: function(){
            var form = $('#t-signIn-form'),
                url = 'server/t-login.php',
                data = new FormData(),
                inputs = form.find('input'),
                user_email = '';
            if(app.validateForm(form)===false) return false;
            $.each(inputs, function(index, val){
                var key = $(val).attr('name'),
                    value = $(val).val();
                data.append(key, value);

                if(key ==='email'){
                    user_email = value;
                }
            });
            //send data on server and check on existing
            app.sendData(url, data, function(data) {
                if (data !== 'error') {
                    localStorage.setItem('user_email', user_email);
                    $(location).attr('href', '/t-profile.php');
                }
                else {

                }
            });
        },
        //animation, when click "Registration"
        changeForm: function(){
            $('#t-main').animate({left: -1500}, 1050);
            $('#t-reg-div').show().animate({right: 165 }, 2000, function(){$('#t-back-button').show('slow');});
        },
        // back to main page from registration page
        backToMain: function(){
            $('#t-main').animate({left: 0}, 1050);
            $('#t-reg-div').animate({right: -2000 }, 2000).hide();
            $('#t-back-button').hide();
        },
        //sending image on server and show preview after uploading
        sendFoto: function(){
            var $preview = $('#t-preview'),
                data = new FormData(),
                image =  $('#t-foto').prop('files')[0],
                $fotoName = $('#t-fotoName'),
                $error = $('#t-error'),
                imageTypes = ['image/png','image/jpg','image/jpeg','image/gif'], //allowed types of image
                type = imageTypes.indexOf(image.type),
                url = 'server/t-uploadFoto.php';

            if(type === -1){
                $error.text("ERROR: File must be in png, jpg or gif format!");
                $error.show();
            }else{
                data.append('foto', image);
                app.sendData(url, data, function(data){
                    var data = JSON.parse(data);
                    if(data !== 'error'){
                        $preview.attr('src', '../../server/'+ data);
                        $fotoName.attr("value", data);
                    }else{
                        $error.text('ERROR: ' + data);
                    }
                });
            }
        },
        //validation and sending data on server from registration form
        submitForm: function(e){
            e.preventDefault();
            var form = $('#t-reg-form'),
                submitButton =  $('#t-submit'),
                url = 'server/t-mainController.php',
                data = new FormData(),
                inputs = form.find('input').not('#t-foto');// except input "foto
            if(app.validateForm(form)===false) return false;//validate inputs
            submitButton.addClass('disabled');//disable the button to avoid double sending
            $.each(inputs, function(index, val){
                var key = $(val).attr('name'),
                    value = $(val).val();
                data.append(key, value);
            });
            data.append('action', 'insert');
            app.sendData(url, data, function(data){
                if(data !== 'error'){
                    var successMessage =  "You successfully registered! " +
                                          "Please return to main page and use your email and password for login!";
                    $('#t-modal-header').html(data);
                    $('#t-modal-body').html(successMessage);
                    $('#t-modal').modal('show');
                    submitButton.removeClass('disabled');
                }else{
                    var errorMessage =  "Sorry, an error occurred! Please, try again later!";
                    $('#t-modal-header').html(data);
                    $('#t-modal-body').html(errorMessage);
                    $('#t-modal').modal('show');
                    submitButton.removeClass('disabled');
                }
            });
        },
        //get form and validate all fields
        validateForm: function(form){
            var valid = true,
                inputs = form.find('input').filter( ':visible'),//except hidden input with foto-name
                pass = '',
                confirm = '';
            $.each(inputs, function(index, val){
                var input = $(val),
                    value = input.val(),
                    valueLength = value.length,
                    name = input.attr('name'),
                    formGroup = input.parents('.form-group'),
                    label = formGroup.find('label').text(),
                    textError = label + ' - field must be filled',
                    fieldsForCheck = ['firstName', 'secondName', //this fields must contain only characters
                        'country', 'city_address', 'education', 'city_edu','school', 'edu_field'];

                if(valueLength === 0){//check on filling
                    app.showTooltips(input, textError, formGroup);
                    valid = false;
                }

                if(fieldsForCheck.indexOf(name)!== -1){// check field if array contain him
                    var reg = new RegExp('[^A-zА-яЁё \s]', 'g');
                    if (reg.test(value)) {
                        textError = label + ' input contains incorrect symbols!';
                        app.showTooltips(input, textError, formGroup);
                        valid = false;
                    }
                }

                if(name ==='email'){//check email
                    var reg = new RegExp('^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$', 'g');
                    if(reg.test(name)){
                        textError = label + ' is incorrect!';
                        app.showTooltips(input, textError, formGroup);
                        valid = false;
                    }
                }

                if(name ==='pass'){
                    pass = input;
                }

                if(name ==='confirm'){
                    confirm = input;
                }

                if(valid){//add red shadow on input if mistake detected
                    formGroup.addClass('has-success').removeClass('has-error');
                }
            });

            //this needed only on reg-form
            if($(form).attr('id')==='t-reg-form'){
                if(pass.val().length<6){//check  password on length
                    var text = 'Password must contain 6 or more symbols!',
                        formGroup = pass.parents('.form-group');
                    app.showTooltips(pass, text, formGroup);
                    valid = false;
                }
                else if(pass.val()!==confirm.val()){//check  password to match
                    var text = 'Confirmed password dont matches!',
                        formGroup = confirm.parents('.form-group');
                    app.showTooltips(confirm, text, formGroup);
                    valid = false;
                }
            }
            return valid;
        },
        //shows tooltips about errors
        showTooltips: function(input, text, formGroup){
            formGroup.addClass('has-error').removeClass('has-success');
            input.tooltip({
                trigger: 'manual',
                placement: 'top',
                title: text
            }).tooltip('show');
        },
        //deleting tooltips if field correct filled
        deleteErrors: function(){
            $(this).tooltip('destroy').parents('.form-group').removeClass('has-error').addClass('has-success');
        },
        //function for connection with server
        sendData: function(url, data, callback){
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data){
                    if(typeof data.error === 'undefined'){
                        callback(data);
                    }else{
                        callback(data.error);
                    }
                },
                error: function(jqXHR, textStatus){
                    callback(textStatus);
                }
            });
        },
        //set current date for datepicker
        setDate: function(){
            var $date =  $('#t-date');
            $date.datepicker({
                format: "dd.mm.yyyy",
                todayBtn: true,
                orientation: "top left",
                autoclose: true,
                todayHighlight: true
            });
            $date.datepicker('update', new Date());
        }
    }
    //initialization main Object
    app.initialize();

});