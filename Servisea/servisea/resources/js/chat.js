import './bootstrap';

window.Echo.channel('chat')
    .listen('.message',function(e){
        $.ajax({
            url    :  '/chat/notification',
            method : 'GET',
            success : function(data){
                //render new chat to dom
                const { senderLists,conversations,senders } = data;

                $('.left-senders').html(senderLists);
                $('.conversation').html(`All Conversations (${senders})`);

                var cahtbox = $('.chatbox');

                if ( cahtbox.length > 0 ) {

                    $('.chatbox').html(conversations).animate({
                        scrollTop : $('.chatbox')[0].scrollHeight
                    },"slow");
                    
                }

                notificationAction();

            }
        });
    });

    // this hook will be called when re-render conversation lists

    notificationAction();

    function notificationAction()
    {
        $('.sender-lists li[role="link"]').on('click', function(e) {
            //change message status to read and unread

            if ( $(e.target).hasClass('make-unread') ) {
                e.preventDefault();

                $.ajax({
                    url      : '/caht/change-status',
                    data     : JSON.stringify({
                        unread : $(e.target).data('status'),
                        sender :  $(e.target).data('sender')
                    }),
                    headers  : {
                        'X-CSRF-TOKEN' : $(e.target).data('token'),
                        'Content-Type' : 'application/json'
                    },
                    type     : 'post',
                });
            } else {
                window.location.href = `${$(this).data('url')}`;
            }
        });
    }