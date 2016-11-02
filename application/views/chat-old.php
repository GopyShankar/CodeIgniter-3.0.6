<div class="container">
  <div class="jumbotron">
    <div class="row">
      <div class="chatcont" style="height: 350px;overflow-y: scroll;overflow-x: hidden;">

      </div>

      <div class="input-group">
          <input type="text" class="form-control mesg" aria-describedby="basic-addon2" onfocus="updateConvFlag('1-2','N')">
          <span class="input-group-addon btn btn-default" id="basic-addon2" onclick="updateConvFlag('1-2','Y');updateConv('1')">send</span>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
checkForNewMessage();
  

});
function checkForNewMessage(){
  $.ajax({
    url:"<?php echo base_url('appCtr/checkForNewMessage');?>",
    type: "POST",
    success:function(result){
      // console.log(result);
      $('.chatcont').html(result);
      // $('body').append("<h1>"+result+"</h1>");
      if(result){
      setTimeout(function(){ checkForNewMessage(); }, 2000);

      }
    }
  });
}
function updateConv(convId){
  $msg=$('.mesg').val();
  $.ajax({
    url:"<?php echo base_url('appCtr/updateConv');?>",
    type: "POST",
    data:{msg:$msg,convId:convId},
    success:function(result){
      console.log(result);
      $('#chatHistory').append('<div class="col-md-12"><button type="button" class="btn btn-default pull-right">'+$msg+'</button></div>');
      // $('body').append("<h1>"+result+"</h1>");
      setTimeout(function(){ checkForNewMessage(); }, 2000);
    }
  });
}
function updateConvFlag(convn_btwn,flag){
  $msg=$('.mesg').val();
  $.ajax({
    url:"<?php echo base_url('appCtr/updateConvFlag');?>",
    type: "POST",
    data:{convn_btwn:convn_btwn,flag:flag},
    success:function(result){
      console.log(result);
      // $('body').append("<h1>"+result+"</h1>");

    }
  });
}

</script>