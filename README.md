# DynamicEmailPhoto
A PHP script that will return the appropriate photo relative to an email address.

This script is used as a part of a solution to provide dynamic email signtures with a photo when using Microsoft Exchange's "Company Disclaimer" feature.  The contact infomration and content of the email signature contained within the company disclaimer is pulled from Active Directory.  The photo for the signature is NOT pulled from active directory, but instead, is pulled from a linux-based server containing all employee's photos saved as "[their email address].png".


The photo.php script's purpose is to return a photo for the selected email.  And, if no email photo exists, return a default image which will most likely be of a size "1px x 1px".

