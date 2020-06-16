<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
    <li role="presentation"><a href="#profile" onkeyup="focuss()"  aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">Home</div>
    <div role="tabpanel" class="tab-pane active" id="profile">
      <input role="tabpanel" type="text" class="tab-pane" name="ee" autofocus />
      <input role="tabpanel" type="text" class="tab-pane" name="ee"  autofocus />
      <input role="tabpanel" type="text"class="tab-pane" name="ee"  autofocus /></div>
    
    
    <div role="tabpanel" class="tab-pane" id="messages">Message</div>
    <div role="tabpanel" class="tab-pane" id="settings">Settings</div>
  </div>

</div>
<script type="text/javascript">
  $('.nav a:first').tab('show');

$('.nav a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});

$('.nav a').focus(function (e) {
  e.preventDefault()
  $(this).tab('show')


});
function focuss(){
document.getElementsByTagName("ee").focus();
}

</script>
</body>
</html>