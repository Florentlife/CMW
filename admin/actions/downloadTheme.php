<?php if ($_Permission_->verifPerm('PermsPanel', 'theme', 'actions', 'editTheme')) {

    $id = $_GET['id']; //Get ID

    $theme = json_decode(file_get_contents("https://devcmw.w3b.websr.fr/API/?getRessourceById=" . $id)); //Get all data


    //VARS
    $url = "https://devcmw.w3b.websr.fr/public/uploads/market/files/" . $theme->getRessourceById[0]->file;
    $outFileName = "theme/upload/" . $theme->getRessourceById[0]->file;

    //Download & store File
    set_time_limit(0);
    $file = file_get_contents($url);
    file_put_contents($outFileName, $file);


    $zip = new ZipArchive();
    if($zip->open($outFileName) === TRUE) {
        $zip->extractTo('theme/');
        $zip->close();
        unlink($outFileName);
    }

    header("location: admin.php?page=theme");


}
