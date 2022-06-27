<?php
    function uploadFile() {
        $FileName = $_FILES["Picture"]["name"];
        $FileSize = $_FILES["Picture"]["size"];
        $error = $_FILES["Picture"]["error"];

        $FileType = ["jpg", "png", "jpeg"];
        $extension = explode(".", $FileName);
        $extension = strtolower($extension[count($extension)-1]);

        if($error == 4) {
            echo "<script>
                alert(\"Please upload your profile picture!\");
            </script>";
            return false;
        } else if(!in_array($extension, $FileType)) {
            echo "<script>
                alert(\"Error, please upload a profile picture!\");
            </script>";
            return false;
        } else if($FileSize > 5000000) {
            echo "<script>
                alert(\"Your file size is too big!\");
            </script>";
            return false;
        }
        return uniqid('foto-profil').'.'.$extension;
    }
?>