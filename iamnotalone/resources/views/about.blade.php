@extends('layout.master')
@section('content')

<p>We are facing a loneliness epidemic that is impacting mental health and well-being. Research shows that 3 in 5 Americans feel lonely.<sup><a href="#_ftn1" name="_ftnref1" title="">[1]</a></sup> Additionally, <a href="https://mhanational.org/mental-health-and-covid-19-what-mha-screening-data-tells-us-about-impact-pandemic#Loneliness">Mental Health America’s (MHA) screening data</a> continues to show that loneliness and isolation are major concerns for people seeking help for their mental health. 71% of people in 2020 reported that loneliness or isolation was one of the top three things contributing to their mental health problems.</p>

<p>We need to address this issue now. This is why MHA created a platform specifically designed to help this current need. <strong>When people have strong social relationships, they are 50% more likely to live longer!</strong> MHA’s I Am Not Alone site focuses on building meaningful relationships. We are an online digital community, created to help people build genuine connections and combat feelings of loneliness.</p>

<p>It is important to identify and solve this growing concern as loneliness can also impact overall health.</p>

<p>Research indicates that <strong>loneliness can cause the same amount of damage as smoking 15 cigarettes a day.</strong><sup><a href="#_ftn2" name="_ftnref2" title="">[2]</a> </sup>Loneliness is far-reaching and impacts various communities.</p>

<ul>
    <li>Young people are more likely to be at risk for experiencing loneliness. <sup>1</sup></li>
    <li>Black older adults have higher prevalence rates of loneliness and depressive symptoms.<sup><a href="#_ftn3" name="_ftnref3" title="">[3]</a></sup></li>
    <li>Immigrant, and lesbian, gay, and bisexual populations experience higher rates of loneliness.<sup><a href="#_ftn4" name="_ftnref4" title="">[4]</a></sup></li>
    <li>50% of people with disabilities will be lonely on any given day.<sup><a href="#_ftn5" name="_ftnref5" title="">[5]</a></sup></li>
    <li>Those with lower incomes experience a higher loneliness score than those with higher incomes.<sup>1</sup></li>
</ul>

<p class="text-align-center"><strong>Help us solve the loneliness epidemic</strong></p>

<div class="row">
<div class="col-xs-4 thumb"><a class="thumbnail" href="https://iamnotalone.mhanational.org/events"><img alt="" class="img-responsive" src="{{asset('images/about-attend.png')}}" /> </a><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://iamnotalone.mhanational.org/events">Attend</a></div>

<div class="col-xs-4 thumb"><a class="thumbnail" href="https://iamnotalone.mhanational.org/events/new"><img alt="" class="img-responsive" src="{{asset('images/about-create.png')}}" /> </a><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://iamnotalone.mhanational.org/events/new">Create</a></div>

<div class="col-xs-4 thumb"><a class="thumbnail" href="https://iamnotalone.mhanational.org/forum"><img alt="" class="img-responsive" src="{{asset('images/about-engage.png')}}" /> </a><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://iamnotalone.mhanational.org/forum">Engage</a></div>
</div>

<div>
<hr align="left" size="1" width="33%" />
<div id="ftn1">
<p><b><sup><a href="#_ftnref1" name="_ftn1" title="">[1]</a></sup><a href="https://www.cigna.com/static/www-cigna-com/docs/about-us/newsroom/studies-and-reports/combatting-loneliness/cigna-2020-loneliness-factsheet.pdf">https://www.cigna.com/static/www-cigna-com/docs/about-us/newsroom/studies-and-reports/combatting-loneliness/cigna-2020-loneliness-factsheet.pdf</a></b></p>
</div>

<div id="ftn2">
<p><b><sup><a href="#_ftnref2" name="_ftn2" title="">[2]</a></sup> <a href="https://www.cigna.com/assets/docs/newsroom/loneliness-survey-2018-updated-fact-sheet.pdf">https://www.cigna.com/assets/docs/newsroom/loneliness-survey-2018-updated-fact-sheet.pdf</a></b></p>
</div>

<div id="ftn3">
<p><b><sup><a href="#_ftnref3" name="_ftn3" title="">[3]</a></sup> <a href="https://academic.oup.com/innovateage/article/4/5/igaa048/6035206">https://academic.oup.com/innovateage/article/4/5/igaa048/6035206</a></b></p>
</div>

<div id="ftn4">
<p><b><sup><a href="#_ftnref4" name="_ftn4" title="">[4]</a></sup> <a href="https://doi.org/10.17226/25663">https://doi.org/10.17226/25663</a></b></p>
</div>

<div id="ftn5">
<p><b><sup><a href="#_ftnref5" name="_ftn5" title="">[5]</a></sup> <a href="https://www.sense.org.uk/support-us/campaigns/loneliness/">https://www.sense.org.uk/support-us/campaigns/loneliness/</a></b></p>
</div>
</div>
@endsection
@section('js')
    <script>
        var classAdd = function() {
            document.getElementsByClassName("about_text")[0].style.height= "auto"; 
            document.getElementsByClassName("about_text")[0].style.maxHeight= "1500px"; 
            document.getElementsByClassName("about_text")[0].style.transition= "transition: all 200ms ease 0ms;";  
            document.getElementsByClassName("about_text")[0].style.opacity= "1"; 
        };
        var elements = document.getElementsByClassName("clickable");
        for (var i = 0; i < elements.length; i++) {
            elements[i].addEventListener('click', classAdd, false);
        }

    </script>
@endsection