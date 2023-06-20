@extends('user.user_master')

@section('user_page')
    <title>I</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@stop

@section('user-main-content')
    <div class="container">
        <div class="row mb-4 mt-3">
            <!-- Top row -->
            <div class="col-xl-12 px-2 top-part">
                <div class="row align-items-center">
                    <div class="col-xl-3 all-conv">
                        <div class="all-box">
                            <div class="conv-search d-flex justify-content-between align-items-center">
                                <div class="conversation">
                                    All Conversations ( {{ count( $senders ) }} )
                                </div>
                                <div class="search">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="search-box">
                            <div class="search-close d-flex justify-content-between align-items-center">
                                <form style="w-75">
                                    <input type="text" class="form-control" id="search-user"
                                        placeholder="Search for a username">
                                </form>
                                <span role="button" class="close-search">Close</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 p-0 middle-info-top">
                        <div class="caht-topper d-flex justify-content-between align-items-center">
                            <div class="left">
                                <div class="username d-flex justify-content-start align-items-center">
                                    <span class="online-status"></span>
                                    <a href="#">
                                        <strong class="name">{{ $user->USER_FNAME }}</strong>
                                    </a>
                                    <span class="user-name">{{ '@' . $user->USERNAME }}</span>
                                </div>
                                <div class="metas">
                                    <span class="status-text">
                                        <!-- Calculating later -->
                                        online
                                    </span>
                                    <span class="timestamp">Local time:
                                        {{ $user->getLocaleTime('M d, Y, H:i A') }}
                                    </span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="button-groups">
                                    {{-- <button class="tag btn">
                                        @include('chat.icons.tag')
                                    </button>
                                    <button class="star btn">
                                        @include('chat.icons.star')
                                    </button> --}}
                                    <button class="dots btn" id="delete-conversation">
                                        Delete Conversation
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bottom row -->
            <div class="col-xl-12">
                <div class="row">

                    <div class="col-xl-3 left-senders">
                        <!-- List Conversation module -->
                        @include('chat.modules.senders', compact('senders'))
                    </div>

                    <div class="col-xl-6 p-0 middle-box">
                        <div class="loadmore">
                            <button class="btn btn-outline-primary">Load More</button>
                        </div>
                        <div class="chatbox">
                            @include('chat.modules.conversations', compact('conversations'))
                        </div>
                        <div class="chat-machine">

                            {{-- Back to bottom --}}
                            <a href="#" class="back-to-bottom btn btn-primary btn-sm">
                                @include('chat.icons.angle-down')
                            </a>

                            <form class="chat-form">
                                @csrf
                                <!-- Hidden inputs -->
                                <input type="hidden" name="media" value="">
                                <input type="hidden" name="replied_to" value="{{ $user->USER_ID }}">
                                <textarea id="message" name="message" class="form-control"></textarea>
                                <!-- Preview Images -->
                                <div class="preview"></div>

                                <ul class="machineries">
                                    <li>
                                        <div class="emoji-wraper">
                                            <div class="search">
                                                <input type="text" id="searchInput" class="form-control" placeholder="Search Imoji">
                                            </div>
                                            <div class="list-emojis"></div>
                                        </div>
                                        <button type="button" class="emoji">
                                            @include('chat.icons.emoji')
                                        </button>
                                    </li>
                                    <li>
                                        <input type="file" multiple name="media" id="media">
                                        <button type="button" class="media">
                                            @include('chat.icons.media')
                                        </button>
                                    </li>
                                    <li>
                                        <div class="quick-response-wrap">
                                            <div class="search">
                                                <input type="text" id="quickSearch" class="form-control" placeholder="Search...">
                                            </div>
                                            <div class="responses">
                                                
                                                <div class="response-items-wrap">
                                                    <!-- Quick response generate -->
                                                    @include('chat.modules.quick-response',[
                                                        'responses' => $quick_responses
                                                    ])
                                                    <!-- Quick response generate end -->
                                                </div>
                                                
                                                <div class="add-response-btns">

                                                    <button class="add-response" type="button">Add new response
                                                        @include('chat.icons.plus')</button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="quick-response">
                                            @include('chat.icons.response')
                                        </button>
                                    </li>
                                    <!-- Check if there is a active offer -->
                                    <li>
                                        @if ( ! session('user')->hasOrder() ) 
                                            <button type="submit" class="send-offer">Create An offer</button>
                                        @else 
                                            <span role="button" class="btn btn-secondary btn-sm" style="cursor:default;">Create An offer</span>
                                        @endif
                                    </li>

                                    <li>
                                        <button type="submit" disabled class="send">send</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 right-info pt-4">
                        <h3 class="about">About <a href="#">{{ $user->USER_FNAME }}</a></h3>
                        <div role="table" class="info-table">
                            <p role="row" class="d-flex justify-content-between align-items-center">
                                <span>From</span>
                                <strong>{{ $user->address->ADDRESS_COUNTRY }}</strong>
                            </p>
                            <p role="row" class="d-flex justify-content-between align-items-center">
                                <span>On Fiverr Since</span>
                                <strong>Avg {{ $user->created_at->format('Y') }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Offer sending modal -->

        @if ( ! empty( $gigs ) && ! session('user')->hasOrder()) 
            @include('chat.modules.offer');
        @endif

        <!-- Add response modal -->
        <div class="modal fade" id="AddResponse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="modal-content" id="add-response-form"  method="POST">
                        @csrf
                        <input type="hidden" name="edit_id" value="">
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="text" name="name" placeholder="Name the quick response" class="form-control" required>
                            </div>

                            <div class="form-group mt-5">
                                <textarea name="quick_response" class="form-control" placeholder="Your quick response" required></textarea>
                            </div>

                            <small class="mt-3 d-block">
                                Use these placeholder {username}
                            </small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Add response modal end -->
    </div>
</div>
@stop


@section('user_script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(window).on('load input submit change click', e => {
        
            // search senders by username
            if ( e.type == 'input' && e.target == $('#search-user')[0]) {
                const searchTerm = $(e.target).val().toLowerCase();

                $('.sender-lists li').each(function() {

                    const username = $(this).data('user').toLowerCase();
                    const fname    = $(this).data('name').toLowerCase();

                    if (username.includes(searchTerm) || fname.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            if ( e.type == 'input' && e.target != $('#message')[0] )  {
                return;
            }

            if ( e.type == 'submit' && e.target == ( form = $('.chat-form')[0] ) ) {

                e.preventDefault();
                
                if ( $('#message').val().trim() == "" ) {
                    Swal.fire({
                        title: 'Error!',
                        text: "Type something at least 5 charecters",
                        icon: 'error',
                        confirmButtonText: 'Cool'
                    });

                    return;
                }

                $('.send').attr('disabled', true).text('Sending...');
                $('.machineries button').attr('disabled', true);
                $('#message').attr('readonly', true);
                $('.quick-response').attr('readonly', true);
                $('.send-offer').attr('disabled', true);
                
                $.ajax({
                    url      : "{{ route('chat.store') }}",
                    data     : $(form).serialize(),
                    type     : 'POST',
                    complete : function(){
                        $('.send').attr('disabled', true).text('Send');
                        $('.machineries button').attr('disabled', false);
                        $('#message').attr('readonly', false).val('');
                        $('.quick-response').attr('readonly', false);
                        $('.send-offer').attr('disabled', false);
                        $('.preview').html('');
                        $(form).find('input[name="media[]"]').remove();
                    }
                });
            }

            //offer accept
            if ( e.type == 'submit' && $(e.target).hasClass('offer-accept-form') ) {

                e.preventDefault();

                $.ajax({
                    url      : "{{ route('chat.offer-accept') }}",
                    data     : $(e.target).serialize(),
                    type     : 'POST',
                    complete : function(){
                       
                    }
                });

            }

            // delete conversation
            if ( e.type == 'click' && e.target == $('#delete-conversation')[0] ) {
                Swal.fire({
                            title: 'Warning!',
                            text: 'Do you want to delete conversation',
                            icon: 'warning',
                            confirmButtonText: 'Yes',
                            showCancelButton: true,                
                }).then(event => {
                    if ( event.isConfirmed ) {
                        $.ajax({
                            url      : '{{route("chat.delete")}}',
                            headers  : {'X-CSRF-TOKEN' : '{{ csrf_token() }}'},
                            type     : 'post',
                            complete : function(){

                            }
                        });
                    }
                })
            }

            if ( e.type == 'click' && ( e.target == $('.search')[0] || e.target == $('.close-search')[0] )) {
                $('.search-box').toggle();
                $('.all-box').toggle();
            } 

            if ( e.type == 'click' && e.target == $('.back-to-bottom')[0] ) {
                $(".chatbox").animate({
                    scrollTop: $('.chatbox')[0].scrollHeight
                }, "slow");
            }


            //cahnge submit button status from disable to normal when some text is given in text box
            if ( $('#message').val() !== "" && $('#message').val().length > 5) {
                $('.send').removeAttr('disabled title');
            } else {
                $('.send').attr({
                    disabled : true,
                    title    : 'At least 5 charecters'
                })     
            }

        });


        $('.chatbox').scroll(function() {
            // Get the scroll position
            var scrollTop = $(this).scrollTop();

            // Get the "Scroll to Bottom" button element
            var scrollToBottomButton = $(".back-to-bottom");
           
            // Check if the scroll position is at the top of the page
            if (scrollTop < 100) {
                // Show the button
                scrollToBottomButton.show();
            } else {
                // Hide the button
                scrollToBottomButton.hide();
            }
        });


        $(function() {

            $(".chatbox").animate({
                scrollTop: $('.chatbox')[0].scrollHeight
            }, "slow");
        
            //add quick response
            $('#add-response-form').on('submit',function(e){

                e.preventDefault();
                const $this = this;

                $.ajax({
                    url  : "{{ route('chat.add-quick-response') }}",
                    type : 'POST',
                    data : $(this).serialize(),
                    success : function( data ){
                        $('.response-items-wrap').html( data.response );
                        //call quick response to add the event with newly added
                        quickResponseAction();
                        $($this).trigger("reset");
                        $('#AddResponse').modal('hide');
                        $('.quick-response').click();
                    },
                    error : function(error){

                        const { status,message } = JSON.parse(error.responseText);
                    
                        Swal.fire({
                            title: 'Error!',
                            text: message,
                            icon: 'error',
                            confirmButtonText: 'Cool'
                        })

                    }
                });

            });

            //sending offer as well as offer message
            $('#offer-send-form').on('submit',function(e){

                e.preventDefault();
                const $this = this;

                $.ajax({
                    url     : "{{ route('chat.offer-send') }}",
                    type    : 'POST',
                    data    : $(this).serialize(),
                    success : function( data ){
                        const { messsage,status } = data;
                        $('#OfferModal').modal('hide');
                        $($this).trigger("reset");
                    },
                    error   : function(error){
                        const { status,message } = JSON.parse(error.responseText);
                        Swal.fire({
                            title: 'Error!',
                            text: message,
                            icon: 'error',
                            confirmButtonText: 'Cool'
                        })
                    }
                });
            });

            quickResponseAction();

            //quick response actions
            function quickResponseAction(){

                $('.actions-btn button').on('click',function(e) {
                    
                    e.preventDefault();

                    const action = $(this).data('action');
                    const id     = $(this).data('id');
                    const $this = this;

                    if ( action == 'delete' ) {
                        $.ajax({
                            url     : `{{ route("chat.delete-quick-response",['']) }}/${id}`,
                            type    : 'GET',
                            success : function(data){
                               $($this).parent().parent().remove();
                            }
                        })
                    }

                    if ( action == 'edit' ) {
                        const responseText = $(this).parent().parent().data('text');
                        const responseTitle = $(this).parent().parent().data('title');
                        $('#AddResponse textarea[name="quick_response"]').val( responseText );
                        $('#AddResponse input[name="name"]').val( responseTitle );
                        $('#AddResponse input[name="edit_id"]').val( $(this).data('id') );
                        $('#AddResponse').modal('show');

                    }

                });

            }

            //trigger offer creating modal
            $('.send-offer').on('click',function(e){
                e.preventDefault()
                $('#OfferModal').modal('show');
            });

            //trigger add response modal
            $('.add-response').on('click',function(e){
                e.preventDefault()
                $('#AddResponse').modal('show');
            });

            /*
                Load emoji
            */

            $(document).on('click', function(e) {
                if (e.target == $('.emoji')[0]) {

                    $('.emoji-wraper').toggle();

                    if ($('.list-emojis').html() == "") {
                        $('.list-emojis').html('Loading...');
                        $.ajax({
                            url: '{{ route('chat.emojis') }}',
                            method: 'GET',
                            success: function(data) {
                                $('.list-emojis').html(data);
                            }
                        })
                    }
                } else {
                    if (!$('.emoji-wraper')[0].contains(e.target)) {
                        $('.emoji-wraper').hide();
                    }
                }

                if ( $(e.target).hasClass('emoji-icon') ) {
                    const message = $('#message').val();
                    $('#message').val(message + " " + $(e.target).data('code'));
                }
            });

            //search emoji
            $('#searchInput').on('input', function() {

                const searchTerm = $(this).val().toLowerCase();

                $('.list-emojis span').each(function() {
                    const dataText = $(this).data('name').toLowerCase();

                    if (dataText.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

            });

            // load quick responses
            $(document).on('click', function(e) {
                if (e.target == $('.quick-response')[0]) {

                    $('.quick-response-wrap').toggle();
                    
                } else {
                    if (!$('.quick-response-wrap')[0].contains(e.target)) {
                        $('.quick-response-wrap').hide();
                    }
                }

                //responses
                if ( $(e.target).hasClass('quick-response-item') ) {
                    e.preventDefault();
                    const message = $('#message').val();
                    $('#message').val(message + " " + $(e.target).data('text'));
                    $('.quick-response-wrap').hide();
                }
            });

             //search quick response
            $('#quickSearch').on('input', function() {

                const searchTerm = $(this).val().toLowerCase();

                $('.responses ul li').each(function() {
                    const dataText  = $(this).data('text').toLowerCase();
                    const dataTitle = $(this).data('title').toLowerCase();

                    if (dataText.includes(searchTerm) || dataTitle.includes( searchTerm )) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

            });

            //icons and types
            const icons = {
                'image': '<i class="fa fa-image"></i>',
                'application': '<i class="fa fa-file"></i>',
                'video': '<i class="fa fa-video"></i>',
                'default': '<i class="fa fa-file-excel"></i>'
            }

            // upload media with chat
            $('.media').on('click', e => $('#media').click());

            $('#media').on('change', function(e) {
                e.preventDefault();
                
                var files = e.target.files;

                //apending files in form data to upload
                //its for show progress for every single file 

                // go through every file and and upload them with progress event
                $.each(files, function(index, file) {

                    var xhr = new window.XMLHttpRequest();

                    const {
                        size,
                        type,
                        name
                    } = file;

                    $('.preview').append(`
                        <div id="id-${index}" class="uploaded-media overlay-loader">
                            <div class="progress">
                                <span class="progress-bar-${index}"></span>
                            </div>
                            <button class="abort abort-${index}">x</button>
                            <div class="preview-item" title="${name}">
                                ${ icons[type.split('/')[0] ? type.split('/')[0] : 'default'] }
                                ${ name.length > 10 ? name.substr(0,10) + '...' : name }
                            </div>
                        </div>
                    `);

                    //abort uploading
                    $(`.abort-${index}`).on('click', function(e) {

                        e.preventDefault();
                        var fileId = $(this).data('id');

                        //if fileid not set then it seems not saved database yes
                        if (!fileId) {

                            // abort uploads
                            xhr.abort();

                            // remove preview image which already set
                            $(`#id-${index}`).remove();

                            return;
                        }

                        //sending ajax request to the backend to delete corresponding file
                        $.ajax({
                            url: "{{ route('chat.delete-media') }}",
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'applicatio/json'
                            },
                            data: JSON.stringify({
                                id: fileId
                            }),
                            success: function(data) {

                                const {
                                    status,
                                    message
                                } = data;

                                if (status == 'success') {
                                    $(`#id-${index}`).remove();
                                }

                                if (status == 'error') {

                                    Swal.fire({
                                        title: 'Error!',
                                        text: message,
                                        icon: 'error',
                                        confirmButtonText: 'Cool'
                                    })

                                }

                            }
                        })

                    });

                    // Add an event listener to track the progress of each file
                    xhr.upload.addEventListener('progress', function(event) {
                        if (event.lengthComputable) {

                            //show progress on every preview single image
                            var progress = Math.round((event.loaded / event.total) * 100);

                            //change progress bar value
                            $(`.progress-bar-${index}`).css({
                                width: progress + '%'
                            })

                            $('.send').attr('disabled',true);
                            $('.send').text('uploading...')
                        }
                    });

                    // Add an event listener to handle the response after each file upload
                    xhr.addEventListener('load', function(event) {
                        try {
                            const response = JSON.parse(event.target.responseText);

                            const {
                                message,
                                id,
                                status
                            } = response;

                            if (status == 'error') {
                                throw message;
                            }

                            //add input with file id
                            $('.chat-form').append(`<input type="hidden" name="media[]" value="${id}">`);

                            $(`.abort-${index}`).attr('data-id', id);

                        } catch (error) {
                            Swal.fire({
                                title: 'Error!',
                                text: error,
                                icon: 'error',
                                confirmButtonText: 'Cool'
                            })
                        }

                        // remove progress var and overlay class when uploading complete
                        $(`#id-${index} .progress`).remove();
                        $('.send').attr('disabled',false);
                        $('.send').text('Send');

                    });

                    // Add an event listener to handle errors during file upload
                    xhr.addEventListener('error', function(event) {
                        $('.send').attr('disabled',false);
                        $('.send').text('Send');
                    });

                    const formData = new FormData();
                    formData.append('file', file);

                    xhr.open('POST', '{{ route('chat.media') }}');
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    xhr.send(formData);

                });

            });

            //Check if user leving the window uploading some medias
            //The purpose to delete these medias is not to make 
            //database havey

            window.addEventListener('beforeunload', function(event) {

                if ($('.abort').length == 0) {
                    return;
                }

                let ids = [];

                $('.abort').each((index, item) => {

                    ids.push($(item).data('id'));

                });

                //sending ajax request to the backend to delete corresponding file
                $.ajax({
                    url: "{{ route('chat.delete-media') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'applicatio/json'
                    },
                    data: JSON.stringify({
                        id: ids
                    }),
                })

                event.preventDefault();

                // Customize the confirmation message
                event.returnValue = 'Are you sure you want to leave this page?';

            });

        });
    </script>
@endsection
