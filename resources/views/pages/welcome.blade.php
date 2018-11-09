@extends('main')

@section('title', '| Home')

@section('content')
        <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators carousel-indicators--round">
                    <li data-slide-to="0" data-target=".carousel" class="active">
                    </li>
                     <li data-slide-to="1" data-target=".carousel">
                    </li>
                    <li data-slide-to="2" data-target=".carousel">
                    </li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active text-center" style="background-image: url('../images/taxi_ruthin.jpg')">
                        {{--<img class="d-block hidden-sm-down" src="images/1.jpg" alt="Ruthn Taxi - Ruthin Transport Services">--}}
                        <div class="carousel-caption">
                            <div class="bigtext">
                                <div class="logo text-dark-back"><span class="upper">R</span>oberto's <span class="upper">T</span>axi <span class="secPart mediumtext">Ruthin</span></div>
                                <br /><p class="text-dark-back mediumtext">For All Your Taxi Needs...</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="background-image: url('../images/2.jpg')">
                        {{--<img class="d-block hidden-sm-down" src="images/2.jpg" alt="Ruthn Taxi - Ruthin Transport Services">--}}
                        <div class="carousel-caption">
                            <div class="bigtext">
                                <p class="text-dark-back mediumtext">Book Your Taxi Now</p><br />
                                <p class="text-dark-back letterspacing-wide">07912564493</p>
                            </div>
                            <ul class="hash-list inline-list text-dark-back hidden-md-down">
                                <li>Airport runs</li>
                                <li>School run</li>
                                <li>Chauffeur service</li>
                                <li>Long distance journey</li>
                            </ul>
                            <ul class="hash-list inline-list text-dark-back hidden-md-down">
                                <li>Local journey</li>
                                <li>Any shopping tour</li>
                                <li>Take away delivery</li>
                                <li>Day trips</li>
                                <li>Night out transfers</li>
                            </ul>
                        </div>
                    </div>
                    <div class="carousel-item" style="background-image: url('../images/3.jpg')">
                        {{--<img class="d-block hidden-sm-down" src="images/3.jpg" alt="Ruthn Taxi - Ruthin Transport Services">--}}
                        <div class="carousel-caption text-dark-back">
                            <div>
                                <p class="mediumtext">The answers for your first two questions:</p><br />
                                <p class="midtext">1. Yes I'm busy</p><br />
                                <p class="midtext">2. Working 'till I make my money</p>
                            </div>
                            <div class="text-right">
                                <p class="hidden-md-down">
                                    Thanks, Roberto
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
               <a class="carousel-control-prev hidden-md-down" href="#carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next hidden-md-down" href="#carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
        </div>
        <div id="about-services" class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="letterspacing-wide">About Our Ruthin Transport Services</h1>

                    <p class="highlight">If you are looking for a reliable and quality taxi company then Roberto’s Taxi Ruthin is here for you.</p>
                    <div class="text-column high-padding">
                        We operate a local taxi company for more than 10 years to all of our customers old and new. We are a company based in Ruthin, Denbighshire, North Wales. We are dedicated to provide a variety of high quality services, such as one off bookings, school run, airport transfers, night out transfers, chauffeur service and so on. We have different sizes of vehicles, cars, minibuses, 4 wheel drives, and even executive/VIP limusine. Here at Roberto’s Taxi Ruthin we take pride in our vehicles and make sure they are always clean and tidy inside and out, and our drivers are always courteous and polite. We are here to make your life easier, please call us on 07912564493 or write email to roberto29yoo@yahoo.co.uk.
                    </div>
                    <a href="/about">
                        <button type="button" class="btn btn-outline-mono high-margin">
                            Read more
                        </button>
                    </a>
                    <div class="colored-hash high-padding high-margin">
                        <ul class="hash-list">
                            <li>Airport runs</li>
                            <li>School run</li>
                            <li>Chauffeur service</li>
                            <li>Long distance journey</li>
                            <li>Local journey</li>
                            <li>Any shopping tour</li>
                            <li>Take away delivery</li>
                            <li>Day trips</li>
                            <li>Night out transfers</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="services">
        <div class="container-fluid wide-strip parallax-window" data-parallax="scroll" data-image-src="images/passengers_back.jpg">
            <div class="row dark-opacity">
                <div class="offset-md-3 col-md-9">
                    <h3 class="light-text">We can carry 1-8 passengers</h3>
                </div>
            </div>
            <div class="row dark-opacity">
                <div class="offset-md-3 col-md-7 light-text text-column">
                    Town job - from £3<br />
                    From Ruthin to Denbigh - from £12<br />
                    From Ruthin to Mold - from £17<br />
                    From Ruthin to Corween - from £17<br />
                    From Ruthin to Cerrigydrudion - from £23<br />
                    From Ruthin to Flint - from £25<br />
                    From Ruthin to Rhyl - from £25<br />
                    From Ruthin to Wrexham - from £25<br />
                    From Ruthin Llangollen  - fron £25<br />
                    From Ruthin to Bala - from £30<br />
                    From Ruthin to Chester - from £35<br />
                    From Ruthin to Liverpool  - from £55<br />
                    From Ruthin to Liverpool airport - from £59<br />
                    From Ruthin to Manchester airport - from £59<br />
                    From Ruthin to Manchester - from £68<br />
                    From Ruthin to Birmingham airport - from £140<br />
                    From Ruthin to Luton airport - from £190<br />
                    From Ruthin to Heathrow  - from £230<br />
                    From Ruthin to Gatwick - from £250<br />
                </div>
            </div>
            <div class="row dark-opacity">
                <div class="offset-md-3 col-md-6">
                    <span class="source light-text">*Our prices not include any road tolls or car park fees. Quotes may vary on passengers number and time of journeys.</span>
                </div>
            </div>
        </div>
            <div class="container">
            <div class="row">
                <div class="col-md-12"><h2 class="letterspacing-wide deep-padding">References</h2></div>
                <div class="col-md-4">
                    <img alt="Bootstrap Image Preview" src="images/face1.jpg" class="rounded-circle mx-auto d-block" width="60%">
                    <p class="text-justify higher-margin text-narrow">
                        "Great service, really flexible right up to the journey date and a lot cheaper than other airport services. Roberto was really helpful throughout."
                    </p>
                    <p class="text-right">
                        Gabriella
                    </p>
                </div>
                <div class="col-md-4">
                    <img alt="Bootstrap Image Preview" src="images/face2.jpg" class="rounded-circle mx-auto d-block" width="60%">
                    <p class="text-justify higher-margin text-narrow">
                        "Very professional service with a pleasant driver. He was very polite and friendly and drove me with no delay. Definitely would use their service again."
                    </p>
                    <p class="text-right">
                        Morgan
                    </p>
                </div>
                <div class="col-md-4">
                    <img alt="Bootstrap Image Preview" src="images/face3.jpg" class="rounded-circle mx-auto d-block" width="60%">
                    <p class="text-justify higher-margin text-narrow">
                        "Brilliant service. Incredibly punctual, friendly drivers and a very fast customer service. Professional and efficient."
                    </p>
                    <p class="text-right">
                        Kate
                    </p>
                </div>
            </div>
        </div>
        </div>
        <div id="contact" class="container-fluid">
            <div class="row high-strip null-padding">
                <div class="call-us-background"></div>
                <div class="offset-md-2 col-md-5 col-xl-4 col-xs-12 middle-auto narrow-line-height">
                    <p class="highlight midtext h-text-color letterspacing-wide null-padding">Ring or Text Us for quote</p>
                    <a class="bold-highlight bigtext l-text-color letterspacing-wide null-padding" href="tel:07912564493">07912564493</a>
                    <a class="bold-highlight midtext l-text-color null-padding" href="mailto:roberto29yoo@yahoo.co.uk">roberto29yoo@yahoo.co.uk</a>
                </div>
                <div class="dispatcher d-none d-md-block col-md-5 col-xl-6 mh-100">
                </div>
            </div>
        </div>
@endsection