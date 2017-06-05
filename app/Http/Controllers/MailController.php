<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class MailController extends Controller
{
    /*
    //從表單取得資料
$from = ['email'=>$input['email'],
'name'=>$input['name'],
'subject'=>$input['subject']
];

//填寫收信人信箱
$to = ['email'=>'xxx@xxx.com',
'name'=>'xxx'];

//信件的內容(即表單填寫的資料)
$data = ['company'=>$input['company'],
'address'=>$input['address'],
'email'=>$input['email'],
'subject'=>$input['subject'],
'msg'=>$input['message']
];

//寄出信件
Mail::send('emails.post', $data, function($message) use ($from, $to) {
    $message->from($from['email'], $from['name']);
    $message->to($to['email'], $to['name'])->subject($from['subject']);
        });

*/
}
