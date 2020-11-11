<!DOCTYPE html>
<html>
 <head>
  <title>How can we help? [Technical Issue | Need More access]</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
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

.checkbox-email{
    margin: 0 0 15px 0;
}

input[type=text],input[type=file], select, textarea {
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
     <button type="button" class="close" data-dismiss="alert">×</button>
     <ul>
      @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif
   @if ($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="post" action="{{url('send-email/send')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
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
