<link rel='stylesheet' type='text/css' href='css/core.php'>

<body style='background-color:#e8f5fd; height:auto'>
    <form method='post' action='ComposePrayer.php'>
        <textarea name='prayer' onkeyup='auto_grow(this)' placeholder='Compose Prayer'></textarea>
    </form>
    <img src='images/icons/imageUpload.png' height='20px' onclick='uploadImage()'></a>
</body>


<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }
    function uploadImage(){
        console.log('Image Upload');
    }
</script>