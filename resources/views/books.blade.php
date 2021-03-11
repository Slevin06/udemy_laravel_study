{{-- 共通bladeを継承。
 layouts.app の@yield('content')部分に
 下記@section('content')が挿入される。 --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Book
                </div>

                <div class="panel-body">
                    {{-- display validation errors --}}
                    @include('common.errors')

                    {{-- new book form --}}
                    <form action="/book" method="post" class="form-horizontal">
                        @csrf

                        {{-- book name --}}
                        <div class="form-group">
                            <label for="task-name"
                                   class="col-sm-3 control-label">Book</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="book-name"
                                       class="form-control"
                                       value="{{ old('book') }}">
                            </div>

                            {{-- add book button --}}
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit"
                                            class="btn btn-default">
                                        <i class="fa fa-plus">本を追加する</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- books --}}
            @if(isset($books))
                <div class="panel panel-default">
                    <div class="panel-heading">
                        書籍一覧
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Book</th>
                            <th>$nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td class="table-text">
                                        <div>{{$book->title}}</div>
                                    </td>

                                    {{-- task delete button --}}
                                    <td>
                                        <form action="/book/{{$book->id}}"
                                              method="post">
                                            @csrf
                                            {{method_field('DELETE')}}

                                            <button type="submit"
                                                    class="btn btn-danger">
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
