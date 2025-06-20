@section('title') {{ 'Home' }}@endsection
@extends('user.layout')
@section('content')

  <!-- ======= hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="20000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- <div class="carousel-item active" style="background-image: url(https://pmiiuninus.com/storage/home/homepage.jpg);">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Selamat Datang <br> Di Website PC IMM Lampura </h2>
                {{-- <p class="animate__animated animate__fadeInUp">Selamat Datang Di Website Resmi Pergerakan Mahasiswa Islam Indonesia 
                  Komisariat Universitas Islam Nusantara Cabang Kota Bandung, Mari Bergabung Bersama Kami! <br> Bersama PMII Membangun 
                  Indonesia Yang Maju dan Sejahtera Cmiww.....
                </p> --}}
                <a href="/login" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div> -->
        @foreach ($home as $hom)
        <div class="carousel-item active" style="background-image: url({{ asset('sim-pcimm-lampura/public/storage/img/' . $hom->gambar ) }});">
          <div class="carousel-container">
            <div class="container position-absolute top-50 start-50 translate-middle">
              <h2 class="animate__animated animate__fadeInDown">{{ $hom['judul'] }}</h2>
              <p class="m-0 p-0 animate__animated animate__fadeInUp">{{ $hom['deskripsi'] }}</p>
              
              <a href="{{ $hom->link }}" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started!</a>
            </div>
          </div>
        </div>
        @endforeach
        
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->



    <!-- ======= About Us Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>About Us</h3>
        </header>

          <h6 class="text-center pr-2 pl-2">
          Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah (PC IMM) Lampung Utara adalah organisasi kemahasiswaan yang bernaung di bawah Persyarikatan Muhammadiyah. Sebagai bagian dari gerakan dakwah, PC IMM berkomitmen membentuk generasi muda yang unggul dalam aspek intelektual, spiritual, dan sosial. Melalui berbagai program seperti kajian keislaman, pelatihan kepemimpinan, diskusi ilmiah, dan kegiatan sosial, PC IMM Lampung Utara berupaya menjadi wadah pengembangan potensi mahasiswa untuk menjadi pribadi yang berilmu, berintegritas, dan peduli terhadap masyarakat.
          <br><br>
          Dengan visi mewujudkan masyarakat yang berkeadilan dan berkemajuan, PC IMM Lampung Utara terus berkontribusi dalam menjawab tantangan zaman. Melalui pengabdian masyarakat, pemberdayaan pendidikan, dan semangat ukhuwah Islamiyah, organisasi ini hadir sebagai motor penggerak perubahan sosial yang positif. PC IMM Lampung Utara tidak hanya membangun kapasitas anggotanya, tetapi juga mendorong mereka untuk menjadi agen perubahan dalam mendukung kemajuan daerah dan bangsa.
          </h6>

      </div>
    </section><!-- End About Us Section -->

    
    {{-- <!-- ======= Our Clients Section ======= -->
    <section id="clients">
      <div class="container" data-aos="zoom-in">

        <header class="section-header">
          <h3>Rayon-Rayon <br> PC IMM Lampura</h3>
        </header>

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets_user/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets_user/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets_user/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets_user/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets_user/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets_user/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets_user/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets_user/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Our Clients Section --> --}}


    <!-- ======= Facts Section ======= -->
    <section id="facts">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>PC IMM Lampura Dalam Angka</h3>
          <p>Data Kader PC IMM Lampura </p>
        </header>

        <div class="row counters text-center" >

          <div class="col text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $user_mapaba }}" data-purecounter-duration="6" class="purecounter"></span>
            <p>Kader Pasca Darul Arqam Dasar (DAD)</p>
          </div>

          <div class="col text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $user_pkd }}" data-purecounter-duration="5" class="purecounter"></span>
            <p>Kader Pasca Darul Arqam Madya (DAM)</p>
          </div>

          <div class="col text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $user_pkl }}" data-purecounter-duration="4" class="purecounter"></span>
            <p>Kader Pasca Darul Arqam Paripurna (DAP)</p>
          </div>

          <div class="col text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $user_pkn }}" data-purecounter-duration="3" class="purecounter"></span>
            <p>Kader Pasca Pelatihan Khusus</p>
          </div>

        </div>

        <div class="facts-img">
          <img src="assets/img/facts-img.png" alt="" class="img-fluid">
        </div>

      </div>
    </section><!-- End Facts Section -->


    <!-- Reports -->
    <!-- <div class="col-12 p-4"  data-aos="fade-up">
      <div class="card">

        <div class="card-body">
          <h5 class="card-title">Data Mapaba <span>Dari Tahun Ke Tahun</span></h5> -->

          <!-- Line Chart -->
          <!-- <div id="reportsChart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              new ApexCharts(document.querySelector("#reportsChart"), {
                series: [{
                  name: 'Mapaba',
                  data: [{{ $mapaba_2018 }}, {{ $mapaba_2019 }}, {{ $mapaba_2020 }}, 
                  {{ $mapaba_2021 }}, {{ $mapaba_2022 }}, {{ $mapaba_2023 }}, {{ $mapaba_2023 }}],
                }, 

                ],
                chart: {
                  height: 350,
                  type: 'area',
                  toolbar: {
                    show: false
                  },
                },
                markers: {
                  size: 4
                },
                colors: ['#4154f1', '#2eca6a', '#ff771d'],
                fill: {
                  type: "gradient",
                  gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.3,
                    opacityTo: 0.4,
                    stops: [0, 90, 100]
                  }
                },
                dataLabels: {
                  enabled: false
                },
                stroke: {
                  curve: 'smooth',
                  width: 2
                },
                xaxis: {
                  type: 'datetime',
                  categories: ["2018", "2019", "2020", "2021", "2022", "2023",]
                },
                tooltip: {
                  x: {
                    format: 'yyyy'
                  },
                },
              }).render();
            });
          </script> -->
          <!-- End Line Chart -->

        <!-- </div>

      </div>
    </div> -->
    <!-- End Reports -->


    <!-- {{-- <div class="row p-5"> --}}
    <div class="p-4"  data-aos="fade-up"> -->
      <!-- Website Traffic -->
      <!-- <div class="col-12 mb-2">
        <div class="card">
          <div class="card-body pb-0">
            <h5 class="card-title">Kader Berdasarkan <span>| Jenis Kelamin </span></h5>
            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: {{ $user_kelamin_p }},
                        name: 'Perempuan'
                      },
                      {
                        value: {{ $user_kelamin_l }},
                        name: 'Kader Laki-Laki'
                      },
                    ]
                  }]
                });
              });
            </script>
          </div>
        </div>
      </div> -->
      <!-- End Website Traffic -->
    
      <!-- Start Pie Chart -->
      <!-- <div class="col-12 mb-2"  data-aos="fade-up">
        <div class="card">
          <div class="card-body">
          <h5 class="card-title">Kader Berdasarkan <span>| Rayon </span></h5> -->
          <!-- Pie Chart -->
          <!-- <div id="pieChart" style="min-height: 600px;" class="echart"></div>
          <script>
            document.addEventListener("DOMContentLoaded", () => {
              echarts.init(document.querySelector("#pieChart")).setOption({
                title: {
                  // text: 'Referer of a Website',
                  // subtext: 'Fake Data',
                  left: 'center'
                },
                tooltip: {
                  trigger: 'item'
                },
                legend: {
                  orient: 'vertical',
                  left: 'left'
                },
                series: [{
                  name: 'Access From',
                  type: 'pie',
                  radius: '50%',
                  data: [{
                      value: {{ $user_rayon_1 }},
                      name: 'Teknik'
                    },
                    {
                      value: {{ $user_rayon_2 }},
                      name: 'Hukum'
                    },
                    {
                      value: {{ $user_rayon_3 }},
                      name: 'Ulul Albab'
                    },
                    {
                      value: {{ $user_rayon_4 }},
                      name: 'Ekonomi'
                    },
                    {
                      value: {{ $user_rayon_5 }},
                      name: 'Fikom'
                    },
                    {
                      value: {{ $user_rayon_6 }},
                      name: 'Fkip'
                    }
                  ],
                  emphasis: {
                    itemStyle: {
                      shadowBlur: 10,
                      shadowOffsetX: 0,
                      shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                  }
                }]
              });
            });
          </script>
        </div> -->
        <!-- End Pie Chart -->
      <!-- </div>
    </div> -->


    <!-- <div class="col-lg-12 mb-2"  data-aos="fade-up">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Produktivitas Rayon</h5> -->

          <!-- Vertical Bar Chart -->
          <!-- <div id="verticalBarChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              const formalData = [{{ $formalTeknik }}, {{ $formalHukum }}, {{ $formalFai }}, {{ $formalFikom }}, {{ $formalFkip }}, {{ $formalEkonomi }}];
              const nonFormalData = [{{ $nonformalTeknik }}, {{ $nonformalHukum }}, {{ $nonformalFai }}, {{ $nonformalFikom }}, {{ $nonformalFkip }}, {{ $nonformalEkonomi }}];
              const informalData = [{{ $informalTeknik }}, {{ $informalHukum }}, {{ $informalFai }}, {{ $informalFikom }}, {{ $informalFkip }}, {{ $informalEkonomi }}];
          
              formalData.reverse();
              nonFormalData.reverse();
              informalData.reverse();
          
              echarts.init(document.querySelector("#verticalBarChart")).setOption({
                tooltip: {
                  trigger: 'axis',
                  axisPointer: {
                    type: 'shadow'
                  }
                },
                legend: {},
                grid: {
                  left: '3%',
                  right: '4%',
                  bottom: '3%',
                  containLabel: true
                },
                xAxis: {
                  type: 'value',
                  boundaryGap: [0, 0.01]
                },
                yAxis: {
                  type: 'category',
                  data: ['Teknik', 'Hukum', 'Fai', 'Fikom', 'Fkip', 'Ekonomi'].reverse()
                },
                series: [
                  {
                    name: 'Formal',
                    type: 'bar',
                    data: formalData
                  },
                  {
                    name: 'Non Formal',
                    type: 'bar',
                    data: nonFormalData
                  },
                  {
                    name: 'Informal',
                    type: 'bar',
                    data: informalData
                  }
                ]
              });
            });
          </script> -->
          
          <!-- End Vertical Bar Chart -->

        <!-- </div>
      </div>
    </div> -->




    
    <!-- ======= Portfolio Section ======= -->
    <!-- <section id="portfolio" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header py-5">
          <h3>Galeri Terbaru</h3>
        </header>

      <div class="row portfolio-container pt-4 mt-4" data-aos="fade-up" data-aos-delay="200">

        @foreach ($galeries->take(3) as $galeri)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <figure>
              <img src="{{ asset('sim-pcimm-lampura/public/storage/img/' . $galeri->img ) }}" class="img-fluid" alt="" style="width: 120%; height:120%; object-fit:cover; box-shadow: 0px 0px 5px 0px rgba(0,0,5,10);">
              <a href="{{ asset('sim-pcimm-lampura/public/storage/img/' . $galeri->img ) }}" data-lightbox="portfolio" data-title="{{ $galeri->judul }}" class="link-preview"><i class="bi bi-plus"></i></a>
              <a href="/galeri" class="link-details" title="More Details"><i class="bi bi-link"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4>{{ $galeri->judul }}</h4>
              <a href="/profile/{{ $galeri->user->slug }}"><p style="text-transform: lowercase; text-decoration:none">{{ $galeri->user->username }}</p></a>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      </div>
    </section> -->
    <!-- End Portfolio Section -->

    
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header py-5">
          <h3>Artikel Terbaru</h3>
        </header>

      <div class="row portfolio-container pt-4 mt-4" data-aos="fade-up" data-aos-delay="200">

        {{-- @dd($recent_posts) --}}
        @foreach ($recent_posts->take(3) as $post)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <figure>
              <img src="{{ asset('sim-pcimm-lampura/public/storage/img/' . $post->image ) }}" class="img-fluid" alt="" style="width: 120%; height:120%; object-fit:cover; box-shadow: 0px 0px 5px 0px rgba(0,0,5,10);">
              <a href="{{ asset('sim-pcimm-lampura/public/storage/img/' . $post->image ) }}" data-lightbox="portfolio" data-title="{{ $post->title }}" class="link-preview"><i class="bi bi-plus"></i></a>
              <a href="{{ route('post', ['slug' => $post->slug]) }}" class="link-details" title="More Details"><i class="bi bi-link"></i></a>
            </figure>

            <div class="portfolio-info">
              <a href="{{ route('post', ['slug' => $post->slug]) }}"><h4>{{ Str::limit($post->title, '35') }}</h4></a> 
              <a href="{{ route('category', $post->category->slug) }}"><p style="text-transform: none; text-decoration:none">{{ $post->category->title }}</p></a>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      </div>
    </section><!-- End Portfolio Section -->


    
    <!-- View Quotes dihapus -->


    
    <!-- ======= Contact Section ======= -->
    <!-- <section id="contact" class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h3>Kotak Aspirasi</h3>
          <p>Kritik saran dan masukan akan sangat berharga bagi kami</p>
        </div>

        <div class="form">
          <form action="/contact/store" method="post" >
            @csrf
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              {{-- <div class="loading">Loading</div> --}}
            </div>
            <div class="text-center" ><button class="text-center btn btn-success" type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </div>
    </section> -->
    <!-- End Contact Section -->


    <!-- script for chart --> 
    <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="/assets/vendor/echarts/echarts.min.js"></script>
@endsection