  __ _       _   _____ _ _      _    _           _   
 / _| |     | | |  ___(_) |    | |  | |         | |  
| |_| | __ _| |_| |__  _| | ___| |__| | ___  ___| |_ 
|  _| |/ _` | __|  __|| | |/ _ \  __  |/ _ \/ __| __|
| | | | (_| | |_| |   | | |  __/ |  | | (_) \__ \ |_ 
|_| |_|\__,_|\__|_|   |_|_|\___|_|  |_|\___/|___/\__|
by Jim (www.j-fx.ws)                   version 1.15.2

flatFileHost is a free file host script. It is modeled 
after the many popular free file hosts like rapidshare 
and megaupload. It is easy to set up and use and it 
doesn't even require a MySQL database!

Notice: Before you create your own file host site, 
make sure that you have the resources to! If you don't
have a lot of space and bandwidth, you shouldn't run 
a file host. If people upload files to your site and 
your site is taken down, they won't be very happy. 
Also make sure that it isn't against your host's 
terms of service to run a file host.

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

Feel free to use this script in any way you'd like.
Go ahead and modify and customize it however you see
fit. If you like this script, leave the link back to me.
I'd appreciate it. :)