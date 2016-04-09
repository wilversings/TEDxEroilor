<?php

return [
       "events" => [
           "metadata"   => [
               "type"           => [
                   "type"    => "enum",
                   "label"   => "Event type",
                   "options" => [
                       "salon" => "Salon",
                       "youth"  => "Youth",
                       "women"  => "Women"
                   ]
               ],
               "date"           => [
                   "type"  => "date",
                   "label" => "Event date"
               ],
               "time"           => [
                   "type"  => "time",
                   "label" => "Event time"
               ],
               "name_ro"        => [
                   "type"  => "string",
                   "label" => "Name ro"
               ],
               "name_en"        => [
                   "type"  => "string",
                   "label" => "Name en"
               ],
               "description_ro" => [
                   "type"  => "text",
                   "label" => "Description ro"
               ],
               "description_en" => [
                   "type"  => "text",
                   "label" => "Description en"
               ],
               "location_ro"    => [
                   "type"  => "text",
                   "label" => "Location ro"
               ],
               "location_en"    => [
                   "type"  => "text",
                   "label" => "Location en"
               ],
               "map_image" => [
                   "type" => "image",
                   "label" => "Map photo"
               ],
           ],
           "entityName" => "events",
           "title"      => "Add a new Event"
       ],
       "advisers"         => [
           "metadata" => [
               "name"           => [
                   "type"  => "string",
                   "label" => "Name"
               ],
               "link"           => [
                   "type"  => "text",
                   "label" => "Link"
               ],
               "position_en"    => [
                   "type"  => "string",
                   "label" => "Position en"
               ],
               "position_ro"    => [
                   "type"  => "string",
                   "label" => "Position ro"
               ],
               "description_en" => [
                   "type"  => "text",
                   "label" => "Description en"
               ],
               "description_ro" => [
                   "type"  => "text",
                   "label" => "Description ro"
               ]
           ],
           "title"    => "Add a new Adviser",
           'entityName' => 'advisers'
       ],
       "speakers"         => [
           "metadata" => [
               "name"           => [
                   "type"  => "string",
                   "label" => "Name"
               ],
               "event_id" => [
                    "type" => "enum",
                    "label" => "Event",
                    "options" => [],  
               ],
               "link"           => [
                   "type"  => "text",
                   "label" => "Link"
               ],
               "description_en" => [
                   "type"  => "text",
                   "label" => "Description en"
               ],
               "description_ro" => [
                   "type"  => "text",
                   "label" => "Description ro"
               ],
               "photo" => [
                   "type" => "image",
                   "label" => "Photo"
               ]
           ],
           "title"    => "Add a new Speaker",
           'entityName' => 'speakers'
       ],
       "partners"         => [
           "metadata" => [
               "name"             => [
                   "type"  => "string",
                   "label" => "Name"
               ],
               "partnershipType_id" => [
                   "type"    => "enum",
                   "label"   => "Partnership type",
                   "options" => []
               ],
               "priority_index"   => [
                   "type"    => "number",
                   "label"   => "Insert nth",
                   "options" => []
               ],
               "logo" => [
                   "type" => "image",
                   "label" => "Photo"
               ],
           ],
           "title"    => "Add a new Partner",
           'entityName' => 'partners'
       ],
       "partnershiptypes" => [
           "metadata" => [
               "priority_index" => [
                   "type"    => "enum",
                   "label"   => "Insert before",
                   "options" => []
               ],
               "text_size" => [
                   "type" => "number",
                   "label" => "Text size"
               ],
               "name_en" => [
                   "type"  => "string",
                   "label" => "Name en"
               ],
               "name_ro" => [
                   "type"  => "string",
                   "label" => "Name ro"
               ],
               "description_en" => [
                   "type"  => "text",
                   "label" => "Description en"
               ],
               "description_ro" => [
                   "type"  => "text",
                   "label" => "Description ro"
               ]
           ],
           "title"    => "Add a new Partnership type",
           'entityName' => 'partnership-types'
       ],
       "teammembers"      => [
           "metadata" => [
               "name"          => [
                   "type"  => "string",
                   "label" => "Name"
               ],
               "email"         => [
                   "type"  => "string",
                   "label" => "Email"
               ],
               "link"          => [
                   "type"  => "text",
                   "label" => "Link"
               ],
               "position_en"   => [
                   "type"  => "string",
                   "label" => "Position en"
               ],
               "position_ro"   => [
                   "type"  => "string",
                   "label" => "Position ro"
               ],
               "superpower_en" => [
                   "type"  => "string",
                   "label" => "Superpower en"
               ],
               "superpower_ro" => [
                   "type"  => "string",
                   "label" => "Superpower ro"
               ],
               'photo' => [
                   "type" => "image",
                   "label" => "Photo"
               ]
           ],
           "title"    => "Add a new Team member",
           'entityName' => 'team-members'
       ],
       "alumni"           => [
           "metadata" => [
               "name"        => [
                   "type"  => "string",
                   "label" => "Name"
               ],
               "link"        => [
                   "type"  => "text",
                   "label" => "Link"
               ],
               "position_en" => [
                   "type"  => "string",
                   "label" => "Position en"
               ],
               "position_ro" => [
                   "type"  => "string",
                   "label" => "Position ro"
               ]
           ],
           "title"    => "Add a new Alumna",
           'entityName' => 'alumni'
       ]
   ];