@extends('admin/layout')
@section('page_title','Color')
@section('color_select','active')
@section('container')


@if (!empty(session('message')))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <?php echo session('message'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col-md-6">
    	<h2>Color</h2>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
    	<a href="{{url('admin/color/manage_color')}}" class="btn btn-primary">Add Color</a>
    </div>
</div>


<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead style="text-align:center;">
                    <tr>
                        <th>Sr. No</th>
                        <th>Color Name</th>
                        <th>Color Status</th>
                        <th>Last Updated</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sr_no = 1;
                        foreach ($data as $list){ ?>
                        <tr>
                            <td>{{$sr_no}}</td>
                            <td>{{$list->color_name}}</td>
                            <td class="<?php echo ($list->color_status == 'Enabled') ? 'process' : 'denied'; ?>"><?php echo ($list->color_status == 'Enabled') ? 'Enabled' : 'Disabled'; ?></td>
                            <td>{{$list->updated_at}}</td>
                            <td><a href="{{url('admin/color/delete/'.$list->id)}}" class="btn btn-sm btn-danger delete_record"><i class="fa fa-trash"></i></a></td>
                            <td><a href="{{url('admin/color/manage_color/'.$list->id)}}" class="btn btn-sm btn-success edit_record"><i class="fa fa-edit"></i></a></td>
                        </tr>
                    <?php $sr_no++; } ?>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
{{-- <script type="text/javascript">
    $('.delete_record').click(function(){
           if (confirm("Do you want to delete this record ?")) {
                   const id = this.getAttribute("data-id");
                   $.ajax({
                   url: "<?php url('admin/Color/delete'); ?>",
                   data: {"_token": "{{ csrf_token() }}",
                   "id": id},
                   type: "post",
                   dataType: 'json',
                   success: function(response){
                       alert(response);
                       //alert("Record Deleted Successfully");
                   },
               error: function()
               {
                   alert("error");
               }
           });
       } else {
           return false;
       }
   })
</script> --}}


@endsection

