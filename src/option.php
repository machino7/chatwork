<?php

function options($arg)
{
    // オプションの設定
    switch ($arg) {
        case null:
            echo "メッセージを入力してください\n\n";
            $message = fgets(STDIN, 4096);
            break;
        case '-a':
            $message = "出勤\n".date('Y/m/d H:i');
            break;
        case '-l':
            $message = "退勤\n".date('Y/m/d H:i');
            break;
        case '-h':
        case '--help':
            $help_message = <<< EOM

使用法: message.php [OPTION]

標準入力から受け取ったメッセージを送信します

    -a,
        出勤時のメッセージを送信
    -l,
        退勤時のメッセージを送信
    -h, 
        ヘルプを表示して終了する
EOM;
            echo $help_message;
            exit(0);
        default:
            echo "オプションが見つかりませんでした";
            exit(1);
    }

    return $message;
}
