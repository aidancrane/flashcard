@extends('layouts.master')

@section('title', 'Landing Page')

@section('content')
<div class="container-fluid pt-4 px-5">
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
                                Currently, Flashcard Club has the following features,
                                <ul>
                                    <li>User Accounts,</li>
                                    <ul>
                                        <li>It's currently possible to create a new user account, although there is no ability to ammend or update your user account.</li>
                                        <li>New users should recieve a welcome email.</li>
                                        <li>New users should be logged in automatically.</li>
                                        <li>New users should be able to create flashcards and flashcard sets.</li>
                                    </ul>
                                    <li>Almost Unlimited Flashcards,</li>
                                    <ul>
                                        <li>It is possible to create and save flashcards.</li>
                                        <li>You can also update flashcards, delete them and more.</li>
                                        <li>Flascards use markdown syntax so you can include pictures and a limited amount of html.</li>
                                    </ul>
                                    <li>Unit Tests,</li>
                                    <ul>
                                        <li>Many components of Flashcard Club have PHPunit Unit tests.</li>
                                        <li>Code coverage is probably very poor.</li>
                                    </ul>
                                    <li>Toast Notifications,</li>
                                    <ul>
                                        <li>Toast notifications are intergrated into the website.</li>
                                        <li>The best place to see these in action is in the set editor if you update the title.</li>
                                    </ul>
                                </ul>
                                Planned features include,
                                <ul>
                                    <li>A Study mode, because currently it is only possible to edit flashcards but not view them without the editor.</li>
                                    <li>Google Sign in (Federated identity).</li>
                                    <li>Statistics, because who doesn't love a good graph.</li>
                                    <li>Account management, because currently once you make an account you cant change any of your details, oops.</li>
                                </ul>

                                Currently statistics and study mode do not work.
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
@stop