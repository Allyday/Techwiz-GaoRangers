@extends('layout_admin.base')

@section('content')

<div class="dark-mode">
    <div class="wrapper">

        <!-- chat content -->
        <!-- Content Wrapper. Contains page content -->
        <div class="container mt-5">

            <!-- /.card -->
            <div class="row">


                <div class="col-md-6 chat-box" @if ($user['type']==1) hidden @endif>
                    <!-- DIRECT CHAT -->
                    <div class="card direct-chat direct-chat-warning" style="height: 400px">

                        <div class="card-header">
                            <h3 class="card-title" id="nameOfReceiver">Chat App</h3>
                            <h3 hidden id="receiverUser"> @if ($user['type']==2) _1admin1 @endif </h3>

                            <div class="card-tools">
                                {{-- <span title="3 New Messages" class="badge badge-warning">3</span> --}}
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button> --}}

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="text-center">
                                <a id="loadMore" href="javascript:void(0)" onclick="loadMore()">Load more</a>
                            </div>

                            <div class="direct-chat-messages" id="messChat">

                                @if (count($data) == 0)
                                <div class="direct-chat-msg" id="chatFromAdmin">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">Admin</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="{{ asset('chatapp/dist/img/user1-128x128.jpg') }}" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        How can i help you ?
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                @endif

                            </div>
                            <!--/.direct-chat-messages-->

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <!-- form text -->
                            <form method="POST">
                                @csrf

                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">

                                    <span class="input-group-text" onclick="alert('chua co microphone()')" style="cursor: pointer;">
                                        <i class="fas fa-microphone"></i>
                                    </span>

                                    <span class="input-group-text btn-submit" style="color: blue;cursor: pointer;">
                                        Send
                                    </span>

                                </div>
                            </form>
                            <!-- end form text -->
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!--/.direct-chat -->
                </div>
                <!-- /.col -->


                @if ($user['type'] == 1)
                <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Members</h3>

                            <div class="card-tools">
                                <span class="badge badge-danger"> <span id="numberUser">8</span> New Members</span>
                                <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button> -->
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0" style="max-height: 300px; overflow:auto">
                            <ul class="users-list clearfix" id="icon_user">

                                @foreach ($users as $item)

                                @if ($item['userName'] != $user['userName'])
                                <li>
                                    <img src="{{ asset('images/blank-profile-picture.png') }}" alt="User Image">
                                    <a onclick="loadChatUser('{{ $item['userName'] }}')" class="users-list-name " type="button">{{ $item['firstName']." ".$item['lastName'] }}</a>
                                    <span class="list-user" user-name="{{ $item['userName'] }}">Offline</span>
                                </li>
                                @endif

                                @endforeach

                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a id="loaduser" onclick="loadUser()" href="javascript:void(0)">Load More User</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!--/.card -->
                </div>
                <!-- /.col -->
                @endif


            </div>

            <!-- /.row -->
        </div>
        <!-- end chat content -->

    </div>
    <!-- ./wrapper -->

    <!-- script -->
    <!-- jQuery -->
    <script src="{{ asset('chatapp/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('chatapp/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('chatapp/dist/js/adminlte.js') }}"></script>
    <!-- end script -->

    <!-- script by hand -->
    <!-- cdn socket.io -->
    <script src="https://cdn.socket.io/4.1.1/socket.io.min.js" integrity="sha384-cdrFIqe3RasCMNE0jeFG9xJHog/tgOVC1E9Lzve8LQN1g5WUHo0Kvk1mawWjxX7a" crossorigin="anonymous"></script>

    <!-- send form use ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script type="text/javascript">
        $(function () {
           
            var ip_address = '127.0.0.1';
            var socket_port = '8005';
            var socket = io(ip_address + ":" + socket_port);
            
            socket.on('connect', ()=>{
                socket.emit('user_connected', currentUser);
            })

            // lấy danh sách các user active
            socket.on('updateUsers', (data) => {
                // console.log(data);
                // remove class trc khi add
                let status = $('.list-user');
                status.removeClass('changeColor');

                // xem thằng nào on thì add class active để có nút màu xanh 
                data.forEach(ele => {
                    status.each(index=>{
                        if($(status[index]).attr('user-name') == ele['user_name']){
                            $(status[index]).addClass('changeColor');
                            $(status[index]).text('Online');
                        }
                    })

                });

            })

            socket.on('private-channel:dataMessage', function (data){
                // console.log('private-channel:',data);
                let receiver = $('#receiverUser').text().trim();

                $.ajax({
                type:'GET',
                url:`{{ route('get.receiver') }}?receiver=${receiver}`,
                })
                .done(function(user) {
                     // append mess receiver here
                    messReceiver(user['userName'], data['created_at'], user['picture'], data['message'])

                })
                .fail((jqXHR, ajaxOptions, thrownError) => {
                    // alert('Something went wrong, try again later!');
                });

            })

        })
    </script>


    <script type="text/javascript">
        const user_image = "{{ $user['picture'] }}";
        var page_user = 1;
        var page_mess = 1;
        const currentUser = "{{ $user['userName'] }}";
        var typeUser = "{{ $user['type'] }}";




        function messReceiver(username, time, image, mess){
            var row = `<div class="direct-chat-msg" style="max-width:80%">
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="{{ asset('images/${image}') }}" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                ${mess}
                            </div>
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-timestamp ">${(new Date( Date.parse(time) )).toLocaleString('vi-VN')}</span>
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>`;

            document.getElementById('messChat').innerHTML += row;
        }
   
        function messSender(username, time, image, mess){
            let row = `<div class="direct-chat-msg right" style="margin-left:20%;text-align:end">
                           
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="{{ asset('images/${image}') }}" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                ${mess}
                            </div>
                            <div class="direct-chat-infos clearfix">
                                
                                <span class="direct-chat-timestamp float-right">${(new Date( Date.parse(time) )).toLocaleString('vi-VN')}</span>
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>`;

            document.getElementById('messChat').innerHTML += row;
        }

        function appendUser(img, username, firstname, lastname){
            let row =  `<li>
                            <img src="{{ asset('images/blank-profile-picture.png') }}" alt="User Image">
                            <a onclick="loadChatUser('${username}')" class="users-list-name " type="button">${firstname+" "+lastname}</a>
                            <span class="list-user" user-name="${username}">Offline</span>
                        </li>`;
            document.getElementById('icon_user').innerHTML += row;
        }

        // voice recognize to text
        function record() {
            var recognition = new webkitSpeechRecognition();
            recognition.lang = "vi-VN";

            recognition.onresult = (event) => {
                let res_text = event.results[0][0].transcript;
                console.log(res_text);
                $("input[name='message']").val(res_text)
            }
            recognition.start()
        }

        function microphone(){
            record();
        }

        function loadUser(){
            page_user++;

            $.ajax({
                type:'GET',
                url:"{{ route('get.chat') }}"+"?page="+page_user,
            })
            .done(function(data) {
                // console.log(data);
                if (data.length == 0){
                    $('#loaduser').attr('hidden', 'hidden');
                }
                data.forEach(ele => {
                    appendUser('img', ele['userName'], ele['firstName'], ele['lastName']);
                });
                $('#numberUser').text($('#icon_user').children().length)
            })
            .fail((jqXHR, ajaxOptions, thrownError) => {
                // alert('Something went wrong, try again later!');
            });
           
        }

        function loadMore(){
            page_mess++;
            let receiver = $('#receiverUser').text().trim();
            
            $.ajax({
                type:'GET',
                url:`{{ route('get.more.message') }}?page=${page_mess}&sender=${currentUser}&receiver=${receiver}`,
            })
            .done(function(data) {
                if(data[0].length==0){
                    $('#loadMore').attr('hidden', 'hidden');
                    return
                }
                // add data in chat box
                data[0].forEach(ele => {
                    if (ele['sender_username'] == currentUser){
                        messSender( currentUser, ele['created_at'], user_image, ele['message'])
                    }
                    else {
                        messReceiver( receiver, ele['created_at'], data[1]['picture'], ele['message'])
                    }
                });

            })
            .fail((jqXHR, ajaxOptions, thrownError) => {
                // alert('Something went wrong, try again later!');
            });

        }

        function loadChatUser(username){
            // when click another user
            $('#nameOfReceiver').text('Chat App')
            $('#messChat').html("")
            page_mess = 1
            
            // load data
            $.ajax({
                type:'GET',
                url:"http://127.0.0.1:8000/chat/get/"+username,
            })
            .done(function(data) {
               
                // handle box chat
                $('.chat-box').removeAttr('hidden');
                $('#chatFromAdmin').attr('hidden', 'hidden');
                $('#nameOfReceiver').text(data[1]['firstName']+' '+data[1]['lastName']);
                $('#receiverUser').text(data[1]['userName']);
                $('#loadMore').removeAttr('hidden');

                if(data[0].length==0){
                    $('#loadMore').attr('hidden', 'hidden');
                    // return
                }

                // add data in chat box
                data[0].forEach(ele => {
                    if (ele['sender_username'] == currentUser){
                        messSender( currentUser, ele['created_at'], user_image, ele['message'])
                    }
                    else {
                        messReceiver( currentUser, ele['created_at'], data[1]['picture'], ele['message'])
                    }
                });

            })
            .fail((jqXHR, ajaxOptions, thrownError) => {
                // alert('Something went wrong, try again later!');
            });
        }


        function submitAjax(){
            var text = $("input[name=message]").val();
            let check = text.trim()
            // validate
            if (check.length == 0){
                console.log('please type something ...')
                return
            }

            var _token = $("input[name=_token]").val();

            let receiver = $('#receiverUser').text().trim();

            var sender = "{{ $user['userName'] }}";

            var sendData = {sender:sender, receiver:receiver, text:check, "_token":_token};
            $("input[name=message]").val("")

            $.ajax({
                type:'POST',
                url:"{{ route('post.chat') }}",
                data:sendData,
                dataType: "json"
            })
            .done(function(data) {
                messSender(currentUser, data['created_at'], user_image, data['message']);
            })
            .fail((jqXHR, ajaxOptions, thrownError) => {
                // alert('Something went wrong, try again later!');
            });
        }

        $( document ).ready(function() {
            
            $("form").keypress(function(e){
                if(e.keyCode == 13) {
                    e.preventDefault();
                    submitAjax()
                }
            })
            

            $(".btn-submit").click(function(e){
                e.preventDefault();
                submitAjax()
            });

        });
    </script>

    @foreach ($data as $item)
    @if ($item['sender_username'] == $user['userName'])
    <script>
        messSender( "{{ $user['userName'] }}", "{{ $item['created_at'] }}", "{{ $user['picture'] }}", "{{ $item['message'] }}")
    </script>
    @else
    <script>
        messReceiver( "Admin", "{{ $item['created_at'] }}", "user1-128x128.jpg", "{{ $item['message'] }}")
    </script>
    @endif
    @endforeach
</div>
@endsection