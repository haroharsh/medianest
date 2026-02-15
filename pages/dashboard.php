<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MediaNest Dashboard</title>

<style>

body{
    margin:0;
    font-family:'Segoe UI', sans-serif;
    background:#f4f6fb;
}

.layout{
    display:flex;
}

.side-bar{
    width:220px;
    height:100vh;
    background:#ffffff;
    box-shadow:2px 0 10px rgba(0,0,0,0.1);
    padding:20px;
}

.side-bar h2{
    font-size:32px;
    margin-bottom:30px;
}

.side-bar a{
    display:block;
    text-decoration:none;
    margin:25px 0;
    color:#333;
    font-weight:500;
}

.side-bar a:hover{
    color:#6a5cff;
    zoom: 125%;
}

.right{
    flex:1;
}

.top-bar{
    height:70px;
    background:white;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.content{
    padding:30px;
}

.cards{
    display:flex;
    gap:25px;
    flex-wrap:wrap;
}

.card-link{
    text-decoration:none;
}

.media-card{
    width:260px;
    padding:25px;
    border-radius:20px;
    color:white;
    box-shadow:0 12px 25px rgba(0,0,0,0.15);
    transition:0.3s;
}

.media-card:hover{
    transform:translateY(-5px);
    zoom: 110%;
}

.media-card img{
    width:80px;
    border-radius:15px;
}

.media-card h2{
    margin:15px 0 5px;
}

.media-card p{
    margin:5px 0;
}

.instagram{
    background:linear-gradient(135deg,#ff4ecd,#6a5cff);

}

.facebook{
    background:linear-gradient(135deg,#1877f2,#4c8dff);
}

.twitter{
    background:linear-gradient(135deg,#1da1f2,#0d8bd9);
}

.ytmusic{
    background:linear-gradient(135deg,#ff0000,#ff5a5a);
}

</style>
</head>

<body>

<div class="layout">

    <div class="side-bar">
        <h2>MediaNest</h2>

        <!-- <a href="#">Dashboard</a> -->
        <a href="https://www.instagram.com" target="_blank">Instagram</a>
        <a href="https://www.facebook.com" target="_blank">Facebook</a>
        <a href="https://twitter.com" target="_blank">Twitter</a>
        <a href="https://music.youtube.com" target="_blank">YT Music</a>
    </div>

    <div class="right">

        <div class="top-bar"></div>

        <div class="content">

            <div class="cards">

                <a href="https://www.instagram.com" target="_blank" class="card-link">
                    <div class="media-card instagram">
                        <h3>Instagram Post</h3>
                        <img src="https://cdn-icons-png.flaticon.com/512/174/174855.png">
                        <h2>Instagram Saver</h2>
                        <p>Save reels, posts and videos</p>
                        <p>Saved</p>
                    </div>
                </a>

                <a href="https://www.facebook.com" target="_blank" class="card-link">
                    <div class="media-card facebook">
                        <h3>Facebook</h3>
                        <img src="https://cdn-icons-png.flaticon.com/512/124/124010.png">
                        <h2>Facebook Downloader</h2>
                        <p>Download videos & posts</p>
                        <p>Active</p>
                    </div>
                </a>

                <a href="https://twitter.com" target="_blank" class="card-link">
                    <div class="media-card twitter">
                        <h3>Twitter</h3>
                        <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png">
                        <h2>Twitter Saver</h2>
                        <p>Save tweets & media</p>
                        <p>Ready</p>
                    </div>
                </a>


                <a href="https://music.youtube.com" target="_blank" class="card-link">
                    <div class="media-card ytmusic">
                        <h3>YouTube Music</h3>
                        <img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png">
                        <h2>Music Downloader</h2>
                        <p>Download songs & playlists</p>
                        <p>Online</p>
                    </div>
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>
