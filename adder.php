<?php
define('API_KEY',"451925641:AAFeiT3MOTOEtFTradTjALwRR4sHNoSjbMk"); //<====== بجای کلمه توکن توکن ربات خود را قرار دهید
$Dev = @lightmru; // <==== آیدی عددی مدیر ربات
$userbot = "botrofa_adderbot"; //<=== نام کاربری ربات
$userchanel = "grofa"; //<==== آی دی کاتال


function Poker($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
//------------------------------------

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$namegroup = $update->message->chat->title;
mkdir("data/gp");
mkdir("data/user");
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$textmassage = $message->text;
$tc = $update->message->chat->type;
$newchatmemberid = $update->message->new_chat_member->id;
$newchatmemberu = $update->message->new_chat_member->username;
$chatid = $update->callback_query->message->chat->id;
$fm = $update->callback_query->from->id;
$data = $update->callback_query->data;
$messageid = $update->callback_query->message->message_id;
$token = API_KEY;
$forchaneel = file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$userchanel."&user_id=".$from_id);
$stat = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=".$from_id);
$statjson = json_decode($stat, true);
$status = $statjson['result']['status'];
$get = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_edit_id&user_id=".$edit_for_id);
$info = json_decode($get, true);
$you = $info['result']['status'];
//------------------------------------------
function SendMessage($chat_id, $text){//foxlearn.ir
    Poker('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$text,
        'parse_mode'=>'MarkDown']);
}

function save($filename, $data)
{
    $file = fopen($filename, 'w');
    fwrite($file, $data);
    fclose($file);
}
function sendAction($chat_id, $action){
    Poker('sendChataction',[
        'chat_id'=>$chat_id,
        'action'=>$action
        ]);
}
function Forward($berekoja,$azchejaei,$kodompayam)
{
Poker('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}//foxlearn.ir
//------------------------------------------
$userstart = file_get_contents("data/user/userstart.txt");
$numberstart = file_get_contents("data/user/numberstart.txt");
$gpadding = file_get_contents("data/gp/gpadding.txt");
$alladding = file_get_contents("data/gp/alladding.txt");
$alldelmesage = file_get_contents("data/gp/alldelmesage.txt");
$numbergp = file_get_contents("data/gp/numbergp.txt");
$startchech = file_get_contents("data/user/$from_id/startchech.txt");
$step = file_get_contents("data/user/$from_id/file.txt");
$setadd = file_get_contents("data/gp/$chat_id/setadd.txt");
$addings = file_get_contents("data/gp/$chat_id/adding.txt");
$youadding = file_get_contents("data/gp/$chat_id/$from_id/youadding.txt");
$youtext = file_get_contents("data/gp/$chat_id/$from_id/youtext.txt");
$stats = file_get_contents("data/gp/$chat_id/stats.txt");
$setadd2 = file_get_contents("data/gp/$chatid/setadd.txt");
$addings2 = file_get_contents("data/gp/$chatid/adding.txt");
$stats2 = file_get_contents("data/gp/$chatid/stats.txt");
$mods = file_get_contents("data/gp/$chatid/mod.txt");
$chatadding = file_get_contents("data/gp/$chat_id/chatadding.txt");
///-----------------------------------------
if(strpos($forchaneel , '"status":"left"')==true && $tc == "private"){
    sendAction($chat_id, 'typing');
    Poker('sendmessage',[
        "chat_id"=>$chat_id,
        "text"=>"دوست عزیز برای استفاده از ربات و همچنین حمایت از ما باید عضو کانال شوید ⚠️
⭕️ @$userchanel
و بعد از عضویت /start رو مجددا ارسال کنید",
        'reply_to_message_id'=>$message_id,
    ]);
}
elseif($textmassage == "/start" && $tc == "private"){
    if($userstart ==""){
        $myfile2 = fopen("data/user/userstart.txt", 'a') or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
    sendAction($chat_id, 'typing');
    Poker('SendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"😼👾سلام به ربات اد اجباری گروفا خوش آمدید

⭐️ این ربات اعضای گروه شما را مجبور به اد کردن در گروه شما میکنند.
😱 تا اعضا تعداد مشخصی را در گروه شما اد نکنن اجازه ندارند در گروه فعالیتی داشته باشند و پیام های آنها حذف میشوند.


🎃 فقط کافیه ربات را در گروهتان اد کرده و دستور /add را در گروهتان ارسال کنید و ربات را ادمین کنید...,",
        'reply_to_message_id'=>$message_id,
    ]);
    mkdir("data/user/$from_id");
    save("data/user/$from_id/startchech.txt","true");
    save("data/user/numberstart.txt","1");
    }
    elseif($startchech == "true"){
       sendAction($chat_id, 'typing');
    Poker('SendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"😼👾به ربات رایگان اد کن بات خوش آمدید

⭐️ این ربات اعضای گروه شما را مجبور به اد کردن در گروه شما میکنند.
😱 تا اعضا تعداد مشخصی را در گروه شما اد نکنن اجازه ندارند در گروه فعالیتی داشته باشند و پیام های آنها حذف میشوند.


🎃 فقط کافیه ربات را در گروهتان اد کرده و دستور /add را در گروهتان ارسال کنید و ربات را ادمین کنید... ",
        'reply_to_message_id'=>$message_id,
    ]);
    }
    elseif($startchech != "true"){
    $myfile2 = fopen("data/user/userstart.txt", 'a') or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
    sendAction($chat_id, 'typing');
    Poker('SendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"😼👾سلام به ربات اد اجباری گروفا خوش آمدید

⭐️ این ربات اعضای گروه شما را مجبور به اد کردن در گروه شما میکنند.
😱 تا اعضا تعداد مشخصی را در گروه شما اد نکنن اجازه ندارند در گروه فعالیتی داشته باشند و پیام های آنها حذف میشوند.


🎃 فقط کافیه ربات را در گروهتان اد کرده و دستور /add را در گروهتان ارسال کنید و ربات را ادمین کنید...",
        'reply_to_message_id'=>$message_id,
    ]);
    mkdir("data/user/$from_id");
    save("data/user/$from_id/startchech.txt","true");
    $po = $numberstart +1;
    save("data/user/numberstart.txt","$po");
    }
}
if (strpos($chatadding , "$chat_id")!== false) {
    if ($textmassage == "/add" && $status != "member") {
        $date1 = date('Y-m-d', time());
        sendAction($chat_id, 'typing');
        Poker('sendmessage', [
            "chat_id" => $chat_id,
            "text" => "گروه در لیست پشتیبانی بوده",
            'reply_to_message_id' => $message_id,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "پنل مدیریتی", 'callback_data' => 'sittengss'], ['text' => "راهنما", 'callback_data' => 'helpmods']
                    ],
                ]
            ])
        ]);
        save("data/gp/$chat_id/mod.txt","$from_id");
    }
}
elseif($textmassage == "/add" && $status != "member"){
    if ($tc == 'group' | $tc == 'supergroup'){
    mkdir("data");
    mkdir("data/gp");
    mkdir("data/gp/$chat_id");
    sendAction($chat_id, 'typing' );
        Poker('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"گروه شما ثبت شد",
            'reply_to_message_id' => $message_id,
            'reply_to_message_id' => $message_id,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "پنل مدیریتی", 'callback_data' => 'sittengss'], ['text' => "راهنما", 'callback_data' => 'helpmods']
                    ],
                ]
            ])
        ]);
        save("data/gp/$chat_id/stats.txt","0");
        save("data/gp/$chat_id/setadd.txt","5");
        save("data/gp/$chat_id/adding.txt","on");
        save("data/gp/$chat_id/chatadding.txt", "$chat_id");
        save("data/gp/$chat_id/mod.txt","$from_id");
        $myfile2 = fopen("data/gp/gpadding.txt", 'a') or die("Unable to open file!");
        fwrite($myfile2, "$chat_id\n");
        fclose($myfile2);
        $po = $numbergp +1;
        save("data/gp/numbergp.txt","$po");
    }
}
if($textmassage == "/stats" && $status != "member"){
    sendAction($chat_id, 'typing' );
        Poker('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"آمار :
تا الان *$stats* نفر به گروه اضافه شدن",
 'parse_mode'=>'MarkDown',
 'reply_to_message_id' => $message_id,
        ]);
}
if (strpos($textmassage , "/setadd" ) !== false && $status != "member") {
        $text = str_replace("/setadd ","",$textmassage);
        if ($text <= 20 && $text >= 1){
        save("data/gp/$chat_id/setadd.txt","$text");
        sendAction($chat_id, 'typing' );
        Poker('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"نعداد ادد کننده ای هر نفر از گرو ها به $text تغییر یافت ",
            'parse_mode'=>'MarkDown',
            'reply_to_message_id' => $message_id,
        ]);
        }else{Poker('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"عدد شما باید بین *1* تا *20* باشه",
            'parse_mode'=>'MarkDown',
            'reply_to_message_id' => $message_id,
        ]);}
}
if($textmassage == "/bot off" && $status != "member"){
    save("data/gp/$chat_id/adding.txt","off");
    sendAction($chat_id, 'typing' );
        Poker('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"ربات اف شد در گروه",
            'reply_to_message_id' => $message_id,
        ]);
}
if($textmassage == "/bot on" && $status != "member"){
    save("data/gp/$chat_id/adding.txt","on");
    sendAction($chat_id, 'typing' );
        Poker('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"ربات آنلاین شد در گروه",
            'reply_to_message_id' => $message_id,
        ]);
}
//-----------------------------------------------------
if($textmassage == "/panel" && $status != "member"){
     Poker('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>'به پنل تنظیمات خوش امدید',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "😊 $addings 😊", 'callback_data' => "bot"],['text' => "🤖وضعیت ربات🤖", 'callback_data' => "bot"]
            ],
            [
                ['text' => "$stats NEW", 'callback_data' => "stats"],['text' => "🕶آمار کل🕶", 'callback_data' => "stats"]
            ],
            [
                ['text' => "👾 حداقل عضو کننده 👾", 'callback_data' => "ooo"]
            ],
            [
                ['text' => "➕", 'callback_data' => "+setadd"],['text' => "$setadd", 'callback_data' => "oooo"],['text' => "➖", 'callback_data' => "-setadd"]
            ],
            [
                ['text' => "🔖راهنما🔖", 'callback_data' => "helpmods"]
            ],
            ]
        ])
    ]);
    save("data/gp/$chat_id/mod.txt","$from_id");
}
elseif($data == "bot" && $addings2 == "on" && $fm == "$mods"){
    save("data/gp/$chatid/adding.txt","off");
     Poker('editmessagetext',[
        'chat_id'=>$chatid,
        'message_id'=>$messageid,
        'text'=>"🤠پنل مدیریت🤠
😥ربات در گروه غیر فعال شود و نمیتواند پیام ها رو چک کند😥",
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "😔 off 😔", 'callback_data' => "bot"],['text' => "🤖وضعیت ربات🤖", 'callback_data' => "i"]
            ],
            [
                ['text' => "$stats2 NEW", 'callback_data' => "stats"],['text' => "🕶آمار کل🕶", 'callback_data' => "ii"]
            ],
            [
                ['text' => "👾 حداقل عضو کننده 👾", 'callback_data' => "iii"]
            ],
            [
                ['text' => "➕", 'callback_data' => "+setadd"],['text' => "$setadd2", 'callback_data' => "oooo"],['text' => "➖", 'callback_data' => "-setadd"]
            ],
            [
                ['text' => "🔖راهنما🔖", 'callback_data' => "helpmods"]
            ],
            ]
        ])
    ]);
}
elseif($data == "bot" && $addings2 == "off" && $fm == "$mods"){
    save("data/gp/$chatid/adding.txt","on");
     Poker('editmessagetext',[
        'chat_id'=>$chatid,
        'message_id'=>$messageid,
        'text'=>"🤠پنل مدیریت🤠
😍ربات در گروه روشن شد و میتواند پیام ها رو چک کند 😍",
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "😊 on 😊", 'callback_data' => "bot"],['text' => "🤖وضعیت ربات🤖", 'callback_data' => "i"]
            ],
            [
                ['text' => "$stats2 NEW", 'callback_data' => "stats"],['text' => "🕶آمار کل🕶", 'callback_data' => "ii"]
            ],
            [
                ['text' => "👾 حداقل عضو کننده 👾", 'callback_data' => "iii"]
            ],
            [
                ['text' => "➕", 'callback_data' => "+setadd"],['text' => "$setadd2", 'callback_data' => "oooo"],['text' => "➖", 'callback_data' => "-setadd"]
            ],
            [
                ['text' => "🔖راهنما🔖", 'callback_data' => "helpmods"]
            ],
            ]
        ])
    ]);
}
elseif($data == "-setadd" && $fm == "$mods"){
    $manfi = $setadd2 -1;
    if ($manfi <= 20 && $manfi >= 1){
    save("data/gp/$chatid/setadd.txt","$manfi");
     Poker('editmessagetext',[
        'chat_id'=>$chatid,
        'message_id'=>$messageid,
        'text'=>"🤠پنل مدیریت🤠
هر نفر باید *$manfi* نفر به گروه اضافه کند تا اجازه درخواست یا چت رو داشته باشد🤡",
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "😊 $addings2 😊", 'callback_data' => "bot"],['text' => "🤖وضعیت ربات🤖", 'callback_data' => "i"]
            ],
            [
                ['text' => "$stats2 NEW", 'callback_data' => "stats"],['text' => "🕶آمار کل🕶", 'callback_data' => "ii"]
            ],
            [
                ['text' => "👾 حداقل عضو کننده 👾", 'callback_data' => "iii"]
            ],
            [
                ['text' => "➕", 'callback_data' => "+setadd"],['text' => "$manfi", 'callback_data' => "oooo"],['text' => "➖", 'callback_data' => "-setadd"]
            ],
            [
                ['text' => "🔖راهنما🔖", 'callback_data' => "helpmods"]
            ],
            ]
        ])
    ]);
    }
}//foxlearn.ir
elseif($data == "+setadd" && $fm == "$mods"){
    $mosbat = $setadd2 +1;
    if ($mosbat <= 20 && $mosbat >= 1){
    save("data/gp/$chatid/setadd.txt","$mosbat");
     Poker('editmessagetext',[
        'chat_id'=>$chatid,
        'message_id'=>$messageid,
        'text'=>"🤠پنل مدیریت🤠
هر نفر باید *$mosbat* نفر به گروه اضافه کند تا اجازه درخواست یا چت رو داشته باشد🤡",
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "😊 $addings2 😊", 'callback_data' => "bot"],['text' => "🤖وضعیت ربات🤖", 'callback_data' => "i"]
            ],
            [
                ['text' => "$stats2 NEW", 'callback_data' => "stats"],['text' => "🕶آمار کل🕶", 'callback_data' => "ii"]
            ],
            [
                ['text' => "👾 حداقل عضو کننده 👾", 'callback_data' => "iii"]
            ],
            [
                ['text' => "➕", 'callback_data' => "+setadd"],['text' => "$mosbat", 'callback_data' => "oooo"],['text' => "➖", 'callback_data' => "-setadd"]
            ],
            [
                ['text' => "🔖راهنما🔖", 'callback_data' => "helpmods"]
            ],
            ]
        ])
    ]);
    }
}
elseif($data == "helpmods" && $fm == "$mods"){
     Poker('editmessagetext',[
        'chat_id'=>$chatid,
        'message_id'=>$messageid,
        'text'=>"🔻 راهنمایی ربات 🔻

▪️*/panel* نمایش تنظیمات به صورت دکمه ای شیشه ای

▪️*/stats* نمایش تعداد کاربران جدید

▪️ */setadd* *number* تنظیم حداقل عضو برای هر فرذ

▪️ */bot* *[on/off]* فعال و غیر فعال بودن ربات",
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "🔙 بازگشت ", 'callback_data' => "sittengss"]
            ],
            ]
        ])
    ]);
}
if($textmassage == "/help" && $status != "member"){
    Poker('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"🔻 راهنمایی ربات 🔻

▪️*/panel* نمایش تنظیمات به صورت دکمه ای شیشه ای

▪️*/stats* نمایش تعداد کاربران جدید

▪️ */setadd* *number* تنظیم حداقل عضو برای هر فرذ

▪️ */bot* *[on/off]* فعال و غیر فعال بودن ربات",
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $message_id,
    ]);
}
elseif($data == "sittengss" && $fm == "$mods"){
     Poker('editmessagetext',[
        'chat_id'=>$chatid,
        'message_id'=>$messageid,
        'text'=>'به پنل تنظیمات خوش امدید',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "😊 $addings2 😊", 'callback_data' => "bot"],['text' => "🤖وضعیت ربات🤖", 'callback_data' => "bot"]
            ],
            [
                ['text' => "$stats2 NEW", 'callback_data' => "stats"],['text' => "🕶آمار کل🕶", 'callback_data' => "stats"]
            ],
            [
                ['text' => "👾 حداقل عضو کننده 👾", 'callback_data' => "ooo"]
            ],
            [
                ['text' => "➕", 'callback_data' => "+setadd"],['text' => "$setadd2", 'callback_data' => "oooo"],['text' => "➖", 'callback_data' => "-setadd"]
            ],
            [
                ['text' => "🔖راهنما🔖", 'callback_data' => "helpmods"]
            ],
            ]
        ])
    ]);
}
//--------------------------------------------------

if($textmassage == "/panel" && $tc == "private" && $from_id == $Dev){
     Poker('sendMessage',[
        'chat_id'=>$Dev,
        'text'=>'به پنل مدیریتی ربات خوش آمدید',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "🤖آمار کلی ربات🤖", 'callback_data' => "amars"]
            ],
            [
                ['text' => "📍 ارسال پیام 📍", 'callback_data' => "sendmessages"]
            ],
        ]
        ])
    ]);
}
if($data == "amars" && $fm == $Dev){
        Poker('editmessagetext',[
        'chat_id'=>$Dev,
        'message_id'=>$messageid,
        'text'=>'به قسمت آمار ربات خوش آمدید',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "🤖آمار کلی ربات🤖", 'callback_data' => "asdwqdqw"]
            ],
            [
                ['text' => "$numberstart Mbs", 'callback_data' => "ooaooooo"],['text' => "$numbergp Gps", 'callback_data' => "oooooo"]
            ],
            [
                ['text' => "👾 آمار کلی گروه ها👾", 'callback_data' => "wdqd"]
            ],
            [
                ['text' => "$alldelmesage", 'callback_data' => "ooooasdooo"],['text' => "$alladding", 'callback_data' => "oooxzvooo"]
            ],
            [
                ['text' => "🔝حذف پیام در گروه ها", 'callback_data' => "ooooasooo"],['text' => "🔝ادد ممبر در گروه ها", 'callback_data' => "ooowdqooo"]
            ],
            [
                ['text' => "🔙بازگشت", 'callback_data' => "paneladmins"]
            ],
            ]
        ])
    ]);
}
if($data == "sendmessages" && $fm == $Dev){
        Poker('editmessagetext',[
        'chat_id'=>$Dev,
        'message_id'=>$messageid,
        'text'=>'به قسمت ارسال پیام ربات خوش آمدید',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "📍 ارسال پیام 📍", 'callback_data' => "senwedmessages"]
            ],
            [
                ['text' => "👤ارسال به کاربران👤", 'callback_data' => "seuser"],['text' => "👤فروارد به کاربران👤", 'callback_data' => "fruser"]
            ],
            [
                ['text' => "👥 ارسال به گروه ها 👥", 'callback_data' => "segp"],['text' => "👥 فروارد به گروه ها 👥", 'callback_data' => "frgp"]
            ],
            [
                ['text' => "📍ارسال به همه📍", 'callback_data' => "seall"],['text' => "📍فروارد به همه📍", 'callback_data' => "frall"]
            ],
            [
                ['text' => "🔙بازگشت", 'callback_data' => "paneladmins"]
            ],
            ]
        ])
    ]);
}
if($data == "paneladmins" && $fm == $Dev){
    save("data/user/$Dev/file.txt","none");
        Poker('editmessagetext',[
        'chat_id'=>$Dev,
        'message_id'=>$messageid,
        'text'=>'به پنل مدیریتی ربات خوش آمدید',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "🤖آمار کلی ربات🤖", 'callback_data' => "amars"]
            ],
            [
                ['text' => "📍 ارسال پیام 📍", 'callback_data' => "sendmessages"]
            ],
        ]
        ])
    ]);
}
if($data == "seuser" && $fm == $Dev){
    save("data/user/$Dev/file.txt","seuser");
        Poker('editmessagetext',[
        'chat_id'=>$Dev,
        'message_id'=>$messageid,
        'text'=>'پیام خودتون رو برای ارسال به کاربران ارسال کنید
توجه پیام شما فروارد نمیشود',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "🔙بازگشت", 'callback_data' => "paneladmins"]
            ],
        ]
        ])
    ]);
}
if($data == "frgp" && $fm == $Dev){
    save("data/user/$Dev/file.txt","frgp");
        Poker('editmessagetext',[
        'chat_id'=>$Dev,
        'message_id'=>$messageid,
        'text'=>'پیام خودتون رو برای فروارد به کاربران ارسال کنید',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "🔙بازگشت", 'callback_data' => "paneladmins"]
            ],
        ]
        ])
    ]);
}
if($data == "seall" && $fm == $Dev){
    save("data/user/$Dev/file.txt","seall");
        Poker('editmessagetext',[
        'chat_id'=>$Dev,
        'message_id'=>$messageid,
        'text'=>'پیام خودتون رو برای ارسال به همه ارسال کنید
توجه پیام شما فروارد نمیشود',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "🔙بازگشت", 'callback_data' => "paneladmins"]
            ],
        ]
        ])
    ]);
}
if($data == "frall" && $fm == $Dev){
    save("data/user/$Dev/file.txt","frall");
        Poker('editmessagetext',[
        'chat_id'=>$Dev,
        'message_id'=>$messageid,
        'text'=>'پیام خودتون رو برای فروارد به همه ارسال کنید',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "🔙بازگشت", 'callback_data' => "paneladmins"]
            ],
        ]
        ])
    ]);
}//foxlearn.ir
if($data == "segp" && $fm == $Dev){
    save("data/user/$Dev/file.txt","segp");
        Poker('editmessagetext',[
        'chat_id'=>$Dev,
        'message_id'=>$messageid,
        'text'=>'پیام خودتون رو برای ارسال به گروه ها ارسال کنید
توجه پیام شما فروارد نمیشود',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "🔙بازگشت", 'callback_data' => "paneladmins"]
            ],
        ]
        ])
    ]);
}
if($data == "fruser" && $fm == $Dev){
    save("data/user/$Dev/file.txt","fruser");
        Poker('editmessagetext',[
        'chat_id'=>$Dev,
        'message_id'=>$messageid,
        'text'=>'پیام خودتون رو برای فروارد به گروه ها ارسال کنید',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "🔙بازگشت", 'callback_data' => "paneladmins"]
            ],
        ]
        ])
    ]);
}
if($step == "seuser"){
$mem = fopen( "data/user/userstart.txt", 'r');
    while( !feof( $mem)) {
    $memuser = fgets( $mem);
    save("data/user/$Dev/file.txt","none");
     Poker('sendmessage',[
            'chat_id'=>$memuser,
            'text'=>$textmassage,
            'parse_mode'=>'MarkDown'
        ]);
    }
    Poker('sendmessage',[
        'chat_id'=>$Dev,
        'text'=>'پیام شما به موفقیت ارسال شد',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "📍 ارسال پیام 📍", 'callback_data' => "senwedmessages"]
            ],
            [
                ['text' => "👤ارسال به کاربران👤", 'callback_data' => "seuser"],['text' => "👤فروارد به کاربران👤", 'callback_data' => "fruser"]
            ],
            [
                ['text' => "👥 ارسال به گروه ها 👥", 'callback_data' => "segp"],['text' => "👥 فروارد به گروه ها 👥", 'callback_data' => "frgp"]
            ],
            [
                ['text' => "📍ارسال به همه📍", 'callback_data' => "seall"],['text' => "📍فروارد به همه📍", 'callback_data' => "frall"]
            ],
            [
                ['text' => "🔙بازگشت", 'callback_data' => "paneladmins"]
            ],
            ]
        ])
    ]);
}
if($step == "fruser"){
    $mem = fopen("data/user/userstart.txt", 'r');
    while( !feof($mem)) {
    $memuser = fgets($mem);
Forward($memuser, $chat_id,$message_id);
save("data/user/$Dev/file.txt","none");
}
Poker('sendmessage',[
        'chat_id'=>$Dev,
        'text'=>'پیام شما به موفقیت فروارد شد',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "📍 ارسال پیام 📍", 'callback_data' => "senwedmessages"]
            ],
            [
                ['text' => "👤ارسال به کاربران👤", 'callback_data' => "seuser"],['text' => "👤فروارد به کاربران👤", 'callback_data' => "fruser"]
            ],
            [
                ['text' => "👥 ارسال به گروه ها 👥", 'callback_data' => "segp"],['text' => "👥 فروارد به گروه ها 👥", 'callback_data' => "frgp"]
            ],
            [
                ['text' => "📍ارسال به همه📍", 'callback_data' => "seall"],['text' => "📍فروارد به همه📍", 'callback_data' => "frall"]
            ],
            [
                ['text' => "🔙بازگشت", 'callback_data' => "paneladmins"]
            ],
            ]
        ])
    ]);
}
if($step == "segp"){
$mem = fopen( "data/gp/gpadding.txt", 'r');
    while( !feof( $mem)) {
    $memuser = fgets( $mem);
    save("data/user/$Dev/file.txt","none");
     Poker('sendmessage',[
            'chat_id'=>$memuser,
            'text'=>$textmassage,
            'parse_mode'=>'MarkDown'
        ]);
    }
    Poker('sendmessage',[
        'chat_id'=>$Dev,
        'text'=>'پیام شما به موفقیت ارسال شد',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "📍 ارسال پیام 📍", 'callback_data' => "senwedmessages"]
            ],
            [
                ['text' => "👤ارسال به کاربران👤", 'callback_data' => "seuser"],['text' => "👤فروارد به کاربران👤", 'callback_data' => "fruser"]
            ],
            [
                ['text' => "👥 ارسال به گروه ها 👥", 'callback_data' => "segp"],['text' => "👥 فروارد به گروه ها 👥", 'callback_data' => "frgp"]
            ],
            [
                ['text' => "📍ارسال به همه📍", 'callback_data' => "seall"],['text' => "📍فروارد به همه📍", 'callback_data' => "frall"]
            ],
            [
                ['text' => "🔙بازگشت", 'callback_data' => "paneladmins"]
            ],
            ]
        ])
    ]);
}
if($step == "frgp"){
    $mem = fopen("data/gp/gpadding.txt", 'r');
    while( !feof($mem)) {
    $memuser = fgets($mem);
Forward($memuser, $chat_id,$message_id);
save("data/user/$Dev/file.txt","none");
}
Poker('sendmessage',[
        'chat_id'=>$Dev,
        'text'=>'پیام شما به موفقیت فروارد شد',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "📍 ارسال پیام 📍", 'callback_data' => "senwedmessages"]
            ],
            [
                ['text' => "👤ارسال به کاربران👤", 'callback_data' => "seuser"],['text' => "👤فروارد به کاربران👤", 'callback_data' => "fruser"]
            ],
            [
                ['text' => "👥 ارسال به گروه ها 👥", 'callback_data' => "segp"],['text' => "👥 فروارد به گروه ها 👥", 'callback_data' => "frgp"]
            ],
            [
                ['text' => "📍ارسال به همه📍", 'callback_data' => "seall"],['text' => "📍فروارد به همه📍", 'callback_data' => "frall"]
            ],
            [
                ['text' => "🔙بازگشت", 'callback_data' => "paneladmins"]
            ],
            ]
        ])
    ]);
}
if($step == "seall"){
$mem = fopen( "data/gp/gpadding.txt", 'r');
    while( !feof( $mem)) {
    $memuser = fgets( $mem);
     Poker('sendmessage',[
            'chat_id'=>$memuser,
            'text'=>$textmassage,
            'parse_mode'=>'MarkDown'
        ]);
    }
$mems = fopen( "data/user/userstart.txt", 'r');
    while( !feof( $mems)) {
    $memusers = fgets( $mems);
    save("data/user/$Dev/file.txt","none");
     Poker('sendmessage',[
            'chat_id'=>$memusers,
            'text'=>$textmassage,
            'parse_mode'=>'MarkDown'
        ]);
    }
    Poker('sendmessage',[
        'chat_id'=>$Dev,
        'text'=>'پیام شما به موفقیت ارسال شد',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "📍 ارسال پیام 📍", 'callback_data' => "senwedmessages"]
            ],
            [
                ['text' => "👤ارسال به کاربران👤", 'callback_data' => "seuser"],['text' => "👤فروارد به کاربران👤", 'callback_data' => "fruser"]
            ],
            [
                ['text' => "👥 ارسال به گروه ها 👥", 'callback_data' => "segp"],['text' => "👥 فروارد به گروه ها 👥", 'callback_data' => "frgp"]
            ],
            [
                ['text' => "📍ارسال به همه📍", 'callback_data' => "seall"],['text' => "📍فروارد به همه📍", 'callback_data' => "frall"]
            ],
            [
                ['text' => "🔙بازگشت", 'callback_data' => "paneladmins"]
            ],
            ]
        ])
    ]);
}
if($step == "frall"){//foxlearn.ir
    $mem = fopen("data/gp/gpadding.txt", 'r');
    while( !feof($mem)) {
    $memuser = fgets($mem);
Forward($memuser, $chat_id,$message_id);
}
    $mems = fopen("data/user/userstart.txt", 'r');
    while( !feof($mems)) {
    $memusers = fgets($mems);
Forward($memusers, $chat_id,$message_id);
save("data/user/$Dev/file.txt","none");
}
Poker('sendmessage',[
        'chat_id'=>$Dev,
        'text'=>'پیام شما به موفقیت فروارد شد',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "📍 ارسال پیام 📍", 'callback_data' => "senwedmessages"]
            ],
            [
                ['text' => "👤ارسال به کاربران👤", 'callback_data' => "seuser"],['text' => "👤فروارد به کاربران👤", 'callback_data' => "fruser"]
            ],
            [
                ['text' => "👥 ارسال به گروه ها 👥", 'callback_data' => "segp"],['text' => "👥 فروارد به گروه ها 👥", 'callback_data' => "frgp"]
            ],
            [
                ['text' => "📍ارسال به همه📍", 'callback_data' => "seall"],['text' => "📍فروارد به همه📍", 'callback_data' => "frall"]
            ],
            [
                ['text' => "🔙بازگشت", 'callback_data' => "paneladmins"]
            ],
            ]
        ])
    ]);
}


//--------------------------------------------------
if (preg_match('/^(.*)([Bb][Oo][Tt])/s',$newchatmemberu) && $newchatmemberu != "$userbot") {
 Poker('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>'شما نمیتوانید ربات در گروه ادد کنید',
  'parse_mode'=>'MarkDown',
 ]);
 Poker('kickChatMember',[
 'chat_id'=>$chat_id,
  'user_id'=>$update->message->new_chat_member->id
  ]);
}
elseif($newchatmemberid != $useradding){
    mkdir("data/gp/$chat_id");
    mkdir("data/gp/$chat_id/$from_id");
    $jam = $youadding +1;
    $james = $stats +1;
    save("data/gp/$chat_id/$from_id/youadding.txt","$jam");
    save("data/gp/$chat_id/$newchatmemberid/youadding.txt","0");
    save("data/gp/$chat_id/stats.txt","$james");
    $jamas = $alladding +1;
    save("data/gp/alladding.txt","$jamas");
}
if($textmassage == "$textmassage" && $status == "member"){
    if($youadding == ""){
        if ($tc == 'group' | $tc == 'supergroup'){
        mkdir("data/gp/$chat_id/$from_id");
    save("data/gp/$chat_id/$from_id/youadding.txt","0");
    save("data/gp/$chat_id/$from_id/youtext.txt","0");
    sendAction($chat_id, 'typing' );
            Poker('SendMessage',[
                'chat_id'=>$chat_id,
                'text'=>"کاربر $first_name
شما هنوز *$setadd *نفر رو به گروه اضافه نکردید
تعداد اضافه شده ها توسط شما : *0*",
                'parse_mode'=>'MarkDown',
            ]);
            Poker('deletemessage',[
                'chat_id'=>$chat_id,
		        'message_id'=>$message_id
            ]);
            mkdir("data/gp/$chat_id/$from_id");
            $jams = $youadding +1 ;
            save("data/gp/$chat_id/$from_id/youtext.txt","$jams");
            $osa = $alldelmesage +1;
            save("data/gp/alldelmesage.txt","$osa");
    }
    }
    elseif($addings == "on"){
        if ($tc == 'group' | $tc == 'supergroup'){
            if($youadding != $setadd){
        if($youadding <= $setadd){
           if($youadding == $youtext){
            sendAction($chat_id, 'typing' );
            Poker('SendMessage',[
                'chat_id'=>$chat_id,
                'text'=>"کاربر $first_name
شما هنوز *$setadd *نفر رو به گروه اضافه نکردید
تعداد اضافه شده ها توسط شما : *$youadding*",
                'parse_mode'=>'MarkDown',
            ]);
            Poker('deletemessage',[
                'chat_id'=>$chat_id,
		        'message_id'=>$message_id
            ]);
            mkdir("data/gp/$chat_id/$from_id");
            $jamsa = $youadding +1 ;
            save("data/gp/$chat_id/$from_id/youtext.txt","$jamsa");
            $osa1 = $alldelmesage +1;
            save("data/gp/alldelmesage.txt","$osa1");
            }
            if($youadding != $youtext){
                Poker('deletemessage',[
                'chat_id'=>$chat_id,
		        'message_id'=>$message_id
            ]);
            $osa2 = $alldelmesage +1;
            save("data/gp/alldelmesage.txt","$osa2");
            }
        }
    }
        }
    }
    unlink("error_log");
}//foxlearn.ir
?>
