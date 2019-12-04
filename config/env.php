<?php

// 環境変数を設定する
$roomid = "{ルームID}";
putenv("URL=https://api.chatwork.com/v2/rooms/{$roomid}/messages");
putenv("TOKEN={チャットワークAPIトークン}");
