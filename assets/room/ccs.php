<?php

header('Access-Control-Allow-Origin: https://plug.dj'); 
header('Content-Type: text/json');

// Conexão com BD
include "../includes/connection.php";

$result = $mysqli->query("SELECT * FROM users");

// Url para ser atribuída
$url = "http://snakehunters.tk/";

if ($result) {

	while ($row = $result->fetch_assoc()) {
		$emotes[$row["snake_user"]] = $row["snake_avatar"]; 
	}

	// print_r($emotes);
	// echo "Existem" . " " . count($emotes) . " " . "itens no array";
}

?>

{
    "room":                     "Snake Hunters 🐍",
    "author":                   "Phil",
    "icon":                     null,
    "css":                      null,
    "rules": {
        "allowAutorespond":     true,
        "allowAutowoot":        true,
        "allowAutojoin":        false,
        "allowAutograb":        true,
        "allowSmartVote":       true,
        "allowEmotes":          true,
        "allowShowingMehs":     true,
<?php foreach ($emotes as $nick => $image) {
    echo "        ".'"'.$nick.'"' . ": " .'"' . "http://"  ."snakehunters.tk/" .$image.'"' . "," . "\n";
}?>
        "forceSmartVote":       false
    },
    "ccc": {
        "admin":                null,
        "ambassador":           null,
        "host":                 null,
        "cohost":               null,
        "manager":              null,
        "bouncer":              null,
        "rdj":                  null,
        "subscriber":           null,
        "silversubscriber":     null,
        "friend":               null,
        "user":                 null
    },
    "images": {
        "background":           null,
        "playback":             null,
        "admin":                null,
        "ambassador":           null,
        "host":                 null,
        "cohost":               null,
        "manager":              null,
        "bouncer":              null,
        "rdj":                  null,
        "subscriber":           null,
        "silversubscriber":     null
    },
    "autocomplete": {
        "!user": 0,
        "!rdj": 1,
        "!bouncer": {
            "role": 2,
            "icon": "icon-pp-small"
        },
        "!manager": {
            "role": 3,
            "icon": "http://emojipedia-us.s3.amazonaws.com/cache/e4/9e/e49e33767a64cf63310af3764fc60126.png"
        },
        "!cohost":    4,
        "!host": {
            "role": 5,
            "icon": "https://cdn.radiant.dj/rcs/emotes/img/orilurk.png"
        },
        "!getban": 2,
        "!clearchat": 2,
        "!chatlevel": 2,
        "!ban": 2,
        "!add": 2,
        "!cycle": 2,
        "!clearlock": 2,
        "!deletechat": 2,
        "!lock": 2,
        "!kick": 2,
        "!getcid": 2,
        "!getid": 2,
        "!lockskip": 2,
        "!lockdown": 2,
        "!move": 2,
        "!stats": 2,
        "!mute": 2,
        "!resetwarnings": 2,
        "!skip": 2,
        "!toggle": 2,
        "!swap": 2,
        "!remove": 2,
        "!spin": 2,
        "!unlock": 2,
        "!unban": 2,
        "!avatar": 3,
        "!whois": 2,
        "!warn": 2,
        "!unmute": 2,
        "!uptime": 2,
        "!permit": 2,
        "!reload": 2,
        "!badge": 3,
        "!allcommands": 100,
        "!die": 100,
        "!version": 100,
        "!afk": 0,
        "!su": 100,
        "!afkinfo": 0,
        "!blacklist": 0,
        "!eng": 0,
        "!cmd": 0,
        "!donate": 0,
        "!facebook": 0,
        "!dclookup": 0,
        "!events": 0,
        "!fbgroup": 0,
        "!kms": 0,
        "!me": 0,
        "!image": 0,
        "!getmedia": 0,
        "!ping": 0,
        "!help": 0,
        "!link": 0,
        "!rcs": 0,
        "!buy": 0,
        "!motd": 0,
        "!rce": 0,
        "!rm": 0,
        "!steam": 0,
        "!slack": 0,
        "!slots": 0,
        "!staff": 0,
        "!shop": 0,
        "!teamspeak": 0,
        "!twitter": 0,
        "!theme": 0,
        "!urban": 0,
        "!users": 0,
        "!ustats": 0,
        "!weather": 0,
        "!youtube": 0,
        "!website": 0,
        "!demotivate": 0,
        "!cookie": 0,
        "!bacon": 0,
        "!whoami": 0,
        "!fucks": 0,
        "!location": 0,
        "!pie": 0,
        "!insult": 0,
        "!motivate": 0,
        "!flirt": 0,
        "!pringles": 0,
        "!shh": 0,
        "!thisisfine": 0,
        "!snail": 0,
        "!stfu": 0,
        "!taco": 0,
        "!tmyk": 0,
        "!tr": 0,
        "!treat": 0,
        "!kickroulette": 2,
        "!wlroulette": 2,
        "!wlbuddy": 2,
        "!join": 0,
        "!rule": 0,
        "!nsfw": 2,
        "!op": 2,
        "!awful": 2,
        "!say": 3,
        "!team": 0,
        "!giftrm": 0,
        "!removebl": 2,
        "!surp": 100,
        "!about": 0,
        "!eta": 0,
        "!snapchat": 0,
        "!rules": 0,
        "!counters": 100,
        "!slotscounters": 100,
        "!statscounters": 100
    },
    "emotes": {
        "custom_test": "https://cdn.radiant.dj/rcs/icons/test_custom.png"
    }
}