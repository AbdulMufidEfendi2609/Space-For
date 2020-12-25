@extends('layouts.landing')

@section('title', "Landing")

@section('content')
<center>
    <section id="hero" class="section hero">
        @if (auth()->user()->level== "user")
        <div class="container">
            <div>
                <div class="col-50  col-md-12 col-lg-10 center">
                    <div class="hero-headline mt-10" >Event Yang Anda Ikuti</div>
                </div>
                <br>
                <div class="row">
                    @foreach ($participants as $item)
                    {{-- @dd($item->events) --}}
                    <!-- Panel #1 -->
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="feature-panel mb-5">
                            <div class="feature-img bg-blue">
                                @if ($item->events->image_url == null)
                                <a href="#">
                                    <img src="{{ asset('landing/images/features/champion.svg') }}" alt="target">
                                </a>
                                @else
                                <a href="#">
                                    <img src="{{ asset($item->events->image_url) }}" width="100%" alt="target">
                                </a>
                                @endif
                            </div>
                            <div class="feature-content">
                                <h3 class="text-capitalize">{{$item->events->event_name}}</h3>
                                <p>{{\Carbon\Carbon::parse($item->events->start_date)->isoFormat('dddd, D MMMM Y')}} - {{\Carbon\Carbon::parse($item->events->end_date)->isoFormat('dddd, D MMMM Y')}} | {{$item->events->start_time}} - {{$item->events->end_time}} | {{$item->events->lokasi}}</p>
                                @if ($item->status == "belum bayar")
                                <button onclick="bayarButton({{$item->events->id}})" class="btn btn-primary mt-4">Bayar</button>
                                @elseif($item->status == "proses")
                                <button disabled class="btn btn-warning mt-4">Menunggu Konfirmasi</button>
                                @else
                                <a href="{{url('presence', $item->events->id)}}" class="btn btn-primary mt-4">Precense</a>
                                @endif
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                    @endforeach
                </div>
            </div>
            <!-- .row end -->
        </div>
        @elseif(auth()->user()->level== "penyedia")
        <div class="container">
            <div>
                <div class="col-md-12 col-lg-12 mb-3 center">
                    <div class="hero-headline mt-10" >Event Yang Anda Selenggarakan</div>
                    <a class="btn btn-primary btn-bordered" href="{{url('/create/event')}}">Tambah Event</a>
                </div>
                <br>
                <div class="row">
                    @foreach ($ourEvent as $item)
                    <!-- Panel #1 -->
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="feature-panel mb-5">
                            <div class="feature-img bg-blue">
                                @if ($item->image_url == null)
                                <a href="{{url('detail-event', $item->id)}}">
                                    <img src="{{ asset('landing/images/features/champion.svg') }}" alt="target">
                                </a>
                                @else
                                <a href="{{url('detail-event', $item->id)}}">
                                    <img src="{{ asset($item->image_url) }}" width="100%" alt="target">
                                </a>
                                @endif
                            </div>
                            <div class="feature-content">
                                <h3 class="text-capitalize">{{$item->event_name}}</h3>
                                <p>{{\Carbon\Carbon::parse($item->start_date)->isoFormat('dddd, D MMMM Y')}} - {{\Carbon\Carbon::parse($item->end_date)->isoFormat('dddd, D MMMM Y')}} | {{$item->start_time}} - {{$item->end_time}} | {{$item->lokasi}}</p>
                               
                                @if ($item->status == "pending")
                                <button onclick="bayarEventButton({{$item->id}})" class="btn btn-primary mt-4">Bayar</button>
                                @elseif($item->status == "proses")
                                <button disabled class="btn btn-warning mt-4">Menunggu Konfirmasi</button>
                                @else
                                <a href="{{url('participant-event', $item->id)}}" class="btn btn-primary mt-4">Peserta</a>
                                @endif    
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                    @endforeach
                </div>
            </div>
            <!-- .row end -->
        </div>
        @endif
        <!-- .container end -->
    </section>
</center>
<!-- #slider end -->
<section id="feature1" class="section feature feature-center bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading heading-1 text--center mb-80">
                    <h2 >
                        Event Web-Seminar
                    </h2>
                    <h5>Daftar Web-Seminar disini, dan ikuti Event-nya!</h5>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($events as $item)
            <!-- Panel #1 -->
            <div class="col-12 col-md-4 col-lg-4">
                <div class="feature-panel">
                    <div class="feature-img bg-blue">
                        @if ($item->image_url == null)
                        <a href="{{url('event', $item->id)}}">
                            <img src="{{ asset('landing/images/features/champion.svg') }}" alt="target">
                        </a>
                        @else
                        <a href="{{url('detail-event', $item->id)}}">
                            <img src="{{ asset($item->image_url) }}" width="100%" alt="target">
                        </a>
                        @endif
                    </div>
                    <div class="feature-content">
                        <h3 class="text-capitalize">{{$item->event_name}}</h3>
                        <p>Hari, Tanggal: Sabtu, 17 Oktober 2020 Waktu: Pukul 09.30 WIB-selesai Live on Zoom</p>
                    </div>
                </div>
                <!-- .feature-panel end -->
            </div>
            <!-- .col-md-4 end -->
            @endforeach
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #feature1 end -->
<div class="modal fade" id="bayarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Pembayaran</h5>
                <div id="price"></div>
                <form id="form-bayar" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Bank Name</label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="">Bank Account Number</label>
                        <input type="text" class="form-control" id="bank_account_number" name="bank_account_number" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="">Bank Account Owner</label>
                        <input type="text" class="form-control" id="bank_account_owner" name="bank_account_owner" aria-describedby="emailHelp" >
                    </div>
                    <div class="form-group">
                        <label for="">Bank Branch Name</label>
                        <input type="text" class="form-control" id="bank_branch_name" name="bank_branch_name" aria-describedby="emailHelp" >
                    </div>
                    <div class="form-group">
                        <label for="">Transfer Date</label>
                        <input type="date" class="form-control" id="transfer_date" name="transfer_date" aria-describedby="emailHelp" >
                    </div>
                    <div class="form-group">
                        <label for="">Transfer Time</label>
                        <input type="time" class="form-control" id="transfer_time" name="transfer_time" aria-describedby="emailHelp" >
                    </div>
                    <div class="form-group">
                        <label for="invoice_proof">Invoice Proof (img)</label>
                        <input type="file" class="form-control" id="invoice_proof" name="invoice_proof" aria-describedby="emailHelp" >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function () {
        
    })
    function number_format (number, decimals, decPoint, thousandsSep) { 
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
        var n = !isFinite(+number) ? 0 : +number
        var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
        var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
        var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
        var s = ''
        
        var toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec)
            return '' + (Math.round(n * k) / k)
            .toFixed(prec)
        }
        
        // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || ''
            s[1] += new Array(prec - s[1].length + 1).join('0')
        }
        
        return s.join(dec)
    }
    
    function bayarButton(id) {
        $.ajax({
            type: "GET",
            url: "{{'get-organization'}}" + "/" + id,
            dataType: "JSON",
            success: function (data) {
                var action = "{{url('bayar')}}" + "/" + data[0]['id'] + "/" + data[1]['id']
                var price = number_format(data[0]['price'])
                
                $('#price').html('<h6>Total : '+price+'</h6>')
                $('#bank_name').val(data[1]['nama_bank'])
                $('#bank_account_number').val(data[1]['no_rek'])
                $('#bank_account_owner').val(data[1]['nama_pemilik_rekening'])
                $('#bank_branch_name').val(data[1]['nama_cabang'])
                
                $('#form-bayar').attr('action', action)
            }
        })
        $('#bayarModal').modal("show")
    }

    function bayarEventButton(id) {
        $.ajax({
            type: "GET",
            url: "{{'get-admin'}}",
            dataType: "JSON",
            success: function (data) {
                console.log(data['bank_name']);
                var action = "{{url('bayar-event')}}" + "/" + id
                var price = number_format(30000)
                
                $('#price').html('<h6>Total : '+price+'</h6>')
                $('#bank_name').val(data['bank_name'])
                $('#bank_account_number').val(data['bank_account_number'])
                $('#bank_account_owner').val(data['bank_account_owner'])
                $('#bank_branch_name').val(data['bank_branch_name'])
                
                $('#form-bayar').attr('action', action)
            }
        })
        $('#bayarModal').modal("show")
    }
</script>
@endsection
