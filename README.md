# README

## Camagru
Camagru is a website that allows users to post their best picture for users to view, comment and like.

The target audience are companies that need centered social media sites or any company that has a business problem that can be solved with a web application.

### Requirments
MAMP https://www.mamp.info/en/mamp<br>
Download the right MAMP for your Operating System

## Installation Steps:

### 1. Setting Up Source Code
  - Navigate to https://github.com/tspies/Web-Development and click the clone or download button
  - Go the the folder `htdocs` which will be where MAMP is instelled on your computer.
  - Clone the repository into this `htdocs` folder:
  
### 2. Setting up MAMP
  - Start the MAMP application
  - Ensure that the ports used for the apache server is 8888
  - Switch on the MySQL and Apache on MAMP
  
### 3. Start Camagru
  - Click on this link to start Camagru, http://localhost:8888/Web-Development/Camagru/config/setup.php

## Code Breakdown
  - Back-end Technologies
    - MAMP
    - PHP
  - Front-end Techanologies
    - HTML
    - CSS
    - Javascript
    - Boostrap
  - Database Management Systems
    - MySQL
  - Folder Structure Breakdown
    - config
      - database.php
        - Create database with configurations
      - setup.php
        - Initilizes Camagru
    - img
      - Folder which contains all the users stored images
    - The rest of the .php files are found in the root of the project.
## Testing
  - https://github.com/wethinkcode-students/corrections_42_curriculum/blob/master/camagru.markingsheet.pdf
  
## Summarized Test Outline
  - Create a User
  - User login / Authentication
  - Photo Capture
  - Gallery View
  - User Profile / Preferences
  - Delete only Users Pictures

