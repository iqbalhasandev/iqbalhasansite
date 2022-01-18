@props(['expertises'=>[],'educations'=>[],'skills'=>[]])
@if (count($skills)>0 || count($expertises)>0 || count($educations)>0)
<section class="section  section-resume" id="resume-area">
    <div class="container">

        <div class="section-head">
            <span>My Resume</span>
            <h2>My Expertises</h2>
            <span id="bar"></span>
        </div>

        <div class="section-inner">
            <div class="section-resume-wrap">
                @if (count($expertises)>0)
                <div class="section-experience mb-5">
                    <div class="row">
                        <div class="col-lg-3">
                            <h5 class="section-subHead mb-4 ">My Experience</h5>
                        </div>

                        <div class="col-lg-9">
                            <div class="ExperienceList pb-3 section-light">
                                @foreach ($expertises as $expertise)

                                <div class="resume-list b-box p-4 ">
                                    <div class="row align-items-center">
                                        <div class="col-3 col-md-3 pb-3 pb-md-0">
                                            {{ $expertises->name }}
                                        </div>
                                        <div class="col-md-5 pb-2 pb-md-0">
                                            <h5 class="mb-3">{{ $expertises->title }}</h5>
                                            <p>{{ $expertises->description }}</p>
                                        </div>
                                        <div class="col-md-4 text-md-right">
                                            <h6 class="badge badge-primary">
                                                {{ $expertises->start.' - '.$expertises->end }}
                                            </h6>
                                        </div>

                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (count($educations)>0)
                <div class="section-education">
                    <div class="row">
                        <div class="col-lg-3">
                            <h5 class="section-subHead mb-4">My Education</h5>
                        </div>

                        <div class="col-lg-9">
                            <div class="EducationList section-light">
                                <div class="row">
                                    @foreach ($educations as $edu)
                                    <div class="col-md-6">
                                        <div class="resume-list b-box p-4 mb-4 ">
                                            <div>
                                                <h5>{{ $edu->title }}</h5>
                                                <h6 class="badge badge-danger d-inline-block my-3">{{ $edu->start.' -
                                                    '.$edu->end }}
                                                </h6>
                                                <p>{{ $edu->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (count($skills)>0)
                <div class="section-skills-wrap mt-5">
                    <div class="row">
                        <div class="col-lg-3">
                            <h5 class="section-subHead mb-4"> My Skills</h5>
                        </div>
                        <div class="col-lg-9">
                            <div class="row ">
                                @foreach ($skills as $skill)
                                <div class="col-md-6">
                                    <div class="resume-panel">
                                        <div class="mb-4 wow fadeInUp" data-wow-duration="1.5s"
                                            style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                                            <h6>{{ $skill->title }}</h6>
                                            <div class="progress mt-2">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ $skill->percentage }}%;"
                                                    aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0"
                                                    aria-valuemax="100"
                                                    title="{{ $skill->title }} : {{ $skill->percentage }}%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    </div>
</section>
@endif
