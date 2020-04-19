@extends('layout.adminPupuk')
@section('page-wrapper')
<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Pupuk</h1>
    </div>   <!--End Page Header -->
</div>  
<div class="row">
    <div class="col-lg-12">
        <!--   Kitchen Sink -->
        <div class="panel panel-success">
            <div class="panel-heading">
                Tabel Pupuk
            </div>
            <div class="panel-body">
            <a href="{{route('Pupuk.create')}}"><button type="submit" class="btn btn-outline btn-success btn-sm" ><img src="{{asset('assets/img/create.png')}}" alt="" />Create</button></a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr >
                                <th class="text-center">#</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center" colspan="2">Aksi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pupuk as $in=>$val)
                            <tr>
                                <td class="text-center">{{$in+1}}</td>
                                <td>{{$val->nama_pupuk}}</td>
                                <td class="text-center">{{$val->jumlah_pupuk}}</td>
                                <td class="text-center">{{$val->harga_pupuk}}</td>
                                <td>{{$val->keterangan}}</td>
                                <td class="text-center">
                                    <a href="{{route('Pupuk.edit',$val->id_pupuk)}}"><button type="submit" class="btn btn-outline btn-info btn-sm"><img src="{{asset('assets/img/update.png')}}" alt="" />Update</button></a>
                                </td>
                                <td class="text-center">
                                    <form action="{{route('Pupuk.destroy',$val->id_pupuk)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline btn-danger btn-sm"><img src="{{asset('assets/img/delete.png')}}" alt="" />Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$pupuk->links()}}
                </div>
            </div>
            <div class="panel-footer"></div>
        </div>
        <!-- End  Kitchen Sink -->
    </div>           
</div>

@endsection
           