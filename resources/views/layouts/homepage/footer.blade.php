 <footer class="page-footer">
        <div class="container">
            <div class="row align-items-center">
                @php
                    $data = DB::table('header')->get()->first();
                @endphp
                <div class="col-sm-6">
                    <p>Copyright <script>document.write(new Date().getFullYear())</script> &copy; <a href="http://www.rezaulkarimrk.com" target="_blank">{{ config('app.name') }}</a></p>
                </div>
                <div class="col-sm-6">
                    <div class="socials">
                        <a class="social-item" target="__blank" href="{{$data->facebook}}"><i class="ti-facebook"></i></a>
                        <a class="social-item" target="__blank" href="{{$data->github}}"><i class="ti-github"></i></a>
                        <a class="social-item" target="__blank" href="{{$data->twitter}}"><i class="ti-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer> 