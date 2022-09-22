@extends('layout.main')

@section('halaman')

  <div class="container">
      <div class="row">
          <div class="col-10 text-center">
            <img src="{{ $dataLiga['data']['logos']['light'] }}" alt="{{ $dataLiga['data']['slug'] }}" style="max-width: 10%">
            <p>Musim {{ $standingYear }}/{{ $standingYear + 1; }}</p>
          </div>
          <div class="col-2">
             <form action="klasemenepl" method="GET">
             <select class="form-select" name="year" id="year" onchange="this.form.submit();" required>
                @for ($i = date("Y"); $i >= 2001; $i--)
                    <option value="{{ $i }}" <?php echo ($standingYear ? ($standingYear == $i ? "selected" : "") : "");?>>{{ $i }}</option>
                @endfor
             </select>
          </div>
      </div>
      <div class="row mt-3">
          <div class="col mb-5 shadow">
            <div class="table-responsive">
            <table class="table">
                <caption style="text-align: justify">
                    <h6>Status Kualifikasi / Degredasi</h6>
                    <ul>
                        <li><span class="badge rounded-pill" style="background-color: #c5f8df;color: black">UEFA Champions League</span></li>
                        <li><span class="badge rounded-pill" style="background-color: #B5E7CE;color: black">Champions League Qualifying</span></li>
                        <li><span class="badge rounded-pill" style="background-color: #B2BFD0;color: black">UEFA CUP / UEFA Europa League</span></li>
                        <li><span class="badge rounded-pill" style="background-color: #FF7F84;color: black">Degradation</span></li>
                    </ul>
                    Data klasemen diatas diambil dari Football Standings API milik mas azharimm, berikut link repo github beliau : <a href="https://github.com/azharimm/football-standings-api" target="blank">Klik Disini</a>
                </caption>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Klub</th>
                    <th scope="col">Main</th>
                    <th scope="col">M</th>
                    <th scope="col">S</th>
                    <th scope="col">K</th>
                    <th scope="col">Poin</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($dataKlasemen['data']['standings'] as $dataepl)
                    @php
                    $color = '';
                    if(!empty($dataepl['note'])){
                        $color = $dataepl['note']['color'];
                    }
                    @endphp
                  <tr style="background-color: {{ $color }}; white-space: nowrap">
                    <th scope="row">{{ $no++ }}</th>
                    <td>
                        <img src="{{ $dataepl['team']['logos'][0]['href'] }}" width="30" height="30" class="me-2">{{ $dataepl['team']['name'] }}
                    </td>
                    <td>{{ $dataepl['stats'][3]['value'] }}</td>
                    <td>{{ $dataepl['stats'][0]['value'] }}</td>
                    <td>{{ $dataepl['stats'][2]['value'] }}</td>
                    <td>{{ $dataepl['stats'][1]['value'] }}</td>
                    <th scope="row">{{ $dataepl['stats'][6]['value'] }}</th>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
              <!--p style="text-align: justify"><b>*</b> Data klasemen diatas diambil dari Football Standings API milik mas azharimm, berikut link repo github beliau : <a href="https://github.com/azharimm/football-standings-api" target="blank">Klik Disini</a></p-->
          </div>
      </div>
  </div>

@endsection
