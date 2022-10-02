@extends('front.layout.app')

@section('title', 'FAQ Page')

@section('main_content')

    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $page_data->faq_title }}</h2>
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $page_data->faq_title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">

                @if ($page_data->faq_detail != '')
                    <div class="col-md-12">
                        {!! $page_data->faq_detail !!}
                    </div>
                @endif


                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">

                        @php $i=0;  @endphp
                        @foreach ($faq_data as $item)
                            @php $i++;  @endphp

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $i }}">
                                    <button class="accordion-button @if ($loop->iteration != 1) collapsed @endif"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}"
                                        aria-expanded=" @if ($loop->iteration == 1) true @else false @endif "
                                        aria-controls="collapse{{ $i }}">
                                        {{ $item->faq_title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $i }}"
                                    class="accordion-collapse collapse @if ($loop->iteration == 1) show @endif "
                                    aria-labelledby="heading{{ $i }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $item->faq_detail !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        Omnis aliquip mel ne. Diam tantas mea ex, ad magna luptatum qui, cum ea veniam
                                        persecuti. Id suavitate prodesset vis. Intellegat intellegam ad mei, nec oblique
                                        petentium definitiones in. Vim lorem numquam tibique cu, rebum iriure mediocrem te
                                        nam, semper mandamus conceptam an usu.
                                    </p>
                                    <p>
                                        No unum feugait est, ei ius quem adhuc definitionem. Odio porro decore cu sit, eum
                                        adhuc semper dolores id, eam te nostro legimus. Ne utroque patrioque per, in consul
                                        nominavi has. Choro patrioque eum ex, erant tacimates persecuti sit an. No nec
                                        dicant delenit, vocent regione eam te.
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        Aliquid sententiae theophrastus qui eu. Vix ad lorem pertinax. Cu labore lucilius
                                        recusabo pro, in per temporibus reformidans. Ex scripta fastidii expetendis ius,
                                        iudico nusquam et mel.
                                    </p>
                                    <p>
                                        Et vide legimus maiorum eos, ius an delenit copiosae mandamus. Ex sale intellegebat
                                        qui, an admodum theophrastus mei. Vix ne eros ludus legere, sed cu suas torquatos.
                                        Feugait consequat nam no, nec causae ullamcorper ex. Mazim saepe vix et.
                                    </p>
                                    <p>
                                        Eos erat utinam ei, cum saepe everti deleniti et, alterum apeirian qualisque nam ex.
                                        Vim id omnesque intellegebat, ut eum solum eruditi, ut viderer recusabo argumentum
                                        est. Nam ex elit dolores percipit. Sea quodsi propriae epicurei at, an simul
                                        expetendis duo, an vidisse detracto officiis sit. Eu aperiri iuvaret vel.
                                    </p>
                                    <p>
                                        Id offendit euripidis efficiantur vim, clita virtute eloquentiam ea eum. Te usu
                                        iracundia constituam repudiandae, cu nam laudem delicata intellegam. Dico
                                        theophrastus sed ex. Ex vis zril nominati recteque, tollit vituperatoribus an sit,
                                        epicurei temporibus concludaturque et mei.
                                    </p>
                                </div>
                            </div>
                        </div> --}}




                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
