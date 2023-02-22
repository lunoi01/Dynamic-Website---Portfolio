@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Contact Message All</h4>



                                </div>
                            </div>
                        </div> -->
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Working Process Title</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Working Process Title</th>
                            <th>Action</th>

                        </thead>

                        

                        <tbody>
                        	@php($i = 1)
                        	@foreach($service as $item)
                        <tr>
                            <td> {{ $item->wp_title }} </td>

                            <td>

                            
                            <a href="{{ route ('edit.wptitle',$item->id) }}" class="btn btn-info sm" title="Edit Working Process Title"> <i class="fas fa-edit"></i> </a>
                           
                            </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>


@endsection