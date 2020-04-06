@extends('layout.admin')
@section('page-wrapper')
<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Input Data Pupuk</h1>
    </div>   <!--End Page Header -->
</div>  
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                RINCIAN:
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="{{(isset($pupuk))?route('Pupuk.update',$pupuk->id_pupuk):route('Pupuk.store')}}" method="POST" role="form">
                            @csrf 
                            @if(isset($pupuk))?@method('PUT')@endif
                            <div class="form-group">
                                <label>Nama Pupuk</label>
                                <input type="text" value="{{(isset($pupuk))?$pupuk->nama_pupuk:old('nama_pupuk')}}" name="nama_pupuk" class="form-control">
                                @error('nama_pupuk')<small style="color:red">{{$message}}</small>@enderror
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" value="{{(isset($pupuk))?$pupuk->keterangan:old('keterangan')}}" name="keterangan" class="form-control">
                                @error('keterangan')<small style="color:red">{{$message}}</small>@enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline btn-primary">Save</button>
                                <a href="{{route('Pupuk.index')}}"><button type="button" class="btn btn-outline btn-success">Cancel</button></a>
                                
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
            <div class="panel-footer"></div>
        </div>
    </div>            
</div>
@endsection
           