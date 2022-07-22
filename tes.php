<?php
$cid = $_GET['id'];
$urlx = getvideobyid($cid);

header("Location:$urlx");

function getvideobyid($id){

$apilink = "https://www.vidio.com/live/$id/tokens";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$apilink);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = array();
$headers[] = 'Authority: www.vidio.com';
$headers[] = 'Content-Length: 0';
$headers[] = 'Sec-Ch-Ua: ^^';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36';
$headers[] = 'Content-Type: text/plain;charset=utf-8';
$headers[] = 'Accept: */*';
$headers[] = 'Origin: https://www.vidio.com';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://www.vidio.com/live/204-sctv';
$headers[] = 'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8';
$headers [] ='cookie: remember_user_token=eyJfcmFpbHMiOnsibWVzc2FnZSI6IlcxczRNREExTkRnek9WMHNJaVF5WVNReE1DUXZRMmQ1VjBKc1FqbFpOMWcyZFRodFVVWndkMWd1SWl3aU1UWTFOamczTVRBeE1TNDVPVGt6TnpFeklsMD0iLCJleHAiOiIyMDI0LTA3LTAzVDE3OjU2OjUxLjk5OVoiLCJwdXIiOiJjb29raWUucmVtZW1iZXJfdXNlcl90b2tlbiJ9fQ%3D%3D--1a4b2c52b30f33cd472b69dac8cd76781d2a250d;ahoy_visitor=aa900206-9028-454e-a70c-7fe347d3a29e;_vidio=true;plenty_id=80054839;_pbjs_userid_consent_data=3524755945110770;_gcl_au=1.1.536095000.1656871099;_ga=GA1.3.55078020.1656871099;_fbp=fb.1.1656871100693.1087816067;_tt_enable_cookie=1;_ttp=385bb21e-7f9b-40b4-b80e-c3a72fd12e50;_CEFT=Q%3D%3D%3D;sp=a1b7d481-046f-4390-a90f-ee0a317be89a;_lr_env_src_ats=false;_cc_id=ffaa7d21bd2e4fb393f7476741c08e75;_clck=vwltwk|1|f33|0;shva=1;_gid=GA1.2.1067986160.1658387306;_gid=GA1.3.1067986160.1658387306;cebs=1;ahoy_visit=6fc71f3a-82cd-4d34-851a-0c499bbcd758;access_token=eyJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7InR5cGUiOiJhY2Nlc3NfdG9rZW4iLCJ1aWQiOjgwMDU0ODM5fSwiZXhwIjoxNjU4NTQzODAxfQ.MMAoM_M9Vtqt6w8mInI-zsub5poUx29g24wf2EkIu5Q;_ce.s=v~9219a1454b3de1120010a37695a4eed4f94c2d52~vpv~29~v11.rlc~1658457401627;visitor_fp_id=4d3f812e9978f95ab42fa9e70df83393;_sp_ses.5952=*;___iat_ses=7B0A93D7AA019251;_lr_retry_request=true;panoramaId_expiry=1659062203619;panoramaId=126e0b684341573bdd6bb5a0803816d539388c7dbaccc49242869ebfa7a6e2c4;luws=14be3e2cf05db1988ec8f2b2_80054839;_ga=GA1.1.55078020.1656871099;_dc_gtm_UA-47200845-12=1;cebsp=6;___iat_vis=7B0A93D7AA019251.671122fbcad489502010eb62b7d0f56d.1658458113190.c4da2499d3f2f92144a0087ae59cd2e6.ZJZORBJREB.11111111.1.0;_sp_id.5952=629180bd-69e8-4f67-b3c1-9d3d1ad7b056.1656871101.31.1658458114.1658387308.e146b0a5-ef15-470d-8c62-9bc78efd137c;_vidio_session=K1hFa1NCQ1lJUUZjZUg0SzZUMmFJMld5TFpUVEFKWlhoZUxjRGZBSEZ0VittS3luYUE4MzRCbGJJaUoyaVFTa05BTmx6bWFLcVBLc1ROdTlaNnUyRVl3amNnMGdSNE5KZjEzbkhDcGM1OUhQM3lCbW5sOWJmRVc5aExUNktOR0dERlYzTXF3am1UWVdhZFV4ZUhyZHNXM0pZSEt5Yk9rNGFtZUJaSzd4NDhTejNGazNoVDVWNU9WblFWY21xUWI1WWN4Umh3SWxxWW5ka2JxOVBaRmRRL0hqdjN6ZHFYd05nekFwL3crVHg3d2pVNHJOQ050Q0dtRjdMU3lRMU50MWM4UFhSVmFzb2tjWVN0emtmdWFFcW83ejhuOERJVG4yMXduamJWSjJqUkozNUN1ZC9JR3JkQ2U2L0hLNU9kNGFqUUU2amhSeUIyZGx1YmN1b0F1TFJTV2dQaGRMRGZySHA4dTJhRG5BTkNJVmxRNmlGTnF2Um5NVXMrUS9YSDIxQlFCb2t6VE85TlEyQXlkK29sNXNiZ3VvUGw1MGduWnBua2RCQWlBR3ZhYWFsWmpqQWk0WjNLNEZvd2hsSzM5NkJKYnZSZmZ0aVBQN1EvTW84REIxUUE9PS0tQ2hHKzI1UmM1VVdmMnp0QVR3d1Bodz09--bdf9b949e9b3076074168c4f2ebbeea501495570;_ga_JBTBSESXVN=GS1.1.1658457400.36.1.1658458118.53';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$server_output = json_decode(curl_exec($ch),true);
$info = curl_getinfo($ch);
$httpcode =  $info["http_code"];
curl_close ($ch);

if($httpcode!=200){
	echo "error";
}else{
	//if($id==206){return "https://app-etslive-2.vidio.com/live/geo_206/master.m3u8?".$server_output['token']; }
	return "https://app-etslive-2.vidio.com/live/$id/master.m3u8?".$server_output['token'];
}
}
?>
