
$(document).ready(function(){
//main Object
    var app = {

        initialize: function(){
            this.setUpListeners();
        },
        setUpListeners: function(){
            $(window).load(this.onLoadPage);
            $('.t-profile-edit').on('click', this.editData);
            $('.t-modal-save').on('click', this.saveData);
        },
        //object with all information about current user
        registeredUser: {},
        url:'server/t-mainController.php',
        //get data about user from db
        onLoadPage: function (){
            var data = new FormData(),
                user_email = localStorage.getItem('user_email');
            data.append('action', 'select');
            data.append('user_email', user_email);
            app.connectToServer(app.url, data, function(response){
                if(response !== 'error'){
                    app.registeredUser = JSON.parse(response);
                    app.buildProfile();
                }
                else{
                    console.log(response);
                }
            });
        },
        //fill fields
        buildProfile: function(){
            $.each(app.registeredUser, function(key, value) {
                if(key === 'fotoName'){
                    $('#t-profile-fotoName img').attr('src', 'server/' + value);
                }
                else if(key === 'user_status'){
                    $('#t-profile-' + key).text((value=='0')?'Not married':'Married');
                }
                else{
                    $('#t-profile-' + key).text(value);
                }
            });
        },
        //opens modal window for editing data
        editData: function(){
            var container = $(this).parents()[1],
                modalWindow = container.lastElementChild,
                inputs = $(modalWindow).find('input');
            $.each(inputs, function(index, val){
                var key = $(val).attr('name');
                $(val).val(app.registeredUser[key]);
            });
            //date field
            $('#t-date').datepicker({
                format: "dd.mm.yyyy",
                todayBtn: true,
                orientation: "top left",
                autoclose: true,
                todayHighlight: true
            });

            $(modalWindow).modal('show');
        },
        //saves data to db and refreshes page
        saveData: function(){
            var container = $(this).parents()[2],
                inputs = $(container).find('input'),
                data =  new FormData();
            $.each(inputs, function(index, val){
                var key = $(val).attr('name'),
                    value = $(val).val();
                data.append(key, value);
            });
            //'user_status' is not 'input' and will be added manually
            data.append('user_status', $('#t-profile-status').val());
            data.append('action', 'update');
            data.append('id', app.registeredUser['id']);
            app.connectToServer(app.url, data, function(response){
                var res = JSON.parse(response);
                if(res === 'success'){
                    $(container).parent().modal('hide');
                    app.onLoadPage();
                }
                else{
                    console.log(res);
                }
            });
        },
        //function for connection with server
        connectToServer: function(url, data, callback){
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function(response){
                    if(typeof response.error === 'undefined'){
                        callback(response);
                    }else{
                        callback(response.error);
                    }
                },
                error: function(jqXHR, textStatus){
                    callback(textStatus);
                }
            });
        }

    };
    //initialization main Object
    app.initialize();

});