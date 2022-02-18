<?php session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>საქართველოს ფორუმი</title>
	<style>
::-webkit-scrollbar {
  height: 10px;
  width: 10px;
  border: 1px solid #ffffff;
}
::-webkit-scrollbar-thumb {
  background: #eeeeee; 
  border-radius: 10px 10px 10px 10px;
}
::-webkit-scrollbar-thumb:hover {
  background: #eeeeee;
  border-radius: 10px 10px 10px 10px;
}  
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #eeeeee;
  border-radius: 4px;
  background-color: #fafafa;
  border-left: 5px solid #bbbbbb;
  resize: none;
}
input[type=password] {
  width: 100%;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #eeeeee;
  border-radius: 4px;
  background-color: #fafafa;
  border-left: 5px solid #bbbbbb;
  resize: none;
}
textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #cccccc;
  border-radius: 4px;
  background-color: #fafafa;
  border-left: 5px solid #bbbbbb;
  resize: none;
}
details {
  background-color: #fefefe;;
  color: #555555;
  padding: 0.1em 0.2em;
  text-decoration: none;
  text-transform: uppercase;
}
a {
	border-radius: 10px 10px 10px 10px; background-color: #f3f3f3;
}
.logo {
	border-radius: 10px 10px 10px 10px; background-color: #ffffff;
}
fieldset {
	display: block; align-items: center; border-radius: 10px 10px 10px 10px; background-color: #fcfcfc; border-color: #fcfcfc;
}
legend {
	display: block; align-items: center; border-radius: 10px 10px 10px 10px; color: #bfbfbf; background-color: #fcfcfc;
}
html {
	background-color: #fafafa;
}
	</style>
    <script type="text/javascript">
        function tog_usr_change() { document.getElementById('usr').style.display = ''; 
        document.getElementById('chng_btn').style.display = 'none'; }
    </script>
	<script type="text/javascript">
eng=new Array(97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,87,82,84,83,67,74,90);
geo=new Array(4304,4305,4330,4307,4308,4324,4306,4336,4312,4335,4313,4314,4315,4316,4317,4318,4325,4320,4321,4322,4323,4309,4332,4334,4327,4310,4333,4326,4311,4328,4329,4319,4331,91,93,59,39,44,46,96);


function keyfilter_num(evt) {
	evt = (evt) ? evt : window.event
	var charCode = (evt.which) ? evt.which : evt.keyCode
	if (charCode!=46 &&charCode > 31 && (charCode < 48 || charCode > 57)) {
		status = "This field accepts numbers only."
		return false
	}
	status = ""
	return true
}

function keyfilter_dig(evt) {
	evt = (evt) ? evt : window.event
	var charCode = (evt.which) ? evt.which : evt.keyCode
	if ( charCode > 31 && (charCode < 48 || charCode > 57)) {
		status = "This field accepts numbers only."
		return false
	}
	status = ""
	return true
}

function ValidEmail(EmailAddr) {
	var reg1 = /(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/;
	var reg2 = /^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/;
	
	var SpecChar="!#$%^&*()'+{}[]\|:;?/><,~`" + "\"";
	var frmValue = new String(EmailAddr);
	var len = frmValue.length;
	
	if( len < 1 ) { return false; }
	for (var i=0;i<len;i++)
	{
				temp=frmValue.substring(i,i+1)
				if (SpecChar.indexOf(temp)!=-1)
		 		{
					return false;
				}
	}	
	
	if(!reg1.test(frmValue) && reg2.test(frmValue)) 
	{ 
		return true;
	}
	
	return false;
}

function keyfilter_alnum(evt) {
	evt = (evt) ? evt : window.event
	var charCode = (evt.which) ? evt.which : evt.keyCode
	if (!  ((charCode >= 48 && charCode <= 57)||(charCode >= 97 && charCode <= 122)||(charCode >= 65 && charCode <= 90)||charCode==95)  ) {
		status = "This field accepts 'a'-'z','A'-'Z','0'-'9' and '_' only."
		return false
	}
	status = ""
	return true
}

function makeGeo(ob,e) {
	code = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;	
	
	if (code==96) {
		document.getElementById('geoKeys').checked = !document.getElementById('geoKeys').checked;
		return false;
	}

	if (e.which==0) return true;
	
	if (!document.getElementById('geoKeys').checked) return true;
	
	var found = false;
	for (i=0; i<=geo.length; i++) {
		if (eng[i]==code) {
			c=geo[i];
			found = true;
		}
	}
	
	if ( found ) {
		if (document.selection) {
			sel = document.selection.createRange();
			sel.text = String.fromCharCode(c);
		} else {
			if (ob.selectionStart || ob.selectionStart == '0') {
				var startPos = ob.selectionStart;
				var endPos = ob.selectionEnd;
				ob.value = ob.value.substring(0, startPos) + String.fromCharCode(c) + ob.value.substring(endPos, ob.value.length);
				ob.selectionStart = startPos+1;
				ob.selectionEnd = endPos+1;
			} else {
				return true;
			}
		}
		return false;
	} else {
		return true;
	}

}
</script>
<script type='text/javascript'>
function paste_string(e, s){
e.value+=s;
e.focus();
}
function get_sel()
{
  if (window.getSelection) return window.getSelection(); else if
     (document.getSelection) return document.getSelection(); else if
     (document.selection) return document.selection.createRange().text; else return;
}
function quote_sel(e)
{
  sel = get_sel();
  paste_string(e, ' [quote]'+sel+'[/quote] ');
}
</script>
<script type='text/javascript'>
   function addTextTag(text){
    document.getElementById(`text`).value += text;
   }        
</script>
<script>
function myFunction() {
  var input, filter, ol, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ol = document.getElementById("myUL");
  li = ol.getElementsByTagName('li');

  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>
  </head>

  <body alink="#6666cc" bgcolor="#fcfcfc" link="#6666cc" text="#000000"
    vlink="#6666cc">

 <?php
error_reporting(0);
$data1 = file("ban/ips.txt");
$data1size = sizeof($data1);
$n = "0";
    do {
    $datatext = explode("|", $data1[$n]);
if ($n == "0") { } else { }
$disallowed = array("$datatext[0]");
$ip = $_SERVER['REMOTE_ADDR']; 

if(in_array($ip, $disallowed)) {
 header("Location: https://www.google.ge");
 exit;
}
$n++; } while($n < $data1size);

 function showBBcodes($text) {
	$text  = htmlspecialchars($text, ENT_QUOTES, $charset);
	$find = array(
	    '~\[youtube\](.*?)\[/youtube\]~s',
		'~\[b\](.*?)\[/b\]~s',
		'~\[i\](.*?)\[/i\]~s',
		'~\[u\](.*?)\[/u\]~s',
        '~\[s\](.*?)\[/s\]~s',
		'~\[spoiler\](.*?)\[/spoiler\]~s',
		'~\[quote\](.*?)\[/quote\]~s',
		'~\[size=(.*?)\](.*?)\[/size\]~s',
		'~\[color=(.*?)\](.*?)\[/color\]~s',
		'~\[url\]((?:ftp|https?)://.*?)\[/url\]~s',
		'~\[link=([^"><]*?)\](.*?)\[/link\]~s',
		'~\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s',
		'~\[center\](.*?)\[/center\]~s',
		'~\[br\]~s',
		'~\[hr\]~s',
		'~\:1:~s',
		'~\:2:~s',
		'~\:3:~s',
		'~\:4:~s',
		'~\:5:~s',
		'~\:6:~s',
		'~\:7:~s',
		'~\:8:~s',
		'~\:9:~s',
		'~\:10:~s',
		'~\:11:~s',
		'~\:12:~s',
		'~\:13:~s',
		'~\:14:~s',
		'~\:15:~s',
		'~\:16:~s',
		'~\:17:~s',
		'~\:18:~s',
		'~\:19:~s',
		'~\:20:~s',
		'~\:21:~s',
		'~\:22:~s',
		'~\:23:~s',
		'~\:24:~s',
		'~\:25:~s',
		'~\:26:~s'
	);
	$replace = array(
	    '<fieldset><legend><small><b>YouTube ვიდეო</b></small></legend><iframe height="100%" width="100%" src="https://www.youtube.com/embed/$1"></iframe></fieldset>',
		'<b>$1</b>',
		'<i>$1</i>',
		'<span style="text-decoration:underline;">$1</span>',
        '<s>$1</s>',
		'<fieldset><legend><small><b>სპოილერი</b></small></legend><details><summary><font style="width:100%; color:#0000ff;">ტექსტის წაკითხვა</font></summary><hr style="width:100%; border:1px solid; border-color:#fafafa;">$1</details></fieldset>',
		'<fieldset><legend><small><b>ციტატა</b></small></legend>$1</fieldset>',
		'<span style="font-size:$1px;">$2</span>',
		'<span style="color:$1;">$2</span>',
		'<a href="$1">$1</a>',
		'<a href="$1">$2</a>',
		'<fieldset><legend><small><b>ფოტო სურათი</b></small></legend><img src="$1" style="width:100%; alt="" /></fieldset>',
		'<center>$1</center>',
		'<br>',
		'<hr style="width:100%; border:1px dotted; border-color:#ff0000;">',
		'<img src="/img/smileys/1.png" alt="" />',
		'<img src="/img/smileys/2.png" alt="" />',
		'<img src="/img/smileys/3.png" alt="" />',
		'<img src="/img/smileys/4.png" alt="" />',
		'<img src="/img/smileys/5.png" alt="" />',
		'<img src="/img/smileys/6.png" alt="" />',
		'<img src="/img/smileys/7.png" alt="" />',
		'<img src="/img/smileys/8.png" alt="" />',
		'<img src="/img/smileys/9.png" alt="" />',
		'<img src="/img/smileys/10.png" alt="" />',
		'<img src="/img/smileys/11.png" alt="" />',
		'<img src="/img/smileys/12.png" alt="" />',
		'<img src="/img/smileys/13.png" alt="" />',
		'<img src="/img/smileys/14.png" alt="" />',
		'<img src="/img/smileys/15.png" alt="" />',
		'<img src="/img/smileys/16.png" alt="" />',
		'<img src="/img/smileys/17.png" alt="" />',
		'<img src="/img/smileys/18.png" alt="" />',
		'<img src="/img/smileys/19.png" alt="" />',
		'<img src="/img/smileys/20.png" alt="" />',
		'<img src="/img/smileys/21.png" alt="" />',
		'<img src="/img/smileys/22.png" alt="" />',
		'<img src="/img/smileys/23.png" alt="" />',
		'<img src="/img/smileys/24.png" alt="" />',
		'<img src="/img/smileys/25.png" alt="" />',
		'<img src="/img/smileys/26.png" alt="" />'
	);
	return preg_replace($find,$replace,$text);
}

 date_default_timezone_set('Asia/Tbilisi');
 
const DIR = 'data/';
 
 function ocisti_string($w)
 {
     return str_replace(array("\n", "\r"), '', trim(nl2br(strip_tags($w))));
}

 function vrati_nl($w)
 {
    $breaks = array("<br />","<br>","<br/>");  
     return str_ireplace($breaks, "\r\n", $w);  
 }

 function check_file_r($path)
 {
     $path = DIR.$path;
     if (file_exists($path))  if (is_readable($path))  return true;
    return false;
}

function check_file($path)
 {
     $path = DIR.$path;
     if (file_exists($path))  if (is_readable($path))  if ( is_writable($path))  return true;
    return false;
}

 function read_file_or_die($path)
 {
     if (check_file_r($path)) return fopen(DIR.$path, "r");
     echo "პრობლემა არის ფორუმის მონაცემების ჩატვირთვისას ან დაზიანებული არის მონაცემები <br />";
     debug_print_backtrace();
     exit(-1); 
}

function file_or_die($path, $how)
 {
     if (check_file($path)) return fopen(DIR.$path, $how);
     echo "პრობლემა არის ფორუმის მონაცემების ჩატვირთვისას ან დაზიანებული არის მონაცემები <br />";
     debug_print_backtrace();
     exit(-1); 
}

function load_users(&$usrs , &$usrs_names, &$usrs_passes, &$usrs_perms)
{
    $fh = read_file_or_die("usr.txt");
    while (($usr = fgets($fh, 4096)) !== false) 
    {   
        $usr_id = trim($usr);
        if (!is_numeric($usr_id))
                break;
                
        $usr_name = trim(fgets($fh, 4096));
        $usr_pass = trim(fgets($fh, 4096));
        $usr_perms = explode(' ', trim(fgets($fh, 4096)));
        
        $usrs[] = $usr_id;
        $usrs_names[] = $usr_name;
        $usrs_passes[] = $usr_pass;
        $usrs_perms[] = $usr_perms;
    }
    fclose($fh);
}
 
$goal = 'view';

date_default_timezone_set('Asia/Tbilisi');

if (isset($_GET['post_register']))  $goal = 'post_register';
else $goal = "view";

$msg = '<font color="#aaaaaa">შეიყვანეთ მხოლოდ სიტყვა და ციფრები </font><font color="#ff8888">(სიმბოლოები გაუქმდება) </font><font color="#aaaaaa">შეიძლება<br /></font><font color="#88aa88">a-z A-Z а-я А-Я ა-ჰ 0-9 <br /><br /></font>';

if ($goal == 'post_register')
{
    $usrs = array(); $usrs_names = array(); $usrs_passes = array(); $usrs_perms = array(); 
    load_users($usrs, $usrs_names, $usrs_passes, $usrs_perms);
    $req_usr = '';
    $req_pass = '';
    $req_pass2 = '';
    if (isset($_POST['usr'])) $req_usr = preg_replace("/[^a-zA-Zа-яА-Яა-ჰ0-9]+/", "", trim($_POST['usr']));
    if (isset($_POST['psw'])) $req_pass = preg_replace("/[^a-zA-Zа-яА-Яა-ჰ0-9]+/", "", trim($_POST['psw']));
    if (isset($_POST['psw2'])) $req_pass2 = preg_replace("/[^a-zA-Zа-яА-Яა-ჰ0-9]+/", "", trim($_POST['psw2']));
    $f = array_search($req_usr, $usrs_names);
    while ($f !== false && trim($_POST['bad']) == 'auto')
    {
            $req_usr .= '0';
            $f = array_search($req_usr, $usrs_names);
    }

    if ($f === false && $req_pass == $req_pass2 && isset($_POST['conditions']))
    {
        $usrs[] = $usrs[count($usrs) - 1] + 1;
        $usrs_names[] = $req_usr;
        $usrs_passes[] = $req_pass;
    
        if ($_POST['type'] == '2')
            $usrs_perms[] = explode(' ', "topic_add post_add");
        else if ($_POST['type'] == '1')
            $usrs_perms[] = explode(' ', "post_add");
        else
            $usrs_perms[] = explode(' ', "/");
        
        $outp = '';
        for ($i = 0; $i < count($usrs); ++ $i)
        {
            $outp.=$usrs[$i]."\n".$usrs_names[$i]."\n".$usrs_passes[$i]."\n";
            $outp.=implode(' ', $usrs_perms[$i])."\n";
        }
    
        $fh = file_or_die("usr.txt", "w");
        fwrite($fh, $outp);
        fclose($fh);
        
        $msg = "<font color='#000000'>$req_usr</font> <font color='#0000ff'>თქვენ წარმატებით დარეგისტრირდით, გაიარეთ ავტორიზაცია.<br /><br /></font>";
    }
    else
        $msg = "<font color='#ff0000'>დაფიქსირდა შეცდომა, სცადეთ ხელახლა.<br /><br /></font>";

}

$goal = 'view';
$req_topic = 0;
$req_post = ''; 

$req_usr = -1;
$req_pass = '';

$edit_post_title = '';
$edit_post_content = '';
$dat = '';
$ip = '';

date_default_timezone_set('Asia/Tbilisi');

if (isset($_GET['tid']))  $req_topic = $_GET['tid'];
if (isset($_GET['pid'])) $req_post = $_GET['pid'];
if (isset($_POST['usr'])) $req_usr = $_POST['usr'];
if (isset($_POST['psw'])) $req_pass = $_POST['psw'];
if (isset($_GET['switch']))
{
    if (isset($_POST['login'])) $goal = 'switch';
}
else if (isset($_GET['userban']))    $goal = 'userban';
else if (isset($_GET['del']))    $goal = 'del';
else if (isset($_GET['edit']))    $goal = 'edit';
else if (isset($_GET['post_edit']))    $goal = 'post_edit';
else if (isset($_GET['create'])) $goal = 'reply';

$usrs = array(); $usrs_names = array(); $usrs_passes = array(); $usrs_perms = array(); 
load_users($usrs, $usrs_names, $usrs_passes, $usrs_perms);

$usr = -1; 

if (isset($_SESSION['usr']) && isset($_SESSION['psw']))
    if ($usrs_passes[$_SESSION['usr']] == $_SESSION['psw'])
        $usr = $_SESSION['usr'];

if ($goal == 'switch')
{
    $f = array_search($req_usr, $usrs_names);

    if ($f !== $usr && $f !== FALSE)
    {
        if ($usrs_passes[$f] == $req_pass)
        {
            $_SESSION['stamp'] = date('j.n. H:i'); 
            $usr = $f;
            $_SESSION['usr'] = $f;
            $_SESSION['psw'] = $req_pass;
        }
        else
        {
        }
    }
}

if ($goal == 'userban')
{

error_reporting(0);
$ban = $_GET['ban'];
$ips = file("ban/ips.txt");
$s2size = sizeof($ips);
$dat = date("d.m.Y");
$text1 = "$ban|";
$text1 = stripslashes($text1);
$text1 = htmlspecialchars($text1);
$fp=fopen("ban/ips.txt","a");
fputs($fp,"$text1\r\n");
fclose($fp);

}

 $dop_topic_add = false; $dop_post_add = false; $dop_post_del = false;
 
 if ($usr != -1)
 {
        $dop_topic_add = array_search('topic_add', $usrs_perms[$usr]) !== FALSE;
        $dop_post_add = array_search('post_add', $usrs_perms[$usr]) !== FALSE;
        $dop_post_del = array_search('post_del', $usrs_perms[$usr]) !== FALSE;
 }
$perm_status = 'თემების წაკითხვა'.($dop_post_add ? ', გამოხმაურება' : '').($dop_post_del ? ', თემების და პოსტების წაშლა' : '').($dop_topic_add ? ', ახალი თემის გახსნა' : '');
 
if ($goal == 'reply' && $dop_post_add)
{
        if ($req_topic == -1 && $dop_topic_add)
        {
            $tfname = "topics.txt";
            if (check_file($tfname))
            {
                $numbers = explode("\n", trim(file_get_contents(DIR.$tfname)));
                $req_topic = $numbers[count($numbers) - 1] + 1;
                $numbers[] = $req_topic;
                $fh = file_or_die($tfname, "w");
                fwrite($fh, implode("\n", $numbers));
                fclose($fh);

                fclose(fopen("data/topic_$req_topic.txt", "x")); 
            }
        }
    
        $fname = "topic_".$req_topic.".txt";
        if (check_file($fname) && $req_topic >= 0) 
        {
            $oldcont = trim(file_get_contents(DIR.$fname));
            if ($oldcont === "")
            {
                $numbers = array();
                $numbers[] = 0;
                $newid = 0;                
            }
            else
            {
                $numbers = explode("\n", $oldcont);
                $newid = $numbers[count($numbers) - 1] + 1;
                $numbers[] = $newid;
            }
            $fh = fopen("data/post_$req_topic"."_$newid.txt", "x");
            
            fwrite($fh, ocisti_string($_POST['post_title'])."\n".$usr."\n".
                ocisti_string($_POST['post_content'])."\n".ocisti_string($_POST['dat'])."\n".ocisti_string($_POST['ip'])
            );
            fclose($fh);
            
            $fh = file_or_die($fname, "w");
            fwrite($fh, implode("\n", $numbers));
            fclose($fh);
        }
}
 $teme = array();  $teme_titles = array();
 
 $odgovori = array();
$fh = read_file_or_die("topics.txt");
while (($tema = fgets($fh, 4096)) !== false) 
{   
    $tema = trim($tema);
    if (!is_numeric($tema))
            break;
    
    $tema_title = '';
    
    $preostali = array();
    
    $fh2 = read_file_or_die('topic_'.$tema.'.txt');

    while (($post = fgets($fh2, 4096)) !== false) 
    {
        $post_id = trim($post);
        if (!is_numeric($post_id))
            break;
            
        if ($goal == 'del' && $dop_post_del && $req_topic == $tema && $req_post == $post_id)
        {
            if (!unlink("data/post_".$tema."_".$post_id.".txt" ))
                echo '<script>alert("შეცდომა! წაშლა ვერ მოხერხდა.");</script>';
            continue;
        }

        $preostali[] = $post_id;
        
        $fh3 = read_file_or_die("post_".$tema."_".$post_id.".txt" );
        
        $ime_posta = trim(fgets($fh3, 4096));
        $id_autor = trim(fgets($fh3, 4096));
        $post_content = trim(fgets($fh3, 4096)); 
        $dat = trim(fgets($fh3, 4096));  
        $ip = trim(fgets($fh3, 4096));  
        fclose($fh3);
		
        if ($goal == 'edit' && $req_topic == $tema && $req_post == $post_id)
        {

           $edit_post_title = $ime_posta;
           $edit_post_content = vrati_nl($post_content);
           $dat = vrati_nl($dat);
           $ip = vrati_nl($ip);
        }
    
        if ($goal == 'post_edit' && ($dop_post_del || $id_autor == $usr) && $req_topic == $tema && $req_post == $post_id)
        {

            $fh3 = fopen("data/post_$tema"."_$post_id.txt", "w");
            $ime_posta = ocisti_string($_POST['post_title']); 
            $post_content = ocisti_string($_POST['post_content']);
            $dat = ocisti_string($_POST['dat']);
            $ip = ocisti_string($_POST['ip']);
            fwrite($fh3, $ime_posta."\n".$id_autor."\n".$post_content."\n".$dat."\n".$ip);
            fclose($fh3);
        }         
  $bbtext = $post_content;
 $post_content = showBBcodes($bbtext);       
        if ($dop_post_add)
            $add_string = "<a href='javascript:void(0)' title='მომხმარებლის სახელის ჩასმა გამოხმაურებაში' onClick='addTextTag(` [b]$usrs_names[$id_autor][/b], `); return false'>პასუხი</a> <a href='javascript:void(0)' title='მონიშნეთ სასურველი ტექსტი და დააწკაპეთ ამ ღილაკს რათა ჩასვათ ციტატა გამოხმაურებაში' onmousedown='javascript:quote_sel(document.PForm.text); return false;'>ციტატა</a>";
        else
            $add_string = "";
         if ($dop_post_del)
            $del_string = '<font color="#aaaaaa">(</font><font color="#0000ff">IP</font>:<font color="#ff0000"> '.$ip.'</font> <a href="?userban&ban='.$ip.'">დაბლოკვა</a><font color="#aaaaaa">)</font> <a href="?del&tid='.$tema.'&pid='.$post_id.'">წაშლა</a>';
        else
            $del_string = "";   
        if ($id_autor == $usr || $dop_post_del)
            $edit_string = '<a href="?edit&tid='.$tema.'&pid='.$post_id.'">რედაქტირება</a>';
        else
            $edit_string = '';
        
        if ($req_topic == $tema)
            
            $odgovori[] = "<b>$usrs_names[$id_autor]</b>: <font color='#aaaaaa'>&#10077;</font> <i> $ime_posta </i> <font color='#aaaaaa'>&#10078;</font><br /><span style='border-radius: 10px 10px 10px 10px; background: #eeeeee;'><font color='#888888'>წევრი</font> <font color='#666666'>ID:</font> <font color='#888888'>$id_autor.</font></span> <font color='#aaaaaa'>პოსტი &#8470; $tema:$post_id. </font> &#128337; <font color='#888888'> $dat </font> <br /> $del_string $edit_string $add_string <hr style='width:100%; border:1px solid; border-color:#fafafa;'>$post_content<br />";

        if ($tema_title == '')
        {
            $tema_title = $ime_posta;
            if ($req_topic != $tema)
            {
                break;
            } else $tema_ttl = $ime_posta;

        }   
    }

    fclose($fh2);

    if(!empty($preostali))
    {
        $teme[] = $tema;
        $teme_titles[] = $tema_title;    
        
        if ($goal == 'del' &&  $req_topic == $tema )
        {
            $tfname = 'topic_'.$tema.'.txt';
            if (check_file($tfname)) 
            {
                $fh3 = file_or_die($tfname, "w");
                fwrite($fh3, implode("\n", $preostali));
                fclose($fh3);
            }
        }
    }
    else
    {
        unlink('data/topic_'.$tema.'.txt');
    }
}

fclose($fh);


if ($goal == 'del' )
{
    $tfname = "topics.txt";
    if (check_file($tfname)) 
    {
        $fh = file_or_die($tfname, "w");
        fwrite($fh, implode("\n", $teme));
        fclose($fh);
    }
    $req_topic = -1;
    $goal = 'reply';
}


 ?>
    
    <table style="margin-top: 50px;" align="center" bgcolor="#ffffff"
      border="0" cellpadding="15" cellspacing="10" width="1100">
      <tbody>
        <tr>
          <td colspan="3" rowspan="1" height="1" valign="top">
<a href='/'><img class="logo" src='logo.gif' alt='საქართველოს ფორუმი' /></a>
          </td>
        </tr>
        <tr>
          <td align="right" valign="top" width="220px" style="border:1px solid; border-color:#f1f1f1;">
		  		<?php if ($dop_topic_add) { ?>
            <a href="?tid=-1">&#9998; ახალი თემის გახსნა</a><hr style="width:100%; border:1px solid; border-color:#fafafa;">
<?php } ?>
<input checked='checked' id='geoKeys' type='hidden' /> <form action='https://www.google.com/search' method='get' target='_blank'> <input name='sitesearch' type='hidden' value='georgia.eu.org'><input type="text" autocomplete='on' name='q' id="myInput" class="filter" onkeyup="myFunction()" placeholder="თემის ძებნა.." onkeypress="return makeGeo(this,event);"></form><a href="#new">&#8595; <small>ბოლოდან</small></a><hr style="width:100%; border:1px solid; border-color:#fafafa;">&#9776; <b>თემები</b><br /><br /><div id="" style="overflow:scroll; height:330px; background: #fcfcfc;"><ol id="myUL">
          <?php
            for ($i = 0; $i < count($teme); ++ $i)
            {
                echo '<li><a href="?tid='.$teme[$i].'">'.$teme_titles[$i].'</a></li>' ;
           }
          ?>
            
            </ol><a name="new"></a></div></td>
          <td style="border:1px dotted; border-color:#00ffff; background: #fcfcfc;" align="left" valign="top"><?php if ($req_topic >= 0) echo '<a href="#newpost">&#8595; <small>ბოლოდან</small></a><br /><br />'; else echo ''; ?><div id="" style="overflow:scroll; height:500px;">
            
            <?php
            foreach ($odgovori as $odgovor)
                {
                    echo $odgovor;
                    if ($odgovor != $odgovori[count($odgovori) - 1]) 
                        echo '<hr style="width:100%; border:1px solid; border-color:#fafafa;">'; 
                }
            
            if ($dop_post_add) {
            ?>
            <hr style="width:100%; border:1px solid; border-color:#fafafa;">
            
            <?php
            
            if ($goal == 'edit')
            {
                 echo '<form align="center" name="PForm" action="?post_edit&tid='.$req_topic.'&pid='.$req_post.'"'.' method="post">'; 
                 echo 'რედაქტირება<br /><input name="post_title" type="text" onkeypress="return makeGeo(this,event);" maxlength="60" style="border-style: solid; border-width: 1px;" value = "'
                 .$edit_post_title.'" required>'; 
            }
            else
            {    
                        
                echo '<form align="center" name="PForm" action="?create&tid='.$req_topic.'"'.' method="post">'; 
                 if ($req_topic >= 0) echo '<details><summary>გამოხმაურება</summary>'; else echo '<details><summary>ახალი თემის გახსნა</summary>'; 
                 echo '<input name="post_title" type="text" onkeypress="return makeGeo(this,event);" placeholder="სათაური" maxlength="60" value = "';
                 if ($req_topic >= 0) echo 'პასუხი: '.$tema_ttl; echo '" required>'; 
            } 
$dat = date("Y-m-d H:i:s");
$ip = isset($_SERVER['HTTP_CLIENT_IP']) 
    ? $_SERVER['HTTP_CLIENT_IP'] 
    : isset($_SERVER['HTTP_X_FORWARDED_FOR']) 
      ? $_SERVER['HTTP_X_FORWARDED_FOR'] 
      : $_SERVER['REMOTE_ADDR'];
             ?>
            
            <center><fieldset><legend><small><b>BB კოდები</b></small></legend><a href='javascript:void(0)' onClick='addTextTag(` [b] მსხვილი ტექსტი [/b] `); return false'>B</a> <a href='javascript:void(0)' onClick='addTextTag(` [i] დახრილი ტექსტი [/i] `); return false'>I</a> <a href='javascript:void(0)' onClick='addTextTag(` [u] ხაზგასმული ტექსტი [/u] `); return false'>U</a> <a href='javascript:void(0)' onClick='addTextTag(` [s] გადახაზული ტექსტი [/s] `); return false'>S</a> <a href='javascript:void(0)' onClick='addTextTag(` [spoiler] ტექსტი [/spoiler] `); return false'>SPOILER</a> <a href='javascript:void(0)' onClick='addTextTag(` [quote] ციტატა [/quote] `); return false'>QUOTE</a> <a href='javascript:void(0)' onClick='addTextTag(` [size=30] ტექსტი [/size] `); return false'>SIZE</a> <a href='javascript:void(0)' onClick='addTextTag(` [color=green] ტექსტი [/color] `); return false'>COLOR</a> <a href='javascript:void(0)' onClick='addTextTag(` [url] ბმული [/url] `); return false'>URL</a> <a href='javascript:void(0)' onClick='addTextTag(` [link= ბმული ] სახელი [/link] `); return false'>LINK</a> <a href='javascript:void(0)' onClick='addTextTag(` [img] ფოტო სურათის ბმული [/img] `); return false'>IMG</a> <a href='javascript:void(0)' onClick='addTextTag(` [youtube] ვიდეოს კოდი ბმულიდან [/youtube] `); return false'>YOUTUBE</a> <a href='javascript:void(0)' onClick='addTextTag(` [center] ტექსტი ცენტრში [/center] `); return false'>CENTER</a> <a href='javascript:void(0)' onClick='addTextTag(` [br] ტექსტი ახალი ხაზიდან `); return false'>BR</a> <a href='javascript:void(0)' onClick='addTextTag(` [hr] ხაზგასმა პოსტში `); return false'>HR</a>
			</center></fieldset>
            <textarea name="post_content" id="text" onkeypress="return makeGeo(this,event); changeVal()" placeholder="გამოხმაურება" maxlength="9999" cols="40" rows="6" required><?php echo $edit_post_content; ?></textarea> <br /><br />
            <input name="dat" type="hidden" value = "<?php echo $dat; ?>"><input name="ip" type="hidden" value = "<?php echo $ip; ?>">
            <button type="submit" style="border-radius: 10px 10px 10px 10px; background-color: #f3f3f3;">გამოქვეყნება</button>
            </form>
			<center>
        <fieldset><legend><small><b>სიცილაკები</b></small></legend>
        <a href='javascript:void(0)' onClick='addTextTag(` :1: `); return false'><img src='/img/smileys/1.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :2: `); return false'><img src='/img/smileys/2.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :3: `); return false'><img src='/img/smileys/3.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :4: `); return false'><img src='/img/smileys/4.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :5: `); return false'><img src='/img/smileys/5.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :6: `); return false'><img src='/img/smileys/6.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :7: `); return false'><img src='/img/smileys/7.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :8: `); return false'><img src='/img/smileys/8.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :9: `); return false'><img src='/img/smileys/9.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :10: `); return false'><img src='/img/smileys/10.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :11: `); return false'><img src='/img/smileys/11.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :12: `); return false'><img src='/img/smileys/12.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :13: `); return false'><img src='/img/smileys/13.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :14: `); return false'><img src='/img/smileys/14.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :15: `); return false'><img src='/img/smileys/15.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :16: `); return false'><img src='/img/smileys/16.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :17: `); return false'><img src='/img/smileys/17.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :18: `); return false'><img src='/img/smileys/18.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :19: `); return false'><img src='/img/smileys/19.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :20: `); return false'><img src='/img/smileys/20.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :21: `); return false'><img src='/img/smileys/21.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :22: `); return false'><img src='/img/smileys/22.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :23: `); return false'><img src='/img/smileys/23.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :24: `); return false'><img src='/img/smileys/24.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :25: `); return false'><img src='/img/smileys/25.png' alt='' /></a>
		<a href='javascript:void(0)' onClick='addTextTag(` :26: `); return false'><img src='/img/smileys/26.png' alt='' /></a> 
        </center></fieldset>
            <?php } ?>
            
            </details><br />
          <a name="newpost"></div></td>
		  
          <td align="left" valign="top" width="220px" style="border:1px solid; border-color:#f1f1f1;">&#9783; თქვენი პროფილი<hr style="width:100%; border:1px solid; border-color:#fafafa;">
            <?php if ($usr == -1) 
           echo '<b>&#9744; ავტორიზაცია</b><br /><br /><form id="usr" action="?switch&tid='.$req_topic.'" method="post">
            <input type="text" name="usr" placeholder="მომხმარებელი" maxlength="16" required> <br />
            <input type="password" name="psw" placeholder="პაროლი" maxlength="30" required> <br /><br />
            <input type="submit" style="border-radius: 10px 10px 10px 10px; background-color: #f3f3f3;" name="login" value="შესვლა" ></form><hr style="width:100%; border:1px solid; border-color:#fafafa;">
              '.$msg.'
             <b>&#9745; რეგისტრაცია</b><br />
                <form align="center" style="font-size:small;" action="?post_register" method="post">
                  <br />
                 <input type="text" name="usr" placeholder="მომხმარებელი" maxlength="16" required> <br />
                 <input type="password" name="psw" placeholder="პაროლი" maxlength="30" required> <br />
                 <input type="password" name="psw2" placeholder="გაიმეორეთ პაროლი" maxlength="30" required> <br />
                 <input type="hidden" name="type" value="2" >
                 <input type="hidden" name="bad" value="return" checked>
                 <input checked="checked" type="hidden" name="conditions"><br />
             <input type="submit" value="რეგისტრაცია" style="border-radius: 10px 10px 10px 10px; background-color: #f3f3f3;">
            </form>
            <br />';
           else echo $usrs_names[$usr]; ?> 
            
            
          </td>
        </tr>
        <tr>
          <td colspan="3" rowspan="1" height="50" align="center"
            valign="bottom">
<?php
		 session_start();
date_default_timezone_set("Asia/Tbilisi"); 

$path='online/';
$file_name='sess_'.$_COOKIE['PHPSESSID'];
$file=$path.$file_name;
$atime=300;

function inc_count($path,$file,$atime)
{
    !is_dir($path)?mkdir($path,0755,true):false;
    !file_exists($file)?fopen($file, "w"):false;
    $time=file_get_contents($file);
    empty($time)?file_put_contents($file, (time()+$atime)):false;
    if($time<=time())
    {
    file_put_contents($file, time()+$atime);
    }
    if ($handle = opendir($path))
    {
	while (false !== ($entry = readdir($handle)))
	{
	    if ($entry != "." && $entry != "..")
	    {
		$time=file_get_contents($path.$entry);
		if($time<=time())
		{
		unlink($path.$entry);
		}
	    }
	}
	closedir($handle);

	return '<center>საიტზეა<b> '.(count(scandir($path))-2).' </b>ადამიანი</center>';
    }
}

echo inc_count($path,$file,$atime);

?>
<br /><br />

<?php include 'banner.php'; ?>
          </td>
        </tr>
      </tbody>
    </table>

    <br />
  </body>
</html>
