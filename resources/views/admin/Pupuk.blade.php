@extends('layout.admin')
@section('page-wrapper')
<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Pupuk</h1>
    </div>   <!--End Page Header -->
</div>  
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                RINCIAN:
            </div>
            <div class="panel-body">
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Biodata Diri
                        </div>
                        <div class="panel-body">
                            <p style="line-height: 40px;">
                                Nama &nbsp;: Made Arya Widiarta <br>
                                NIM &nbsp;: 1815051028 <br>
                                Program Studi &nbsp;: Pendidikan Teknik Informatika
                            </p>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Studi Kasus
                        </div>
                        <div class="panel-body">
                            <p style="line-height: 40px;">
                                Judul &nbsp;: Sistem Informasi Subak (SIBAK) <br>
                                Penjelasan &nbsp;: SIBAK merupakan sistem yang membantu pendataan kegiatan subak
                            </p>
                        </div>  
                    </div>
                </div>
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
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center" colspan="2">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pupuk as $in=>$val)
                                        <tr>
                                            <td class="text-center">{{$in+1}}</td>
                                            <td>{{$val->nama_pupuk}}</td>
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
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
            </div>  
            <div class="panel-footer"></div>
        </div>
    </div>            
</div>

@endsection
           