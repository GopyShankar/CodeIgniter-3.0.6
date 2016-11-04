<link rel="stylesheet" href="application/assets/css/chosen.css">
<script src="application/assets/js/chosen.jquery.min.js" type="text/javascript"></script>
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
   /*.chat-section {
   bottom: 0;
   left: 0;
   margin: 0;
   max-height: 350px;
   position: fixed;
   right: 0;
   width:83%;
   height: 319px;*/
   /*border: 1px solid green;*/
   /*}*/
   .chat-section {
   bottom: 0;
   margin: 0;
   /*max-height: 350px;*/
   position: fixed;
   right: 17.4%;
   height: 319px;
   /*border: 1px solid green;*/
   }
.chat_window {
    bottom: 0;
    left: auto;
    height: 100%;
    position: relative;
    float: right;
    width: 250px;
    padding-left: 10px;
}
.top_menu.resize {
    margin-top: 284px;
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
    /*border-radius: 6px 6px 0 0;*/
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
    background-color: #fdbf68;
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
   background-image: url('uploads/<?php echo $this->session->userdata('userimage'); ?>');
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
    .avatar {
   width: 40px;
   height: 40px;
   border-radius: 50%;
   display: inline-block;
   background-size:100%;
   }
   .online{
   width: 10px;
   height: 10px;
   border-radius: 50%;
   display: inline-block;
   background-color: #42B72A;

   }
   .offline{
   width: 10px;
   height: 10px;
   border-radius: 50%;
   display: inline-block;
   background-color: #797C80;

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
  .chatBar li,.chatBar a {
    cursor: pointer;
    }   
    .nopadding {
   padding: 0 !important;
   margin: 0 !important;
}
.list-group-item {
    padding: 5px;
  }
  .chatBar .col-sm-9 {
    padding-top: 9px;
    padding-left: 8px;
}
.chatBar .online , .chatBar .offline {
    margin: 7px 5px 0 0;
}
   <?php foreach($users  as $user){ ?>
    .u_avatar<?php echo $user['id']; ?>{
      background-image: url("uploads/<?php echo $user['image']; ?>");
      }
    <?php } ?>  
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
      <div class="col-sm-2 chatBar col-xs-6 nopadding"><br>
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">Create New Group</button><br>
         <ul class="list-group">
         <?php foreach($users  as $user){ $conv_result=$this->appMod->checkConvExists($user['id']); ?>
            <li  class="list-group-item" data-user-name="<?php echo $user['name']; ?>" data-user-id="<?php echo $user['id']; ?>" data-conv-id="<?php echo $conv_result; ?>" onclick="fetchConversation('<?php echo $user['id']; ?>','<?php echo $conv_result; ?>',$(this))" >
                <div class="row">
                  <div class="col-sm-3">
                    <div class="avatar u_avatar<?php echo $user['id']; ?>"></div>
                  </div>
                  <div class="col-sm-9">
                      <div class="pull-left"><?php echo $user['name'];  ?></div>
                      <span class="pull-right <?php echo $user['status']; ?>"></span>
                  </div>
                </div>
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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Group</h4>
        </div>
        <div class="modal-body">
        <div>
          <label>Choose group members</label>
           <select data-placeholder="Choose group members..." class="chosen-select" multiple style="width:350px;" tabindex="4">
            <option value=""></option>
            <?php foreach($users  as $user){ ?>
            <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
            <?php } ?>
          </select><br>
          <div><button class="btn btn-success" onclick="createGroup()" data-dismiss="modal">Save</button></div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
   $(document).ready(function(){
      setInterval(function(){ checkForNewMessage(); }, 1500);      
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
         this.text = arg.text, this.message_side = arg.message_side, this.message_section=arg.message_section, this.created_by=arg.created_by;
         this.draw = function (_this) {
             return function () {
                 var $message;
                 $message = $($('.message_template').clone().html());
                 $message.find('.avatar').addClass(this.created_by);
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
         var getMessageText, message_side, sendMessage, created_by;
         message_side = 'right';
         getMessageText = function ($element) {
             var $message_input;
             $message_input =$element.parents('.input-group').find('.message_input');
             return $message_input.val();
         };
         sendMessage = function (text,message_side,$element,created_by) {
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
                 message_section:$messages,
                 created_by:'u_avatar'+created_by,
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
                    if(messages.is(':visible')){
                      sendMessage( val.msg, lr, $('.conv_'+val.conv_id), val.created_by);  
                    }else if(messages.html()!=null){
                      messages.parents('.chat_window').show();
                      sendMessage( val.msg, lr, $('.conv_'+val.conv_id), val.created_by);                     
                    }else{
                      var userId=val.convn_btwn;
                      userId=userId.replace('-'+sesion_id+'-','');
                      userId=userId.replace('-','');
                      console.log(userId,$("li[data-user-id="+userId+"]"));
                      $('div.user_'+userId).remove();
                      fetchConversation(userId,val.conv_id,val.type);
                      var arr="fetchConversation('"+userId+"','"+val.conv_id+"',$(this))";
                      $("li[data-user-id="+userId+"]").attr('onclick',arr);
                    }
                    updateDeliverdTo(val.id,val.delivered_to); 
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
                  $(this).next().find('button').click();
             }
         });
     });
   }.call(this));


  //  $(window).resize(function(){console.log($(window).innerHeight()/2);
  //     $('.chat_window').css({ height: $(window).innerHeight() })
  // });
$('.chatBar').css({ height: $(window).innerHeight() })

  $(document).on('click','.top_menu', function(){
    $(this).toggleClass("resize").nextAll('.message-section, .bottom_wrapper').toggle();
  });
  $(document).on('click','.closeIt', function(){
    
    $(this).parents('.chat_window').hide();

  });

  function fetchConversation(userId,newCon,$this){ 
    console.log(userId,newCon);
    if($('.user_'+userId+'').html()!=null){
      showConv($('.user_'+userId+''));
    }else if(newCon=='newconversation'){alert();
      $userName=$this.attr('data-user-name');
      $clone=$('.chat_template').clone().removeClass('chat_template').addClass('chat_window').addClass('user_'+userId+'').appendTo('.chat-section').show();
      $clone.find('.user_name').text($userName);
      $clone.find('.send_message').attr('onclick','insertConv('+userId+',$(this))');
    }else{
      $.ajax({
         url:"<?php echo base_url('appCtr/fetchConversation');?>",
         type: "POST",
         data:{userId:userId,convId:newCon},
         success:function(result){
         $messages=$('.chat-section').append(result).find('.messages:visible').last();
         console.log($messages);
         $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
         }
       });
    }
  }
  function showConv($element){
      $element.show();
      $element.children().removeClass('resize');
      $element.find('.message-section, .bottom_wrapper').show();
      $messages=$element.find('.messages');
      $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
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
  function updateDeliverdTo(id,delivered_to){
    $.ajax({
       url:"<?php echo base_url('appCtr/updateDeliverdTo');?>",
       type: "POST",
       data:{id:id,delivered_to:delivered_to},
       success:function(result){
         console.log(result);
         // setTimeout(function(){ checkForNewMessage(); }, 2000);
       }
     });
  }
  function createGroup(){
    var group=$('.chosen-select').val();
    $.ajax({
      url:"<?php echo base_url('appCtr/createGroup'); ?>",
      type:"POST",
      data:{group:group},
      success:function(result){
         $messages=$('.chat-section').append(result).find('.messages:visible').last();
         $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
      }
    });
  }
</script>

<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
    $('.chosen-container').css('width','100%');
</script>
