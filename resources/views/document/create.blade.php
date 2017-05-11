@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Добавить документ</div>

                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('documents') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-sm-4 control-label">Название документа</label>
                            <div class="col-sm-8">
                                <input value="{{ old('name') }}" type="text" name="name" 
                                       class="form-control" placeholder="введите название документы">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('categories') ? ' has-error' : '' }}">
                            <label class="col-sm-4 control-label">Категория документа</label>
                            <div class="col-sm-8">
                                <select name="categories[]" multiple="multiple" class="form-control">
                                    @foreach ($categories as $category)
                                        @if ( !is_null(old('categories')) && in_array($category->id,old('categories')))
                                            <option selected value="{{ $category->id }}">{{$category->name}}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('categories'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('categories') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-sm-4 control-label">Описание документа</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" style="max-width: 100%;" name="description" 
                                          rows="3" placeholder="Описание документа">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                            <div class="col-sm-offset-4 col-sm-8">
                                <label for="document" class="btn btn-success">Выберите файл</label>
                                <input style="display: none;" id="document" type="file" name="document">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                                @if ($errors->has('document'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('document') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection