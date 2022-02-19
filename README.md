[Live Demo Blog](https://www.ozcanarican.com)

## Features
- Html  template support by Twig
- Easy markdown content parsing
- Unlimited post categories by simply puttting them in same folders
- Calling post by any number and category
- Getting similiar posts
- Supporting static pages

## Installation
- Apply **composer install** command on terminal in the root folder of the project to install depencies.
- Edit **blogconfig.php** file to your preferences.
- You may need to change .htaccess file if you changed POSTPREFIX part of your project in **blogconfig.php**

## Usage
Create your blog subjects categories under **contents > articles** folder. For example you can have subjects like **contents > articles > news** **contents > articles > sport** **contents > articles > technology**

After creating category folders, create your Markdown files as **file.md** under the proper category folder.

Your Markdown file should start with information **header** as in **json** format. Example;

```json
{
"title": "Title of the post",
"description": "Description of the post",
"image": "Main image of the post",
"series": "If this post belongs of a article serie, name the serie file"
}
Your blog content goes here
```

## Article series
A content can be part of article series and you can have referance array for other article in same serie. Therefor, you can create navigation in your blog page like "Keep reading about this:" kind of.

To turn a few articles to a serie, create a **json** file under **contents > series** like example;

```json
  "title": "Title of the serie",
  "files": [
    "js-dom-nesneleri-kontrolu",
    "2021-07-11-responsive-navbar",
    "2021-07-12-sass-nedir-nasil-kullanilir",
    "2021-07-13-css-ile-yuklenme-animasyonu"
  ]
}
```

Add your files from same category to files.