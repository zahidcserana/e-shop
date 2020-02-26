<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Site Settings Defaults
    |--------------------------------------------------------------------------
    |
    */

    'credit_limit' => 85,
    'invoice_no_size' => 6,
    'bill_no_size' => 6,
    'chalan_no_size' => 6,

    'company_name' => 'CARNMOTO',
    'company_email' => 'info@carnmoto.com',
    'company_mobile' => '01708887754',
    'company_phone' => '(804) 123-5432',
    'company_address' => 'Mirpur, Dhaka',

    'req_status' => [
        'PENDING' => 'PENDING',
        'APPROVED' => 'APPROVED',
        'ACCEPT' => 'ACCEPT',
        'READY' => 'READY',
        'DELIVERED' => 'DELIVERED',
        'COMPLETE' => 'COMPLETE',
    ],

    'status' => [
        'PENDING' => 'PENDING',
        'ACTIVE' => 'ACTIVE',
        'INACTIVE' => 'INACTIVE',
    ],

    'st_type' => [
        'SH' => 'SH',
        'NSM' => 'NSM',
        'ASM' => 'ASM',
        'RSM' => 'RSM',
        'ESP' => 'ESP',
        'HO' => 'HO',
    ],

    'order_status' => [
        'PENDING' => 'PENDING',
        'INPROGRESS' => 'INPROGRESS',
        'COMPLETE' => 'COMPLETE',
        'REJECT' => 'REJECT',
        'ARCHIVE' => 'ARCHIVE',
    ],

    'payment_process' => [
        'CASH' => 'CASH',
        'CHEQUE' => 'CHEQUE',
        'BKASH' => 'BKASH',
        'CARD' => 'CARD',
        'BANKTRANSFAR' => 'BANKTRANSFAR',
    ],

    'payment_status' => [
        'PAID' => 'PAID',
        'PARTIAL_PAID' => 'PARTIAL PAID',
        'UNPAID' => 'UNPAID'
    ],

    'order_payment' => [
        'PENDING' => 'PENDING',
        'PARTIAL_PAID' => 'PARTIAL PAID',
        'FULL_PAID' => 'PAID',
    ],

    'approval_status' => [
        'APPROVAL_PENDING' => 'APPROVAL PENDING',
        'APPROVED_BY_ASM' => 'APPROVED BY ASM',
        'APPROVED_BY_RSM' => 'APPROVED BY RSM',
        'APPROVED_BY_NSM' => 'APPROVED BY NSM',
        'APPROVED_BY_ED' => 'APPROVED BY ED',
        'APPROVED_BY_HO' => 'APPROVED BY HO',
    ],

    'invoice' => [
        'year' => [
          '00' => 'A', '01' => 'B', '02' => 'C', '03' => 'D', '04' => 'E', '05' => 'F', '06' => 'G', '07' => 'H', '08' => 'I', '09' => 'J',
          '10' => 'K', '11' => 'L', '12' => 'M', '13' => 'N', '14' => 'O', '15' => 'P', '16' => 'Q', '17' => 'R', '18' => 'S', '19' => 'T',
          '20' => 'U', '21' => 'V', '22' => 'W', '23' => 'X', '24' => 'Y', '25' => 'Z', '26' => 'A', '27' => 'B', '28' => 'C', '29' => 'D',
          '30' => 'E', '31' => 'F', '32' => 'G', '33' => 'H', '34' => 'I', '35' => 'J', '36' => 'K', '37' => 'L', '38' => 'M', '39' => 'N',
          '40' => 'O', '41' => 'P', '42' => 'Q', '43' => 'R', '44' => 'S', '45' => 'T', '46' => 'U', '47' => 'V', '48' => 'W', '49' => 'X',
          '50' => 'Y', '51' => 'Z', '52' => 'A', '53' => 'B', '54' => 'C', '55' => 'D', '56' => 'E', '57' => 'F', '58' => 'G', '59' => 'H',
          '60' => 'I', '61' => 'J', '62' => 'K', '63' => 'L', '64' => 'M', '65' => 'N', '66' => 'O', '67' => 'P', '68' => 'Q', '69' => 'R',
          '70' => 'S', '71' => 'T', '72' => 'U', '73' => 'V', '74' => 'W', '75' => 'X', '76' => 'Y', '77' => 'Z', '78' => 'A', '79' => 'B',
          '80' => 'C', '81' => 'D', '82' => 'E', '83' => 'F', '84' => 'G', '85' => 'H', '86' => 'I', '87' => 'J', '88' => 'K', '89' => 'L',
          '90' => 'M', '91' => 'N', '92' => 'O', '93' => 'P', '94' => 'Q', '95' => 'R', '96' => 'S', '97' => 'T', '98' => 'U', '99' => 'V'
        ],

        'month' => [
            '01' => 'A',
            '02' => 'B',
            '03' => 'C',
            '04' => 'D',
            '05' => 'E',
            '06' => 'F',
            '07' => 'G',
            '08' => 'H',
            '09' => 'I',
            '10' => 'J',
            '11' => 'K',
            '12' => 'L'
        ],
    ],

    'api_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYmZlYTBhMDFmNTZmYmEzZWZlNmY5NzAyMjg2ZGJhOTc1NWZmYzhkZDVlZmJlYTg5NDk0NjUwMjUyYzZlZDA1ODViYTQ1MDE4Yzc3MzNmZTgiLCJpYXQiOjE1NzkwMDAwMDgsIm5iZiI6MTU3OTAwMDAwOCwiZXhwIjoxNjEwNjIyNDA4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.DfdYq4Mu0Cdh3eWbU4zX_7GofdOeve0lobZlIh2hCMxANSy9qOxEKRsxYqHCOwHuOo_0HuwrRUOtnGdH5XVvXSQ5U1yeYb69-M5J3RFT7jQo9ZoX4ZBZGEKAw9ynGLZjuZ1t7S21k4wRWgtlfKdCBF0WzuHQ3Rp5dTs2q4RUmwyCbOG_e-OPA6wjzgujhmQkG4OHiFjmUsO0OE7mWAe89K6MEA9nNda-UHE9Fq5Ru4wLI_d3iA7n6hDXARFUFmilslYJ_XJiy4tBRBDMmYGAzdEKiueg9ZKraN6pjF58nmHbyxrQN5v-Ut6p5dZqox22gmDuDHwhwT54yQtwqeLK_MrBBRPQQ7fyVwe6xl-eHp_xcLLN5F6_mgyQlQ3kVf1h93oi0AZO5yvfJy18_UA7i48kOF3kkTyH9dpfYXeXvkeLhCyNN-zBud-_HhAzRjWAzfOg_ISdktsPGRtRyJP6UTgZ3znNIqeXhGN5rypypkd6tvlQL6o4psaxOVkXKzuCalZY7_EpG_ZBhirvm426Huu-EaZ7bRu3B1R3rVfwFhLBU1hv45wZwd5NOlE6_9ux_cgdwBrN6xPCcJ_iJkVfQzjwpsUSC5wpXP5vKasMzqLi_CC5g61CAmd7SJdS8CzBPqLj1HQocfdN7KW5DOvkKAsbtRN11JOuRQx8wekVSZE',
];
