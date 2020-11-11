<!DOCTYPE html>
<html>
 <head>
  <title><strong>How can we help? [Technical Issue | Need More access]</strong></title>
  <style type="text/css">
.box{
    width:360px;
    margin:0 auto;
    border:1px solid #ccc;
 }

.has-error{
    border-color:#cc0000;
    background-color:#ffff99;
 }

.checkbox-email, .reason_contact{
    margin: 0 0 15px 0;
}

input[type=text],input[type=file],select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.alert.alert-success.alert-block{
  padding:18px;
  color:#3c763d;
  background-color:#dff0d8;
  border-color:#d6e9c6;
}

.alert.alert-danger{
 color:#a94442;
 background-color:#f2dede;
 border-color:#ebccd1;
}
  </style>
 </head>
 <body>
  <br />
  <br />
  <br />
  <div class="container box">
   <h3 align="center">How can we help? [Technical Issue | Need more access]</h3><br />
   @if (count($errors) > 0)
    <div class="alert alert-danger">
     <button type="button" class="close" data-dismiss="alert"></button>
     <ul>
      @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif
   @if ($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert"></button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="post" action="{{url('send-email/send')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group reason_contact">
     <strong>Reason For Contact</strong><br>
      <input type="radio" id="genearl_contact" name="contact_reason" value="general">
      <label>General Contact</label><br>
      <input type="radio" id="access_request" name="contact_reason" value="access">
      <label>Access Request</label><br>
    </div> 
   <div class="form-group">
     <label>Message</label>
     <textarea max-legth="4000" name="message" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label>Attachment</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group checkbox-email">
       <input type="checkbox" id="emailcopy" name="emailcopy" value="1">
       <label>Email a Copy</label>
    </div>
    <div class="form-group">
     <input type="submit" name="send" class="btn btn-info" value="Send" />
    </div>
   </form> 
  </div>
 </body>
</html>
