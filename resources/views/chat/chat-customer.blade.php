<!-- icon chat -->
<div class="chat-icon-open text-center" style="padding:15px; background: #007EFF; border-radius:50%; position: fixed; bottom: 50px; right:50px; z-index: 9999">
    <span>
        <i class="fas fa-envelope" style="font-size: 45px; color:#eaeaea"></i>
    </span>
    <span class="badge badge-danger icon-new-mess" style="position: absolute; top:10px; right:10px; color:rgb(255, 0, 0);">
        <i class="fas fa-circle"></i>
    </span>
</div>
<!-- end icon chat -->

<div class="col-md-4 chat-box" style="max-width: 550px;max-height:500px; position: fixed; bottom: 30px; right:50px; z-index: 9999">
    <!-- DIRECT CHAT -->
    <div class="card direct-chat direct-chat-warning">

        <div class="card-header d-flex">
            <div style="width:50%">
                <h3 class="card-title" id="nameOfReceiver" style="font-size: 20px; margin-bottom:0;">Chat App</h3>
            </div>

            <h3 hidden id="receiverUser">_1admin1</h3>
            <div class="d-flex" style="width:50%; justify-content:flex-end">
                <span style="padding: 0 10px" class="close-chat-box">
                    <i class="fas fa-times"></i>
                </span>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="height: 300px; overflow:auto">
            <!-- Conversations are loaded here -->
            @if (count($data_chat) > 5)
            <div class="text-center">
                <a id="loadMore" href="javascript:void(0)" onclick="loadMore()">Load more</a>
            </div>
            @endif

            <div class="direct-chat-messages" id="messChat">

                @if (count($data_chat) == 0)
                <div class="direct-chat-msg" id="chatFromAdmin" style="margin-bottom:15px; max-width:80%; display:flex ">
                    <img style="width:40px; height: 40px; border-radius:50%" class="direct-chat-img" src="{{ asset('chatapp/dist/img/user1-128x128.jpg') }}" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text" style="background: #454d55; border-color:#454d55; margin-left:10px; padding: 5px 15px; border-radius:.3rem; color:#fff">
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
                <div class="input-group d-flex text-center" style="justify-content: space-evenly; border: 1px solid #eaeaea;">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control" style="width: 70%; border:none">

                    <span class="input-group-text" onclick="microphone()" style="width:15%; cursor: pointer; padding: 10px 15px;">
                        <i class="fas fa-microphone"></i>
                    </span>

                    <span class="input-group-text btn-submit" style="color: white;cursor: pointer;padding: 10px ;background: #7b7b7b;">
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

            // only admin see
            // socket.on('updateUsers', (data) => {
            // })

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
                    if($('.chat-box').css('display') == 'none'){
                        $('.icon-new-mess').css('display', '');
                    }

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
        var row = `<div class="direct-chat-msg" style=" max-width:80%; display:flex ">
                        <img style="width:40px; height: 40px; border-radius:50%" class="direct-chat-img" src="{{ asset('images/${image}') }}" alt="message user image">
                        <div class="direct-chat-text" style="background: #454d55; border-color:#454d55; margin-left:10px; padding: 5px 15px; border-radius:.3rem; color:#fff">
                            ${mess}
                        </div>
                    </div>
                    <div class="direct-chat-infos clearfix" style="display:flex; font-size: 12px; margin-bottom:15px">
                        <span>${(new Date( Date.parse(time) )).toLocaleString('vi-VN')}</span>
                    </div>`;

        document.getElementById('messChat').innerHTML += row;
    }

    function messSender(username, time, image, mess){
        let row = `<div class="direct-chat-msg right" style="margin-left:20%;flex-direction: row-reverse; max-width:80%; display:flex ; margin-bottom:5px ">
                        
                        <img style="width:40px; height: 40px; border-radius:50%" class="direct-chat-img" src="{{ asset('images/${image}') }}" alt="message user image">
                        <div class="direct-chat-text" style="background: blue; border-color:#454d55; margin-right:10px; padding: 5px 15px; border-radius:.3rem; color:#fff">
                            ${mess}
                        </div>
                    </div>
                    <div class="direct-chat-infos clearfix" style="display:flex; justify-content: flex-end; font-size: 12px; margin-bottom:15px">
                        <span>${(new Date( Date.parse(time) )).toLocaleString('vi-VN')}</span>
                    </div>
                    `;

        document.getElementById('messChat').innerHTML += row;
    }

    
    // voice recognize to text
    function record() {
        var recognition = new webkitSpeechRecognition();
        recognition.lang = "vi-VN";

        recognition.onresult = (event) => {
            let res_text = event.results[0][0].transcript;
            // console.log(res_text);
            $("input[name='message']").val(res_text)
        }
        recognition.start()
    }

    function microphone(){
        record();
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



    function submitAjax(){
        let text = $("input[name=message]").val();
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
        var input_mess =  $("input[name=message]");
        var chat_box = $('.chat-box');
        var chat_icon = $('.chat-icon-open');
        var close_chat_box = $('.close-chat-box');
        var icon_new_mess = $('.icon-new-mess');


        // submit when press enter
        $("form").keypress(function(e){
            if(e.keyCode == 13) {
                e.preventDefault();
                submitAjax()
            }
        })
        
        // submit when click button
        $(".btn-submit").click(function(e){
            e.preventDefault();
            submitAjax()
        });

        // check input`message` when empty
        input_mess.keyup(function() {
            let check = input_mess.val().trim();

            if (check.length > 0){
                $(".btn-submit").css("background-color", 'blue');
                
            }else{
                $(".btn-submit").css("background-color", '#7b7b7b');
            }
        });

        // default chat-box hidden
        chat_box.css('display','none')
        chat_icon.css('display','')
        // function change 
        chat_icon.click(()=> {
            
            chat_icon.css('display','none')
            chat_box.css('display','')
        })
        close_chat_box.click(()=> {
            chat_box.css('display','none')
            icon_new_mess.css('display','none')
            chat_icon.css('display','')
        })


    });
</script>

@foreach ($data_chat as $item)
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