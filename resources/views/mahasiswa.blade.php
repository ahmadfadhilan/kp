@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="right">
                    <a  href="{{ route('mahasiswa.excel') }}" class="btn btn-success">Export to Excel</a>
                </div>
                <div class="card-body">
                  Daftar Jumlah Mahasiwa:
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => 'mahasiswa','class' => 'ajax']) !!}
                      {!! Form::selectYear('year', 2008, 2017,null,['placeholder'=>'Pilih Tahun ...']) !!}
                      {!! Form::select('semester', ['1' => 'Semester 1', '2' => 'Semester 2'],null,['placeholder'=>'Pilih Semester ...'])!!}
                      {!! Form::submit('Click Me!')!!}
                    {!! Form::close() !!}

                    <?php
                      if(isset($_POST['year'],$_POST['semester'])){
                        $year=$_POST['year'];
                        $semester=$_POST['semester'];
                    ?>

                    <table border="1" cellpadding="10">
                      <tr>
                        <th>Tahun-Semester</th>
                        <th>Sistem Informasi</th>
                        <th>Sistem Komputer</th>
                        <th>Action</th>
                      </tr>
                      <tr>
                          <td>{{$year}}-{{$semester}}</td>
                          <td>{{$c[$semester][$year][0]->jumlah}}</td>
                          <td>{{$b[$semester][$year][0]->jumlah}}</td>
                          <td></td>
                      </tr>
                    </table>
                    <?php  }?>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">  </script>
<script>
  $('form.ajax').on('submit',function(){
    var that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        data = {};

    that.find('[year]').each(function(index, value){
      var that = $(this),
          year = that.attr('year'),
          value = that.val();

      data[year] = value;
    });

    $.ajax({
        url = url,
        type = type,
        data = data,
        success: function(response){
          console.log(response);
        }
    });
    return false;
  });
</script>
@endsection
