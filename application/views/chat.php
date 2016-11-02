

<style type="text/css">
.glyphicon {
  top:0;
}
.message_template, .chat_template{
  display: none
}
.col-sm-2.chatBar {
    background-color: #e9ebee;
    border: 1px solid #ccc;
    overflow-x: auto;
    overflow-y: scroll;
    position: fixed;
    right: 0;
}
   .chat-section {
   bottom: 0;
   left: 0;
   margin: 0;
   /*max-height: 300px;*/
   position: fixed;
   right: 0;
   width:83%;
   height: 319px;
   /*border: 1px solid green;*/
   }
   
.chat_window {
    bottom: 0;
    left: auto;
    max-height: 320px;
    position: relative;
    float: right;
    width: 250px;
    border-radius: 6px 6px 0 0;
    padding-left: 10px;
}
.message-section{
border: 1px solid #ccc;
border-bottom-style: hidden;
border-top-style: hidden;
}
.bottom_wrapper.clearfix {
    /*border: 1px solid blue;*/
    bottom: 0;
    position: relative;
    width: 100%;
}
.messages {
    height: 250px;
}
.top_menu {
   background-color:  #0095dd;
   width: 100%;
   height:35px; 
    font-size: 15px;
    border-radius: 6px 6px 0 0;
    color: white;
    cursor: pointer;
   }
   .input-group .form-control , .input-group-btn .btn{
      border-radius: 0px ;
   }

/*  .top_menu .buttons {
   margin: 3px 0 0 20px;
   position: absolute;
   }*/
   .top_menu > div {
    padding: 6px 5px 0 10px;
}
   .top_menu .button {
   /*width: 15px;*/
   /*height: 15px;*/
   border-radius: 50%;
   display: inline-block;
   /*margin: 1px 1px 0 0;*/
   margin:4px;
   position: relative;
   }
   .closeIt {
   /*background-color: #f5886e;*/
   text-align: center;
   }
   .minimize {
   background-color: #fdbf68;
   }
   .maximize {
   background-color: #a3d063;
   }
   .top_menu .title {
   color: #bcbdc0;
   font-size: 20px;
   }



   .messages {
   position: relative;
   list-style: none;
   padding: 20px 10px 0 10px;
   margin: 0;
   background-color: #FFFFFF;   
    overflow-x: auto;
    overflow-y: scroll;
   }
   .messages .message {
   clear: both;
   overflow: hidden;
   margin-bottom: 20px;
   transition: all 0.5s linear;
   opacity: 0;
   }
   .messages .message.left .avatar {
   background-color: #f5886e;
   float: left;
   }
   .messages .message.left .text_wrapper {
   background-color: #ffe6cb;
   margin-left: 20px;
   }
   .messages .message.left .text_wrapper::after, .messages .message.left .text_wrapper::before {
   right: 100%;
   border-right-color: #ffe6cb;
   }
   .messages .message.left .text {
   color: #c48843;
   }
   .messages .message.right .avatar {
   background-color: #fdbf68;
   float: right;
   }
   .messages .message.right .text_wrapper {
   background-color: #c7eafc;
   margin-right: 20px;
   float: right;
   }
   .messages .message.right .text_wrapper::after, .messages .message.right .text_wrapper::before {
   left: 100%;
   border-left-color: #c7eafc;
   }
   .messages .message.right .text {
   color: #45829b;
   }
   .messages .message.appeared {
   opacity: 1;
   }
   .messages .message .avatar {
   width: 40px;
   height: 40px;
   border-radius: 50%;
   display: inline-block;
   }
   .online{
   width: 10px;
   height: 10px;
   border-radius: 50%;
   display: inline-block;
   background-color: green;

   }
   .offline{
   width: 10px;
   height: 10px;
   border-radius: 50%;
   display: inline-block;
   background-color: green;

   }
   .messages .message .text_wrapper {
   display: inline-block;
   padding: 10px;
   border-radius: 6px;
   width: calc(100% - 85px);
   min-width: 100px;
   position: relative;
   }
   .messages .message .text_wrapper::after, .messages .message .text_wrapper:before {
   top: 7px;
   border: solid transparent;
   content: " ";
   height: 0;
   width: 0;
   position: absolute;
   pointer-events: none;
   }
   .messages .message .text_wrapper::after {
   border-width: 13px;
   margin-top: 0px;
   }
   .messages .message .text_wrapper::before {
   border-width: 15px;
   margin-top: -2px;
   }
   .messages .message .text_wrapper .text {
   font-weight: 300;
   }
   .user_name{float:left;width:70%;}
   .closeChat{float:left;width:30%;text-align: right;}
         
         
</style>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-10 col-xs-6">
      welcome <?php echo $this->session->userdata('userName'); ?> !
         <ul>
         <?php for($i=0; $i<100; $i++){ ?>
            <li>
               itea1 itea1 itea1 itea1 itea1 itea1 itea1 itea1 itea1 itea1 itea1 itea1 itea1 
            </li>
            <?php } ?>
          </ul>
      </div> 
      <div class="col-sm-2 chatBar col-xs-6">
         <ul>
         <?php foreach($users  as $user){ $conv_result=$this->appMod->checkConvExists($user['id']); ?>
            <li data-user-name="<?php echo $user['name']; ?>" data-user-id="<?php echo $user['id']; ?>" data-conv-id="<?php echo $conv_result; ?>" onclick="fetchConversation('<?php echo $user['id']; ?>','<?php echo $conv_result; ?>',$(this))" >
               <?php echo $user['name'].' - '.$user['status'];  ?>
            </li>
            <?php } ?>
         </ul>
      </div>
   </div>
   <div class="chat-section">
      <div class="chat_window">
         <div class="top_menu">
         <div class="user_name">chat</div>
         <div class="closeChat"> 
            <div class="button closeIt glyphicon glyphicon-remove"></div>
          </div>
         </div>
         <div class="message-section">
          <ul class="messages conv_18"></ul>
         </div>
         <div class="bottom_wrapper clearfix">
            <div class="message_input_wrapper">
              <div class="input-group">
                <input type="text" class="form-control message_input" placeholder="Type here...">
                <span class="input-group-btn">
                  <button class="btn btn-primary send_message glyphicon glyphicon-send" type="button" onclick="updateConv('18',$(this))"></button>
                </span>
              </div>
            </div>
         </div>
      </div>
      <div class="message_template">
         <li class="message">
            <div class="avatar"></div>
            <div class="text_wrapper">
               <div class="text"></div>
            </div>
         </li>
      </div>
   </div>
</div>
<div class="chat_template">
         <div class="top_menu">
         <div class="user_name">chat</div>
         <div class="closeChat"> 
            <!-- <span class="button minimize">X</span>
            <span class="button close">X</span> -->
            <div class="btn-group">
               <div class="button closeIt glyphicon glyphicon-remove"></div>
            </div>
          </div>
         </div>
         <div class="message-section">
          <ul class="messages"></ul>
         </div>
         <div class="bottom_wrapper clearfix">
            <div class="message_input_wrapper">
              <div class="input-group">
                <input type="text" class="form-control message_input" placeholder="Type here...">
                <span class="input-group-btn">
                  <button class="btn btn-primary send_message glyphicon glyphicon-send" type="button"></button>
                </span>
              </div>
            </div>
         </div>
      </div>
<script type="text/javascript">
   $(document).ready(function(){
      setInterval(function(){ checkForNewMessage(); }, 2000);      
   });
   function updateConvFlag(conv_id,flag){
     $.ajax({
       url:"<?php echo base_url('appCtr/updateConvFlag');?>",
       type: "POST",
       data:{conv_id:conv_id,flag:flag},
       success:function(result){
         console.log(result);
         // $('body').append("<h1>"+result+"</h1>");
   
       }
     });
   }
   
</script>
<script type="text/javascript">
   (function () {
     var Message;
     Message = function (arg) {
         this.text = arg.text, this.message_side = arg.message_side, this.message_section=arg.message_section;
         this.draw = function (_this) {
             return function () {
                 var $message;
                 $message = $($('.message_template').clone().html());
                 $message.addClass(_this.message_side).find('.text').html(_this.text);
                 this.message_section.append($message);
                 return setTimeout(function () {
                     return $message.addClass('appeared');
                 }, 0);
             };
         }(this);
         return this;
     };
     $(function () {
        var sesion_id='<?php echo $this->session->userdata('userid'); ?>';
        console.log('sesion_id:',sesion_id);
         var getMessageText, message_side, sendMessage;
         message_side = 'right';
         getMessageText = function ($element) {
             var $message_input;
             $message_input =$element.parents('.input-group').find('.message_input');
             return $message_input.val();
         };
         sendMessage = function (text,message_side,$element) {
              $parent=$element.parents('.chat_window');
              $message_input =$parent.find('.message_input');
              $messages = $parent.find('.messages');
             var message;
             if (text.trim() === '') {
                 return;
             }
             $message_input.val('');
             // $messages = $('.messages');
             // message_side = message_side === 'left' ? 'right' : 'left';
             // message_side='right';
             message = new Message({
                 text: text,
                 message_side: message_side,
                 message_section:$messages
             });
             message.draw();
             return $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
         };
        checkForNewMessage = function () {
           $.ajax({
             url:"<?php echo base_url('appCtr/checkForNewMessage');?>",
             type: "POST",
             dataType:"json",
             success:function(result){
              console.log(result);
               if(result){
                    var lr;
                  jQuery.each(result, function(i, val) {console.log('sesion_id:',sesion_id);
                    if(sesion_id==val.created_by){
                      lr='right';
                    }else{
                      lr='left';
                    }
                    console.log(val,lr);
                    var messages=$('.conv_'+val.conv_id);
                    if(messages.html()!=null){
                    sendMessage( val.msg, lr, $('.conv_'+val.conv_id));                     
                    }else{
                      fetchConversation(userId,val.conv_id);
                    }
                    updateSeenBy(val.id,val.seen_by); 
                    // $("#" + i).append(document.createTextNode(" - " + val));

                  });
               }
             }
           });
         };
         $(document).on('click','.send_message', function(e){
             return sendMessage(getMessageText($(this)),'right', $(this));
         });
         $(document).on('keyup','.message_input', function(e){
             if (e.which === 13) {
                  $(this).next().click();
             }
         });
         sendMessage('Hello Philip! :)','right', $('.messages:visible'));
         setTimeout(function () {
             return sendMessage('Hi Sandy! How are you?','left', $('.messages:visible'));
         }, 1000);
         return setTimeout(function () {
             return sendMessage('I\'m fine, thank you!','right', $('.messages:visible'));
         }, 2000);
     });
   }.call(this));


  //  $(window).resize(function(){console.log($(window).innerHeight()/2);
  //     $('.chat_window').css({ height: $(window).innerHeight() })
  // });
$('.chatBar').css({ height: $(window).innerHeight() })

  $(document).on('click','.top_menu', function(){
    
    $(this).parent().find('.message-section, .bottom_wrapper').toggle();

  });
  $(document).on('click','.closeIt', function(){
    
    $(this).parents('.chat_window').hide();

  });

  function fetchConversation(userId,newCon,$this){ 
    console.log(userId,newCon,$this);
    $userName=$this.attr('data-user-name');
    if($('.user_'+userId+'').html()!=null){
      showConv($('.user_'+userId+''));
    }else if(newCon=='newconversation'){alert();
      $clone=$('.chat_template').clone().removeClass('chat_template').addClass('chat_window').addClass('user_'+userId+'').appendTo('.chat-section').show();
      $clone.find('.user_name').text($userName);
      $clone.find('.send_message').attr('onclick','insertConv('+userId+',$(this))');
    }else{
      $.ajax({
         url:"<?php echo base_url('appCtr/fetchConversation');?>",
         type: "POST",
         data:{userId:userId,convId:newCon},
         success:function(result){
          $('.chat-section').append(result);
         }
       });
    }
  }
  function showConv($element){
      $element.show();
      $element.find('.message-section, .bottom_wrapper').show();
  }
  function insertConv(user_id,$this){
    $msg=$this.parent().prev().val();
     $.ajax({
       url:"<?php echo base_url('appCtr/insertConv');?>",
       type: "POST",
       data:{msg:$msg,user_id:user_id},
       success:function(result){
         console.log(result);
         $func="updateConv("+result+",$(this))";
         $this.attr('onclick',$func);
         $this.parents('.chat_window').find('.messages').addClass('conv_'+result+'');
       }
     });
  }
  function updateConv(convId,$this){
    $msg=$this.parent().prev().val();
    $.ajax({
       url:"<?php echo base_url('appCtr/updateConv');?>",
       type: "POST",
       data:{msg:$msg,convId:convId},
       success:function(result){
         console.log(result);
         // setTimeout(function(){ checkForNewMessage(); }, 2000);
       }
     });
  }
  function updateSeenBy(id,seen_by){
    $.ajax({
       url:"<?php echo base_url('appCtr/updateSeenBy');?>",
       type: "POST",
       data:{id:id,seen_by:seen_by},
       success:function(result){
         console.log(result);
         // setTimeout(function(){ checkForNewMessage(); }, 2000);
       }
     });
  }
</script>

