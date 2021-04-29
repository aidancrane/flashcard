@extends('layouts.master')

@section('title', 'Frequently Asked Questions')

@section('content')
<div class="container pt-4">
    <div class="card shadow">
        <div class="card-header">
            Frequently Asked Questions
        </div>
        <div class="card-body">
            <h3>Welcome to the FAQ</h3>
            Use this page to find answers to common questions about flashcard club.
        </div>


        <div class="accordion accordion-flush" id="accordionFAQ">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Is Flashcard Club Free?
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        For the current time being, yes. Flashcard Club is free. There are no restrictions.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Is Flashcard Club's source code available?
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Soon, but not quite yet.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Can I use Flashcard Club now?
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Yes! Flashcard Club is still young. But I feel now is a good time to work on user aquisition.
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>




@stop