<section id="about" class="section mt-3">
        <div class="container mt-5">
            <div class="row text-center text-md-left">
                @php
                    $data = DB::table('header')->get()->first();
                    $about = DB::table('_about')->get()->first();
                @endphp
                <div class="col-md-3">
                    <img src="{{$about->image}}" alt="" class="img-thumbnail mb-4">
                </div>
                <div class="pl-md-4 col-md-9">
                    <h6 class="title">{{$data->name}}</h6>
                    <p class="subtitle">{{$data->profession}}</p>
                    <p>{{$about->description}}</p>
                    <button class="btn btn-primary rounded mt-3"><a href="{{$data->cv}}" >DOWNLOAD CV</a></button>                   
                </div>
            </div>
        </div>
    </sectin>