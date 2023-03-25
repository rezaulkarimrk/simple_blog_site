<section class="section">
        <div class="container text-center">
            @php
                $skill = DB::table('skills')->get()->first();
                $skill_list = DB::table('skills_list')->get();
            @endphp
            <h6 class="subtitle">Skills</h6>
            <h6 class="section-title mb-4">{{$skill->title}}</h6>
            <p class="mb-5 pb-4">{{$skill->description}}</p>

            <div class="row text-left">
                @foreach($skill_list as $row)
                <div class="col-sm-6">
                    <h6 class="mb-3">{{ $row->skillNmae}}</h6>
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$row->persent}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span >{{$row->persent}}%</span></div>
                    </div>
                </div>
                 @endforeach
            </div>  
        </div>
    </section>