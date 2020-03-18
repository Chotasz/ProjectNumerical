@extends('install.layout')
@section('css_bottom')
@endsection
@section('body')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        Project All
                    </h5>
                    <div class="ibox-tools">
                        <button href="#!" class="btn btn-success btn-xs btn-add" >
                            + เพิ่มข้อมูล
                        </button>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="text-right">
                        
                    </div>
                    <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="TableList" >
                                <thead>
                                    <tr>
                                        <th>ชื่อโปรเจ็ค</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Projects as $Project)
                                        <tr>
                                            <td>{{$Project->name}}</td>
                                            <td>
                                                <a href="{{url($Project->name)}}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
<div class="modal" id="ModalAdd"  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
            <form id="FormAdd">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">เพิ่มโปรเจ็คใหม่</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ชื่อโปรเจ็ค <span class="text-danger">***ภาษาอังกฤษเท่านั้นอย่าหน้ามึนพิมพ์ไทยละ***</span></label> 
                        <input type="text" placeholder="ชื่อโปรเจ็ค" name="name" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white pull-left" data-dismiss="modal"><i class="fa fa-close"></i> ปิด</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('js_bottom')
<script>
$('body').on('submit' , '#FormAdd', function(e){
    e.preventDefault();
    $.ajax({
        method : "POST",
        url : url_gb+"/Install/Project",
        dataType : 'json',
        data : $(this).serialize()
    }).done(function(rec){
        if(rec.status==1){
            alert('Success');
        }else{
            alert('Error');
        }
    }).fail(function(){
        alert('Error');
    });

});

$('body').on('click' , '.btn-add', function(){
    $('#ModalAdd').modal('show');
});
</script>
@endsection