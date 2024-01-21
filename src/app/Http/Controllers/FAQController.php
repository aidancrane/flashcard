<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQController extends Controller
{
  public function FAQIndex() {
    $messages = [
      "How can we help you today?",
      "Are you a bit stuck?",
      "Need a helping hand?",
      "Need a little help?",
      "We can help you!",
      "What can we help you with?",
      "We can help!"
    ];
    $help_message = $messages[array_rand($messages)];
    return view("faq.faq-index")->with("help_message", $help_message );
  }

  public function PrivacyPolicy() {
    return view("policies.privacy-policy");
  }

  public function TermsOfService () {
    return view("policies.terms-of-service");
  }
}
