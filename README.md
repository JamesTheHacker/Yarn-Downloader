# Yarn Downloader

This is a small PHP script that searches and downloads movie clips from [Yarn](http://www.tzr.io/). It's inteded to be ran at the terminal/command line.

## Installation

Clone the repo

    git clone http://github.com/JamesTheHacker/Yarn-Downloader

Install dependencies

    composer install

## Running

To run the software simply run the following command:

    php yarn.php "I Love You"

The script will search Yarn, and download all the .mp4 movie clips into a directory within the `videos` directory.