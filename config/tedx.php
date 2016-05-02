<?php


return [

    // Iconitele de social media de sus. Se pot schimba ordinea, link-ul,
    // sau adauga mai multe, atata timp cat exista iconita cu {{numele cheii}}.png in folder-ul
    // public/gfx pentru poza icon-ului.
    'social_icons' => [
        'twitter' => '',
        'facebook' => 'https://www.facebook.com/TEDxEroilor/?fref=ts',
        'instagram' => '',
    ],

    // Social feed
    'facebook_token' => "EAADBb4mzn18BAIGZCTZCmK32ZCBV55R2TDXdiPkzI2g4wPm15jq4xbNU1ZAoZAZA1ZAKzoZALcYNZCKdTIrTqyvnpVp7ZBFG1deGknf1f0VVEihZCxD7GExDRTQjwf1lZApopKG1ebnR5ZCOikaEDZBgKtSeoKRLr0LObVUJ8ZD",
    
    // Pagina de facebook din care se iau ultimele postari de pe pagina home
    'facebook_pagename' => 'TEDxEroilor',

    // Este limita cuvintelor din ultima postare de pe facebook
    'facebook_word_excerpt' => 25,
    
    'twitter_token' => "",
    
    // De la ce adresa de email vin mesajele de contact
    // !!! Atentie, daca schimbi asta, v-a trebui sa introduci
    // credentialele noii adrese de email in fisierul .env !!!
    'contact_email_from' => "contactform@tedxeroilor.com",
    
    // Adresa de email spre care se duc mesajele din contact.
    'contact_email_to' => "contact@tedxeroilor.com",
    
    //Video-urile de pe pagina de home
    //La valoare se afla id-ul din link-ul video-ului de pe youtube, adica query-param-ul v.
    //De exemplu pentru video_1 avem id-ul din https://www.youtube.com/watch?v=5MgBikgcWnY
    //Adica 5MgBikgcWnY
    'video_1' => '5MgBikgcWnY',
    'video_2' => '8S0FDjFBj8o'

];