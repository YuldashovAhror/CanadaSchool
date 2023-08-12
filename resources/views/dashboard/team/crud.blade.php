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
                    <h5>Добавить Команды</h5>
                </div>
                <form action="{{ route('dashboard.teams.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Файл</label>
                                    <div class="col-12 text-center">
                                        {{-- <i data-feather="loader" style="height: 100px; width: 100px"></i> --}}
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Электронная почта</label>
                                    <input class="form-control" id="exampleFormControlInput1" required type="text"
                                        name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название UZ</label>
                                    <input class="form-control" id="exampleFormControlInput1" required type="text"
                                        name="name_uz">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название RU</label>
                                    <input class="form-control" id="exampleFormControlInput1" required type="text"
                                        name="name_ru">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название EN</label>
                                    <input class="form-control" id="exampleFormControlInput1" required type="text"
                                        name="name_en">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Позиция UZ</label>
                                    <input class="form-control" id="exampleFormControlInput1" required type="text"
                                        name="position_uz">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Позиция RU</label>
                                    <input class="form-control" id="exampleFormControlInput1" required type="text"
                                        name="position_ru">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Позиция EN</label>
                                    <input class="form-control" id="exampleFormControlInput1" required type="text"
                                        name="position_en">
                                </div>
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
                            <h5>Все Команды</h5>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Файл</th>
                                <th scope="col">Название</th>
                                <th scope="col">Электронная почта</th>
                                <th scope="col">Название Файл Ru</th>
                                <th scope="col">Описание Файл Ru</th>
                                <th scope="col" class="text-center">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $key => $team)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td><img src="{{ $team->photo }}" alt="" style="width: 100px; height: 100px;">
                                    </td>
                                    <td>{{ $team->name_ru }}</td>
                                    <td>{{ $team->email }}</td>
                                    <td>{{ $team->alt_ru }}</td>
                                    <td>{{ $team->photo_discription_ru }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-xs btn-success mb-1" type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter{{ $team->id }}Edit"><i
                                                class="bx bx-pencil">Изменить</i></button>
                                        <div class="modal fade" id="exampleModalCenter{{ $team->id }}Edit"
                                            tabindex="-1" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document"
                                                style="max-width: 50vw">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Изменить</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('dashboard.teams.update', $team) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            {{ method_field('put') }}
                                                            <div class="card-body">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="exampleFormControlInput1">Файл</label>
                                                                                <div class="col-12 text-center mb-2">
                                                                                    <img src="{{ $team->photo }}"
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
                                                                        <div class="col-12">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">Электронная почта</label>
                                                                                <input class="form-control" id="exampleFormControlInput1" required type="text"
                                                                                    name="email" value="{{$team->email}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">Название UZ</label>
                                                                                <input class="form-control" id="exampleFormControlInput1" required type="text"
                                                                                    name="name_uz" value="{{$team->name_uz}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">Название RU</label>
                                                                                <input class="form-control" id="exampleFormControlInput1" required type="text"
                                                                                    name="name_ru" value="{{$team->name_ru}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">Название EN</label>
                                                                                <input class="form-control" id="exampleFormControlInput1" required type="text"
                                                                                    name="name_en" value="{{$team->name_en}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">Позиция UZ</label>
                                                                                <input class="form-control" id="exampleFormControlInput1" required type="text"
                                                                                    name="position_uz" value="{{$team->position_uz}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">Позиция RU</label>
                                                                                <input class="form-control" id="exampleFormControlInput1" required type="text"
                                                                                    name="position_ru" value="{{$team->position_ru}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">Позиция EN</label>
                                                                                <input class="form-control" id="exampleFormControlInput1" required type="text"
                                                                                    name="position_en" value="{{$team->position_en}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="alt_uz">Название Файл Uz</label>
                                                                                <input class="form-control" id="alt_uz" type="text" name="alt_uz" value="{{ $team->alt_uz }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="alt_ru">Название Файл Ru</label>
                                                                                <input class="form-control" id="alt_ru" type="text" name="alt_ru" value="{{ $team->alt_ru }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="alt_en">Название Файл En</label>
                                                                                <input class="form-control" id="alt_en" type="text" name="alt_en" value="{{ $team->alt_en }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="photo_discription_uz">Описание Файл Uz</label>
                                                                                <input class="form-control" id="photo_discription_uz" type="text" name="photo_discription_uz" value="{{ $team->photo_discription_uz }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="photo_discription_ru">Описание Файл Ru</label>
                                                                                <input class="form-control" id="photo_discription_ru" type="text" name="photo_discription_ru" value="{{ $team->photo_discription_ru }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="photo_discription_en">Описание Файл En</label>
                                                                                <input class="form-control" id="photo_discription_en" type="text" name="photo_discription_en" value="{{ $team->photo_discription_en }}">
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
                                            data-bs-target="#exampleModalCenter{{ $team->id }}"><i
                                                class="bx bx-trash"></i>Удалить</button>
                                        <div class="modal fade" id="exampleModalCenter{{ $team->id }}"
                                            tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Удалить?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('dashboard.teams.destroy', $team->id) }}"
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
