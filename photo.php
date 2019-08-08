<?php

###############################################################################
#
#  PURPOSE:  This scripts purpose is to return a photo for the selected email.
#            If no email photo exists, return a default image
#            which will, most likely, be of a size "1px x 1px".
#
#  AUTHOR:   John Lucas
#  CREATED ON:  2019-06-19
#
#  LAST UPDATED BY: John Lucas
#  LAST UPDATED ON: 2019-06-28
#
##############################


##############################################################################
#   ____                                        _        _   _
#  |  _ \  ___   ___ _   _ _ __ ___   ___ _ __ | |_ __ _| |_(_) ___  _ __
#  | | | |/ _ \ / __| | | | '_ ` _ \ / _ \ '_ \| __/ _` | __| |/ _ \| '_ \
#  | |_| | (_) | (__| |_| | | | | | |  __/ | | | || (_| | |_| | (_) | | | |
#  |____/ \___/ \___|\__,_|_| |_| |_|\___|_| |_|\__\__,_|\__|_|\___/|_| |_|
#
#     _    _   _ ____       ____       __
#    / \  | \ | |  _ \     |  _ \ ___ / _| ___ _ __ ___ _ __   ___ ___
#   / _ \ |  \| | | | |    | |_) / _ \ |_ / _ \ '__/ _ \ '_ \ / __/ _ \
#  / ___ \| |\  | |_| |    |  _ <  __/  _|  __/ | |  __/ | | | (_|  __/
# /_/   \_\_| \_|____/     |_| \_\___|_|  \___|_|  \___|_| |_|\___\___|
#
##############################################################################

# Output photo directly:
#   https://www.developerfeed.com/question/762253067/how-do-you-serve-image-file-using-php

# Sanatization:
#  https://paragonie.com/blog/2015/06/preventing-xss-vulnerabilities-in-php-everything-you-need-know
#  http://htmlpurifier.org/
#  https://devwerks.net/blog/16/how-not-to-use-html-purifier/
#  https://www.php.net/manual/en/function.filter-has-var.php
#


#  https://www.w3schools.com/php/php_filter.asp
#  https://www.php.net/manual/en/function.filter-var.php
#  https://stackoverflow.com/questions/51115485/php-email-sanitization-filter
#  http://shiflett.org/articles/input-filtering
#  https://kevinsmith.io/sanitize-your-inputs
#  https://www.reddit.com/r/PHP/comments/ac65qt/sanitize_your_inputs/
#  https://www.wordfence.com/learn/how-to-write-secure-php-code/
#  https://stackoverflow.com/questions/54584251/escape-and-sanitize-get-parameters
#  https://www.w3schools.com/php7/php7_filters.asp
#

# Misc items:
#  https://stackoverflow.com/questions/13447554/how-to-get-input-field-value-using-php
#






##############################################################################
#   _____ _   _ _   _  ____ _____ ___ ___  _   _ ____
#  |  ___| | | | \ | |/ ___|_   _|_ _/ _ \| \ | / ___|
#  | |_  | | | |  \| | |     | |  | | | | |  \| \___ \
#  |  _| | |_| | |\  | |___  | |  | | |_| | |\  |___) |
#  |_|    \___/|_| \_|\____| |_| |___\___/|_| \_|____/
#
##############################################################################

function showMyPhoto($myemail) {

        #debug
        #echo "Showing the photo, baby.\n";
        #echo "$myemail";

        $file = "photos/$myemail.png";
        #echo $file;

        #echo "<html><body><img src=\"".$file."\">";
        outputMyPNG($file);

        return;
} // showMyPhoto

function outputMyPNG($myfile){


        #check if the photo for the specified email exists
        if (file_exists($myfile)) {
                // basic headers
                header("Content-type: image/png");
                header("Expires: Mon, 1 Jan 2099 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
                header("Cache-Control: no-store, no-cache, must-revalidate");
                header("Cache-Control: post-check=0, pre-check=0", false);
                header("Pragma: no-cache");

                // get the size for content length
                $size= filesize($myfile);
                header("Content-Length: $size bytes");

                // output the file contents
                readfile($myfile);

        } else {

                // basic headers
                header("Content-type: image/png");
                header("Expires: Mon, 1 Jan 2099 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
                header("Cache-Control: no-store, no-cache, must-revalidate");
                header("Cache-Control: post-check=0, pre-check=0", false);
                header("Pragma: no-cache");

                // get the size for content length
                $size= filesize($myfile);
                header("Content-Length: $size bytes");

                # if no file exists, return a 1px X 1px image
                readfile('1x1.png');
        }
        return;
}



# /END FUNCTIONS
###############################################################################







#############################################
#   __  __    _    ___ _   _
#  |  \/  |  / \  |_ _| \ | |
#  | |\/| | / _ \  | ||  \| |
#  | |  | |/ ___ \ | || |\  |
#  |_|  |_/_/   \_\___|_| \_|
#
#

#echo $_GET['e'];

#ithis code block based on similar sample code from:
#  https://stackoverflow.com/questions/51115485/php-email-sanitization-filter

#Check if we have input data
if(filter_has_var(INPUT_GET, 'e')){

        # This regex is what an email should look like
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

        #retrieve the data for var 'e'
        $email = $_GET['e'];

        #See documentation:
        #  https://www.php.net/manual/en/function.filter-var.php
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (preg_match($regex, $email)) {
                #echo $email;
                showMyPhoto($email);
        } else {
                #echo "invalid email";
                showMyPhoto(invalidemail);
        }

}
####

