Korfile is a fork of @Shahan's FPH script. His script was a fork of another script I believe, which was very outdated.
He took that script and built on top of it, however he hasn't updated FPH in 3 years. So here I am, taking it over.
Below is the commit log from what Shahan did. I'll be adding more as I patch bugs and change stuff.

# WHATS NEW IN VERSION 1.15.2? ########################
  fixed:
   - passwords again. :P

#######################################################

# WHATS NEW IN VERSION 1.15.1? ########################
  removed:
   - top 10 page. wasn't working.
  fixed:
   - passwords & email

#######################################################

# WHATS NEW IN VERSION 1.15.0? ########################
  added: 
   + Password Protected Files
   + Descriptions
   + Users can have their links e-mailed to them
   + Categories
   -+ Not used for anything, but available
   + Stuff added to the uploads page:
   -+ E-mail address field
   -+ Description field
   -+ Password Protection Field
   -+ Allowed Filetypes List
   -+ Category
   -+ "Currently hosting # files. # MB Total!"
  removed:
   (nothing)
  fixed:
   (nothing)
#######################################################


# WHATS NEW IN VERSION 1.10.0? ########################
  added: 
   + download counting
   + option to limit file extensions
   + public file list
   + ban manager in admin panel
   + bandwidth used by each file (estimated)
   + prettier layout thats mostly CSS
  removed:
   (nothing)
  fixed:
   - 0 sec download timer bug
#######################################################

How to install:

 - edit config.php and set your own settings
 - upload all files and folders
 - CHMOD all of the .txt files to 777
 - CHMOD the 'storage' folder to 777
 - You're done! Enjoy your new file host!

How to upgrade:

 - Just upload all the new files EXCEPT for the .TXT 
   files.
 - Make a backup of your files.txt JUST IN CASE!

How to customize:

 - to edit the page layout, modify the header and 
   footer files
 - to edit the main page, faq, and tos, edit the 
   page in the pages folder
