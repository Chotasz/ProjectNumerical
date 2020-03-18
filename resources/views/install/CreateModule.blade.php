@extends('install.layout')
@section('css_bottom')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>
<style>
.box-input{
    border:darkgrey dashed 1px;
    margin:5px;
    padding:5px;
}
.box-add-element{
    font-size:300%;
    line-height:3;
    border:darkgrey dashed 1px;
    text-align:center;
    margin:5px;
    padding:5px;
}
.box-add-element:hover{
    border:greenyellow dashed 1px;
    color : greenyellow;
}
</style>
@endsection
@section('body')

<div class="wrapper wrapper-content animated fadeInRight" id="app">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        ฟอร์มเพิ่มข้อมูล
                    </h5>
                    <div class="ibox-tools">

                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="module_name">ชื่อโมดูล<span class="text-danger">**ภาษาอังกฤษเท่านั้น**</span></label>
                                <input type="text" class="form-control" v-model="FormAdd.module_name" required name="module_name" id="module_name" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="module_name">ชื่อเมนู</label>
                                <input type="text" class="form-control" v-model="FormAdd.menu_name" required name="module_name" id="module_name" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="module_name">ไอค่อน</label>
                                <input type="text" class="form-control" v-model="FormAdd.icon" required name="module_name" id="module_name" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="modal_size">ขนาดโมดอล</label>
                                <select name="modal_size" id="modal_size" v-model="FormAdd.modal_size" class="form-control">
                                    <option value="">ขนาดธรรมดา</option>
                                    <option value="modal-lg">ขนาดกลาง</option>
                                    <option value="modal-maximize">ขนาดเต็มจอ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" id="FormInModal">
                        <div class="col-sm-4" v-for="(val , index) in FormAdd.element">
                            <div class="box-input">
                                <div class="form-group">
                                        <label for="">ชื่อลาเบล</label>
                                        <input type="text" class="form-control" v-model="FormAdd.element[index].label_name" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">ประเภทอินพุด</label>
                                        <select name="" id="" class="form-control" v-model="FormAdd.element[index].type_input">
                                            <option value="">เลือกประเภทอินพุด</option>
                                            <option value="input_text">Input Text</option>
                                            <option value="password">Password</option>
                                            <option value="Textarea">Textarea</option>
                                            <option value="Dropdown">Dropdown</option>
                                            <option value="UploadFile">Upload File</option>
                                            <option value="editor">CK Editor</option>
                                            <option value="DatePicker">Date Picker</option>
                                            <option value="DateTimePicker">Date Time Picker</option>
                                            <option value="Checkbox">Checkbox</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" value="T" v-model="FormAdd.element[index].required_input" > บังคับคีย์
                                        </label>
                                    </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="box-add-element" v-on:click="AddElement">
                                <i class="fa fa-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                            ตารางข้อมูล
                        </h5>
                        <div class="ibox-tools">

                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="module_name">จำนวนคอลั่ม</label>
                                    <input type="text" class="form-control" v-model="FormAdd.total_column" v-on:keyup="SetRowColumn" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="module_name">จำนวนแถว</label>
                                    <input type="text" class="form-control" v-model="FormAdd.total_row" v-on:keyup="SetRowColumn" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th v-for="(i , index) in FormAdd.head_table.length">
                                                <input type="text" class="form-control" v-model="FormAdd.head_table[index]" >
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(k , row) in FormAdd.row.length">
                                            <td v-for="(i , index) in FormAdd.head_table.length">
                                                <input type="text" class="form-control" v-model="FormAdd.row[row][index]" >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button class="btn btn-success" v-on:click="SaveForm">
                                    <i class="fa fa-save"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection
@section('modal')

@endsection
@section('js_bottom')
<script>
Vue.prototype.$http = axios
var app = new Vue({
    el: '#app',
    data: {
        dd : 'ddd',
        FormAdd : {
            total_column : 0,
            total_row : 0,
            modal_size : '',
            menu_name : '',
            icon : '',
            element : [],
            head_table : [],
            row : []
        }
    },
    methods: {
        SetRowColumn(){
            this.FormAdd.head_table = [];
            this.FormAdd.row = [];
            var x = this.FormAdd.head_table.length;
            for(i=1;i<=(parseFloat(this.FormAdd.total_column));i++){
                this.FormAdd.head_table[i] = '';
            }

            for(k=0;k<(parseFloat(this.FormAdd.total_row));k++){
                this.FormAdd.row[k] = [];
                // console.log(parseFloat(this.FormAdd.total_column));
                for(i=0;i<(parseFloat(this.FormAdd.total_column));i++){
                    console.log(1);
                    this.FormAdd.row[k][i] = '';
                }

            }
        },
        AddElement(){
            var data = {
                'label_name' : '',
                'type_input' : '',
                'required_input' : ''
            };
            this.FormAdd.element.push(data);

        },

        SaveForm(){
            this.$http.post(
                url_gb+'/{{$ProjectName}}/SaveForm' ,
                this.FormAdd,
                {
                    headers: {
                        'Content-type': 'application/json',
                    }
                }
            ).then(function(res){
                if(res.data.status == 1){
                    swal(res.data.title,res.data.content,"success");
                }else{
                    swal(res.data.title,res.data.content,"error");

                }
            }).catch(function (error) {

            });
                console.log(this.FormAdd);
            }

    },
    mounted() {

    }
});
</script>
@endsection
