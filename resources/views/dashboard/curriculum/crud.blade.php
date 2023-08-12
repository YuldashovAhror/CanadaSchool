@extends('layouts.dashboard.main')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success') != null)
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error') != null)
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route('dashboard.curriculum.update', $curriculum) }}"
                method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('put') }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label"
                                    for="exampleFormControlInput1">Файл</label>
                                <div class="col-12 text-center mb-2">
                                    <img src="{{ $curriculum->photo }}"
                                        alt=""
                                        style="width: 150px; height: 150px;">
                                </div>
                                <input class="form-control"
                                    id="exampleFormControlInput1"
                                    type="file" name="photo">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Описание Ru</label>
                            <textarea class="ckeditor" name="discription_ru" id="exampleFormControlTextarea4" rows="3">{{ $curriculum->discription_ru }}</textarea>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Описание Uz</label>
                            <textarea class="ckeditor" name="discription_uz" id="exampleFormControlTextarea4" rows="3">{{ $curriculum->discription_uz }}</textarea>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Описание En</label>
                            <textarea class="ckeditor" name="discription_en" id="exampleFormControlTextarea4" rows="3">{{ $curriculum->discription_en }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="alt_uz">Название Файл Uz</label>
                                <input class="form-control" id="alt_uz" type="text" name="alt_uz" value="{{ $curriculum->alt_uz }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="alt_ru">Название Файл Ru</label>
                                <input class="form-control" id="alt_ru" type="text" name="alt_ru" value="{{ $curriculum->alt_ru }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="alt_en">Название Файл En</label>
                                <input class="form-control" id="alt_en" type="text" name="alt_en" value="{{ $curriculum->alt_en }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="photo_discription_uz">Описание Файл Uz</label>
                                <input class="form-control" id="photo_discription_uz" type="text" name="photo_discription_uz" value="{{ $curriculum->photo_discription_uz }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="photo_discription_ru">Описание Файл Ru</label>
                                <input class="form-control" id="photo_discription_ru" type="text" name="photo_discription_ru" value="{{ $curriculum->photo_discription_ru }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="photo_discription_en">Описание Файл En</label>
                                <input class="form-control" id="photo_discription_en" type="text" name="photo_discription_en" value="{{ $curriculum->photo_discription_en }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Изменить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
