@extends('layouts.landing')

@section('title', "Landing")

@section('content')
<section id="hero" class="section hero">
    <div class="container">
        <div>
            <div class="col-md-12 col-lg-12 text-center">
                <div class="hero-headline mt-10" style="color:#F96145" >Profile Organization</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="hero-form">
                    @if ($organization == null)
                    <form method="post" action="{{url('organization')}}" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Organisasi</label>
                                    <input type="text" id="nama" name="nama" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror">
                                    @error('nama')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" value="{{old('alamat')}}" class="form-control @error('alamat') is-invalid @enderror">
                                    @error('alamat')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" id="website" name="website" value="{{old('website')}}" class="form-control @error('website') is-invalid @enderror">
                                    @error('website')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No. Telepon</label>
                                    <input type="number" id="no_telp" name="no_telp" value="{{old('no_telp')}}" class="form-control @error('no_telp') is-invalid @enderror">
                                    @error('no_telp')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="logo_organisai">Logo Organisasi</label>
                                    <input type="file" id="logo_organisasi" name="logo_organisasi" class="form-control-file @error('logo_organisasi') is-invalid @enderror">
                                    @error('logo_organisasi')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="foto_perusahaan">Foto Perusahaan</label>
                                    <input type="file" id="foto_perusahaan" name="foto_perusahaan" class="form-control-file @error('foto_perusahaan') is-invalid @enderror">
                                    @error('foto_perusahaan')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_bank">Nama Bank</label>
                                    <input type="text" id="nama_bank" name="nama_bank" value="{{old('nama_bank')}}" class="form-control @error('nama_bank') is-invalid @enderror">
                                    @error('nama_bank')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_rek">No. Rekening</label>
                                    <input type="text" id="no_rek" name="no_rek" value="{{old('no_rek')}}" class="form-control @error('no_rek') is-invalid @enderror">
                                    @error('no_rek')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_pemilik_rekening">Nama Pemilik Rekening</label>
                                    <input type="text" id="nama_pemilik_rekening" value="{{old('nama_pemilik_rekening')}}" name="nama_pemilik_rekening" class="form-control @error('nama_pemilik_rekening') is-invalid @enderror">
                                    @error('nama_pemilik_rekening')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_cabang">Nama Cabang</label>
                                    <input type="text" id="nama_cabang" name="nama_cabang" value="{{old('nama_cabang')}}" class="form-control @error('nama_cabang') is-invalid @enderror">
                                    @error('nama_cabang')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kartu_identitas">Kartu Identitas</label>
                                    <select name="kartu_identitas" id="kartu_identitas" class="form-control @error('kartu_identitas') is-invalid @enderror" onchange="selectIdentitas()">
                                        {{-- <option value="peserta" {{old('jenis', $user->jenis) === 'peserta' ? 'selected' : ''}}>Mengikuti Event</option>
                                        <option value="penyedia" {{old('jenis', $user->jenis) === 'penyedia' ? 'selected' : ''}}>Menyelenggarakan Event</option> --}}
                                        {{-- <option disabled selected value="">Pilih Kartu Identitas</option> --}}
                                        <option value="" disabled selected>Pilih Kartu Identitas Anda</option>
                                        <option value="NPWP">NPWP</option>
                                        <option value="KTP">KTP</option>
                                    </select>
                                    @error('kartu_identitas')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div id="input-tambahan"></div>
                            </div>
                        </div>


                        <div>
                            <input type="submit" class="btn btn--primary btn--block mt-10" value="Simpan">
                        </div>
                    </form>
                    @else
                    <form method="post" action="{{url('organization', $organization->id)}}" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Organisasi</label>
                                    <input type="text" id="nama" name="nama" value="{{old('nama', $organization->nama)}}" class="form-control @error('nama') is-invalid @enderror">
                                    @error('nama')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" value="{{old('alamat', $organization->alamat)}}" class="form-control @error('alamat') is-invalid @enderror">
                                    @error('alamat')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" id="website" name="website" value="{{old('website', $organization->website)}}" class="form-control @error('website') is-invalid @enderror">
                                    @error('website')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{old('email', $organization->email)}}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No. Telepon</label>
                                    <input type="text" id="no_telp" name="no_telp" value="{{old('no_telp', $organization->no_telp)}}" class="form-control @error('no_telp') is-invalid @enderror">
                                    @error('no_telp')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="logo_organisai">Logo Organisasi</label>
                                    <div class="my-3">
                                        <img src="{{asset('storage/'. $organization->logo_organisasi)}}" alt="" width="100">
                                    </div>
                                    <input type="file" id="logo_organisasi" name="logo_organisasi" class="form-control-file @error('logo_organisasi') is-invalid @enderror">
                                    @error('logo_organisasi')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="foto_perusahaan">Foto Perusahaan</label>
                                    <div class="my-3">
                                        <img src="{{asset('storage/'. $organization->foto_perusahaan)}}" alt="" width="100">
                                    </div>
                                    <input type="file" id="foto_perusahaan" name="foto_perusahaan" class="form-control-file @error('foto_perusahaan') is-invalid @enderror">
                                    @error('foto_perusahaan')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_bank">Nama Bank</label>
                                    <input type="text" id="nama_bank" name="nama_bank" value="{{old('nama_bank', $organization->nama_bank)}}" class="form-control @error('nama_bank') is-invalid @enderror">
                                    @error('nama_bank')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_rek">No. Rekening</label>
                                    <input type="text" id="no_rek" name="no_rek" value="{{old('no_rek', $organization->no_rek)}}" class="form-control @error('no_rek') is-invalid @enderror">
                                    @error('no_rek')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_pemilik_rekening">Nama Pemilik Rekening</label>
                                    <input type="text" id="nama_pemilik_rekening" value="{{old('nama_pemilik_rekening', $organization->nama_pemilik_rekening)}}" name="nama_pemilik_rekening" class="form-control @error('nama_pemilik_rekening') is-invalid @enderror">
                                    @error('nama_pemilik_rekening')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_cabang">Nama Cabang</label>
                                    <input type="text" id="nama_cabang" name="nama_cabang" value="{{old('nama_cabang', $organization->nama_cabang)}}" class="form-control @error('nama_cabang') is-invalid @enderror">
                                    @error('nama_cabang')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kartu_identitas">Kartu Identitas</label>
                                    <select name="kartu_identitas" id="kartu_identitas" class="form-control @error('kartu_identitas') is-invalid @enderror" onchange="selectIdentitas()">
                                        {{-- <option value="peserta" {{old('jenis', $user->jenis) === 'peserta' ? 'selected' : ''}}>Mengikuti Event</option>
                                        <option value="penyedia" {{old('jenis', $user->jenis) === 'penyedia' ? 'selected' : ''}}>Menyelenggarakan Event</option> --}}
                                        {{-- <option disabled selected value="">Pilih Kartu Identitas</option> --}}
                                        @if ($organization->kartu_identitas == "npwp")
                                        <option value="NPWP" selected>NPWP</option>
                                        <option value="KTP">KTP</option>
                                        @else
                                        <option value="NPWP">NPWP</option>
                                        <option value="KTP" selected>KTP</option>
                                        @endif

                                    </select>
                                    @error('kartu_identitas')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div id="input-tambahan"></div>
                            </div>
                        </div>


                        <div>
                            <input type="submit" class="btn btn--primary btn--block mt-10" value="Simpan">
                        </div>
                    </form>
                    @endif
                </div>

            </div>
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>


@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#kartu_identitas').trigger("change");

        $.ajax({
            type: "GET",
            url: "{{url('get-organization')}}",
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                //ktp
                var imgKtp = "{{asset('storage')}}" + "/" + data['foto_ktp']
                $('#image-ktp').attr('src', imgKtp)
                $('#nik').val(data['nik'])
                $('#nama_ktp').val(data['nama_ktp'])

                //npwp
                var imgNpwp = "{{asset('storage')}}" + "/" + data['foto_npwp']
                $('#image-npwp').attr('src', imgNpwp)
                $('#no_npwp').val(data['no_npwp'])
                $('#nama_npwp').val(data['nama_npwp'])
            }
        })
    })

    function selectIdentitas() {
        var value = $('#kartu_identitas').val();
        if (value == "NPWP") {
            $('#input-tambahan').html('<div class="form-group"><label for="foto_npwp">Foto Npwp</label><div class="my-3"><img id="image-npwp" width="100" alt=""></div><input type="file" id="foto_npwp" name="foto_npwp" class="form-control-file @error("foto_npwp") is-invalid @enderror">@error("foto_npwp") <div class="text-danger">{{$message}}</div> @enderror</div><div class="form-group"><label for="no_npwp">No. NPWP</label><input type="text" id="no_npwp" name="no_npwp" class="form-control @error("no_npwp") is-invalid @enderror">@error("no_npwp") <div class="text-danger">{{$message}}</div> @enderror</div><div class="form-group"><label for="nama_npwp">Nama (yang tertera pada NPWP)</label><input type="text" id="nama_npwp" name="nama_npwp" class="form-control @error("nama_npwp") is-invalid @enderror">@error("nama_npwp") <div class="text-danger">{{$message}}</div> @enderror</div>')
        }else if (value == "KTP") {
            $('#input-tambahan').html('<div class="form-group"><label for="foto_ktp">Foto KTP</label><div class="my-3"><img id="image-ktp" width="100" alt=""></div><input type="file" id="foto_ktp" name="foto_ktp" class="form-control-file"></div><div class="form-group"><label for="nik">NIK</label><input type="text" id="nik" name="nik" class="form-control"></div><div class="form-group"><label for="nama_ktp">Nama (yang tertera pada KTP)</label><input type="text" id="nama_ktp" name="nama_ktp" class="form-control"></div>')
        }
    }
</script>
@endsection
