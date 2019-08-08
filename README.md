# DynamicEmailPhoto

Usecase: A company employee using outlook sends email to someone.   The Exchange server will automatically add a company-approved signature that pulls their specific information from active directory.  This signature would show a photo if one has been uploaded.  If a photo has not been uploaded, return a 1 by 1 pixel PNG image instead.  (No signature is setup within the Outlook client.  Signatures within Outlook are disabled via group policy).

Details: The photo.php script is used as a part of a solution to provide dynamic mandatory email signatures with a photo when using Microsoft Exchange's "Company Disclaimer" feature.  The contact information and content of the email signature contained within the company disclaimer is pulled from Active Directory.  The photo for the signature is NOT pulled from active directory, but instead, is pulled from a linux-based server containing all employee's photos saved as "[their email address].png".

A PHP script (photo.php) will return the appropriate photo relative to a specific email address.

The photo.php script's purpose is to return a photo for the selected email.  And, if no email photo exists, return a default image which will most likely be of a size "1px x 1px".
