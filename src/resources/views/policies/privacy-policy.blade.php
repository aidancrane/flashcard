@extends('layouts.master')

@section('title', 'Privacy Policy')

@section('content')
<div class="container pt-4">
    <div class="card shadow">
        <div class="card-header">
            Privacy Policy
        </div>
        <div class="card-body">
            <div class="text-center">
                <span class="mdi mdi-book-open-page-variant mdi-48px"></span>
            </div>
        </div>

        <main role="main">
            <div class="p-5">
                <div>
                    Any information collected by Flashcard Club will not be sold or distributed to anyone for any reason by Flashcard Club.
                </div>
                <div class="pt-2">
                    We use your provided information to call you by your name and save your flashcards. 
                    None of your flashcards are on the public web and we do not allow sharing of flashcards internally. 
                    When you save flashcards with images, it is possible that the images come from third party URLS you specify, which may track you.
                </div>
                <div class="pt-2">
                    You can update all of your information from the personal dashboard on the my account tab.
                </div>
                <ul>
                    <li>
                       We do use Google Analytics to help analyse usage and traffic for our Services. As an example, we may use GA to analyse and measure, in the aggregate, the number of unique visitors to Flashcard Club.
                    </li>
                    <li>
                        We do use Cloudflare to cache the website and improve performance.
                    </li>
                    <li>
                        We do store your IP address in access logs. We use this information to detect and prevent malicious behaviours.
                    </li>
                    <li>
                        Your information is stored on a Vultr VPS in New Jersey, Flashcard Club is UK based and open source.
                    </li>
                    <li>
                        You can find flashcard club source code on Github.
                    </li>
                    </ul>

                To opt out of being tracked by Google Analytics across all websites, visit <a href="https://tools.google.com/dlpage/gaoptout">this link</a>. 
                </div>
            </div>
        </main>

    </div>


</div>




@stop