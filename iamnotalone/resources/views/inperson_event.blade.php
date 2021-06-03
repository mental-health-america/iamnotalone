@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.css">
    <style>
        .awesomplete{
            width: 100%
        }
    </style>
@endsection
@section('content')
    <section class="flex flex-col mb-10">
        <div class="flex flex-1 items-center justify-center">
            <div class="px-4 sm-px-0 lg:w-3/5 sm:w-4/5 w-full sm:m-auto text-gray-600">
                <div class="mb-6">
                    <h1 class="font-medium uppercase tracking-wider text-3xl mb-10 w-full text-center text-black">
                        Create your Event
                    </h1>
                    <h6 class="uppercase text-sm font-semibold mb-2">Location</h6>
                    <p class="text-sm">Make your event easily discoverable and help your attendees know where to show up.</p>
                </div>

                <div class="flex flex-col sm:flex-row mb-6 justify-items-center">
                    <a href="{{route('event.inperson')}}" class="capitalize text-center border-2 border-indigo-400 focus:outline-none bg-primary text-white font-medium tracking-wider w-3/4 sm:w-1/3 m-auto mb-4 block py-3 rounded-lg focus:border-gray-700 hover:bg-purple-600">
                        In-Person
                    </a>

                    <a href="{{route('event.online')}}" class="capitalize text-center border sm:mx-4 border-indigo-600 focus:outline-none bg-gray-100 text-black font-medium tracking-wider block w-3/4 sm:w-1/3 m-auto mb-4 py-3 rounded-lg focus:border-gray-700 hover:bg-purple-700 hover:text-white">
                        Online
                    </a>

                    <a href="{{route('event.hybrid')}}" class="capitalize text-center border border-indigo-600 focus:outline-none bg-gray-100 text-black font-medium tracking-wider block w-3/4 sm:w-1/3 m-auto mb-4 py-3 rounded-lg focus:border-gray-700 hover:bg-purple-700 hover:text-white">
                        Hybrid
                    </a>
                </div>

                <form class="" method="POST" action="{{route('event.update.inperson')}}">
                    @csrf
                    <div class="">
                        <div class="py-2 text-left">
                            <label for="event_name" class="uppercase block text-xs mb-2">Name of Venue</label>
                            <input type="text" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Name of Venue" name="venue" required/>
                        </div>

                        <div class="py-2 text-left">
                            <label for="organizer" class="uppercase block text-xs mb-2">Address 1</label>
                            <input type="text" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Address 1" name="address1" required />
                        </div>

                        <div class="py-2 text-left">
                            <label for="organizer" class="uppercase block text-xs mb-2">Address 2</label>
                            <input type="text" class="border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="Address 2" name="address2"/>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-4">
                            <div class="py-2 text-left">
                                <input type="text" class="bg-white text-sm border-2 border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="State" id="state" name="state" value="{{old('state', '')}}" required/>
                                @error('state')
                                    <p class="text-xs "> <small>{{$message}}</small> </p>
                                @enderror
                            </div>
                            <div class="py-2 text-left">
                                <input type="text" class="bg-white border-2 text-sm border-gray-100 focus:outline-none block w-full p-4 rounded-lg focus:border-gray-700 " placeholder="City" id="city" name="city" value="{{old('city', '')}}" required/>
                                @error('city')
                                    <p class="text-xs "> <small>{{$message}}</small> </p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="py-2 mt-6">
                            <button type="submit" class="uppercase text-center border border-gray-100 focus:outline-none bg-primary text-white font-semibold tracking-wider block w-3/4 md:w-1/2 m-auto py-3 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                                Next
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        document.getElementById("events").classList.add('link-active');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.js"></script>
    <script>
        var input = document.getElementById("city");
        new Awesomplete(input, {
            list: ["Aberdeen", "Abilene", "Akron", "Albany", "Albuquerque", "Alexandria", "Allentown", "Amarillo", "Anaheim", "Anchorage", "Ann Arbor", "Antioch", "Apple Valley", "Appleton", "Arlington", "Arvada", "Asheville", "Athens", "Atlanta", "Atlantic City", "Augusta", "Aurora", "Austin", "Bakersfield", "Baltimore", "Barnstable", "Baton Rouge", "Beaumont", "Bel Air", "Bellevue", "Berkeley", "Bethlehem", "Billings", "Birmingham", "Bloomington", "Boise", "Boise City", "Bonita Springs", "Boston", "Boulder", "Bradenton", "Bremerton", "Bridgeport", "Brighton", "Brownsville", "Bryan", "Buffalo", "Burbank", "Burlington", "Cambridge", "Canton", "Cape Coral", "Carrollton", "Cary", "Cathedral City", "Cedar Rapids", "Champaign", "Chandler", "Charleston", "Charlotte", "Chattanooga", "Chesapeake", "Chicago", "Chula Vista", "Cincinnati", "Clarke County", "Clarksville", "Clearwater", "Cleveland", "College Station", "Colorado Springs", "Columbia", "Columbus", "Concord", "Coral Springs", "Corona", "Corpus Christi", "Costa Mesa", "Dallas", "Daly City", "Danbury", "Davenport", "Davidson County", "Dayton", "Daytona Beach", "Deltona", "Denton", "Denver", "Des Moines", "Detroit", "Downey", "Duluth", "Durham", "El Monte", "El Paso", "Elizabeth", "Elk Grove", "Elkhart", "Erie", "Escondido", "Eugene", "Evansville", "Fairfield", "Fargo", "Fayetteville", "Fitchburg", "Flint", "Fontana", "Fort Collins", "Fort Lauderdale", "Fort Smith", "Fort Walton Beach", "Fort Wayne", "Fort Worth", "Frederick", "Fremont", "Fresno", "Fullerton", "Gainesville", "Garden Grove", "Garland", "Gastonia", "Gilbert", "Glendale", "Grand Prairie", "Grand Rapids", "Grayslake", "Green Bay", "GreenBay", "Greensboro", "Greenville", "Gulfport-Biloxi", "Hagerstown", "Hampton", "Harlingen", "Harrisburg", "Hartford", "Havre de Grace", "Hayward", "Hemet", "Henderson", "Hesperia", "Hialeah", "Hickory", "High Point", "Hollywood", "Honolulu", "Houma", "Houston", "Howell", "Huntington", "Huntington Beach", "Huntsville", "Independence", "Indianapolis", "Inglewood", "Irvine", "Irving", "Jackson", "Jacksonville", "Jefferson", "Jersey City", "Johnson City", "Joliet", "Kailua", "Kalamazoo", "Kaneohe", "Kansas City", "Kennewick", "Kenosha", "Killeen", "Kissimmee", "Knoxville", "Lacey", "Lafayette", "Lake Charles", "Lakeland", "Lakewood", "Lancaster", "Lansing", "Laredo", "Las Cruces", "Las Vegas", "Layton", "Leominster", "Lewisville", "Lexington", "Lincoln", "Little Rock", "Long Beach", "Lorain", "Los Angeles", "Louisville", "Lowell", "Lubbock", "Macon", "Madison", "Manchester", "Marina", "Marysville", "McAllen", "McHenry", "Medford", "Melbourne", "Memphis", "Merced", "Mesa", "Mesquite", "Miami", "Milwaukee", "Minneapolis", "Miramar", "Mission Viejo", "Mobile", "Modesto", "Monroe", "Monterey", "Montgomery", "Moreno Valley", "Murfreesboro", "Murrieta", "Muskegon", "Myrtle Beach", "Naperville", "Naples", "Nashua", "Nashville", "New Bedford", "New Haven", "New London", "New Orleans", "New York", "New York City", "Newark", "Newburgh", "Newport News", "Norfolk", "Normal", "Norman", "North Charleston", "North Las Vegas", "North Port", "Norwalk", "Norwich", "Oakland", "Ocala", "Oceanside", "Odessa", "Ogden", "Oklahoma City", "Olathe", "Olympia", "Omaha", "Ontario", "Orange", "Orem", "Orlando", "Overland Park", "Oxnard", "Palm Bay", "Palm Springs", "Palmdale", "Panama City", "Pasadena", "Paterson", "Pembroke Pines", "Pensacola", "Peoria", "Philadelphia", "Phoenix", "Pittsburgh", "Plano", "Pomona", "Pompano Beach", "Port Arthur", "Port Orange", "Port Saint Lucie", "Port St. Lucie", "Portland", "Portsmouth", "Poughkeepsie", "Providence", "Provo", "Pueblo", "Punta Gorda", "Racine", "Raleigh", "Rancho Cucamonga", "Reading", "Redding", "Reno", "Richland", "Richmond", "Richmond County", "Riverside", "Roanoke", "Rochester", "Rockford", "Roseville", "Round Lake Beach", "Sacramento", "Saginaw", "Saint Louis", "Saint Paul", "Saint Petersburg", "Salem", "Salinas", "Salt Lake City", "San Antonio", "San Bernardino", "San Buenaventura", "San Diego", "San Francisco", "San Jose", "Santa Ana", "Santa Barbara", "Santa Clara", "Santa Clarita", "Santa Cruz", "Santa Maria", "Santa Rosa", "Sarasota", "Savannah", "Scottsdale", "Scranton", "Seaside", "Seattle", "Sebastian", "Shreveport", "Simi Valley", "Sioux City", "Sioux Falls", "South Bend", "South Lyon", "Spartanburg", "Spokane", "Springdale", "Springfield", "St. Louis", "St. Paul", "St. Petersburg", "Stamford", "Sterling Heights", "Stockton", "Sunnyvale", "Syracuse", "Tacoma", "Tallahassee", "Tampa", "Temecula", "Tempe", "Thornton", "Thousand Oaks", "Toledo", "Topeka", "Torrance", "Trenton", "Tucson", "Tulsa", "Tuscaloosa", "Tyler", "Utica", "Vallejo", "Vancouver", "Vero Beach", "Victorville", "Virginia Beach", "Visalia", "Waco", "Warren", "Washington", "Waterbury", "Waterloo", "West Covina", "West Valley City", "Westminster", "Wichita", "Wilmington", "Winston", "Winter Haven", "Worcester", "Yakima", "Yonkers", "York", "Youngstown"]
        });
    </script>

    <script>
        var input2 = document.getElementById("state");
        new Awesomplete(input2, {
            list: ['Alabama','Alaska','American Samoa','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','District of Columbia','Federated States of Micronesia','Florida','Georgia','Guam','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Marshall Islands','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Northern Mariana Islands','Ohio','Oklahoma','Oregon','Palau','Pennsylvania','Puerto Rico','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virgin Island','Virginia','Washington','West Virginia','Wisconsin','Wyoming']
        });
    </script>
@endsection