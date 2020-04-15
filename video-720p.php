<?php 
 
// Load and initialize downloader class 
include_once 'youtube-class.php'; 

$handler = new YouTubeDownloader(); 
 
// Youtube video url 
$youtubeURL =  $_GET['url']; //'https://www.youtube.com/watch?v=kpxNhwv1Wwg'; 
 
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
        $videoQuality = $videoDownloadLink[1]['qualityLabel']; 
        $videoFormat = $videoDownloadLink[1]['format']; 
        $videoFileName = strtolower(str_replace(' ', '_', $videoTitle)).'.'.$videoFormat; 
        $downloadURL = $videoDownloadLink[1]['url']; 
        $fileName = preg_replace('/[^A-Za-z0-9.\_\-]/', '', basename($videoFileName));

      
         
        if(!empty($downloadURL)){ 
        // Define header for force download 
        header("Cache-Control: public"); 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$fileName"); 
        header("Content-Type: application/zip"); 
        header("Content-Transfer-Encoding: binary"); 

        // Read the file 
        readfile($downloadURL); 


    }else{ 
        echo "The video is not found, please check YouTube URL."; 
    } 
}
} 
 
?>
