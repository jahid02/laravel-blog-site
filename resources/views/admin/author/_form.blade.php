<div class="col-md-12">
    <div class="form-group">
        {{Form::label('name', 'Author Name', ['class'=>'bmd-label-floating'])}}
        {{--<label class="bmd-label-floating">Category Name</label>--}}
        {{-- <input type="text" name="name" class="form-control" required>--}}
        {{Form::text('name',null,['class'=>'form-control','required'])}}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        {{Form::label('phone', 'Author Phone', ['class'=>'bmd-label-floating'])}}
        {{--<label class="bmd-label-floating">Category Name</label>--}}
        {{-- <input type="text" name="name" class="form-control" required>--}}
        {{Form::text('phone',null,['class'=>'form-control','required'])}}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        {{Form::label('description', 'Description Name', ['class'=>'bmd-label-floating'])}}
        {{--<label class="bmd-label-floating">Category Name</label>--}}
        {{-- <input type="text" name="name" class="form-control" required>--}}
        {{Form::textarea('description',null,['class'=>'form-control','required'])}}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        {{Form::label('status', 'Status', ['class'=>'bmd-label-floating'])}}

        {{-- <label class="bmd-label-floating">Status</label>--}}
        <br>
        {{Form::radio('status','Active',null,['checked'])}}Active
        {{Form::radio('status','Inactive',null)}}Inactive
        {{--<input type="radio" class="" name="status" value="Active" checked>Active
        <input type="radio" class="" name="status" value="Inactive">Inactive--}}
    </div>
</div>