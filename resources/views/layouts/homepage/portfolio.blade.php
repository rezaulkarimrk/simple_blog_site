<section id="portfolio" class="section">
        <div class="container text-center">
            @php
                $data = DB::table('_portfolio')->get()->first();
                $portfolio = DB::table('_portfolio_list')->get();
            @endphp
            <h6 class="subtitle">Portfolio</h6>
            <h6 class="section-title mb-4">{{$data->title}}</h6>
            <p class="mb-5 pb-4">{{$data->description}}</p>

            <div class="row">
                @foreach($portfolio as $row)
                <div class="col-sm-4">
                    <div class="img-wrapper">
                        <img src="{{$row->image}}" alt="">
                        <div class="overlay">
                            <div class="overlay-infos">
                                <h5>{{$row->title}}</h5>
                                <a href="javascript:void(0)"><i class="ti-zoom-in"></i></a>
                                <a href="{{$row->link}}"><i class="ti-link"></i></a>
                            </div>                              
                        </div>
                    </div>                  
                </div>
                @endforeach
            </div>
        </div>
    </section>