<?php

include('../includes/functions.php');
//include('action.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}

$db = mysqli_connect('localhost', 'root', '', 'mtlbl');
?>

<!DOCTYPE html>
<html>
 <head>
 <?php include "../admin/includes/modelmainheader.php"; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>

     <?php include "../admin/includes/violetto.php"; ?>
  <br />
  <div class="container">
   <h3 align="center"><a href="../admin/datasets/model.php" style="color: white;"><button type="button" name="model_view" id="model_view" class="btn btn-success">Train Models</button></a></h3>
   <br />
   <div align="right">
    <!--<button type="button" name="create_folder" id="create_folder" class="btn btn-success">Create</button>-->
   </div>
   <br />
   <div class="table-responsive" id="folder_table">

   </div>
  </div>
 </body>
</html>

<!--<div id="folderModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><span id="change_title">Create Dataset</span></h4>
   </div>
   <div class="modal-body">
    <p>Enter Dataset Name
    <input type="text" name="folder_name" id="folder_name" class="form-control" /></p>
    <br />
    <input type="hidden" name="action" id="action" />
    <input type="hidden" name="old_name" id="old_name" />
    <input type="button" name="folder_button" id="folder_button" class="btn--lg btn-info" value="Create" />

   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>-->


<div id="trainModalres" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><span id="change_title">Model Info</span></h4>
   </div>
   <div class="modal-body" id="train_listu">

   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="trainModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><span id="change_title">Model Info</span></h4>
       <?php #$results = mysqli_query($db, "SELECT * FROM model where modelName = $"); ?>
   </div>
   <div class="modal-body" id="train_list">
       <p>Model Name
    <input type="text" name="model_name" id="model_name" class="form-control" /></p>
    <p>Vector Dim
    <input type="text" name="vec_dim" id="vec_dim" class="form-control" /></p>
       <p>Labels
    <input type="text" name="labels" id="labels" class="form-control" /></p>
         <p>Test Ratio
    <input type="text" name="test_ratio" id="test_ratio" class="form-control" /></p>
       <p>Epoch
    <input type="text" name="epoch" id="epoch" class="form-control" /></p>
        <p>Generated From (Dataset)
    <input type="text" name="dataset_name" id="dataset_name" class="form-control" /></p>

    <br />

   <input type="hidden" name="action" id="action" />
    <input type="hidden" name="old_name" id="old_name" />
    <input type="button" name="train_button" id="train_button" class="btn--lg btn-info" value="Queue" />


   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>




<div id="uploadModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Upload File</h4>
   </div>
   <div class="modal-body">
<form method="post" id="upload_form" enctype='multipart/form-data'>
     <p>Select Text File
     <input type="file" name="upload_file" /></p>
     <br />
     <input type="hidden" name="hidden_model_name" id="hidden_model_name" />

        <input type="hidden" name="hidden_vec_dim" id="hidden_vec_dim" />
        <input type="hidden" name="hidden_labels" id="hidden_labels" />
        <input type="hidden" name="hidden_test_ratio" id="hidden_test_ratio" />
        <input type="hidden" name="hidden_epoch" id="hidden_epoch" />
        <input type="hidden" name="hidden_dataset_name" id="hidden_dataset_name" />

     <input type="submit" name="upload_button" class="btn btn-info" value="Upload" />

 </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="filelistModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">File List</h4>
   </div>
   <div class="modal-body" id="file_list">

   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>
$(document).ready(function(){

 load_folder_list();

 function load_folder_list()
 {
  var action = "fetch";
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#folder_table').html(data);
   }
  });
 }

 $(document).on('click', '#create_folder', function(){
  $('#action').val("create");
  $('#folder_name').val('');
  $('#folder_button').val('Create');
  $('#folderModal').modal('show');
  $('#old_name').val('');
  $('#change_title').text("Create Dataset");
 });

 $(document).on('click', '#folder_button', function(){
  var folder_name = $('#folder_name').val();
  var old_name = $('#old_name').val();
  var action = $('#action').val();
  if(folder_name != '')
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{folder_name:folder_name, old_name:old_name, action:action},
    success:function(data)
    {
     $('#folderModal').modal('hide');
     load_folder_list();
     alert(data);
    }
   });
  }
  else
  {
   alert("Enter Dataset Name");
  }
 });

 $(document).on("click", ".update", function(){
  var folder_name = $(this).data("name");
  $('#old_name').val(folder_name);
  $('#folder_name').val(folder_name);
  $('#action').val("change");
  $('#folderModal').modal("show");
  $('#folder_button').val('Update');
  $('#change_title').text("Change Dataset Name");
 });


   /*  $(document).on("click", ".train", function(){
  var folder_name = $(this).data("name");
  $('#old_name').val(folder_name);
  $('#dataset_name').val(folder_name);
  $('#action').val("train");
  $('#trainModal').modal("show");
  $('#train_button').val('Train');
  //$('#change_title').text("Change Dataset Name");
 });
*/
 $(document).on("click", ".train", function(){
  var folder_name = $(this).data("name");
     var action = "classify";

     $.ajax({
        url:"action.php",
    method:"POST",
      data:{folder_name:folder_name, action:action  },
    success:function(data)
    {
     //load_folder_list();
     //alert(data);
         $('#train_button').val("Use this model!");
       // $('#trainModal').modal('hide');
        var result = $.parseJSON(data);
       /* global $modelName;
        global $modelVec;
        global $modelEp;
        global $modelLabel;
        global $modelRatio;
        global $datasetName;*/

       window.modelName = result[0];
         window.modelVec = result[1];
          window.modelEp = result[2];
         window.modelLabel = result[3];
         window.modelRatio = result[4];
        window.datasetName = result[5];

        $('#model_name').val(window.modelName);
        $('#vec_dim').val(window.modelVec);
        $('#labels').val(window.modelLabel);
        $('#test_ratio').val(window.modelRatio);
         $('#epoch').val(window.modelEp);
        $('#dataset_name').val(window.datasetName);


    $('#trainModal').modal('show');
    }

  });

     /*$('#folder_name').val(folder_name);
     $('#model_name').val("something");
     $('#vec_dim').val("100");
     $('#labels').val("b t e m");
     $('#test_ratio').val("0.2");
     $('#epoch').val("2");

 $('#trainModal').modal('show');*/
 });

  //var action = "train";
   /*  var formData=new FormData(document.getElementById('train_form'));
     formData.append("action", train);
    formData.append("folder_name", folder_name);*/
  //if(confirm("Do you want to train this dataset?"))
 $(document).on('click', "#old_train_button", function(){
      var folder_name = $('#folder_name').val();
  var vec_dim = $('#vec_dim').val();
  var labels = $('#labels').val();
     var test_ratio = $('#test_ratio').val();
     var epoch = $('#epoch').val();
      var model_name = $('#model_name').val();
   var action = "do";
     //$('#train_button').val("Training... Please DO NOT CLOSE this window/tab!");
   $.ajax({
    url:"upload.php",
    method:"POST",
     /*  data: formData,
       contentType: false,
   cache: false,
   processData:false,*/
    data:{folder_name:folder_name, model_name:model_name, action:action, vec_dim: vec_dim, labels:labels, test_ratio:test_ratio, epoch:epoch  },
    success:function(data)
    {
     //load_folder_list();
     //alert(data);
         $('#train_button').val("Train!");
        $('#trainModal').modal('hide');
        $('#train_listu').html(data);
    $('#trainModalres').modal('show');
    }

  });
 });

 $(document).on("click", ".delete", function(){
  var folder_name = $(this).data("name");
  var action = "delete";
  if(confirm("Are you sure you want to remove this dataset?"))
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{folder_name:folder_name, action:action},
    success:function(data)
    {
     load_folder_list();
     alert(data);
    }
   });
  }
 });


    $(document).on('click', '#train_button', function(){
  //var folder_name = $(this).data("name");
  //var folder_name = $('#folder_name').val();
        $('#trainModal').modal('hide');
       /* global $modelName;
        global $modelVec;
        global $modelEp;
        global $modelLabel;
        global $modelRatio;
        global $datasetName;*/
 $('#uploadModal').modal('show');
        $('#hidden_model_name').val(window.modelName);
        $('#hidden_vec_dim').val(window.modelVec);
        $('#hidden_epoch').val(window.modelEp);
        $('#hidden_test_ratio').val(window.modelRatio);
        $('#hidden_labels').val(window.modelLabel);
//        $('#hidden_dataset_name').val(window.datasetName);




/*  var vec_dim = $('#vec_dim').val();
  var labels = $('#labels').val();
     var test_ratio = $('#test_ratio').val();
     var epoch = $('#epoch').val();
      var model_name = $('#model_name').val();*/



 });



 $(document).on('click', '.upload', function(){
  var folder_name = $(this).data("name");
  $('#hidden_folder_name').val(folder_name);
  $('#uploadModal').modal('show');
 });

     //$('#upload_form').on('submit', function(){

 $('#upload_form').on('submit', function(){

     //var action = "rip";
  // var path = $path;
     //var action = "sad";
     var formData=new FormData(document.getElementById('upload_form'));
     formData.append("action", "sad");
      /*formData.append("model_name", model_name);
      formData.append("vec_dim", vec_dim);
      formData.append("labels", labels);
      formData.append("test_ratio", test_ratio);
      formData.append("epoch", epoch); */
  $.ajax({
   url:"action.php",
   method:"POST",
   data: formData,
   contentType: false,
   cache: false,
   processData:false,
   success: function(data)
   {


    load_folder_list();
   alert(data);
      /* $.ajax({



                url: "action.php",
                method: "POST",
                data: {action: "rip", model_name: "a", action:action, vec_dim: vec_dim, labels:labels, test_ratio:test_ratio, epoch:epoch},
            contentType: false,
   cache: false,
   processData:true,
                success: function (data) {
                    alert(data);
                }
            });*/
   }

       /*var vec_dim = $('#hidden_vec_dim').val();
  var labels = $('#hidden_labels').val();
     var test_ratio = $('#hidden_test_ratio').val();
     var epoch = $('#hidden_epoch').val();
      var model_name = $('#hidden_model_name').val();*/


      /* $('#uploadModal').modal('hide');
       $('#train_listu').html(data);
    $('#trainModalres').modal('show');*/


   });
 });

     $('#upload_form').on('submitt', function(){

         var model_name = window.modelName;
         var vec_dim = window.modelVec;
  var labels = window.modelLabel;
     var test_ratio = window.modelRatio;
     var epoch = window.modelEp;
      //var model_name = $('#model_name').val();
         var action = "do";

  $.ajax({
   url:"action.php",
   method:"POST",
   data: {model_name:model_name, action:action, vec_dim: vec_dim, labels:labels, test_ratio:test_ratio, epoch:epoch },
   /*contentType: false,
   cache: false,
   processData:false,*/
   success: function(data)
   {
    load_folder_list();
    alert(data);
       /*$('#uploadModal').modal('hide');
        $('#train_listu').html(data);
    $('#trainModalres').modal('show');*/

   }
  });
 });

 $(document).on('click', '.view_files', function(){
  var folder_name = $(this).data("name");
  var action = "fetch_files";
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:action, folder_name:folder_name},
   success:function(data)
   {
    $('#file_list').html(data);
    $('#filelistModal').modal('show');
   }
  });
 });

 $(document).on('click', '.remove_file', function(){
  var path = $(this).attr("id");
  var action = "remove_file";
  if(confirm("Are you sure you want to remove this file?"))
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{path:path, action:action},
    success:function(data)
    {
     alert(data);
     $('#filelistModal').modal('hide');
     load_folder_list();
    }
   });
  }
 });

$(document).on('blur', '.change_file_name', function(){
  var folder_name = $(this).data("folder_name");
  var old_file_name = $(this).data("file_name");
  var new_file_name = $(this).text();
  var action = "change_file_name";
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{folder_name:folder_name, old_file_name:old_file_name, new_file_name:new_file_name, action:action},
   success:function(data)
   {
    alert(data);
   }
  });
 });

});
</script>
