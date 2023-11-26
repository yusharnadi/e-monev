@extends('layouts.admin-master')
@section('page-heading')
  <h1>Dashboard</h1>
  <div class="section-header-breadcrumb">
    {{-- <div class="breadcrumb-item"><a href="{{route('penilaian.index')}}">Dashboard</a></div> --}}
  </div>
@endsection
@section('content')
<div class="row">
  <div class="col-12 mb-4">
    <div class="hero bg-primary text-white">
      <div class="hero-inner">
        <h2>Welcome Back, {{ (auth()->user()) ? auth()->user()->name : ''}} !</h2>
        <p class="lead">Dashboard ini menampilkan data periode tahun {{$kinerja->tahun}}.</p>
      </div>
    </div>
  </div>
</div>
{{-- <div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-paste"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Bobot Nilai {{$kinerja->tahun}}</h4>
        </div>
        <div class="card-body">
          {{$penilaian['total_bobot'] ?? 0}}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      @if ($penilaian['kategori_penilaian'] == 'Sehat')
        <div class="card-icon bg-success">
          <i class="fas fa-calendar-check"></i>
        </div>
      @elseif($penilaian['kategori_penilaian'] == 'Kurang Sehat')
        <div class="card-icon bg-warning">
          <i class="fas fa-calendar-check"></i>
        </div>
      @else
        <div class="card-icon bg-danger">
          <i class="fas fa-calendar-check"></i>
        </div>
      @endif
      <div class="card-wrap">
        <div class="card-header">
          <h4>{{$kinerja->tahun}}</h4>
        </div>
        <div class="card-body">
          {{$penilaian['kategori_penilaian'] ?? '-'}}
        </div>
      </div>
    </div>
  </div>               
</div> --}}
<div class="row">
  <div class="col-lg-8 col-md-6 col-sm-6 col-12">
    <div class="card">
      <div class="card-header">
        <h4>Grafik Penilaian Kinerja PDAM</h4>
      </div>
      <div class="card-body">
        <canvas id="chartTahun"></canvas>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4>Grafik Penilaian Kinerja Periode Triwulan {{$kinerja->tahun}}</h4>
      </div>
      <div class="card-body">
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      @if ($penilaian['kategori_penilaian'] == 'Sehat')
        <div class="card-icon bg-success">
          <i class="fas fa-calendar-check"></i>
        </div>
      @elseif($penilaian['kategori_penilaian'] == 'Kurang Sehat')
        <div class="card-icon bg-warning">
          <i class="fas fa-calendar-check"></i>
        </div>
      @else
        <div class="card-icon bg-danger">
          <i class="fas fa-calendar-check"></i>
        </div>
      @endif
      <div class="card-wrap">
        <div class="card-header">
          <h4>{{$kinerja->tahun}}</h4>
        </div>
        <div class="card-body">
          {{$penilaian['kategori_penilaian'] ?? '-'}}
        </div>
      </div>
    </div>
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-paste"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Bobot Nilai {{$kinerja->tahun}}</h4>
        </div>
        <div class="card-body">
          {{$penilaian['total_bobot'] ?? 0}}
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4>Capaian Menurut Aspek {{$kinerja->tahun}}</h4>
      </div>
      <div class="card-body">
        <ul class="list-unstyled list-unstyled-border">
          <li class="media">
            <div class="d-flex justify-content-center align-items-center rounded bg-info text-white mr-4" style="font-size: 24px; width: 30px; height:30px;">
              <i class="fas fa-wallet"></i>
            </div>
            <div class="media-body">
              <div class="media-right">{{$penilaian['bobot_keuangan']}}</div>
              <div class="media-title">Aspek Keuangan</div>
            </div>
          </li>
          <li class="media">
            <div class="d-flex justify-content-center align-items-center rounded bg-primary text-white mr-4" style="font-size: 24px; width: 30px; height:30px;">
              <i class="far fa-thumbs-up"></i>
            </div>
            <div class="media-body">
              <div class="media-right">{{$penilaian['bobot_pelayanan']}}</div>
              <div class="media-title">Aspek Pelayanan</div>
            </div>
          </li>
          <li class="media">
            <div class="d-flex justify-content-center align-items-center rounded bg-warning text-white mr-4" style="font-size: 24px; width: 30px; height:30px;">
              <i class="fas fa-tint"></i>
            </div>
            <div class="media-body">
              <div class="media-right">{{$penilaian['bobot_produksi']}}</div>
              <div class="media-title">Aspek Operasi</div>
            </div>
          </li>
          <li class="media">
            <div class="d-flex justify-content-center align-items-center rounded bg-danger text-white mr-4" style="font-size: 24px; width: 30px; height:30px;">
              <i class="fas fa-users"></i>
            </div>
            <div class="media-body">
              <div class="media-right">{{$penilaian['bobot_sdm']}}</div>
              <div class="media-title">Aspek SDM</div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4>Laporan Bulanan</h4>
        <div class="card-header-action">
          <a href="{{route('pdam-report.index')}}" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive table-invoice">
          <table class="table table-striped">
            <tbody>
              <tr>
                <th>Tahun</th>
                <th>Bulan</th>
                <th>File</th>
                <th>Created at</th>
              </tr>
              @foreach ($reports as $report)
              <tr>
                <td>{{$report->year}}</td>
                <td>{{$report->month}}</td>
                <td><a class="btn btn-warning rounded btn-sm" href="{{asset('uploads/' . $report->filename)}}">Unduh</a></td>
                <td>July 19, 2018</td>
              </tr>
              @endforeach
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('chart')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctx = document.getElementById('myChart');
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: ['Triwulan I', 'Triwulan II', 'Triwulan III', 'Triwulan IV'],
          datasets: [{
              label: 'Nilai Capaian',
              data: [],
              backgroundColor: [
                  'rgba(153, 102, 255, 0.2)',
              ],
              borderColor: [
                  'rgba(153, 102, 255, 1)',
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });

  var ctxTahun = document.getElementById('chartTahun');
  var chartTahun = new Chart(ctxTahun, {
      type: 'bar',
      data: {
          labels: ['2022','2023'],
          datasets: [{
              label: 'Nilai Capaian',
              data: [],
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
              ],
              borderColor: [
                'rgb(255, 99, 132)',
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
</script>
@endpush
@push('css-datatables')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('datatables-js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready( function () {

      const fetchGrafik = function(){
            $.ajax(
                {
                    url: '{{route("kinerja.periode.year")}}',
                    method:'GET',
                    cache:false,
                }
            )
            .done(function(data){

                if(data.data){
                  myChart.data.datasets[0].data.push(data.data.penilaian_triwulan_1);
                  myChart.data.datasets[0].data.push(data.data.penilaian_triwulan_2);
                  myChart.data.datasets[0].data.push(data.data.penilaian_triwulan_3);
                  myChart.data.datasets[0].data.push(data.data.penilaian_triwulan_4);
                }

                myChart.update();
                
            })
            .fail(function(){
                alert('Gagal mengambil grafik data.')
            })
        };

        fetchGrafik();
    });
</script>
@endpush
