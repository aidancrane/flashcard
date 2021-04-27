@extends('layouts.master')

@section('title', 'Landing Page')

@section('content')
<div class="h-100">

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1 class="text-center text-white mt-5 pb-5">Flashcard Club</h1>
                <div class="container pb-5">
                    <div class="row">
                        <div class="col text-center text-white">
                            <span class="mdi mdi-book-open-page-variant-outline mdi-48px"></span>
                            <h3>Unlimited Cards</h3>
                            Unlimited cards and sets for all.
                        </div>
                        <div class="col text-center text-white">
                            <span class="mdi mdi-table-arrow-right mdi-48px"></span>
                            <h3>Exportable</h3>
                            Export your flashcards to spreadsheet
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col text-center text-white">
                            <span class="mdi mdi-lead-pencil mdi-48px"></span>
                            <h3>Simple Editor</h3>
                            Use our editor to make changes, include images and more.
                        </div>
                        <div class="col text-center text-white">
                            <span class="mdi mdi-chart-box-outline mdi-48px"></span>
                            <h3>Study Statistics</h3>
                            View and track performance as you cram.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm text-center">
                <main role="main">

                    <div class="card">
                        <div class="card-body" style="user-select:none;">
                            <div class="card py-5" id="page_first_card" style="--animate-duration:0.1s;">
                                <div class="card-body py-5" id="page_first_card_body">
                                    <center class="ugc-center ">
                                        <h1 class="pt-5 pb-5" style="white-space: nowrap;">Simple Tap-to-Flip Flashcards</h1>

                                    </center>
                                </div>
                            </div>
                            <div class="pt-2">
                                <span class="ps-2" id="progress_ticker">5</span> of 20
                                <div class="progress">
                                    <div class="progress-bar bg-success" id="progress_bar_success" role="progressbar" style="width: 25%"></div>
                                    <div class="progress-bar bg-danger" id="progress_bar_fail" role="progressbar" style="width: 5%"></div>
                                </div>
                            </div>
                            <div class="container pt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="container">
                                                <div class="row row-cols-2">
                                                    <div class="col border rounded p-2" style="background-color: #A9A9A9;" id="cross_button"><span class="mdi mdi-close mdi-24px"></span></div>
                                                    <div class="col border rounded p-2" style="background-color: #A9A9A9;" id="tick_button"><span class="mdi mdi-check mdi-24px"></span></div>
                                                    <div class="col border rounded p-2" style="background-color: #A9A9A9;" id="left_button"><span class="mdi mdi-arrow-left mdi-24px"></span></div>
                                                    <div class="col border rounded p-2" style="background-color: #A9A9A9;" id="right_button"><span class="mdi mdi-arrow-right mdi-24px"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a class="btn btn-success btn-lg text-white" href="/login" role="button">Get Started</a>
    </div>
    <svg viewBox="0 0 1440 124">
        <path fill="#8ed1fcff"
          d="M 0,124 V 74 C 55,102 110,131 159,104 207,76 250,-6 301,0 351,6 409,101 467,114 c 57,12 115,-57 176,-68 60,-12 124,36 178,56 53,19 97,12 147,-12 49,-25 106,-67 166,-67 59,-1 122,39 174,55 51,15 91,5 132,-4 l 0,50 z" />
    </svg>
    <div style="background-color: #8ed1fcff;">
        <div class="container-fluid pt-4 px-5 pb-2">
            <main role="main">

                <div class="card">
                    <div class="card-body">
                        <h1>Welcome to Flashcard Club. - A Flashcard website</h1>
                        <p>This is a very very early and pre-production version of Aidan's new flashcard website. Feel free to play around and have a crack at making some flashcards. However, please heed the warnings below.</p>
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Pre-Production! Expect bugs</h4>
                            <p>Thank you for your interest, please do not store anything you would like to keep here. It will be deleted without warning. Do not submit personal data either.</p>
                            <hr>
                            <p class="mb-0">Features may not work, may break unexpectedly and may not look very nice.</p>
                        </div>

                        <div class="accordion" id="FAQaccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        When will Flashcard Club be ready?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#FAQaccordion">
                                    <div class="accordion-body">
                                        <strong>Good Question.</strong> Flashcard Club is an experiment I (<a href="https://infinityflame.co.uk">Aidan</a>) am working on. You can read about my aspirations for this project <a
                                          href="https://infinityflame.co.uk/featured/im-starting-flashcard-club/">here</a>.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Is Flashcard Club's source code available?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#FAQaccordion">
                                    <div class="accordion-body">
                                        Yes, you may view the source code by request. Eventually I will make it public.
                                        <div>
                                            Flashcard is built in Laravel for PHP.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Can I use Flashcard Club now?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#FAQaccordion">
                                    <div class="accordion-body">
                                        While it is technically possible, I would hold off for now untill it is in a more usable state.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        How far are you with Flashcard Club?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#FAQaccordion">
                                    <div class="accordion-body">
                                        <h3>Version 0.0.2</h3>
                                        <ul>
                                            <li>User Accounts</li>
                                            <ul>
                                                <li>You can now create new user accounts and update their details.</li>
                                                <li>New users will recieve a welcome email.</li>
                                                <li>New users should be logged in automatically.</li>
                                                <li>New users should be able to create flashcards and flashcard sets.</li>
                                            </ul>
                                            <li>Flashcards</li>
                                            <ul>
                                                <li>Flashcards can now be loaded, saved, created and updated.</li>
                                                <li>Flascards use markdown syntax so you can include pictures and <del>a limited amount of html</del> thats it.</li>
                                            </ul>
                                            <li>Unit Tests</li>
                                            <ul>
                                                <li>Code coverage is very very poor.</li>
                                            </ul>
                                            <li>Study Mode</li>
                                            <ul>
                                                <li>Study mode now works perfectly.</li>
                                                <li>You can now choose between study mode and test mode.</li>
                                                <li>Test Mode is perfect for cramming.</li>
                                            </ul>
                                            <li>Study Statistics</li>
                                            <ul>
                                                <li>Test mode now records time taken to complete study as well as flashcard test outcome.</li>
                                                <li>Useful for tracking study and cramming progress over the last 30 days.</li>
                                                <li>Many features of study mode available in test mode and vice versa.</li>
                                            </ul>
                                            <li>Planned Features</li>
                                            <ul>
                                                <li>Google Sign in (Federated identity)</li>
                                                <li>Terms of service</li>
                                                <li>Privacy Policy</li>
                                                <li>FAQ Page</li>
                                                <li>Markdown User Guide</li>
                                                <li>Flashcard user guide</li>
                                                <li>Front page needs work</li>
                                            </ul>
                                        </ul>
                                        <h3>Version 0.0.1</h3>
                                        <ul>
                                            <li>User Accounts</li>
                                            <ul>
                                                <li>It's currently possible to create a new user account, although there is no ability to ammend or update your user account.</li>
                                                <li>New users should recieve a welcome email.</li>
                                                <li>New users should be logged in automatically.</li>
                                                <li>New users should be able to create flashcards and flashcard sets.</li>
                                            </ul>
                                            <li>Almost Unlimited Flashcards</li>
                                            <ul>
                                                <li>It is possible to create and save flashcards.</li>
                                                <li>You can also update flashcards, delete them and more.</li>
                                                <li>Flascards use markdown syntax so you can include pictures and a limited amount of html.</li>
                                                <li>Currently statistics and study mode do not work.</li>
                                            </ul>
                                            <li>Unit Tests</li>
                                            <ul>
                                                <li>Many components of Flashcard Club have PHPunit Unit tests.</li>
                                                <li>Code coverage is probably very poor.</li>
                                            </ul>
                                            <li>Toast Notifications</li>
                                            <ul>
                                                <li>Toast notifications are intergrated into the website.</li>
                                                <li>The best place to see these in action is in the set editor if you update the title.</li>
                                            </ul>
                                            <li>Planned Features</li>
                                            <ul>
                                                <li><del>A Study mode, because currently it is only possible to edit flashcards but not view them without the editor.</del> Completed</li>
                                                <li>Google Sign in (Federated identity).</li>
                                                <li><del>Statistics, because who doesn't love a good graph.</del> Completed</li>
                                                <li><del>Account management, because currently once you make an account you cant change any of your details, oops.</del> Completed</li>
                                            </ul>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            Have fun, don't break anything please.
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <svg viewBox="0 0 1440 155">
        <path d="M 1440,0 V 73 C 1363,35 1285,-4 1213,7 1142,19 1078,82 1011,84 945,87 878,28 804,9 731,-9 652,12 580,31 509,51 444,67 392,101 341,136 295.26396,155.93853 232.26396,153.93853 170.26396,152.93853 90,129 0,73 V 0 Z" fill="#8ed1fcff">
        </path>
    </svg>
</div>
@stop