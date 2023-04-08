@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Add Feedback Page </h4>

            <form method="post" action="{{ route('store.feedback') }}" enctype="multipart/form-data">
                @csrf

                
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Feedback Text</label>
                <div class="col-sm-10">
             <textarea id="elm1" name="feedback_text">       </textarea>

             </div>
            </div>

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Feedback Name </label>
                <div class="col-sm-10">
                    <input name="feedback_name" class="form-control" type="text" id="example-text-input">
                </div>
            </div>
            <!-- end row -->


                
            <!-- end row -->

        
<input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Feedback Data">
            </form>



        </div>
    </div>
</div> <!-- end col -->
</div>



</div>
</div>


<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection 