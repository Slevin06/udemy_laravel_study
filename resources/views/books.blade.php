{{-- 共通bladeを継承。
 layouts.app の@yield('content')部分に
 下記@section('content')が挿入される。 --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <h1 class="panel-heading">
                    Register New Book
                </h1>

                <br>

                <div class="panel-body">
                    {{-- display validation errors --}}
                    @include('common.errors')

                    {{-- new book form --}}
                    <form action="/book" method="post" class="form-horizontal"
                          enctype="multipart/form-data">
                        @csrf

                        {{-- book name --}}
                        <div class="form-group">
                            <label for="task-name"
                                   class="col-sm-3 control-label">
                                Book Title
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="book-name"
                                       class="form-control"
                                       value="{{ old('book') }}">
                            </div>

                            <br>

                            <label for=""
                                   class="col-sm-3 control-label">
                                Book Image
                                <input type="file" name="book_image"
                                       accept=".png,.jpg,.jpeg,image/png,image/jpg">
                            </label>

                            {{-- add book button --}}
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit"
                                            class="btn btn-primary">
                                        ＋ 本を追加する
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- books --}}
            @if(isset($bookAttributes))
                <div class="panel panel-default">
                    <div class="panel-heading">
                        書籍一覧
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Book Title</th>
                            <th>Book Image</th>
                            <th>&nbsp;</th>
                            </thead>
                            @if (session('create success'))
                                <div style="color: red">
                                    {{ session('create success') }}
                                </div>
                            @elseif (session('delete success'))
                                <div style="color: red">
                                    {{ session('delete success') }}
                                </div>
                            @endif
                            <tbody>
                            @foreach($bookAttributes as $bookAttribute)
                                <tr>
                                    <td class="table-text">
                                        <div>{{$bookAttribute->title}}</div>
                                    </td>
                                    <td class="table-text">
                                        @if (!empty($bookAttribute->img_name))
                                            <img
                                                src="{{ asset('storage/images/' . $bookAttribute->img_name) }}"
                                                alt="書影">
                                        @else
                                            <img
                                                src="{{ asset('storage/images/default.png') }}"
                                                alt="デフォルト画像">
                                        @endif
                                    </td>

                                    {{-- task delete button --}}
                                    <td>
                                        <form
                                            action="/book/{{$bookAttribute->id}}"
                                            method="post">
                                            @csrf

                                            <button type="submit"
                                                    class="btn btn-danger"
                                                    id="delete-btn">
                                                <i class="fa fa-trash"></i>削除
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
