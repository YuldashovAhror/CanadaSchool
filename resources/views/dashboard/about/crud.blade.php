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
            <form action="{{ route('dashboard.about.update', $about) }}"
                method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('put') }}
                <div class="card-body">
                    <div class="card-header pb-0  mb-3">
                        <h5>О нас</h5>
                    </div>
                    <div class="col-12 text-center">
                        {!!$about->link!!}
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="link">Ссылки</label>
                                <input class="form-control" id="link" type="text" name="link" value="{{ $about->link }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Описание Ru</label>
                            <textarea class="ckeditor" name="discription_ru" id="exampleFormControlTextarea4" rows="3">{{ $about->discription_ru }}</textarea>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Описание Uz</label>
                            <textarea class="ckeditor" name="discription_uz" id="exampleFormControlTextarea4" rows="3">{{ $about->discription_uz }}</textarea>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Описание En</label>
                            <textarea class="ckeditor" name="discription_en" id="exampleFormControlTextarea4" rows="3">{{ $about->discription_en }}</textarea>
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
