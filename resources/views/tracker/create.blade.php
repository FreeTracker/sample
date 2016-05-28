@extends('layouts.base')
@section('content')
   @include('layouts.navbar', ['navigate'=> 'create', 'breadcrumbs' => ['0' => 'tracker_create', '1' => 'Добавить публикацию']])
<div class="box box-margin-top">
   <div class="row">
      <div class="form-group col-md-6"><label>Ваше имя:</label>
         <input type="text" name="curator" class="form-control" value="{{ Auth::user()->name }}" readonly="readonly">
      </div>
      <div class="form-group col-md-6"><label>Название публикации:</label>
         <input type="text" name="torrent_name" class="form-control" placeholder="Укажите название публикации" value="">
      </div>
      <div class="form-group col-md-6"><label>Категория:</label>
         <input type="text" name="category_id" class="form-control" placeholder="Ваше имя" value="">
      </div>
      <div class="form-group col-md-6"><label>Загрузить изображение с компьютера:</label>
         <div class="fileinput fileinput-new input-group" data-provides="fileinput">
            <div class="form-control" data-trigger="fileinput"><i class="fa fa-file-image-o fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                            <span class="input-group-addon btn btn-xs btn-default btn-file">
                            <span class="fileinput-new">Выбрать файл</span>
                            <span class="fileinput-exists">Изменить</span>
                            <input type="hidden"><input type="file" name="logo"></span>
            <a href="#" class="input-group-addon btn btn-xs btn-default fileinput-exists" data-dismiss="fileinput">Удалить</a>
         </div>
      </div>
      <div class="form-group col-md-12"><label>Описание:</label>
         <textarea class="form-control" rows="4" name="description"></textarea>
      </div>
      <div class="col-md-offset-5 col-md-2"><button type="submit" class="btn btn-primary btn-block">Сохранить</button></div>

   </div>
</div>

@stop