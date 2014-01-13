$().ready(function(){

    function initial(){
        getMessages();
    }

    initial();

    function query(arr) {

        $.ajax({
            url: 'controller.php',
            dataType: "json",
            async: false,
            data: arr,
            success: function (data) {
                switch (arr.action) {
                    case 'get':
                        if (Object.keys( data ).length != 0) {
                            var html = ''
                            for( var i in data ) {
                                var k = Object.keys( data ).length + 1 - i;
                                html += '<li id="' + data[k].id + '"><b>[' + data[k].time + ']</b> <i>' + data[k].name + ' say: </i>' + data[k].text + '</li>';
                            }
                            $('#list').html(html);
                        }
                        break;
                    case 'update':
                        if (typeof (data) === 'object') {
                            if (Object.keys( data ).length != 0) {
                                var html = '';
                                var n = 0;
                                for( var i in data ) {
                                    var k = Object.keys( data ).length + parseInt(arr.id) - n;
                                    html += '<li id="' + data[k].id + '"><b>[' + data[k].time + ']</b> <i>' + data[k].name + ' say: </i>' + data[k].text + '</li>';
                                    n++;
                                }
                                $('#list').prepend(html);
                            }
                        }
                        break;
                }
            },
            error: function (data) {
                console.log('Error');
                return false;
            }
        });

    }

    function getMessages() {

        query({action: 'get'});

    }

    function update() {

        var id = $('#list li:first').attr('id');
        query({action: 'update', id: id});

    }

    function sendMessage() {

        var name = $('#name').val();
        var text = $('#text').val();

        if (name === '' || text === '') {
            alert ('Заполните все поля!');
        } else {
            query({action: 'send' ,name: name, text: text});
        }


    }

    function is_object( mixed_var ){

        if(mixed_var instanceof Array) {
            return false;
        } else {
            return (mixed_var !== null) && (typeof( mixed_var ) == 'object');
        }
    }


    $('#send').on('click', sendMessage);

    window.setInterval(function(){

        update();

    },1000);

})
