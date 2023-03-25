<header class="header" id="home">
    @php
        $data = DB::table('header')->get()->first();
    @endphp
    <div class="container">
        <div class="infos">
            <h6 class="subtitle">hello,I'm</h6>
            <h6 class="title">{{$data->name}}</h6>
            <p>{{$data->profession}}</p>

            <div class="buttons pt-3">
                <button class="btn btn-primary rounded"><a href="{{$data->email}}" >HIRE ME</a></button>
                <button class="btn btn-dark rounded"><a href="{{$data->cv}}" >CV</a></button>
            </div>      

            <div class="socials mt-4">
                <a class="social-item" target="__blank" href="{{$data->facebook}}"><i class="ti-facebook"></i></a>
                <a class="social-item" target="__blank" href="{{$data->github}})"><i class="ti-github"></i></a>
                <a class="social-item" target="__blank" href="{{$data->twitter}}"><i class="ti-twitter"></i></a>
            </div>
        </div>              
        <div class="img-holder">
            <img src="{{$data->image}}" alt="">
        </div>      
    </div>  
</header>