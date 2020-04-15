<?php 
 
// Load and initialize downloader class 
include_once 'youtube-class.php'; 

$handler = new YouTubeDownloader(); 
 
// Youtube video url 

if($_POST['url'])
{
$youtubeURL = $_POST['url']; 
 
// Check whether the url is valid 
if(!empty($youtubeURL) && !filter_var($youtubeURL, FILTER_VALIDATE_URL) === false){ 
    // Get the downloader object 
    $downloader = $handler->getDownloader($youtubeURL); 
     
    // Set the url 
    $downloader->setUrl($youtubeURL); 
     
    // Validate the youtube video url 
    if($downloader->hasVideo()){ 
        // Get the video download link info 
        $videoDownloadLink = $downloader->getVideoDownloadLink(); 
         
        $videoTitle = $videoDownloadLink[0]['title']; 
        $p360 = $videoDownloadLink[0]['qualityLabel']; 
        $p720 = $videoDownloadLink[0]['qualityLabel']; 
        $videoFormat = $videoDownloadLink[0]['format']; 
       // $videoFileName = strtolower(str_replace(' ', '_', $videoTitle)).'.'.$videoFormat; 
        $downloadURL = $videoDownloadLink[0]['url']; 

        echo '
        <div class="card">
                    <div class="card-header">'.$videoTitle.'</div>
                    <div class="card-body">
                       
                        <a href="video-360p.php?url='.$_POST['url'].'">Download - 360p Video </a> <b>'.$videoFormat.'</b> <br>
                         <a href="video-720p.php?url='.$_POST['url'].'">Download - 720p Video</a>  <b>'  .$videoFormat.'</b>
                    </div>
        </div>';
    
        
 
    }else{ 
        echo "The video is not found, please check YouTube URL."; 
    } 
}else{ 
    echo "Please provide valid YouTube URL."; 
} 

}else
{
    echo "Please Write Your Video URL";
} // url post
 
?>

