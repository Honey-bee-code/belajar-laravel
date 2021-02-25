@extends('main')

@section('title', 'Program')
{{-- karena title satu baris jadi gak perlu endsection  --}}
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Program</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Program</a></li>
                        <li><a href="#">Data</a></li>
                        <li class="active">Edit</li>
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
                        <strong>Edit Program</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{url('programs')}}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"> Back</i>
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{url('programs/'.$program->id)}}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama Program</label>
                                    <input type="text" name="name" autofocus class="form-control @error('name') is-invalid @enderror" value="{{old('name', $program->name)}}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        {{-- <div class="invalid-feedback">{{ $message }}</div> --}}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Jenjang</label>
                                    <select name="edulevel_id" class="form-control @error('edulevel_id') is-invalid @enderror">
                                        <option value="">- Pilih -</option>
                                        @foreach ($edulevels as $item)
                                        <option value="{{ $item->id }}" {{ old('edulevel_id', $program->edulevel_id) == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('edulevel_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        {{-- <div class="invalid-feedback">{{ $message }}</div> --}}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Harga Member</label>
                                    <input type="number" name="student_price" class="form-control" value="{{old('student_price', $program->student_price)}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Member Maksimal</label>
                                    <input type="number" name="student_max" class="form-control" value="{{old('student_max', $program->student_max)}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Info</label>
                                    <textarea name="info" class="form-control">{{old('info', $program->info)}}</textarea>
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
