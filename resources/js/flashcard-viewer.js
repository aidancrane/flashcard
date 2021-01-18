import DOMPurify from 'dompurify';

var marked = require('marked');

var markedImages = require('marked-images');

marked.use(markedImages());

$('document').ready(function() {

    let front_text = $('#front_text').text();

    let html = DOMPurify.sanitize(marked(front_text.trimStart()));

    $('#page_first_card').html(html);

});
