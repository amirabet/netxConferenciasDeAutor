You can use this free YouTube video information generator to retrieve YouTube video information. Enter YouTube video ID or video URL in the text box and hit submit. You can get all the important details and info about a YouTube video using this free tool.
<br /><br />
This tool can get YouTube video information like;
Title, author, author link, category, published date, video duration, views count, rating, number of rators, favourite count, likes count, dislikes count, number of comments, video description and all the 09 thumbnail urls with size.
<br /><br />
 
<div id="ytvdetails">
<form action="" method="GET">
<fieldset>
<legend>Enter YouTube Video ID OR Video URL</legend>
<input name="v" id="videoid" type="text" <?php if (isset($_GET['v'])) { echo "value=".$_GET['v'].""; } else { ?> value='Ex: o8UCI7r1Aqw, http://www.youtube.com/watch?v=o8UCI7r1Aqw&feature=relate, youtu.be/o8UCI7r1Aqw, youtube.com/v/o8UCI7r1Aqw' onblur="if (this.value == '') {this.value = 'Ex: o8UCI7r1Aqw, http://www.youtube.com/watch?v=o8UCI7r1Aqw&feature=relate, youtu.be/o8UCI7r1Aqw, youtube.com/v/o8UCI7r1Aqw';}" onfocus="if (this.value == 'Ex: o8UCI7r1Aqw, http://www.youtube.com/watch?v=o8UCI7r1Aqw&feature=relate, youtu.be/o8UCI7r1Aqw, youtube.com/v/o8UCI7r1Aqw') {this.value = '';}" <?php } ?>>
<input type="submit" value="Submit">
</fieldset>
</form>
<?php
// function to parse a video <entry>
function singleVideo($data) {
$xml= new stdClass;
 
// author name
$xml->author = $data->author->name;
 
$media = $data->children('http://search.yahoo.com/mrss/');
 
// title
$xml->title = $media->group->title;
 
// description
$xml->description = $media->group->description;
 
// URL
$attrs = $media->group->player->attributes();
$xml->watchURL = $attrs['url'];
 
// default thumbnail
$xml->thumbnail_0 = $media->group->thumbnail[0]->attributes(); // Normal Quality Default Thumbnail
 
// category
$xml->category = $media->group->category;
 
$yt = $media->children('http://gdata.youtube.com/schemas/2007');
$attrs = $yt->duration->attributes();
 
// duration
$xml->duration = $attrs['seconds'];
 
// published
$xml->published = strtotime($data->updated);
 
$yt = $data->children('http://gdata.youtube.com/schemas/2007');
$attrs = $yt->statistics->attributes();
 
// view count
$xml->viewCount = $attrs['viewCount'];
 
// favourite count
$xml->favCount = $attrs['favoriteCount'];
 
$yt = $data->children('http://gdata.youtube.com/schemas/2007');
 
if ($yt->rating) {
$attrs = $yt->rating->attributes();
 
// likes count
$xml->likeCount = $attrs['numLikes'];
 
// dislikes count
$xml->disLikeCount = $attrs['numDislikes'];
}
 
else {
$xml->likeCount = 0;
$xml->disLikeCount = 0;
}
 
$gd = $data->children('http://schemas.google.com/g/2005');
if ($gd->rating) {
$attrs = $gd->rating->attributes();
 
// average rating
$xml->avgRating = $attrs['average'];
 
// maximum accept rating
$xml->maxRating = $attrs['max'];
 
// number of rates
$xml->numRaters = $attrs['numRaters'];
}
 
else {
$xml->avgRating = 0;
$xml->maxRating = 0;
}
 
$gd = $data->children('http://schemas.google.com/g/2005');
if ($gd->comments->feedLink) {
$attrs = $gd->comments->feedLink->attributes();
 
// comments count
$xml->commentsCount = $attrs['countHint'];
}
 
// related videos
$data->registerXPathNamespace('feed', 'http://www.w3.org/2005/Atom');
$relatedV = $data->xpath("feed:link[@rel='http://gdata.youtube.com/schemas/2007#video.related']");
if (count($relatedV) > 0) {
$xml->relatedURL = $relatedV[0]['href'];
}
 
return $xml;
}
 
// default Video ID
$defaultID = "o8UCI7r1Aqw";
 
// GET submitted video ID or url
if (isset($_GET['v']) && $_GET['v'] != "") {
$submitID = preg_replace('/[^\w-_:?=.\/\\\\]|\s$/', '', $_GET['v']);
}
 
// default video ID
else {
$submitID = $defaultID;
}
 
// if video ID submitted
if (strpos($submitID, '/') === false) {
$videoID = $submitID;
}
 
// if video url submitted
else {
preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $submitID, $matches);
if (isset($matches[1]))
{
$videoID = $matches[1];
}
else {
$videoID = '';
}
}
 
// clean video id
$videoID = preg_replace('/[^\w-_]+/', '', $videoID);
 
if ($videoID != '') {
 
// check video exists or not
$videoExist = get_headers('http://gdata.youtube.com/feeds/api/videos/' . $videoID);
 
if (!strpos($videoExist[0], '200')) {
echo ('This video does not exist! Please check the URL or Video ID again.');
return false;
}
 
else {
 
// if video exists
$id = $videoID;
}
 
// assign $id to feed link
$xmlURL = 'http://gdata.youtube.com/feeds/api/videos/' .$id. '?v=2';
 
// convert XML document to an object
$data = simplexml_load_file($xmlURL);
 
// parse entry data
$video = singleVideo($data);
 
// default thumbnail
$thumbnail_0 = $video->thumbnail_0;
 
// other thumbnail links. did not link the array since it could change
$thumbnail_1 = ('http://i1.ytimg.com/vi/' .$id. '/1.jpg'); // Start Thumbnail
$thumbnail_2 = "http://i1.ytimg.com/vi/".$id."/2.jpg"; // Middle Thumbnail
$thumbnail_3 = "http://i1.ytimg.com/vi/".$id."/3.jpg"; // End Thumbnail
$thumbnail_4 = "http://i1.ytimg.com/vi/".$id."/0.jpg"; // Player Background Thumbnail
$thumbnail_5 = "http://i1.ytimg.com/vi/".$id."/mqdefault.jpg"; // Medium Quality Thumbnail
$thumbnail_6 = "http://i1.ytimg.com/vi/".$id."/hqdefault.jpg"; // High Quality Thumbnail
$thumbnail_7 = "http://i1.ytimg.com/vi/".$id."/sddefault.jpg"; // Standard Definition Thumbnail
$thumbnail_8 = "http://i1.ytimg.com/vi/".$id."/maxresdefault.jpg"; // Maximum Resolution Thumbnail
 
// get image sizes - use memory unnecessarily 
$size0 = getimagesize("$thumbnail_0");
$size1 = getimagesize("$thumbnail_1");
$size2 = getimagesize("$thumbnail_2");
$size3 = getimagesize("$thumbnail_3");
$size4 = getimagesize("$thumbnail_4");
$size5 = getimagesize("$thumbnail_5");
$size6 = getimagesize("$thumbnail_6");
 
echo "<div id=\"ytvply\"><object width=\"644\" height=\"362\"><param name=\"movie\" value=\"https://www.youtube.com/v/" .$id. "?version=3&rel=0&modestbranding=1\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"><param name=\"allownetworking\" value=\"internal\"></param><embed src=\"https://www.youtube.com/v/" .$id. "?version=3&rel=0&modestbranding=1&hl=en_US\" type=\"application/x-shockwave-flash\" width=\"644\" height=\"362\" allowscriptaccess=\"always\" allowfullscreen=\"true\" allownetworking=\"internal\"></embed></object></div>" ;
echo "<div><b>Title</b>: <span id=\"ytvtitle\">" .$video->title. "</span></div>" ;
echo "<div style=\"float: right;\"><span id=\"ytvthumb\"><img width=\"$size5[0]px\" height=\"$size5[1]px\" src=\"" .$thumbnail_5. "\" alt =\"" .$video->title. "\" title=\"" .$video->title. "\"  /></span><br /><b id=\"ytvurl\"><a target=\"_blank\" title=\"" .$video->title. "\" href=\"" .$video->watchURL. "\">Watch on YouTube</a></b></div>" ;
echo "<div><b>Category</b>: <span id=\"ytvcatgry\" >" .$video->category. "</span></div>" ;
echo "<div><b>Author</b>: <span id=\"ytvauthr\" ><a target=\"_blank\" href=\"https://www.youtube.com/user/" .$video->author. "\">" .$video->author. "</a></span></div>" ;
echo "<div><b>Published</b>: <span id=\"ytvpublish\" >" .date("l, jS F, Y \@g:ia", $video->published). "</span></div>" ;
echo "<div><b>Duration</b>: <span id=\"ytvduration\" >" .$video->duration. "seconds ";
if ($video->duration > 59) {
echo "(" .sprintf("%0.2f", $video->duration/60). " minutes)";
}
echo "</span></div>" ;
echo "<div><b>Views</b>: <span id=\"ytvviewcount\" >" .$video->viewCount. "</span></div>" ;
echo "<div><b>Favourites</b>: <span id=\"ytvfavcount\" >" .$video->favCount. "</span></div>" ;
echo "<div><b>Ratings</b>: <span id=\"ytvrtngavrg\" >" .round($video->avgRating, 2). "</span>/<span id=\"ytvrtngmax\" >" .$video->maxRating. "</span></div>" ;
echo "<div><b>Number of Ratings</b>: <span id=\"ytvrtngcnt\" >" .$video->numRaters. "</span></div>" ;
echo "<div><b>Number of Likes</b>: <span id=\"ytvlks\" >" .$video->likeCount. "</span></div>" ;
echo "<div><b>Number of Dislikes</b>: <span id=\"ytvdislks\" >" .$video->disLikeCount. "</span></div>" ;
echo "<div><b>Number of Comments</b>: <span id=\"ytvcomment\" >" .$video->commentsCount. "</span></div>" ;
echo "<div><b>Description</b>: <span id=\"ytvdescription\" >" .$video->description. "</span></div>" ;
 
echo "<br /><br /><div id=\"ytvthumbnails\"><div><b>YouTube Video Default Thumbnails</b></div>" ;
echo "<div>Normal Quality Default Thumbnail ($size0[0]x$size0[1]px) : <span><a target=\"_blank\" href=\"$thumbnail_0\">$thumbnail_0</a></span></div>" ;
echo "<div>Start Thumbnail ($size1[0]x$size1[1]px) : <span><a target=\"_blank\" href=\"$thumbnail_1\">$thumbnail_1</a></span></div>" ;
echo "<div>Middle Thumbnail ($size2[0]x$size2[1]px) : <span><a target=\"_blank\" href=\"$thumbnail_2\">$thumbnail_2</a></span></div>" ;
echo "<div>End Thumbnail ($size3[0]x$size3[1]px) : <span><a target=\"_blank\" href=\"$thumbnail_3\">$thumbnail_3</a></span></div>" ;
echo "<div>Player Background Thumbnail ($size4[0]x$size4[1]px) : <span><a target=\"_blank\" href=\"$thumbnail_4\">$thumbnail_4</a></span></div>" ;
echo "<div>Medium Quality Thumbnail ($size5[0]x$size5[1]px) : <span><a target=\"_blank\" href=\"$thumbnail_5\">$thumbnail_5</a></span></div>" ;
echo "<div>High Quality Thumbnail ($size6[0]x$size6[1]px) : <span><a target=\"_blank\" href=\"$thumbnail_6\">$thumbnail_6</a></span></div>" ;
echo "<br /><br /><div><b>YouTube Video Additional Thumbnails</b></div>" ;
 
// check image available or not
$img7avail = get_headers("$thumbnail_7");
if (!strpos($img7avail[0], '200')) {
echo '<div>Standard Definition Thumbnail is not available for this video.</div>';
}
else {
$size7 = getimagesize("$thumbnail_7");
$size7ex = "$size7[0]x$size7[1]px";
echo "<div>Standard Definition Thumbnail (".$size7ex.") : <span><a target=\"_blank\" href=\"$thumbnail_7\">$thumbnail_7</a></span></div>";
 
}
 
// check image available or not
$img8avail = get_headers("$thumbnail_8");
if (!strpos($img8avail[0], '200')) {
echo '<div>Maximum Resolution Thumbnail is not available for this video.</div>';
}
else {
$size8 = getimagesize("$thumbnail_8");
$size8ex = "$size8[0]x$size8[1]px";
 
echo "<div>Maximum Resolution Thumbnail (".$size8ex.") : <span><a target=\"_blank\" href=\"$thumbnail_8\">$thumbnail_8</a></span></div>";
 
}
echo "</div>";
 
// get related videos
if ($video->relatedURL) {
$relatedFeed = simplexml_load_file($video->relatedURL);
echo "<br /><br /><div id=\"ytvrelated\"><b>Related Videos</b>";
if ($relatedFeed->entry) {
foreach ($relatedFeed->entry as $related) {
$relatedVideo = singleVideo($related);
echo "<div><a target=\"_blank\" href=\"$relatedVideo->watchURL\">$relatedVideo->title</a></div>";
}
}
echo "</div>";
}
}
 
else {
echo ('This video does not exist! Please check the URL or Video ID again.');
}
 
?>
</div>