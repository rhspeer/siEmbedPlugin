siEmbedPlugin
=============

Apostrophe CMS plugin for a iFrame slot for embedding pages &amp; Google Maps

Installation
------------
1. download or preferably use Git submodules to the plugins directory
2. add plugin to config/ProjectConfiguration.class.php
3. add module: "iframeSlot" to enabled_modules in setting.yml
4. add 'iframe: Embed iFrame' under slot_types in app.yml
5. OPTIONALLY add iframe under standard_area_slots to add this slot to the well.. standard area
6. build the classes with: ./symfony doctrine:build --all-classes
7. add the slot to any non standard area you need it in
8. try it out

Usage
-----
1. Add Content
2. select Embed iFrame slot
3. type in a URL in the format of http://www.example.com OR a Google My Places map like: 'https://maps.google.com/maps/ms?msid=211612409565233317133.0004a10f70a2ebc427d25&msa=0&ll=48.160589,-89.313354&spn=1.022312,2.469177'
4. change the width and/or height settings
5. click save

Urls pointing to the same page are restricted because this has the potential of causing a loop if a URL that 404's is put into a global slot
