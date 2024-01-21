@extends('layouts.master')

@section('title', 'Frequently Asked Questions')

@section('content')
<div class="container pt-4">
    <div class="card shadow">
        <div class="card-header">
            Frequently Asked Questions
        </div>
        <div class="card-body">
            <div class="text-center">
                <span class="mdi mdi-help mdi-48px"></span>
            </div>
            <h3 class="text-center">{{ $help_message }}</h3>
            {{-- Use this page to find answers to common questions about flashcard club. --}}
        </div>

        <main role="main">
            <div class="p-5">
                <div class="accordion" id="FAQaccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                When will Flashcard Club be ready?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#FAQaccordion">
                            <div class="accordion-body">
                                <strong>Good Question.</strong> Flashcard Club is an experiment I
                                (<a href="https://infinityflame.co.uk">Aidan</a>) am working on. You can read about my aspirations for this project
                                <a href="https://infinityflame.co.uk/featured/im-starting-flashcard-club/">here</a>.
                                <br>
                                <br>
                                Flashcard Club will be "Production Ready" for an official version 1 soon.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Where can I read the Privacy Policy?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#FAQaccordion">
                            <div class="accordion-body">
                                <strong>Good Question.</strong> You can read the Privacy Policy <a href="/pages/privacy-policy">here</a>.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Changelog
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#FAQaccordion">
                            <div class="accordion-body">
                                <h3>Version 0.0.6</h3>
                                <ul>
                                    <li>Bootstrap 5</li>
                                    <ul>
                                        <li>Unimplemented toasts on the flashcard editor as they no longer work with jQuery.</li>
                                        <li>Plan is to remove jQuery in future once new editor is ready.</li>
                                        <li>Export implemented (to json).</li>
                                        <li>Made a proper Privacy Policy for Google OAuth.</li>
                                    </ul>
                                </ul>
                                <h3>Version 0.0.5</h3>
                                <ul>
                                    <li>Charting Library</li>
                                    <ul>
                                        <li>Ported from Laravel Charts and Chartisan to Chart JS and Laravel Charts.</li>
                                    </ul>
                                    <li>Fixed bug with Markdown editor not loading on tests.</li>
                                </ul>
                                <h3>Version 0.0.4</h3>
                                <ul>
                                    <li>User Accounts</li>
                                    <ul>
                                        <li>User accounts signing in through google will be fully complete and out of testing soon..</li>
                                    </ul>
                                    <li>Landing Page</li>
                                    <ul>
                                        <li>Moved FAQ to non auth (not logged in) page.</li>
                                    </ul>
                                    <li>Flashcard Edit Page</li>
                                    <ul>
                                        <li>Limited the size of the flashcard editor to 150px.</li>
                                    </ul>
                                </ul>
                                <h3>Version 0.0.3</h3>
                                <ul>
                                    <li>User Accounts</li>
                                    <ul>
                                        <li>Users can now login and link their Google Account to Flashcard Club.</li>
                                    </ul>
                                    <li>Landing Page</li>
                                    <ul>
                                        <li>The Landing page has had a massive makeover and most of the content is different now.</li>
                                        <li>The changelog has been moved to the FAQ page.</li>
                                    </ul>
                                    <li>Test and Study Mode</li>
                                    <ul>
                                        <li>There is now a chart to plot test performance per set.</li>
                                        <li>Test mode now has additional functionality like gold highlight on completion of the test.</li>
                                        <li>Test Mode now has a summary.</li>
                                    </ul>
                                    <li>Planned Features</li>
                                    <ul>
                                        <li><del>Google Sign in (Federated identity)</del> Completed</li>
                                        <li>Terms of service</li>
                                        <li>Privacy Policy</li>
                                        <li><del>FAQ Page</del> Somewhat Completed</li>
                                        <li>Markdown User Guide</li>
                                        <li>Flashcard User Guide</li>
                                        <li><del>Front page needs work</del> Not complete but looks a lot better.</li>
                                        <li>Cramming mode that removes cards previously marked "Correct".</li>
                                    </ul>
                                </ul>
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
                                        <li>Flashcard User Guide</li>
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
            </div>
        </main>

    </div>


</div>




@stop