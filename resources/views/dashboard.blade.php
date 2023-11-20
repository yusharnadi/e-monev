@extends('layouts.admin-master')
@section('page-heading')
  <h1>Dashboard</h1>
  <div class="section-header-breadcrumb">
    {{-- <div class="breadcrumb-item"><a href="{{route('penilaian.index')}}">Dashboard</a></div> --}}
  </div>
@endsection
@section('content')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-paste"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Bobot Nilai {{$tahun}}</h4>
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
          <h4>{{$tahun}}</h4>
        </div>
        <div class="card-body">
          {{$penilaian['kategori_penilaian'] ?? '-'}}
        </div>
      </div>
    </div>
  </div>               
</div>
<div class="row">
  <div class="col-lg-8 col-md-6 col-sm-6 col-12">
    <div class="card">
      <div class="card-header">
        <h4>Grafik Periode Triwulan {{$tahun}}</h4>
      </div>
      <div class="card-body">
        
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card">
      <div class="card-header">
        <h4>Capaian Menurut Aspek {{$tahun}}</h4>
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
  </div>
</div>
@endsection
@push('chart')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctx = document.getElementById('myChart');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['aspek 1', 'aspek 2', 'aspek 3', 'aspek 4', 'aspek 5', 'aspek 6', 'aspek 7'],
          datasets: [{
              label: 'Status Laporan berdasarkan aspek',
              data: [10, 20,30,40, 50,60,70],
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

  var ctxLaporan = document.getElementById('laporanChart');
  var laporanChart = new Chart(ctxLaporan, {
    type: 'doughnut',
    data: {
        labels: ['Sudah Lapor', 'Belum Lapor'],
        datasets: [
          {
            label: 'Dataset 1',
            data: [20,10],
            backgroundColor: ['rgba(153, 102, 255, 1)','rgb(255,99,132)' ],
          }
        ]
      },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          // text: 'Chart.js Doughnut Chart'
        }
      }
    },
  });

  var ctxMonev = document.getElementById('monevChart');
  var monevChart = new Chart(ctxMonev, {
    type: 'doughnut',
    data: {
        labels: ['Sudah dimonev', 'Belum dimonev'],
        datasets: [
          {
            label: 'Dataset 1',
            data: [20,10],
            backgroundColor: ['rgba(153, 102, 255, 1)','rgb(255,99,132)' ]
          }
        ]
      },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          // text: 'Chart.js Doughnut Chart'
        },
        weight: 2
      }
    },
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
      // Select2
      if(jQuery().select2) {
        $(".select2").select2();
      }
    });
</script>
@endpush
