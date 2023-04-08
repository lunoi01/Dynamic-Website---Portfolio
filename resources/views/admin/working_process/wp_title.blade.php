@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Working Process Title</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Working Process No</th>
                            <th>Working Process Title</th>
                            <th>Working Process Logo</th>
                            <th>Working Process Description</th>
                            <th>Action</th>

                        </thead>

                        

                        <tbody>
                        	@php($i = 1)
                        	@foreach($service as $item)
                        <tr>
                            <td> {{ $item->id }} </td>
                            <td> {{ $item->wp_title }} </td>
                            <td> <img src="{{ asset($item->logo) }}" style="width: 60px; height: 50px;"> </td>
                            <td> {!! $item->wp_desc !!} </td>
                            

                            <td>

                            
                            <a href="{{ route ('edit.wptitle',$item->id) }}" class="btn btn-info sm" title="Edit Working Process "> <i class="fas fa-edit"></i> </a>
                            <!-- <a href="{{ route ('delete.WP',$item->id) }}" class="btn btn-danger sm" title="Delete Working Process "> <i class="fas fa-trash-alt"></i> </a> -->
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