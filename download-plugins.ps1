$plugins = @(
    "advanced-custom-fields",
    "custom-post-type-ui",
    "contact-form-7",
    "wordpress-seo",
    "wp-super-cache",
    "wp-smushit",
    "wordfence"
)

$pluginDir = "d:\APP\xampp2\htdocs\sekretariat-dprd\wp-content\plugins"

if (!(Test-Path -Path $pluginDir)) {
    New-Item -ItemType Directory -Path $pluginDir | Out-Null
}

foreach ($plugin in $plugins) {
    $url = "https://downloads.wordpress.org/plugin/$plugin.zip"
    $zipPath = "$pluginDir\$plugin.zip"
    Write-Host "Downloading $plugin..."
    try {
        Invoke-WebRequest -Uri $url -OutFile $zipPath
        Write-Host "Extracting $plugin..."
        Expand-Archive -Path $zipPath -DestinationPath $pluginDir -Force
        Remove-Item -Path $zipPath
        Write-Host "Installed $plugin successfully.`n"
    } catch {
        Write-Host "Failed to install $plugin. Error: $_`n"
    }
}
Write-Host "All plugins processed."
