$dest = "d:\APP\xampp2\htdocs\sekretariat-dprd\wp-content\themes\nama-tema-kustom"
$src = "d:\wordpress\versi_html"
New-Item -ItemType Directory -Force -Path "$dest\assets"
Copy-Item -Path "$src\images" -Destination "$dest\assets\images" -Recurse -Force
Copy-Item -Path "$src\*.css" -Destination "$dest\assets\" -Force
Copy-Item -Path "$src\*.js" -Destination "$dest\assets\" -Force
