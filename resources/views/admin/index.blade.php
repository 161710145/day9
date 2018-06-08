@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <center><div class="panel-heading">Absen Kelas</div></center>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <center>Selamat Datang Diadmin<br>
                    <a href="{{ route('absensi.index') }}">Absensi</a></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


                   
