@extends('layouts.dashboard.main')

@section('content')
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
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Добавить Новости</h5>
                </div>
                <form action="{{ route('dashboard.news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Файл</label>
                                    <div class="col-12 text-center">
                                        {{-- <i data-feather="loader" style="height: 100px; width: 100px"></i> --}}
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">День</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text"
                                        name="day">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Месяц</label>
                                    <input class="form-control" id="exampleFormControlInput1" required type="text"
                                        name="month">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Тип UZ</label>
                                    <input class="form-control" id="exampleFormControlInput1" required type="text"
                                        name="type_uz">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Тип RU</label>
                                    <input class="form-control" id="exampleFormControlInput1" required type="text"
                                        name="type_ru">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Тип EN</label>
                                    <input class="form-control" id="exampleFormControlInput1" required type="text"
                                        name="type_en">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label">Описание Ru</label>
                                <textarea class="ckeditor" name="discription_ru" id="exampleFormControlTextarea4" rows="3"></textarea>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Описание Uz</label>
                                <textarea class="ckeditor" name="discription_uz" id="exampleFormControlTextarea4" rows="3"></textarea>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Описание En</label>
                                <textarea class="ckeditor" name="discription_en" id="exampleFormControlTextarea4" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="alt_uz">Название Файл Uz</label>
                                    <input class="form-control" id="alt_uz" type="text" name="alt_uz">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="alt_ru">Название Файл Ru</label>
                                    <input class="form-control" id="alt_ru" type="text" name="alt_ru">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="alt_en">Название Файл En</label>
                                    <input class="form-control" id="alt_en" type="text" name="alt_en">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="photo_discription_uz">Описание Файл Uz</label>
                                    <input class="form-control" id="photo_discription_uz" type="text" name="photo_discription_uz">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="photo_discription_ru">Описание Файл Ru</label>
                                    <input class="form-control" id="photo_discription_ru" type="text" name="photo_discription_ru">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="photo_discription_en">Описание Файл En</label>
                                    <input class="form-control" id="photo_discription_en" type="text" name="photo_discription_en">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Все Новости</h5>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Файл</th>
                                <th scope="col">Тип</th>
                                <th scope="col">Дни</th>
                                <th scope="col">Месяцы</th>
                                <th scope="col">Название Файл Ru</th>
                                <th scope="col">Описание Файл Ru</th>
                                <th scope="col" class="text-center">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $key => $new)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td><img src="{{ $new->photo }}" alt="" style="width: 100px; height: 100px;">
                                    </td>
                                    <td>{{ $new->type_ru }}</td>
                                    <td>{{ $new->day }}</td>
                                    <td>{{ $new->month }}</td>
                                    <td>{{ $new->alt_ru }}</td>
                                    <td>{{ $new->photo_discription_ru }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-xs btn-success mb-1" type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter{{ $new->id }}Edit"><i
                                                class="bx bx-pencil">Изменить</i></button>
                                        <div class="modal fade" id="exampleModalCenter{{ $new->id }}Edit"
                                            tabindex="-1" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document"
                                                style="max-width: 50vw">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Изменить</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('dashboard.news.update', $new) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            {{ method_field('put') }}
                                                            <div class="card-body">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="exampleFormControlInput1">Файл</label>
                                                                                <div class="col-12 text-center mb-2">
                                                                                    <img src="{{ $new->photo }}"
                                                                                        alt=""
                                                                                        style="width: 150px; height: 150px;">
                                                                                </div>
                                                                                <input class="form-control"
                                                                                    id="exampleFormControlInput1"
                                                                                    type="file" name="photo">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">День</label>
                                                                                <i data-feather="loader" style="height: 173px; width: 100px"></i>
                                                                                <input class="form-control" id="exampleFormControlInput1" type="text"
                                                                                    name="day" value="{{ $new->day }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">Месяц</label>
                                                                                <i data-feather="loader" style="height: 173px; width: 100px"></i>
                                                                                <input class="form-control" id="exampleFormControlInput1" required type="text"
                                                                                    name="month" value="{{ $new->month }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">Тип UZ</label>
                                                                                <input class="form-control" id="exampleFormControlInput1" required type="text"
                                                                                    name="type_uz" value="{{$new->type_uz}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">Тип RU</label>
                                                                                <input class="form-control" id="exampleFormControlInput1" required type="text"
                                                                                    name="type_ru" value="{{$new->type_ru}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">Тип EN</label>
                                                                                <input class="form-control" id="exampleFormControlInput1" required type="text"
                                                                                    name="type_en" value="{{$new->type_en}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <label class="form-label">Описание Uz</label>
                                                                            <textarea class="ckeditor" name="discription_uz" id="exampleFormControlTextarea4" rows="3">{{ $new->discription_uz }}</textarea>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <label class="form-label">Описание Ru</label>
                                                                            <textarea class="ckeditor" name="discription_ru" id="exampleFormControlTextarea4" rows="3">{{ $new->discription_ru }}</textarea>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <label class="form-label">Описание En</label>
                                                                            <textarea class="ckeditor" name="discription_en" id="exampleFormControlTextarea4" rows="3">{{ $new->discription_en }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="alt_uz">Название Файл Uz</label>
                                                                                <input class="form-control" id="alt_uz" type="text" name="alt_uz" value="{{ $new->alt_uz }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="alt_ru">Название Файл Ru</label>
                                                                                <input class="form-control" id="alt_ru" type="text" name="alt_ru" value="{{ $new->alt_ru }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="alt_en">Название Файл En</label>
                                                                                <input class="form-control" id="alt_en" type="text" name="alt_en" value="{{ $new->alt_en }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="photo_discription_uz">Описание Файл Uz</label>
                                                                                <input class="form-control" id="photo_discription_uz" type="text" name="photo_discription_uz" value="{{ $new->photo_discription_uz }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="photo_discription_ru">Описание Файл Ru</label>
                                                                                <input class="form-control" id="photo_discription_ru" type="text" name="photo_discription_ru" value="{{ $new->photo_discription_ru }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="photo_discription_en">Описание Файл En</label>
                                                                                <input class="form-control" id="photo_discription_en" type="text" name="photo_discription_en" value="{{ $new->photo_discription_en }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-end">
                                                                <button class="btn btn-primary"
                                                                    type="submit">Изменить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter{{ $new->id }}"><i
                                                class="bx bx-trash"></i>Удалить</button>
                                        <div class="modal fade" id="exampleModalCenter{{ $new->id }}"
                                            tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Удалить?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('dashboard.news.destroy', $new->id) }}"
                                                            method="post">
                                                            @csrf
                                                            {{ method_field('delete') }}
                                                            <button class="btn btn-primary" type="submit"
                                                                data-bs-original-title="" title="">Да</button>
                                                        </form>
                                                        <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal" data-bs-original-title=""
                                                            title="">Нет</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
