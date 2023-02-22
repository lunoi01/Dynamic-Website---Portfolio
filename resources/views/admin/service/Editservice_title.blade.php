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

            <h4 class="card-title">Edit Service Title </h4>

            <form method="post" action="{{ route('update.serviceTitle')}}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{$service->id}}">


              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Service Title </label>
                <div class="col-sm-10">
                    <input name="service_title" value="{{ $service->service_title}}" class="form-control" type="text"> 
                </div>
            </div>
            <!-- end row -->

<input type="submit" class="btn btn-info waves-effect waves-light" value="Update Service Title">
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