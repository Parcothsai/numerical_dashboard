**[HOW TO DEPLOY NUMERICAL DASHBOARD ?]**

Links of the project :
https://ouiaremakers.com/posts/tutoriel-diy-un-tableau-de-bord-numerique-v2


**[REQUIREMENT]**

Docker must be installed on your local machine.

Check your config, and HOW install it !

CHECK IF PORT 9010 is free, or change it in .env file

**[IMPORTANT NOTE]**

IT'S NOT A PERSONAL PROJECT !



A Makefile  is available to facilitate deployment

**[FIRST STEP]**

1.  `git clone https://github.com/Parcothsai/numerical_dashboard.git`

2.  `cd numerical_dashboard`

3.  `make init`

**[SECOND STEP]**

4.  `make deploy`

**[THIRD STEP]**

5.  Acces to http://localhost:9010 ( OR 127.0.0.1:9010 ) to view the project

6.  If you change port in .env, remember to change it in url, of course

**[DELETE STEP]**

6.  If you want to delete the project, you can use `make remove_all`. It will affect only docker


**[WHAT YOU NEED TO KNOW]**

The project is build with php

The network of the docker project is : raspberry 


**[DEVELOPMENT]**

Folder **tdb314** contains all files to develop the dashboard.

When you change a params in these file, you can reload the web page and view directly effects.





