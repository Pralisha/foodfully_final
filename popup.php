<html>
    <head>
        <title>
            demo upload
        </title>
        <style>
            *
            {
                margin: 0;
                padding: 0;
            }
            .btn-upload{
                padding: 10px 15px;
                background-color: #444444;
                color: white;
                cursor: pointer;
                
            }
            .overlay{
                width: 100%;
                background: rgba(0,0,0,0.5);
                height: 100vh;
                position: fixed;
                top:0%;
                
                z-index: -1;
                opacity: 0;
                transition: 1s;
            }
            .showoverlay{
                opacity: 1;
                z-index: 1;
                margin-left: 0;
            }
            .uploadform{
                width: 350px;
                background-color: white;
                padding: 30px 20px;
                position: absolute;
                transition: 1s;
                z-index: 9;
                left: 25vw;
                top: 50vh ;
                transform: translate(-50%,-50%);
                box-shadow: 0px 0px 10px 3px #444444 ;
            }
            .showuploadform{
                left:25vw;
                top:50%;
                z-index: 1;
            }
            .uploadform input{
                width: 100%;
                height: 35px;
                padding: 40px;
                margin-bottom: 15px;
                
            }
            .uploadform button{
                background-color: black;
                color: white;
                cursor: pointer;
                padding: 10px 15px;
               
            }
            .uploadform span{
                position: absolute;
                right: 0px;
                width: 30px;
                color: white;
                line-height: 30px;
                height: 30px;
                background-color: red;
                text-align: center;
                top: 0px;
                cursor: pointer;
            }
        </style>
    </head>
<body>
    <button class="btn-upload" onclick="showPop()">Upload ID file</button>
    <div class="overlay" onclick="removePop()"></div>
    <div class="uploadform"> 
        <span onclick="removePop()">&times;</span>
        <form action="">
            <div>
                <label for="" style="padding: 10px 15px; text-align: center; font-size: larger; font-family: Roboto, sans-serif;">Upload an image file:</label>
                <input type="file" style="text-align: center; font-size: larger;">
            </div>
            <button style=" margin-left: auto;
                margin-right: auto;">SUBMIT</button>
        </form>
    </div>
</body>
</html>

<script>
    function showPop()
    {
        document.querySelector('.overlay').classList.add('showoverlay');
        document.querySelector('.uploadform').classList.add('showuploadform');
    }
    function removePop()
    {
        document.querySelector('.overlay').classList.remove('showoverlay');
        document.querySelector('.uploadform').classList.remove('showuploadform');
    }
</script>