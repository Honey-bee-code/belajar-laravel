@extends('main')

@section('title', 'Edulevel')
{{-- karena title satu baris jadi gak perlu endsection  --}}
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Data Jenjang</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Edulevel</a></li>
                        <li class="active">Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Data Jenjang</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{url('edulevels/add')}}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"> Add</i>
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="20px">No.</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th width="100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($edulevels as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>{{--Documentation, Frontend, Loop--}}
                                <td>{{$item->name}}</td>
                                <td>{{$item->desc}}</td>
                                <td class="text-center">
                                    <a href="{{url('edulevels/edit/'.$item->id)}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                </td>
                            </tr>                        
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
