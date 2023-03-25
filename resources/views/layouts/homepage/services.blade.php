<section id="service" class="section">
        @php
            $services = DB::table('services')->get()->first();
            $services_skil = DB::table('services_skil')->get();
        @endphp
        <div class="container text-center">
            <h6 class="subtitle">Service</h6>
            <h6 class="section-title mb-4">{{$services->title}}</h6>
            <p class="mb-5 pb-4">{{$services->description}}</p>

            <div class="row">
                @foreach($services_skil as $row)
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="custom-card card border">
                        <div class="card-body">
                            <i class="{{ $row->fontAwosome}}"></i>
                            <h5>{{ $row->skillName}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>