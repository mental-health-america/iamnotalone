@extends('layout.master')
@section('content')
    <div class="w-full w-max-700 m-auto p-h-20 p-t-10 p-b-10" style="padding: 15px 30px;">
        <div class="w-full w-max-700 m-auto p-h-20 p-t-10 p-b-10" style="padding: 15px 30px;">
            <div class="text-6xl text-4xl mb-5">Addressing Loneliness and Isolation</div>
            <p>We are facing a loneliness epidemic that is impacting mental health and well-being. Research shows that 3
                in 5 Americans feel lonely.<sup><a href="#_ftn1" name="_ftnref1" title="">[1]</a></sup> Additionally, <a
                    href="https://mhanational.org/mental-health-and-covid-19-what-mha-screening-data-tells-us-about-impact-pandemic#Loneliness">Mental
                    Health America’s (MHA) screening data</a> continues to show that loneliness and isolation are major
                concerns for people seeking help for their mental health. 71% of people in 2020 reported that loneliness
                or isolation was one of the top three things contributing to their mental health problems.</p><br/>

            <p>We need to address this issue now. This is why MHA created a platform specifically designed to help this
                current need. <strong>When people have strong social relationships, they are 50% more likely to live
                    longer!</strong> MHA’s I Am Not Alone site focuses on building meaningful relationships. We are an
                online digital community, created to help people build genuine connections and combat feelings of
                loneliness.</p><br/>

            <p>It is important to identify and solve this growing concern as loneliness can also impact overall
                health.</p><br/>

            <p>Research indicates that <strong>loneliness can cause the same amount of damage as smoking 15 cigarettes a
                    day.</strong><sup><a href="#_ftn2" name="_ftnref2" title="">[2]</a> </sup>Loneliness is far-reaching
                and impacts various communities.</p><br/>

            <ul>
                <li>Young people are more likely to be at risk for experiencing loneliness. <sup><a href="#_ftn3"
                                                                                                    name="_ftnref3"
                                                                                                    title="">[1]</a></sup>
                </li>
                <li>Black older adults have higher prevalence rates of loneliness and depressive symptoms.<sup><a
                            href="#_ftn3" name="_ftnref3" title="">[3]</a></sup></li>
                <li>Immigrant, and lesbian, gay, and bisexual populations experience higher rates of loneliness.<sup><a
                            href="#_ftn4" name="_ftnref4" title="">[4]</a></sup></li>
                <li>50% of people with disabilities will be lonely on any given day.<sup><a href="#_ftn5"
                                                                                            name="_ftnref5"
                                                                                            title="">[5]</a></sup></li>
                <li>Those with lower incomes experience a higher loneliness score than those with higher incomes.<sup><a
                            href="#_ftn3" name="_ftnref3" title="">[1]</a></sup></li>
            </ul>
        </div>

        <div class="w-full w-max-700 m-auto p-h-20 p-t-10 p-b-10 my-10 bg-gray-100" style="padding: 15px;">

            <div class="text-center mb-4 text-4xl">Help us solve the loneliness epidemic</div>

            <div class="grid grid-cols-3 gap-4">

                <div class="mb-5 text-center"><a href="https://iamnotalone.mhanational.org/events"><img alt="empty"
                                                                                                        class="w-max-250 img-responsive mb-5"
                                                                                                        src="{{asset('images/about-attend.png')}}"/></a>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <a href="https://iamnotalone.mhanational.org/events">Attend</a>
                    </button>

                </div>

                <div class="mb-5 text-center"><a href="https://iamnotalone.mhanational.org/events/new"><img alt="empty"
                                                                                                            class="w-max-250 img-responsive mb-5"
                                                                                                            src="{{asset('images/about-create.png')}}"/>
                    </a>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <a href="https://iamnotalone.mhanational.org/events/new">Create</a>
                    </button>
                </div>

                <div class="mb-5 text-center"><a href="https://iamnotalone.mhanational.org/forum"><img alt="empty"
                                                                                                       class="w-max-250 img-responsive mb-5"
                                                                                                       src="{{asset('images/about-engage.png')}}"/>
                    </a>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <a href="https://iamnotalone.mhanational.org/forum">Engage</a>
                    </button>
                </div>

            </div>

        </div>

        <div class="w-full w-max-700 m-auto p-h-20 p-t-10 p-b-10" style="padding: 15px;">
            <hr align="left" size="1" width="33%"/>
            <div id="ftn1">
                <h6><sup><a href="#_ftnref1" name="_ftn1" title="">[1]</a></sup><a
                        href="https://www.cigna.com/static/www-cigna-com/docs/about-us/newsroom/studies-and-reports/combatting-loneliness/cigna-2020-loneliness-factsheet.pdf">https://www.cigna.com/static/www-cigna-com/docs/about-us/newsroom/studies-and-reports/combatting-loneliness/cigna-2020-loneliness-factsheet.pdf</a>
                </h6>
            </div>

            <div id="ftn2">
                <h6><sup><a href="#_ftnref2" name="_ftn2" title="">[2]</a></sup> <a
                        href="https://www.cigna.com/assets/docs/newsroom/loneliness-survey-2018-updated-fact-sheet.pdf">https://www.cigna.com/assets/docs/newsroom/loneliness-survey-2018-updated-fact-sheet.pdf</a>
                </h6>
            </div>

            <div id="ftn3">
                <h6><sup><a href="#_ftnref3" name="_ftn3" title="">[3]</a></sup> <a
                        href="https://academic.oup.com/innovateage/article/4/5/igaa048/6035206">https://academic.oup.com/innovateage/article/4/5/igaa048/6035206</a>
                </h6>
            </div>

            <div id="ftn4">
                <h6><sup><a href="#_ftnref4" name="_ftn4" title="">[4]</a></sup> <a
                        href="https://doi.org/10.17226/25663">https://doi.org/10.17226/25663</a></h6>
            </div>

            <div id="ftn5">
                <h6><sup><a href="#_ftnref5" name="_ftn5" title="">[5]</a></sup> <a
                        href="https://www.sense.org.uk/support-us/campaigns/loneliness/">https://www.sense.org.uk/support-us/campaigns/loneliness/</a>
                </h6>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var classAdd = function () {
            document.getElementsByClassName("about_text")[0].style.height = "auto";
            document.getElementsByClassName("about_text")[0].style.maxHeight = "1500px";
            document.getElementsByClassName("about_text")[0].style.transition = "transition: all 200ms ease 0ms;";
            document.getElementsByClassName("about_text")[0].style.opacity = "1";
        };
        var elements = document.getElementsByClassName("clickable");
        for (var i = 0; i < elements.length; i++) {
            elements[i].addEventListener('click', classAdd, false);
        }

    </script>
@endsection
