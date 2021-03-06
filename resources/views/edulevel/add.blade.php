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
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Tambah Jenjang</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{url('edulevels')}}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"> Back</i>
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{url('edulevels')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama Jenjang</label>
                                    <input type="text" name="name" autofocus class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        {{-- <div class="invalid-feedback">{{ $message }}</div> --}}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <textarea name="desc" class="form-control">{{old('desc')}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
