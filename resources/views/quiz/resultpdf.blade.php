<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="dist/css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
{{--    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css" />--}}


    <title>Universal Burnout Meter</title>
</head>
<?php

$eeresult=0;
$ceresult=0;
$wa=0;
$se=0;
$fo=0;
$state=0;

?>
@foreach($data as $value)
{{--    @foreach($value['quiz_id'] as $q)--}}
{{--        @if($q['category_id']==1 )--}}
            {{$value['quiz_id']}}
{{--        @endif--}}
{{--            @endforeach--}}
            @endforeach


<body>
<center>
    <div class="main-section">
        <div class="header-card">
            <div class="main-log">
                <img src="assests/images/logo.png" class="logo" alt="" />
            </div>
            <div class="main-header-text">
                <span>Universal Burnout Meter </span>
            </div>
        </div>
        <div class="text-section">
            <p>
                This assessment is based on the world health organization (WHO)
                classification for Burnout-related symptoms released in 2019.
            </p>
        </div>
        <div class="card border-0">
            <div class="card-header">
                <h1 class="text-center">Burnout Category Score</h1>
            </div>
            <div class="card-body p-0 pb-5">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-1">(EE) Emotional Exhaustion</div>
                            <div class="section-header">
                                <table>
                                    <thead class="head-color">
                                    <tr>
                                        <th>Category</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Mark</th>
                                        <th>Score</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($data as $value)
                                        @foreach($value['question'] as $q)
                                        @if($q['category_id']==1 )
                                    <tr>
                                        <td>EE-{{$q['question_number']}}</td>
                                        <td> {{$q['question']}}
                                        </td>
                                        @foreach ($value['options'] as $option)
                                            @if($option['question_id']==$q['id']  )
                                        <td>{{$option['option']}}</td>
                                        <td>10</td>
                                        <td>{{$option['weight']}}</td>
                                                {{$eeresult =$eeresult + $option['weight'] }}
                                    </tr>
                                        @endif
                                    @endforeach
                                        @endif
                                    @endforeach
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="footer-section">
                                    <table>
                                        <tr>
                                            <td class="footer-table" style="width: 55%">
                                                <div class="footer-card">
                                                    <p class="heading-3">SCORE Tabulation Logic</p>
                                                    <table>
                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(<10)</span>Sustain
                                                                </p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(10-14)</span>Emerging
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(15-24)</span>Severe
                                                                </p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(>24)</span>Acute
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                            <td class="footer-table">
                                                <div class="footer-card-2">
                                                    <p class="heading-2">Your RESULT</p>
                                                    <table>
                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="result-number">{{$eeresult}}</p>
                                                            </td>
                                                            <td class="test-text">
                                                                @if($eeresult<10)
                                                                <p class="s-number">Sustain</p>
                                                                @elseif($eeresult>=10 && $eeresult<=14)
                                                                    <p class="s-number">Emerging </p>
                                                                @elseif($eeresult>=15 && $eeresult<=24)
                                                                    <p class="s-number">Severe  </p>
                                                                @elseif($eeresult>24)
                                                                    <p class="s-number">Acute  </p>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="text-1">Your Total Score</p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="text-2">Result</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="heading-1">CE) Cynicism and Empathy Loss</div>
                            <div class="section-header">
                                <table>
                                    <thead class="head-color">
                                    <tr>
                                        <th>Category</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Mark</th>
                                        <th>Score</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($data as $value)
                                        @foreach($value['question'] as $q)
                                            @if($q['category_id']==2 )
                                                <tr>
                                                    <td>CE-{{$q['question_number']}}</td>
                                                    <td> {{$q['question']}}
                                                    </td>
                                                    @foreach ($value['options'] as $option)
                                                        @if($option['question_id']==$q['id']  )
                                                            <td>{{$option['option']}}</td>
                                                            <td>10</td>
                                                            <td>{{$option['weight']}}</td>
                                                            {{$ceresult =$ceresult + $option['weight'] }}
                                                </tr>
                                            @endif
                                        @endforeach
                                        @endif
                                    @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="footer-section">
                                    <table>
                                        <tr>
                                            <td class="footer-table" style="width: 55%">
                                                <div class="footer-card">
                                                    <p class="heading-3">SCORE Tabulation Logic</p>
                                                    <table>
                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(<10)</span>Sustain
                                                                </p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(10-14)</span>Emerging
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(15-24)</span>Severe
                                                                </p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(>24)</span>Acute
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                            <td class="footer-table">
                                                <div class="footer-card-2">
                                                    <p class="heading-2">Your RESULT</p>
                                                    <table>
                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="result-number">{{$ceresult}}</p>
                                                            </td>
                                                            <td class="test-text">
                                                                @if($ceresult<10)
                                                                    <p class="s-number">Sustain</p>
                                                                @elseif($ceresult>=10 && $ceresult<=14)
                                                                    <p class="s-number">Emerging </p>
                                                                @elseif($ceresult>=15 && $ceresult<=24)
                                                                    <p class="s-number">Severe  </p>
                                                                @elseif($ceresult>24)
                                                                    <p class="s-number">Acute  </p>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="text-1">Your Total Score</p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="text-2">Result</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12" style="page-break-before: always;">
                            <div class="heading-1">(WA) Work Accomplishment</div>
                            <div class="section-header">
                                <table>
                                    <thead class="head-color">
                                    <tr>
                                        <th>Category</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Mark</th>
                                        <th>Score</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $value)
                                        @foreach($value['question'] as $q)
                                            @if($q['category_id']==3 )
                                                <tr>
                                                    <td>WA-{{$q['question_number']}}</td>
                                                    <td> {{$q['question']}}
                                                    </td>
                                                    @foreach ($value['options'] as $option)
                                                        @if($option['question_id']==$q['id']  )
                                                            <td>{{$option['option']}}</td>
                                                            <td>10</td>
                                                            <td>{{$option['weight']}}</td>
                                                            {{$wa=$wa + $option['weight'] }}
                                                </tr>
                                            @endif
                                        @endforeach
                                        @endif
                                    @endforeach
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="footer-section">
                                    <table>
                                        <tr>
                                            <td class="footer-table" style="width: 55%">
                                                <div class="footer-card">
                                                    <p class="heading-3">SCORE Tabulation Logic</p>
                                                    <table>
                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(<10)</span>Sustain
                                                                </p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(10-14)</span>Emerging
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(15-24)</span>Severe
                                                                </p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(>24)</span>Acute
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                            <td class="footer-table">
                                                <div class="footer-card-2">
                                                    <p class="heading-2">Your RESULT</p>
                                                    <table>
                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="result-number">{{$wa}}</p>
                                                            </td>
                                                            <td class="test-text">
                                                                @if($wa<10)
                                                                    <p class="s-number">Sustain</p>
                                                                @elseif($wa>=10 && $wa<=14)
                                                                    <p class="s-number">Emerging </p>
                                                                @elseif($wa>=15 && $wa<=24)
                                                                    <p class="s-number">Severe  </p>
                                                                @elseif($wa>24)
                                                                    <p class="s-number">Acute  </p>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="text-1">Your Total Score</p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="text-2">Result</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="heading-1">Burnout Profile</div>
                                <div class="footer-section">
                                    <table>
                                        <tr>

                                            <td class="footer-table">
                                                <div class="footer-card-2">
                                                    <p class="heading-2">Your RESULT</p>
                                                    <table>
                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="result-number">{{$eeresult+$ceresult+$wa}}</p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="s-number">90</p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="text-1">Your Total Score</p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="text-2">Total Score</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="page-break-after: always;">
                            <div class="heading-1">SE - Supportive Environment </div>
                            <div class="section-header">
                                <table>
                                    <thead class="head-color">
                                    <tr>
                                        <th>Category</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Mark</th>
                                        <th>Score</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($data as $value)
                                        @foreach($value['question'] as $q)
                                            @if($q['category_id']==4 )
                                                <tr>
                                                    <td>SE-{{$q['question_number']}}</td>
                                                    <td> {{$q['question']}}
                                                    </td>
                                                    @foreach ($value['options'] as $option)
                                                        @if($option['question_id']==$q['id']  )
                                                            <td>{{$option['option']}}</td>
                                                            <td>10</td>
                                                            <td>{{$option['weight']}}</td>
                                                            {{$se=$se + $option['weight'] }}
                                                </tr>
                                            @endif
                                        @endforeach
                                        @endif
                                    @endforeach
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="footer-section">
                                    <table>
                                        <tr>
                                            <td class="footer-table" style="width: 55%">
                                                <div class="footer-card">
                                                    <p class="heading-3">SCORE Tabulation Logic</p>
                                                    <table>
                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(<10)</span>Up Supportive

                                                                </p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(10-14)</span>Rarely supportive

                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(15-24)</span>Moderately Supportive</p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(>24)</span>Very Supportive
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                            <td class="footer-table">
                                                <div class="footer-card-2">
                                                    <p class="heading-2">Your RESULT</p>
                                                    <table>
                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="result-number">{{$se}}</p>
                                                            </td>
                                                            <td class="test-text">
                                                                @if($se<10)
                                                                    <p class="s-number">Up Supportive</p>
                                                                @elseif($se>=10 && $se<=14)
                                                                    <p class="s-number">Rarely supportive</p>
                                                                @elseif($se>=15 && $se<=24)
                                                                    <p class="s-number"> Moderately Supportive   </p>
                                                                @elseif($se>24)
                                                                    <p class="s-number">Very Supportive </p>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="text-1">Your Total Score</p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="text-2">Result</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="">
                            <div class="heading-1">FO -  Foundation Habits</div>
                            <div class="section-header">
                                <table>
                                    <thead class="head-color">
                                    <tr>
                                        <th>Category</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Mark</th>
                                        <th>Score</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $value)
                                        @foreach($value['question'] as $q)
                                            @if($q['category_id']==5 )
                                                <tr>
                                                    <td>FO-{{$q['question_number']}}</td>
                                                    <td> {{$q['question']}}
                                                    </td>
                                                    @foreach ($value['options'] as $option)
                                                        @if($option['question_id']==$q['id']  )
                                                            <td>{{$option['option']}}</td>
                                                            <td>10</td>
                                                            <td>{{$option['weight']}}</td>
                                                            {{$fo=$fo + $option['weight'] }}
                                                </tr>
                                            @endif
                                        @endforeach
                                        @endif
                                    @endforeach
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="footer-section">
                                    <table>
                                        <tr>
                                            <td class="footer-table" style="width: 55%">
                                                <div class="footer-card">
                                                    <p class="heading-3">SCORE Tabulation Logic</p>
                                                    <table>
                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(<10)</span> Very Poor
                                                                </p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(10-14)</span>Poor
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(15-24)</span>Acceptable
                                                                </p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(>24)</span>Good
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                            <td class="footer-table">
                                                <div class="footer-card-2">
                                                    <p class="heading-2">Your RESULT</p>
                                                    <table> <tr>
                                                            <td class="test-text">
                                                                <p class="result-number">{{$fo}}</p>
                                                            </td>
                                                            <td class="test-text">
                                                                @if($fo<10)
                                                                    <p class="s-number">Very Poor  </p>
                                                                @elseif($fo>=10 && $fo<=14)
                                                                    <p class="s-number">Poor </p>
                                                                @elseif($fo>=15 && $fo<=24)
                                                                    <p class="s-number">Acceptable  </p>
                                                                @elseif($fo>24)
                                                                    <p class="s-number">Good   </p>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="text-1">Your Total Score</p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="text-2">Result</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="">
                            <div class="heading-1">Change of State Score</div>
                            <div class="section-header">
                                <table>
                                    <thead class="head-color">
                                    <tr>
                                        <th>Category</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Mark</th>
                                        <th>Score</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $value)
                                        @foreach($value['question'] as $q)
                                            @if($q['category_id']==3 )
                                                <tr>
                                                    <td>WA-{{$q['question_number']}}</td>
                                                    <td> {{$q['question']}}
                                                    </td>
                                                    @foreach ($value['options'] as $option)
                                                        @if($option['question_id']==$q['id']  )
                                                            <td>{{$option['option']}}</td>
                                                            <td>10</td>
                                                            <td>{{$option['weight']}}</td>
                                                            {{$state=$state + $option['weight'] }}
                                                </tr>
                                            @endif
                                        @endforeach
                                        @endif
                                    @endforeach
                                    @endforeach
                                    @foreach($data as $value)
                                        @foreach($value['question'] as $q)
                                            @if($q['category_id']==2 && $q['question_number']==2 )
                                                <tr>
                                                    <td>SE-{{$q['question_number']}}</td>
                                                    <td> {{$q['question']}}
                                                    </td>
                                                    @foreach ($value['options'] as $option)
                                                        @if($option['question_id']==$q['id']  )
                                                            <td>{{$option['option']}}</td>
                                                            <td>10</td>
                                                            <td>{{$option['weight']}}</td>
                                                            {{$state=$state + $option['weight'] }}
                                                </tr>
                                            @endif
                                        @endforeach
                                        @endif
                                    @endforeach
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="footer-section">
                                    <table>
                                        <tr>
                                            <td class="footer-table" style="width: 55%">
                                                <div class="footer-card">
                                                    <p class="heading-3">SCORE Tabulation Logic</p>
                                                    <table>
                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(<10)</span>Stable
                                                                </p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(10-14)</span>Emergent
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(15-24)</span>Moderate
                                                                </p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="p-text">
                                                                    <span>(>24)</span>Acute
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                            <td class="footer-table">
                                                <div class="footer-card-2">
                                                    <p class="heading-2">Your RESULT</p>
                                                    <table>
                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="result-number">{{$state}}</p>
                                                            </td>
                                                            <td class="test-text">
                                                                @if($state<10)
                                                                    <p class="s-number">Stable  </p>
                                                                @elseif($state>=10 && $state<=14)
                                                                    <p class="s-number">Emergent  </p>
                                                                @elseif($state>=15 && $state<=24)
                                                                    <p class="s-number">Moderate   </p>
                                                                @elseif($state>24)
                                                                    <p class="s-number">Acute </p>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="test-text">
                                                                <p class="text-1">Your Total Score</p>
                                                            </td>
                                                            <td class="test-text">
                                                                <p class="text-2">Result</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>
</body>
</html>
