____   ____._____.           
\   \ /   /|__\_ |__   ____  
 \   Y   / |  || __ \_/ __ \ 
  \     /  |  || \_\ \  ___/ 
   \___/   |__||___  /\___  >
                   \/     \/ 


Hi there! Welcome to Vibe

Vibe is functionally a very simple app.

The index.php page manages everything in the app based on the action URL fragment it is passed

1. When the user is first directed to index.php, action is null and it redirects to the homepage also creating a facebook login link

2. After logging in from the homepage, the action is set to login and index.php adds the new user to the Vibosphere database using their facebook info

3. After being added to Vibosphere, the user is sent back to index.php but with action set to question

4. At index.php when action=question, index.php goes to the Vibosphere database and pulls a new question and facebook friend randomly. Then it heads to templates/ questions.php

5. On questions.php, the user sees the a picture of a friend, a question, and a slider to answer a question. After using the slider and comment box to answer, the user hits submit to get a new question and friend. The user can also skip

6. When submit is pressed, action is set to submit and the user is brought back to index.php. Here index.php adds all this info about the question to the Vibosphere transaction table to be prossessed by the server later. The user is then redirected back to index.php with action=question receive another question.
